<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PatenteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\ServicoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

// Auth user
Route::post('/login', [LoginController::class, 'login']);
Route::post('/cadastro', [RegisterController::class, 'register']);
Route::middleware('auth:sanctum')->group(function () {
  Route::post('/logout', [LogoutController::class, 'logout']);
});

// Auth admin
Route::middleware('auth:sanctum')->group(function () {
  Route::post('/newAdmin/{id}', [AuthAdminController::class, 'newAdmin']);
  Route::post('/removeAdmin/{id}', [AuthAdminController::class, 'removeAdmin']);
  Route::get('/showAllUsers', [AuthAdminController::class, 'showAllUsers']);
});

// Patente routes
Route::middleware('auth:sanctum')->group(function () {
  Route::delete('/patentes/{id}', [PatenteController::class, 'destroy']);
  Route::post('/patentes/cadastrar', [PatenteController::class, 'store']);
  Route::put('/patentes/edit/{id}', [PatenteController::class, 'update']);
});
Route::get('/patentes', [PatenteController::class, 'index']);
Route::get('/patentes/{id}', [PatenteController::class, 'show']);
Route::get('/patentes/search/{search}', [SearchController::class, 'searchPatente']);

// Software routes
Route::middleware('auth:sanctum')->group(function () {
  Route::post('/softwares/cadastrar', [SoftwareController::class, 'store']);
  Route::put('/softwares/edit/{id}', [SoftwareController::class, 'update']);
  Route::delete('/softwares/{id}', [SoftwareController::class, 'destroy']);
});
Route::get('/softwares', [SoftwareController::class, 'index']);
Route::get('/softwares/{id}', [SoftwareController::class, 'show']);

// Servicos routes
Route::get('/servicos', [ServicoController::class, 'index']);
Route::get('/servicos/{id}', [ServicoController::class, 'show']);
Route::middleware('auth:sanctum')->group(function () {
  Route::post('/servicos/cadastrar', [ServicoController::class, 'store']);
  Route::put('/servicos/edit/{id}', [ServicoController::class, 'update']);
  Route::delete('/servicos/{id}', [ServicoController::class, 'destroy']);
});

// Areas routes
Route::get('/areaEconomica', [AreasController::class, 'areaEconomica']);
Route::get('/areaCientifica', [AreasController::class, 'areaCientifica']);
Route::get('/palavraChave', [AreasController::class, 'palavraChave']);
