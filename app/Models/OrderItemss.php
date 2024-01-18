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
      'id_order','id_event','id_ticket','price','amount','total','description','status'
    ];
    public static function validate($validate)
    {
        $rule = [
          'id_order' => 'required',
          'id_event' => 'required',
          'id_ticket' => 'required',
          'price' => 'required',
          'amount' => 'required',
          'total' => 'required',
          'description' => 'required',
          'status' => 'required'
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
