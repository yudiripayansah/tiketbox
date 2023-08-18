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
      'id_event','image','name','quota','price','tax','tax_amount','date_start','date_end','time_start','time_end','description','status','type'
    ];
    public static function validate($validate)
    {
        $rule = [
          'id_event' => 'required',
          'image' => 'required',
          'name' => 'required',
          'quota' => 'required',
          'price' => 'required',
          'tax' => 'required',
          'tax_amount' => 'required',
          'date_start' => 'required',
          'date_end' => 'required',
          'time_start' => 'required',
          'time_end' => 'required',
          'description' => 'required',
          'status' => 'required',
          'type' => 'required'
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
