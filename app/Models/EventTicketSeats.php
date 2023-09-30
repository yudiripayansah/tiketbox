<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class EventTicketSeats extends Model
{
  use SoftDeletes;
  protected $table = 'event_ticket_seats';
  protected $fillable = [
    'id_event',
    'id_ticket',
    'image',
    'section',
    'row',
    'seat',
    'price',
    'status',
  ];
  public static function validate($validate)
  {
    $rule = [
      'id_event' => 'required',
      'id_ticket' => 'required',
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
