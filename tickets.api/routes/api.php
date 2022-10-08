<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\UsuarioController;
use \App\Http\Controllers\EstadisticasGlobalesController;

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

// Authentication
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('logout', [AuthController::class, 'logout']);

    // Se puede usar el siguiente código para resumir las demas rutas
    Route::apiResource('usuario', UsuarioController::class);
});

Route::get('estadisticas-globales', [EstadisticasGlobalesController::class, 'index']);
Route::get('tickets-nuevos', [EstadisticasGlobalesController::class, 'ticketsNuevos']);
Route::get('tickets-procesados', [EstadisticasGlobalesController::class, 'ticketsProcesados']);
Route::get('tickets-cerrados', [EstadisticasGlobalesController::class, 'ticketsCerrados']);
