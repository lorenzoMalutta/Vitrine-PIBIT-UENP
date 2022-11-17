<?php

use App\Http\Controllers\PatenteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Patente routes
Route::get('/patentes', [PatenteController::class, 'index']);
Route::get('/patentes/{id}', [PatenteController::class, 'show']);
Route::post('/patentes', [PatenteController::class, 'store']);
Route::put('/patentes/{id}', [PatenteController::class, 'update']);
Route::delete('/patentes/{id}', [PatenteController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
