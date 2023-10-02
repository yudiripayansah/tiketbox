<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class UserOrderData extends Model
{
  use SoftDeletes;
  protected $table = 'user_order_data';
  protected $fillable = [
    'id_user',
    'email',
    'phone',
    'name',
    'nik',
    'gender',
    'dob',
    'domicile',
    'status'
  ];
  public static function validate($validate)
  {
    $rule = [
      'id_user' => 'required',
      'email' => 'required',
      'phone' => 'required',
      'name' => 'required',
    ];
    $validator = Validator::make($validate, $rule);
    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      $res = [
        'status' => false,
        'error' => $errors,
        'msg' => 'Error on Validation',
      ];
    } else {
      $res = [
        'status' => true,
        'msg' => 'Validation Ok',
      ];
    }
    return $res;
  }
}
