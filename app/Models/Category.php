<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Category extends Model
{
  use SoftDeletes;
  protected $table = 'category';
  protected $fillable = ['icon','image','id_parent','name','description'];
  public static function validate($validate)
  {
    $rule = [
      'name' => 'required',
    ];
    $validator = Validator::make($validate, $rule);
    if ($validator->fails()) {
        $errors =  $validator->errors()->all();
        $res = array(
                'status' => false,
                'error' => $errors,
                'msg' => 'Error on Validation'
              );
    } else {
        $res = array(
                'status' => true,
                'msg' => 'Validation Ok'
              );
    }
    return $res;
  }
}
