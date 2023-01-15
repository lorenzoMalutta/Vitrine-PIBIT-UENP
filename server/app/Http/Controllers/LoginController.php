<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
}
