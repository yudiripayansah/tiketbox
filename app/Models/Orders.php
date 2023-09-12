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
      'order_code','id_user','email','phone','name','gender','dob','domicile','total_items','total_amount','payment_id','payment_method','payment_status','payment_description','payment_date','status','description'
    ];
    public static function validate($validate)
    {
        $rule = [
          'order_code' => 'required',
          'id_user' => 'required',
          'email' => 'required',
          'phone' => 'required',
          'name' => 'required',
          'gender' => 'required',
          'dob' => 'required',
          'domicile' => 'required',
          'total_items' => 'required',
          'total_amount' => 'required',
          'payment_method' => 'required',
          'payment_status' => 'required',
          'payment_description' => 'required',
          'payment_date' => 'required',
          'status' => 'required',
          'description' => 'required'
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
