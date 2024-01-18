<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
  use HasFactory, Notifiable;
  use SoftDeletes;
  protected $table = 'users';
  protected $fillable = [
    'username',
    'email',
    'name',
    'password',
    'phone',
    'image',
    'address',
    'gender',
    'dob',
    'domicile',
    'status',
    'type',
    'promotor_logo',
    'promotor_banner',
    'promotor_name',
    'promotor_link',
    'promotor_phone',
    'promotor_email',
    'promotor_address',
    'promotor_about',
    'promotor_social_media',
    'verify_token'
  ];
  protected $hidden = ['password'];
  public static function validate($validate)
  {
    $rule = [
      'username' => 'required',
      'email' => 'required',
      'name' => 'required',
      'password' => 'required',
      'phone' => 'required',
      'type' => 'required',
    ];
    if ($validate['id']) {
      unset($rule['password']);
    }
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
  public function getJWTIdentifier()
  {
    return $this->getKey();
  }
  public function getJWTCustomClaims()
  {
    return [];
  }
}
