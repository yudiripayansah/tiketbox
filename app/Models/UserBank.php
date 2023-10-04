<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class UserBank extends Model
{
  use SoftDeletes;
  protected $table = 'user_bank';
  protected $fillable = [
    'id_user',
    'name',
    'account_no',
    'bank',
    'branch',
    'code',
    'status',
  ];
  public static function validate($validate)
  {
    $rule = [
      'id_user' => 'required',
      'name' => 'required',
      'account_no' => 'required',
      'bank' => 'required',
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
