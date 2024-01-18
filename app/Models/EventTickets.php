<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class EventTickets extends Model
{
  use SoftDeletes;
  protected $table = 'event_tickets';
  protected $fillable = [
    'id_event',
    'image',
    'name',
    'quota',
    'price',
    'price_holiday',
    'tax',
    'tax_amount',
    'date_start',
    'date_end',
    'time_start',
    'time_end',
    'description',
    'status',
    'type',
  ];
  public static function validate($validate)
  {
    $rule = [
      'id_event' => 'required',
      'name' => 'required',
      'quota' => 'required',
      'price' => 'required',
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
