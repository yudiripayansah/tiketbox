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
  public function __construct() {
    $this->middleware('auth:api', ['except' => ['login', 'register','read','get','create','update','delete','updatePassword']]);
  }
  public function read(Request $request) {
    $page = ($request->page) ? $request->page : 1;
    $perPage = ($request->perPage) ? $request->perPage : '~';
    $offset = ($page > 1) ? ($page - 1) * $perPage : 0;
    $sortDir = ($request->sortDir) ? $request->sortDir : 'DESC';
    $sortBy = ($request->sortBy) ? $request->sortBy : 'updated_at';
    $search = ($request->search) ? $request->search : null;
    $total = 0;
    $totalPage = 1;
    $id_user = ($request->id_user) ? $request->id_user : null;
    $type = ($request->type) ? $request->type : null;
    $listData = User::select('users.*')->orderBy($sortBy, $sortDir);
    if ($perPage != '~') {
        $listData->skip($offset)->take($perPage);
    }
    if ($search != null) {
        $listData->whereRaw('(users.name LIKE "%'.$search.'%")');
    }
    $listData = $listData->get();
    foreach($listData as $ld) {
      $ld->image = ($ld->image) ? Storage::disk('public')->url('user/'.$ld->image) : null;
      $ld->promotor_logo = ($ld->promotor_logo) ? Storage::disk('public')->url('user/'.$ld->promotor_logo) : null;
      $ld->promotor_banner = ($ld->promotor_banner) ? Storage::disk('public')->url('user/'.$ld->promotor_banner) : null;
      $ld->legal = null;
      $legal = UserLegal::where('id_user', $ld->id);
      if(count($legal->get()) > 0){
        $ld->legal = $legal->first();
      }
    }
    if ($search || $id_user || $type) {
        $total = User::orderBy($sortBy, $sortDir);
        if ($search) {
            $total->whereRaw('(users.name LIKE "%'.$search.'%")');
        }
        $total = $total->count();
    } else {
        $total = User::all()->count();
    }
    if ($perPage != '~') {
        $totalPage = ceil($total / $perPage);
    }
    $res = array(
        'status' => true,
        'data' => $listData,
        'msg' => 'List data available',
        'total' => $total,
        'totalPage' => $totalPage,
        'paging' => array(
          'page' => $page,
          'perPage' => $perPage,
          'sortDir' => $sortDir,
          'sortBy' => $sortBy,
          'search' => $search
        )
    );
    return response()->json($res, 200);
  }
  public function get(Request $request) {
    if ($request->id) {
      $getData = User::find($request->id);
      if ($getData) {
        $getData->image = ($getData->image) ? Storage::disk('public')->url('user/'.$getData->image) : null;
        $getData->promotor_logo = ($getData->promotor_logo) ? Storage::disk('public')->url('user/'.$getData->promotor_logo) : null;
        $getData->promotor_banner = ($getData->promotor_banner) ? Storage::disk('public')->url('user/'.$getData->promotor_banner) : null;
        $res = array(
                'status' => true,
                'data' => $getData,
                'msg' => 'Data available'
              );
      } else {
          $res = array(
                  'status' => false,
                  'msg' => 'Data not found'
                );
      }
    } else {
      $res = array(
        'status' => false,
        'msg' => 'No data selected'
      );
    }
    return response()->json($res, 200);
  }
  public function create(Request $request) {
    $request->username = ($request->username) ? $request->username : trim($request->name);
    $checkAccount = $this->checkAccount($request);
    $dataCreate = $request->all();
    $dataCreate['username'] = $request->username;
    $dataCreate['id'] = null;
    if($request->image){
      $filename = uniqid().time().'-'. '-user.png';
      $filePath = 'user/' .$filename;
      $dataCreate['image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->image));
    } else {
      $dataCreate['image'] = null;
    }
    if($request->promotor_logo){
      $filename = uniqid().time().'-'. '-promotor-logo.png';
      $filePath = 'user/' .$filename;
      $dataCreate['promotor_logo'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->promotor_logo));
    } else {
      $dataCreate['image'] = null;
    }
    if($request->promotor_banner){
      $filename = uniqid().time().'-'. '-promotor-banner.png';
      $filePath = 'user/' .$filename;
      $dataCreate['promotor_banner'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->promotor_banner));
    } else {
      $dataCreate['promotor_banner'] = null;
    }
    $dataCreate['password'] = Hash::make($request->password);
    if($request->dob) {
      $dataCreate['dob'] = date('Y-m-d',strtotime($request->dob));
    }
    if($checkAccount['status']){
      DB::beginTransaction();
      $validate = User::validate($dataCreate);
      if ($validate['status']) {
        try {
          $dc = User::create($dataCreate);
          $dg = User::find($dc->id);
          // $this->sendEmailWelcome($request->name,$request->email,$request->password);
          $res = array(
                  'status' => true,
                  'data' => $dg,
                  'msg' => 'Data successfully created'
                );
          DB::commit();
        } catch (Exception $e) {
          DB::rollback();
          $res = array(
                  'status' => false,
                  'data' => $dataCreate,
                  'msg' => 'Failed to create data'
                );
        }
      } else {
        $res = array(
                'status' => false,
                'data' => $dataCreate,
                'msg' => 'Validation failed',
                'errors' => $validate['error']
              );
            }
    } else {
      $res = array(
              'status' => false,
              'data' => $dataCreate,
              'find' => $checkAccount,
              'msg' => 'Username/ Email/ Phone already exists'
            );
    }
    return response()->json($res, 200);
  }
  public function update(Request $request) {
    $dataUpdate = $request->all();
    $dataFind = User::find($request->id);
    $validate = User::validate($dataUpdate);
    unset($dataUpdate['created_at']);
    unset($dataUpdate['updated_at']);
    if (basename($request->image) != basename($dataFind->image)) {
      $filename = uniqid().time().'-'. '-user.png';
      $filePath = 'user/' .$filename;
      $dataUpdate['image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->image));
    } else {
      unset($dataUpdate['image']);
    }
    if (basename($request->promotor_logo) != basename($dataFind->promotor_logo)) {
      $filename = uniqid().time().'-'. '-promotor-logo.png';
      $filePath = 'user/' .$filename;
      $dataUpdate['promotor_logo'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->promotor_logo));
    } else {
      unset($dataUpdate['image']);
    }
    if (basename($request->promotor_banner) != basename($dataFind->promotor_banner)) {
      $filename = uniqid().time().'-'. '-promotor-banner.png';
      $filePath = 'user/' .$filename;
      $dataUpdate['promotor_banner'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->promotor_banner));
    } else {
      unset($dataUpdate['image']);
    }
    if($request->password){
      $dataUpdate['password'] = Hash::make($request->password);
    } else {
      unset($dataUpdate['password']);
    }
    DB::beginTransaction();
    if ($validate['status']) {
      try {
        $du = User::where('id',$request->id)->update($dataUpdate);
        $dg = User::find($request->id);
        $res = array(
                'status' => true,
                'data' => $dg,
                'msg' => 'Data Successfully Saved'
              );
        DB::commit();
      } catch (Exception $e) {
        $res = array(
                'status' => false,
                'msg' => 'Failed to Save Data'
              );
        DB::rollback();
      }
    } else {
      $res = array(
        'status' => false,
        'data' => $request->all(),
        'msg' => 'Validation failed',
        'errors' => $validate['error']
      );
    }
    return response()->json($res, 200);
  }
  public function delete(Request $request) {
    $id = $request->id;
    if ($id) {
      $delData = User::find($id);
      try {
        $delData->delete();
        $res = array(
            'status' => true,
            'msg' => 'Data successfully deleted'
        );
      } catch (Exception $e) {
        $res = array(
                'status' => false,
                'msg' => 'Failed to delete Data'
              );
      }
    } else {
      $res = array(
              'status' => false,
              'msg' => 'No data selected'
            );
    }
    return response()->json($res, 200);
  }
  public function checkAccount($req){
    $find = User::whereRaw('username = "'.$req->username.'" OR email = "'.$req->email.'" OR phone = "'.$req->phone.'"')->get();
    if(count($find) > 0){
      $res = [
        'status' => false,
        'data' => $find
      ];
    } else {
      $res = [
        'status' => true,
        'data' => $find
      ];
    }
    return $res;
  }
  public function login(Request $request) {
    $credentials = $request->only('email', 'password');
    if (!$token = auth()->attempt($credentials)) {
      $res = array(
        'status' => false,
        'msg' => 'Email dan Password tidak valid'
      );
    } else {
      $data = auth()->user();
      $data['access_token'] = $token;
      $data['token_type'] = 'bearer';
      $data['expires_in'] = auth()->factory()->getTTL() * 60;
      $res = array(
        'status' => true,
        'msg' => 'Login successful',
        'data' => $data,
      );
    }
    return response()->json($res, 200);
  }
  public function updatePassword(Request $request) {
    $credentials = $request->only('email', 'password');
    if (!$token = auth()->attempt($credentials)) {
      $res = array(
        'status' => false,
        'msg' => 'Password lama salah, silahkan coba lagi'
      );
    } else {
      $du = User::find($request->id);
      $du->password = Hash::make($request->new_password);
      $du = $du->save();
      $res = array(
        'status' => true,
        'msg' => 'Password telah diubah',
        'du' => $du
      );
    }
    return response()->json($res, 200);
  }
  public function logout() {
    auth()->logout();
    $res = array(
      'status' => true,
      'msg' => 'Logout successful',
      'data' => '',
    );
    return response()->json($res, 200);
  }
  function sendEmailWelcome($name,$email,$password) {
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
    Mail::to($email)
        ->send(new WelcomeEmail($mailInfo));
  }
}