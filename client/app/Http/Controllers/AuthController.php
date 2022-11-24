<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $credentials = $request->only('name', 'email', 'password', 'cpf');

    $request->validate(
      [
        'name' => 'required|string',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|confirmed',
        'cpf' => 'required|string|unique:users'
      ]
    );

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'cpf' => $request->cpf,
    ]);

    $token = $user->createToken('token-name')->plainTextToken;

    $response = [
      'user' => $user,
      'token' => $token
    ];

    return response($response, 201);
  }

  public function login(Request $request)
  {
    $request->validate(
      [
        'email' => 'required|string|email',
        'password' => 'required|string',
      ]
    );

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      throw ValidationException::withMessages([
        'email' => ['The provided credentials are incorrect.'],
      ]);
    }
    $token = $user->createToken('token-name')->plainTextToken;

    $response = [
      'user' => $user,
      'token' => $token
    ];

    return response($response, 201);
  }
  
  public function logout()
  {
    auth('sanctum')->user()->tokens()->delete();

    return [
      'message' => 'Logged out'
    ];
  }
}
