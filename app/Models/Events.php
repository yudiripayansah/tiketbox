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
      'name','powered_by','powered_by_image','category','subcategory','keyword','is_public','is_offline','date_start','date_end','time_start','time_end','location_name','location_address','location_city','location_coordinate','description','toc','form_order','max_ticket','one_email_one_transaction','one_ticket_one_order','peduli_lindungi','status','type'
    ];
    public static function validate($validate)
    {
        $rule = [
          'name' => 'required',
          'powered_by' => 'required',
          'powered_by_image' => 'required',
          'category' => 'required',
          'subcategory' => 'required',
          'keyword' => 'required',
          'is_public' => 'required',
          'is_offline' => 'required',
          'date_start' => 'required',
          'date_end' => 'required',
          'time_start' => 'required',
          'time_end' => 'required',
          'location_name' => 'required',
          'location_address' => 'required',
          'location_city' => 'required',
          'location_coordinate' => 'required',
          'description' => 'required',
          'toc' => 'required',
          'form_order' => 'required',
          'max_ticket' => 'required',
          'one_email_one_transaction' => 'required',
          'one_ticket_one_order' => 'required',
          'peduli_lindungi' => 'required',
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
