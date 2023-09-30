<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class EventImages extends Model
{
  use SoftDeletes;
  protected $table = 'event_images';
  protected $fillable = ['id_event', 'title', 'image'];
  public static function validate($validate)
  {
    $rule = [
      'id_event' => 'required',
      'image' => 'required',
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
