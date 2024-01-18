<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserLegal;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:api', [
      'except' => [
        'login',
        'register',
        'read',
        'get',
        'create',
        'update',
        'delete',
        'updatePassword',
        'verify'
      ],
    ]);
  }
  public function read(Request $request)
  {
    $page = $request->page ? $request->page : 1;
    $perPage = $request->perPage ? $request->perPage : '~';
    $offset = $page > 1 ? ($page - 1) * $perPage : 0;
    $sortDir = $request->sortDir ? $request->sortDir : 'DESC';
    $sortBy = $request->sortBy ? $request->sortBy : 'updated_at';
    $search = $request->search ? $request->search : null;
    $total = 0;
    $totalPage = 1;
    $id_user = $request->id_user ? $request->id_user : null;
    $type = $request->type ? $request->type : null;
    $listData = User::select('users.*')->orderBy($sortBy, $sortDir);
    if ($perPage != '~') {
      $listData->skip($offset)->take($perPage);
    }
    if ($search != null) {
      $listData->whereRaw('(users.name LIKE "%' . $search . '%")');
    }
    $listData = $listData->get();
    foreach ($listData as $ld) {
      $ld->image = $ld->image
        ? Storage::disk('public')->url('user/' . $ld->image)
        : null;
      $ld->promotor_logo = $ld->promotor_logo
        ? Storage::disk('public')->url('user/' . $ld->promotor_logo)
        : null;
      $ld->promotor_banner = $ld->promotor_banner
        ? Storage::disk('public')->url('user/' . $ld->promotor_banner)
        : null;
      $ld->legal = null;
      $legal = UserLegal::where('id_user', $ld->id);
      if (count($legal->get()) > 0) {
        $ld->legal = $legal->first();
      }
    }
    if ($search || $id_user || $type) {
      $total = User::orderBy($sortBy, $sortDir);
      if ($search) {
        $total->whereRaw('(users.name LIKE "%' . $search . '%")');
      }
      $total = $total->count();
    } else {
      $total = User::all()->count();
    }
    if ($perPage != '~') {
      $totalPage = ceil($total / $perPage);
    }
    $res = [
      'status' => true,
      'data' => $listData,
      'msg' => 'List data available',
      'total' => $total,
      'totalPage' => $totalPage,
      'paging' => [
        'page' => $page,
        'perPage' => $perPage,
        'sortDir' => $sortDir,
        'sortBy' => $sortBy,
        'search' => $search,
      ],
    ];
    return response()->json($res, 200);
  }
  public function get(Request $request)
  {
    if ($request->id) {
      $getData = User::find($request->id);
      if ($getData) {
        $getData->image = $getData->image
          ? Storage::disk('public')->url('user/' . $getData->image)
          : null;
        $getData->promotor_logo = $getData->promotor_logo
          ? Storage::disk('public')->url('user/' . $getData->promotor_logo)
          : null;
        $getData->promotor_banner = $getData->promotor_banner
          ? Storage::disk('public')->url('user/' . $getData->promotor_banner)
          : null;
        $res = [
          'status' => true,
          'data' => $getData,
          'msg' => 'Data available',
        ];
      } else {
        $res = [
          'status' => false,
          'msg' => 'Data not found',
        ];
      }
    } else {
      $res = [
        'status' => false,
        'msg' => 'No data selected',
      ];
    }
    return response()->json($res, 200);
  }
  public function create(Request $request)
  {
    $request->username = $request->username
      ? $request->username
      : trim($request->name.uniqid());
    $checkAccount = $this->checkAccount($request);
    $dataCreate = $request->all();
    $dataCreate['username'] = $request->username;
    $dataCreate['id'] = null;
    if ($request->image) {
      $filename = uniqid() . time() . '-' . '-user.png';
      $filePath = 'user/' . $filename;
      $dataCreate['image'] = $filename;
      Storage::disk('public')->put(
        $filePath,
        file_get_contents($request->image)
      );
    } else {
      $dataCreate['image'] = null;
    }
    if ($request->promotor_logo) {
      $filename = uniqid() . time() . '-' . '-promotor-logo.png';
      $filePath = 'user/' . $filename;
      $dataCreate['promotor_logo'] = $filename;
      Storage::disk('public')->put(
        $filePath,
        file_get_contents($request->promotor_logo)
      );
    } else {
      $dataCreate['image'] = null;
    }
    if ($request->promotor_banner) {
      $filename = uniqid() . time() . '-' . '-promotor-banner.png';
      $filePath = 'user/' . $filename;
      $dataCreate['promotor_banner'] = $filename;
      Storage::disk('public')->put(
        $filePath,
        file_get_contents($request->promotor_banner)
      );
    } else {
      $dataCreate['promotor_banner'] = null;
    }
    $dataCreate['password'] = Hash::make($request->password);
    if ($request->dob) {
      $dataCreate['dob'] = date('Y-m-d', strtotime($request->dob));
    }
    $dataCreate['verify_token'] = $this->get_rand_alphanumeric(30);
    if ($checkAccount['status']) {
      DB::beginTransaction();
      $validate = User::validate($dataCreate);
      if ($validate['status']) {
        try {
          $dc = User::create($dataCreate);
          $dg = User::find($dc->id);
          $this->sendEmailWelcome(
            $request->name,
            $request->email,
            $request->password,
            $dataCreate['verify_token']
          );
          $res = [
            'status' => true,
            'data' => $dg,
            'msg' => 'Data successfully created',
          ];
          DB::commit();
        } catch (Exception $e) {
          DB::rollback();
          $res = [
            'status' => false,
            'data' => $dataCreate,
            'msg' => 'Failed to create data',
          ];
        }
      } else {
        $res = [
          'status' => false,
          'data' => $dataCreate,
          'msg' => 'Validation failed',
          'errors' => $validate['error'],
        ];
      }
    } else {
      $res = [
        'status' => false,
        'data' => $dataCreate,
        'find' => $checkAccount,
        'msg' => 'Username/ Email/ Phone already exists',
      ];
    }
    return response()->json($res, 200);
  }
  public function update(Request $request)
  {
    $dataUpdate = $request->all();
    $dataFind = User::find($request->id);
    $validate = User::validate($dataUpdate);
    unset($dataUpdate['created_at']);
    unset($dataUpdate['updated_at']);
    if (basename($request->image) != basename($dataFind->image)) {
      $filename = uniqid() . time() . '-' . '-user.png';
      $filePath = 'user/' . $filename;
      $dataUpdate['image'] = $filename;
      Storage::disk('public')->put(
        $filePath,
        file_get_contents($request->image)
      );
    } else {
      unset($dataUpdate['image']);
    }
    if (
      basename($request->promotor_logo) != basename($dataFind->promotor_logo)
    ) {
      $filename = uniqid() . time() . '-' . '-promotor-logo.png';
      $filePath = 'user/' . $filename;
      $dataUpdate['promotor_logo'] = $filename;
      Storage::disk('public')->put(
        $filePath,
        file_get_contents($request->promotor_logo)
      );
    } else {
      unset($dataUpdate['image']);
    }
    if (
      basename($request->promotor_banner) !=
      basename($dataFind->promotor_banner)
    ) {
      $filename = uniqid() . time() . '-' . '-promotor-banner.png';
      $filePath = 'user/' . $filename;
      $dataUpdate['promotor_banner'] = $filename;
      Storage::disk('public')->put(
        $filePath,
        file_get_contents($request->promotor_banner)
      );
    } else {
      unset($dataUpdate['image']);
    }
    if ($request->password) {
      $dataUpdate['password'] = Hash::make($request->password);
    } else {
      unset($dataUpdate['password']);
    }
    DB::beginTransaction();
    if ($validate['status']) {
      try {
        $du = User::where('id', $request->id)->update($dataUpdate);
        $dg = User::find($request->id);
        $res = [
          'status' => true,
          'data' => $dg,
          'msg' => 'Data Successfully Saved',
        ];
        DB::commit();
      } catch (Exception $e) {
        $res = [
          'status' => false,
          'msg' => 'Failed to Save Data',
        ];
        DB::rollback();
      }
    } else {
      $res = [
        'status' => false,
        'data' => $request->all(),
        'msg' => 'Validation failed',
        'errors' => $validate['error'],
      ];
    }
    return response()->json($res, 200);
  }
  public function delete(Request $request)
  {
    $id = $request->id;
    if ($id) {
      $delData = User::find($id);
      try {
        $delData->delete();
        $res = [
          'status' => true,
          'msg' => 'Data successfully deleted',
        ];
      } catch (Exception $e) {
        $res = [
          'status' => false,
          'msg' => 'Failed to delete Data',
        ];
      }
    } else {
      $res = [
        'status' => false,
        'msg' => 'No data selected',
      ];
    }
    return response()->json($res, 200);
  }
  public function checkAccount($req)
  {
    $find = User::whereRaw(
      'username = "' .
        $req->username .
        '" OR email = "' .
        $req->email .
        '" OR phone = "' .
        $req->phone .
        '"'
    )->get();
    if (count($find) > 0) {
      $res = [
        'status' => false,
        'data' => $find,
      ];
    } else {
      $res = [
        'status' => true,
        'data' => $find,
      ];
    }
    return $res;
  }
  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');
    if (!($token = auth()->attempt($credentials))) {
      $res = [
        'status' => false,
        'msg' => 'Email dan Password tidak valid',
      ];
    } else {
      $data = auth()->user();
      if($data->status == 'active'){
        $data['access_token'] = $token;
        $data['token_type'] = 'bearer';
        $data['expires_in'] =
          auth()
            ->factory()
            ->getTTL() * 60;
        $res = [
          'status' => true,
          'msg' => 'Login successful',
          'data' => $data,
        ];
      } else {
        $res = [
          'status' => false,
          'msg' => 'Please activate your account',
        ];
      }
    }
    return response()->json($res, 200);
  }
  public function updatePassword(Request $request)
  {
    $credentials = $request->only('email', 'password');
    if (!($token = auth()->attempt($credentials))) {
      $res = [
        'status' => false,
        'msg' => 'Password lama salah, silahkan coba lagi',
      ];
    } else {
      $du = User::find($request->id);
      $du->password = Hash::make($request->new_password);
      $du = $du->save();
      $res = [
        'status' => true,
        'msg' => 'Password telah diubah',
        'du' => $du,
      ];
    }
    return response()->json($res, 200);
  }
  public function logout()
  {
    auth()->logout();
    $res = [
      'status' => true,
      'msg' => 'Logout successful',
      'data' => '',
    ];
    return response()->json($res, 200);
  }
  public function verify(Request $request)
  {
    if ($request->verify_token) {
      $getData = User::where('verify_token',$request->verify_token)->first();
      if ($getData) {
        $getData->status = 'active';
        $getData->save();
        $res = [
          'status' => true,
          'data' => $getData,
          'msg' => 'Data available',
        ];
      } else {
        $res = [
          'status' => false,
          'msg' => 'Data not found',
        ];
      }
    } else {
      $res = [
        'status' => false,
        'msg' => 'No data selected',
      ];
    }
    return response()->json($res, 200);
  }
  function sendEmailWelcome($name, $email, $password, $verify_token)
  {
    $mailInfo = new \stdClass();
    $mailInfo->recieverName = $name;
    $mailInfo->sender = "Tiketbox";
    $mailInfo->senderCompany = "Tiketbox.com";
    $mailInfo->to = $email;
    $mailInfo->subject = "Welcome to tiketbox.com";
    $mailInfo->name = "Tiketbox";
    $mailInfo->cc = "ripayansahyudi@gmail.com";
    $mailInfo->bcc = "yudiripayansah@gmail.com";
    $mailInfo->from = "info@tiketbox.com";
    $mailInfo->title = 'Welcome to tiketbox.com';
    $mailInfo->name = $name;
    $mailInfo->email = $email;
    $mailInfo->password = $password;
    $mailInfo->verify_token = $verify_token;
    Mail::to($email)->send(new WelcomeEmail($mailInfo));
  }
  function assign_rand_value($num)
  {
    // accepts 1 - 36
    switch ($num) {
      case "1":
        $rand_value = "a";
        break;
      case "2":
        $rand_value = "b";
        break;
      case "3":
        $rand_value = "c";
        break;
      case "4":
        $rand_value = "d";
        break;
      case "5":
        $rand_value = "e";
        break;
      case "6":
        $rand_value = "f";
        break;
      case "7":
        $rand_value = "g";
        break;
      case "8":
        $rand_value = "h";
        break;
      case "9":
        $rand_value = "i";
        break;
      case "10":
        $rand_value = "j";
        break;
      case "11":
        $rand_value = "k";
        break;
      case "12":
        $rand_value = "l";
        break;
      case "13":
        $rand_value = "m";
        break;
      case "14":
        $rand_value = "n";
        break;
      case "15":
        $rand_value = "o";
        break;
      case "16":
        $rand_value = "p";
        break;
      case "17":
        $rand_value = "q";
        break;
      case "18":
        $rand_value = "r";
        break;
      case "19":
        $rand_value = "s";
        break;
      case "20":
        $rand_value = "t";
        break;
      case "21":
        $rand_value = "u";
        break;
      case "22":
        $rand_value = "v";
        break;
      case "23":
        $rand_value = "w";
        break;
      case "24":
        $rand_value = "x";
        break;
      case "25":
        $rand_value = "y";
        break;
      case "26":
        $rand_value = "z";
        break;
      case "27":
        $rand_value = "0";
        break;
      case "28":
        $rand_value = "1";
        break;
      case "29":
        $rand_value = "2";
        break;
      case "30":
        $rand_value = "3";
        break;
      case "31":
        $rand_value = "4";
        break;
      case "32":
        $rand_value = "5";
        break;
      case "33":
        $rand_value = "6";
        break;
      case "34":
        $rand_value = "7";
        break;
      case "35":
        $rand_value = "8";
        break;
      case "36":
        $rand_value = "9";
        break;
    }
    return $rand_value;
  }
  function get_rand_alphanumeric($length)
  {
    if ($length > 0) {
      $rand_id = "";
      for ($i = 1; $i <= $length; $i++) {
        mt_srand((float) microtime() * 1000000);
        $num = mt_rand(1, 36);
        $rand_id .= $this->assign_rand_value($num);
      }
    }
    return $rand_id;
  }
}
