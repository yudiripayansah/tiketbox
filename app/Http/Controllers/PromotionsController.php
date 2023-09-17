<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Promotions;
use App\Models\PromotionImages;
use JWTAuth;
use Illuminate\Support\Facades\Hash;

class PromotionsController extends Controller
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
    $total = 0;
    $totalPage = 1;
    $listData = Promotions::select('promotions.*')->orderBy($sortBy, $sortDir);
    if ($perPage != '~') {
        $listData->skip($offset)->take($perPage);
    }
    if ($search != null) {
        $listData->whereRaw('(promotions.name LIKE "%'.$search.'%")');
    }
    $listData = $listData->get();
    foreach($listData as $ld) {
      $images = PromotionImages::where('id_promotion', $ld->id)->get();
      foreach($images as $image){
        $image->image_url = Storage::disk('public')->url('promotion/'.$image->image);
      }
      if(count($images) < 1){
        $images = (object) array(['image_url' => url('/assets/images/promotions/default.jpg')]);
      }
      $ld->images = $images;
    }
    if ($search) {
        $total = Promotions::orderBy($sortBy, $sortDir);
        if ($search) {
            $total->whereRaw('(promotions.name LIKE "%'.$search.'%")');
        }
        $total = $total->count();
    } else {
        $total = Promotions::all()->count();
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
      $getData = Promotions::find($request->id);
      $images = PromotionImages::where('id_promotion', $getData->id)->get();
      foreach($images as $image){
        $image->image_url = Storage::disk('public')->url('promotion/'.$image->image);
        $image->deleted = false;
      }
      $getData->images = $images;
      if ($getData) {
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
    $checkData = $this->checkData($request);
    $dataCreate = $request->all();
    $dataCreate['date_start'] = date('Y-m-d',strtotime($request->date_start));
    $dataCreate['date_end'] = date('Y-m-d',strtotime($request->date_end));
    $dataCreate['time_start'] = date('H:i:s',strtotime($request->date_start.' '.$request->time_start));
    $dataCreate['time_end'] = date('H:i:s',strtotime($request->date_start.' '.$request->time_end));
    unset($dataCreate['promotion_target']);
    if($checkData['status']){
      DB::beginTransaction();
      $validate = Promotions::validate($dataCreate);
      if ($validate['status']) {
        try {
          $dc = Promotions::create($dataCreate);
          $this->handleImage($dc->id,$request->images);
          $dg = Promotions::find($dc->id);
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
              'find' => $checkData,
              'msg' => 'Promo Code already exists'
            );
    }
    return response()->json($res, 200);
  }
  public function update(Request $request) {
    $dataUpdate = $request->all();
    $dataFind = Promotions::find($request->id);
    $validate = Promotions::validate($dataUpdate);
    $dataUpdate['date_start'] = date('Y-m-d',strtotime($request->date_start));
    $dataUpdate['date_end'] = date('Y-m-d',strtotime($request->date_end));
    $dataUpdate['time_start'] = date('H:i:s',strtotime($request->date_start.' '.$request->time_start));
    $dataUpdate['time_end'] = date('H:i:s',strtotime($request->date_start.' '.$request->time_end));
    unset($dataUpdate['_token']);
    unset($dataUpdate['event_target']);
    unset($dataUpdate['images']);
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
        $du = Promotions::where('id',$request->id)->update($dataUpdate);
        $this->handleImage($request->id,$request->images);
        $dg = Promotions::find($request->id);
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
      $delData = Promotions::find($id);
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
  function handleImage($id_promotion,$images) {
    DB::beginTransaction();
    foreach($images as $image) {
      if(isset($image['id'])) {
        if($image['deleted']){
          PromotionImages::where('id',$image['id'])->delete();
        }
        $doProcess = true;
      } else {
        $filename = uniqid().time().'-'.$id_promotion. '-promotion.png';
        $filePath = 'promotion/' .$filename;
        Storage::disk('public')->put($filePath, file_get_contents($image));
        $cimage = [];
        $cimage['title'] = $filename;
        $cimage['id_promotion'] = $id_promotion;
        $cimage['image'] = $filename;
        $doProcess = PromotionImages::create($cimage);
      }
      if($doProcess) {
        DB::commit();
      } else {
        DB::rollback();
        return false;
        break;
      }
    }
    return true;
  }
  public function checkData($req){
    $find = Promotions::whereRaw('code = "'.$req->code.'"')->get();
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
}