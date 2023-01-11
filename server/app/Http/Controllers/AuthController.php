<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  public function register(Request $request, User $user)
  {
    $request->validate(
      [
        'name' => 'required|string',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|confirmed',
        'password_confirmation' => 'required|string',
        'cpf' => 'required|string|unique:users'
      ]
    );

    $userData = $request->only('name', 'email', 'password', 'cpf', 'password_confirmation');
    $userData['password'] = bcrypt($userData['password']);

    if (!$user = $user->create($userData)) {
      abort(500, 'Erro ao criar usuário');
    }

    return response()->json([
      'data' => [
        'user' => $user
      ]
    ]);
  }


  public function login(Request $request)
  {
    $request->validate(
      [
        'email' => 'required|string|email',
        'password' => 'required|string',
      ]
    );

    $credentials = $request->only('email', 'password');

    if (!auth()->attempt($credentials)) {
      abort(401, 'Credenciais Inválidas');
    }

    $token = auth()->user()->createToken('auth_token');

    return response()->json([
      'token' => $token->plainTextToken
    ]);
  }

  public function logout()
  {
    auth('sanctum')->user()->tokens()->delete();

    return response()->json([
      'message' => 'Logged out'
    ]);
  }
}
