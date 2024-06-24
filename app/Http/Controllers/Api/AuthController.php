<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  use ApiResponses;

  public function register()
  {
    return $this->ok('User registered successfully', []);
  }


  public function login(LoginUserRequest $request)
  {
    $request->validated($request->all());

    if (!auth()->attempt($request->only('email', 'password'))) {
      return $this->error('Invalid credentials.', 401);
    }

    $user = User::firstWhere('email', $request->email);

    return $this->ok(
      'User logged in successfully.',
      [
        'token' => $user->createToken(
          'API token for ' . $user->email,
          ['*'], // permissions
          now()->addHours(12),
        )->plainTextToken,
        
        'user' => [
          'name' => $user->name,
          'email' => $user->email,
        ],
      ]
    );
  }


  public function logout(Request $request)
  {
    $request->user()->currentAccessToken()->delete();

    return $this->ok('User logged out successfully.');
  }
}
