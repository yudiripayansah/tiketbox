<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Orders extends Model
{
  use SoftDeletes;
  protected $table = 'orders';
  protected $fillable = [
    'order_code',
    'id_user',
    'email',
    'phone',
    'name',
    'gender',
    'dob',
    'domicile',
    'id_promotion',
    'promotion_code',
    'promotion_type',
    'promotion_value',
    'promotion_amount',
    'total_items',
    'total_amount',
    'payment_id',
    'payment_method',
    'payment_status',
    'payment_description',
    'payment_date',
    'status',
    'description',
  ];
  public static function validate($validate)
  {
    $rule = [
      'order_code' => 'required',
      'id_user' => 'required',
      'email' => 'required',
      'phone' => 'required',
      'name' => 'required',
      'total_items' => 'required',
      'total_amount' => 'required',
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
  public function user()
  {
    return $this->belongsTo(User::class, 'id_user', 'id');
  }
  public function item()
  {
    return $this->hasMany(OrderItems::class, 'id_order', 'id');
  }
}
