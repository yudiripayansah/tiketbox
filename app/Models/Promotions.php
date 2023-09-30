<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Promotions extends Model
{
  use SoftDeletes;
  protected $table = 'promotions';
  protected $fillable = [
    'id_event',
    'target_event',
    'name',
    'code',
    'type',
    'quota',
    'minimum_amount',
    'discount_type',
    'amount_percent',
    'amount_rupiah',
    'maximum_discount',
    'description',
    'available_days',
    'available_dates',
    'date_start',
    'date_end',
    'time_start',
    'time_end',
    'status',
    'is_bestdeal',
    'is_popular'
  ];
  public static function validate($validate)
  {
    $rule = [
      'name' => 'required',
      'code' => 'required',
      'type' => 'required',
      'quota' => 'required',
      'minimum_amount' => 'required',
      'discount_type' => 'required'
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
