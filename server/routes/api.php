<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatenteController;
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

// Auth user
Route::post('/login', [AuthController::class, 'login']);
Route::post('/cadastro', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->group(function () {
  Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

// Patente routes
Route::get('/patentes', [PatenteController::class, 'index']);
Route::get('/patentes/{id}', [PatenteController::class, 'show']);
Route::delete('/patentes/{id}', [PatenteController::class, 'destroy']);
Route::post('/patentes/cadastrar', [PatenteController::class, 'store']);
Route::put('/patentes/edit/{id}', [PatenteController::class, 'update']);
Route::get('/patentes/search/{search}', [SearchController::class, 'searchPatente']);
Route::middleware('auth:sanctum')->group(function () {
});

// Software routes
Route::get('/softwares', [SoftwareController::class, 'index']);
Route::get('/softwares/{id}', [SoftwareController::class, 'show']);
Route::post('/softwares/cadastrar', [SoftwareController::class, 'store']);
Route::put('/softwares/edit/{id}', [SoftwareController::class, 'update']);
Route::delete('/softwares/{id}', [SoftwareController::class, 'destroy']);
Route::middleware('auth:sanctum')->group(function () {
});

// Servicos routes
Route::get('/servicos', [ServicoController::class, 'index']);
Route::get('/servicos/{id}', [ServicoController::class, 'show']);
Route::post('/servicos/cadastrar', [ServicoController::class, 'store']);
Route::put('/servicos/edit/{id}', [ServicoController::class, 'update']);
Route::delete('/servicos/{id}', [ServicoController::class, 'destroy']);
Route::middleware('auth:sanctum')->group(function () {
});

// Areas de busca
Route::get('/areaEconomica', [AreasController::class, 'areaEconomica']);
Route::get('/areaCientifica', [AreasController::class, 'areaCientifica']);
Route::get('/palavraChave', [AreasController::class, 'palavraChave']);