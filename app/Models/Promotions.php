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
      'target_event','name','code','type','quota','minimum_amount','discount_type','amount_percent','amount_rupiah','maximum_discount','description','date_start','date_end','time_start','time_end','status'
    ];
    public static function validate($validate)
    {
        $rule = [
          'target_event' => 'required',
          'name' => 'required',
          'code' => 'required',
          'type' => 'required',
          'quota' => 'required',
          'minimum_amount' => 'required',
          'discount_type' => 'required',
          'maximum_discount' => 'required',
          'date_start' => 'required',
          'date_end' => 'required',
          'time_start' => 'required',
          'time_end' => 'required',
        ];
        $validator = Validator::make($validate, $rule);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            $res = array(
                    'status' => false,
                    'error' => $errors,
                    'msg' => 'Error on Validation'
                  );
        } else {
            $res = array(
                    'status' => true,
                    'msg' => 'Validation Ok'
                  );
        }
        return $res;
    }
}
