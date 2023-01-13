<?php

namespace App\Http\Controllers;

use App\Models\User;

class AuthAdminController extends Controller
{
  public function newAdmin($id)
  {
    $user = User::findorFail($id);
    $user->admin = true;
    $user->update();
    return response()->json([
      'data' => [
        'user' => $user
      ], 201
    ]);
  }
}
