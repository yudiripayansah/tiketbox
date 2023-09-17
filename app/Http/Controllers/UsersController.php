<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use JWTAuth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
  public function __construct() {
    $this->middleware('auth:api', ['except' => ['login', 'register','read','get','create','update','delete']]);
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
    $checkAccount = $this->checkAccount($request);
    $dataCreate = $request->all();
    if($request->image){
      $filename = uniqid().time().'-'. '-user.png';
      $filePath = 'user/' .$filename;
      $dataCreate['image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->image));
    } else {
      $dataCreate['image'] = 'default';
    }
    $dataCreate['password'] = Hash::make($request->password);
    $dataCreate['dob'] = date('Y-m-d',strtotime($request->dob));
    if($checkAccount['status']){
      DB::beginTransaction();
      $validate = User::validate($dataCreate);
      if ($validate['status']) {
        try {
          $dc = User::create($dataCreate);
          $dg = User::find($dc->id);
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
  public function logout() {
    auth()->logout();
    $res = array(
      'status' => true,
      'msg' => 'Logout successful',
      'data' => '',
    );
    return response()->json($res, 200);
  }
}