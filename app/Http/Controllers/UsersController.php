<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use JWTAuth;

class UsersController extends Controller
{
  public function __construct() {
    $this->middleware('auth:api', ['except' => ['login', 'register']]);
  }
  public function login(Request $request) {
    $credentials = $request->only('email', 'password');
    if (!$token = auth()->attempt($credentials)) {
      $res = array(
        'status' => false,
        'msg' => 'Email dan Password tidak valid'
      );
    } else {
      $data = auth()->user();
      $data['access_token'] = $token;
      $data['token_type'] = 'bearer';
      $data['expires_in'] = auth()->factory()->getTTL() * 60;
      $res = array(
        'status' => true,
        'msg' => 'Login successful',
        'data' => $data,
      );
    }
    return response()->json($res, 200);
  }
  public function logout() {
    auth()->logout();
    $res = array(
      'status' => true,
      'msg' => 'Logout successful',
      'data' => '',
    );
    return response()->json($res, 200);
  }
}