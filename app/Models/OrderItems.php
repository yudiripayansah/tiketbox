<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class OrderItems extends Model
{
  use SoftDeletes;
  protected $table = 'order_items';
  protected $fillable = [
    'date',
    'id_order',
    'id_event',
    'id_ticket',
    'id_seat',
    'section',
    'row',
    'seat',
    'price',
    'amount',
    'total',
    'description',
    'status',
    'updated_by',
  ];
  public static function validate($validate)
  {
    $rule = [
      'date' => 'required',
      'id_order' => 'required',
      'id_event' => 'required',
      'id_ticket' => 'required',
      'price' => 'required',
      'amount' => 'required',
      'total' => 'required',
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
  public function event()
  {
    return $this->hasOne(Events::class, 'id', 'id_event');
  }
  public function ticket()
  {
    return $this->hasOne(EventTickets::class, 'id', 'id_ticket');
  }
  public function seat()
  {
    return $this->hasOne(EventTicketSeat::class, 'id', 'id_seat');
  }
}
