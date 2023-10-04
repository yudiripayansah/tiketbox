<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class UserLegal extends Model
{
  use SoftDeletes;
  protected $table = 'user_legal';
  protected $fillable = [
    'id_user',
    'ktp_image',
    'ktp_name',
    'ktp_no',
    'ktp_address',
    'npwp_image',
    'npwp_name',
    'npwp_no',
    'npwp_address',
    'type',
    'status',
  ];
  public static function validate($validate)
  {
    $rule = [
      'id_user' => 'required',
      'ktp_image' => 'required',
      'ktp_name' => 'required',
      'ktp_no' => 'required',
      'ktp_address' => 'required',
      'npwp_image' => 'required',
      'npwp_name' => 'required',
      'npwp_no' => 'required',
      'npwp_address' => 'required'
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
