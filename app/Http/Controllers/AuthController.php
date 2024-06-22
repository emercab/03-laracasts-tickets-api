<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiLoginRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  use ApiResponses;

  public function register()
  {
    return $this->ok('User registered successfully');
  }
  
  
  public function login(ApiLoginRequest $request)
  {
    return $this->ok($request->get('email'));
  }

}
