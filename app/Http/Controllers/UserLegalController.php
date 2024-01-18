<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\UserLegal;
use App\Models\User;

class UserLegalController extends Controller
{
  public function __construct() {
    
  }
  public function read(Request $request) {
    $page = ($request->page) ? $request->page : 1;
    $perPage = ($request->perPage) ? $request->perPage : '~';
    $offset = ($page > 1) ? ($page - 1) * $perPage : 0;
    $sortDir = ($request->sortDir) ? $request->sortDir : 'DESC';
    $sortBy = ($request->sortBy) ? $request->sortBy : 'updated_at';
    $search = ($request->search) ? $request->search : null;
    $id_user = ($request->id_user) ? $request->id_user : null;
    $total = 0;
    $totalPage = 1;
    $listData = UserLegal::select('user_legal.*')->orderBy($sortBy, $sortDir);
    if ($perPage != '~') {
        $listData->skip($offset)->take($perPage);
    }
    if ($search != null) {
        $listData->whereRaw('(user_legal.ktp_name LIKE "%'.$search.'%" OR user_legal.npwp_name LIKE "%'.$search.'%" OR user_legal.ktp_no LIKE "%'.$search.'%")');
    }
    if ($id_user != null) {
        $listData->where('id_user',$id_user);
    }
    $listData = $listData->get();
    foreach($listData as $ld) {

    }
    if ($search || $id_user) {
        $total = UserLegal::orderBy($sortBy, $sortDir);
        if ($search) {
            $total->whereRaw('(user_legal.ktp_name LIKE "%'.$search.'%" OR user_legal.npwp_name LIKE "%'.$search.'%" OR user_legal.ktp_no LIKE "%'.$search.'%")');
        }
        if ($id_user != null) {
            $total->where('id_user',$id_user);
        }
        $total = $total->count();
    } else {
        $total = UserLegal::all()->count();
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
    if ($request->id || $request->id_user) {
      $getData = UserLegal::find($request->id);
      if($request->id_user){
        $getData = UserLegal::where('id_user', $request->id_user)->first();
      }
      if ($getData) {
        $getData->ktp_image = ($getData->ktp_image) ? Storage::disk('public')->url('ktp/'.$getData->ktp_image) : null;
        $getData->npwp_image = ($getData->npwp_image) ? Storage::disk('public')->url('npwp/'.$getData->npwp_image) : null;
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
    $dataCreate = $request->all();
    DB::beginTransaction();
    if($request->ktp_image){
      $filename = uniqid().time().'-'. '-ktp.png';
      $filePath = 'ktp/' .$filename;
      $dataCreate['ktp_image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->ktp_image));
    } else {
      $dataCreate['ktp_image'] = null;
    }
    if($request->npwp_image){
      $filename = uniqid().time().'-'. '-npwp.png';
      $filePath = 'npwp/' .$filename;
      $dataCreate['npwp_image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->npwp_image));
    } else {
      $dataCreate['npwp_image'] = null;
    }
    $validate = UserLegal::validate($dataCreate);
    if ($validate['status']) {
      try {
        $dc = UserLegal::create($dataCreate);
        $dg = UserLegal::find($dc->id);
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
    return response()->json($res, 200);
  }
  public function update(Request $request) {
    $dataUpdate = $request->all();
    $dataFind = UserLegal::find($request->id);
    $validate = UserLegal::validate($dataUpdate);
    unset($dataUpdate['created_at']);
    unset($dataUpdate['updated_at']);
    if (basename($request->ktp_image) != basename($dataFind->ktp_image)) {
      $filename = uniqid().time().'-'. '-ktp.png';
      $filePath = 'ktp/' .$filename;
      $dataUpdate['ktp_image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->ktp_image));
    } else {
      unset($dataUpdate['ktp_image']);
    }
    if (basename($request->npwp_image) != basename($dataFind->npwp_image)) {
      $filename = uniqid().time().'-'. '-npwp.png';
      $filePath = 'npwp/' .$filename;
      $dataUpdate['npwp_image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->npwp_image));
    } else {
      unset($dataUpdate['npwp_image']);
    }
    DB::beginTransaction();
    if ($validate['status']) {
      try {
        $du = UserLegal::where('id',$request->id)->update($dataUpdate);
        $user = User::find($dataUpdate['id_user']);
        if($dataUpdate['status'] == 'APPROVED'){
          $user->type = 'promotor';
        } else {
          $user->type = 'user';
        }
        $user->save();
        $dg = UserLegal::find($request->id);
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
      $delData = UserLegal::find($id);
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
}