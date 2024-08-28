<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\CuotaControllers;
use App\Http\Controllers\DatosControllers;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PropiedadesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// rutas de autenticación al sistema

Route::prefix('/v1/auth')->group(function () {

    Route::post('/login', [AuthControllers::class, "funLogin"]);
    Route::post('/registrar', [AuthControllers::class, "funRegistro"]);

    Route::middleware('auth:sanctum')->group(function () {

        Route::get('/perfil', [AuthControllers::class, "funPerfil"]);
        Route::post('/salir', [AuthControllers::class, "funSalir"]);
    });
});

Route::apiResource("dato", DatosControllers::class);
Route::apiResource("cuota", CuotaControllers::class);
Route::apiResource("persona", PersonaController::class);
Route::apiResource("metodoPago", MetodoPagoController::class);
Route::apiResource("propiedad", PropiedadesController::class);
