<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CategoryController extends Controller
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
    $id_parent = ($request->id_parent > -1) ? $request->id_parent : -1;
    $listData = Category::select('category.*')->orderBy($sortBy, $sortDir);
    if ($perPage != '~') {
        $listData->skip($offset)->take($perPage);
    }
    if ($search != null) {
        $listData->whereRaw('(category.name LIKE "%'.$search.'%" OR category.description LIKE "%'.$search.'%")');
    }
    if ($id_parent > -1) {
        $listData->where('id_parent',$id_parent);
    }
    $listData = $listData->get();
    foreach($listData as $ld) {
      $ld->parent = ($ld->id_parent > 0) ? Category::find($ld->id_parent)->name : 'Main Category';
      $ld->image = ($ld->image && $ld->image != 'default') ? Storage::disk('public')->url('category/'.$ld->image) : null;
    }
    if ($search || $id_parent > -1) {
        $total = Category::orderBy($sortBy, $sortDir);
        if ($search) {
            $total->whereRaw('(category.name LIKE "%'.$search.'%" OR category.description LIKE "%'.$search.'%")');
        }
        if ($id_parent > -1) {
            $total->where('id_parent',$id_parent);
        }
        $total = $total->count();
    } else {
        $total = Category::all()->count();
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
          'search' => $search,
          'id_parent' => $id_parent
        )
    );
    return response()->json($res, 200);
  }
  public function get(Request $request) {
    if ($request->id) {
      $getData = Category::find($request->id);
      if ($getData) {
        $getData->parent = ($getData->id_parent > 0) ? Category::find($getData->id_parent)->name : 'Main Category';
        $getData->image = ($getData->image && $getData->image != 'default') ? Storage::disk('public')->url('category/'.$getData->image) : null;
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
    if($request->image){
      $filename = uniqid().time().'-'. '-category.png';
      $filePath = 'category/' .$filename;
      $dataCreate['image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->image));
    } else {
      $dataCreate['image'] = 'default';
    }
    DB::beginTransaction();
    $validate = Category::validate($dataCreate);
    if ($validate['status']) {
      try {
        $dc = Category::create($dataCreate);
        $dg = Category::find($dc->id);
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
    $dataFind = Category::find($request->id);
    $validate = Category::validate($dataUpdate);
    unset($dataUpdate['created_at']);
    unset($dataUpdate['updated_at']);
    if (basename($request->image) != basename($dataFind->image)) {
      $filename = uniqid().time().'-'. '-category.png';
      $filePath = 'category/' .$filename;
      $dataUpdate['image'] = $filename;
      Storage::disk('public')->put($filePath, file_get_contents($request->image));
    } else {
      unset($dataUpdate['image']);
    }
    DB::beginTransaction();
    if ($validate['status']) {
      try {
        $du = Category::where('id',$request->id)->update($dataUpdate);
        $dg = Category::find($request->id);
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
      $delData = Category::find($id);
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