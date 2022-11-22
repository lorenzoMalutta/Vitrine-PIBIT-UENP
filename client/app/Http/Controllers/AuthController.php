<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $credentials = $request->only('name', 'email', 'password', 'cpf');
    $request->validate([
      'name' => 'required|string',
      'email' => 'required|string|email|unique:users',
      'password' => 'required|string|confirmed',
      'cpf' => 'required|string|unique:users',
    ]);

    $user = User::create([
      'name' => $credentials['name'],
      'email' => $credentials['email'],
      'password' => bcrypt($credentials['password']),
      'cpf' => $credentials['cpf'],
    ]);

    $token = $user->createToken('token-name')->plainTextToken;

    $response = [
      'user' => $user,
      'token' => $token
    ];

    return response($response, 201);
  }
}
