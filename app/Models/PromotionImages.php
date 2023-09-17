<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class PromotionImages extends Model
{
    use SoftDeletes;
    protected $table = 'promotion_images';
    protected $fillable = [
      'id_promotion','title','image'
    ];
    public static function validate($validate)
    {
        $rule = [
          'id_promotion' => 'required',
          'title' => 'required',
          'image' => 'required',
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
