<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Events extends Model
{
  use SoftDeletes;
  protected $table = 'events';
  protected $fillable = [
    'id_user',
    'meta_title',
    'meta_description',
    'name',
    'powered_by',
    'powered_by_image',
    'category',
    'subcategory',
    'keyword',
    'is_public',
    'is_offline',
    'days_closed',
    'dates_closed',
    'date_start',
    'date_end',
    'time_start',
    'time_end',
    'location_name',
    'location_address',
    'location_city',
    'location_coordinate',
    'description',
    'toc',
    'form_order',
    'max_ticket',
    'one_email_one_transaction',
    'one_ticket_one_order',
    'peduli_lindungi',
    'status',
    'type',
    'dates_closed',
    'is_popular'
  ];
  public static function validate($validate)
  {
    $rule = [
      'name' => 'required',
      'category' => 'required',
      'subcategory' => 'required',
      'is_public' => 'required',
      'is_offline' => 'required',
      'location_name' => 'required',
      'location_address' => 'required',
      'location_city' => 'required',
      'max_ticket' => 'required',
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
