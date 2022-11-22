<?php

use App\Http\Controllers\PatenteController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\ServicoController;
use GuzzleHttp\Middleware;
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

// Auth user
Route::post('/login', [AuthController::class, 'login']);

// Patente routes
Route::get('/patentes', [PatenteController::class, 'index']);
Route::get('/patentes/{id}', [PatenteController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/patentes', [PatenteController::class, 'store']);
    Route::put('/patentes/{id}', [PatenteController::class, 'update']);
    Route::delete('/patentes/{id}', [PatenteController::class, 'destroy']);
});

// Software routes
Route::get('/softwares', [SoftwareController::class, 'index']);
Route::get('/softwares/{id}', [SoftwareController::class, 'show']);

Route::group(['middlwere' => ['auth:sanctum']], function () {
  Route::post('/softwares', [SoftwareController::class, 'store']);
  Route::put('/softwares/{id}', [SoftwareController::class, 'update']);
  Route::delete('/softwares/{id}', [SoftwareController::class, 'destroy']);
});

// Servicos routes
Route::get('/servicos', [ServicoController::class, 'index']);
Route::get('/servicos/{id}', [ServicoController::class, 'show']);

Route::group(['middlwere' => ['auth:sanctum']], function () {
  Route::post('/servicos', [ServicoController::class, 'store']);
  Route::put('/servicos/{id}', [ServicoController::class, 'update']);
  Route::delete('/servicos/{id}', [ServicoController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
