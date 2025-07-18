<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CasoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí registras las rutas de tu API. Estas rutas se cargan dentro del
| RouteServiceProvider y se asignan al grupo de middleware "api".
|
*/

// Rutas RESTful para usuarios
Route::apiResource('usuarios', UsuarioController::class);
// Ruta RESTful para Casos
Route::apiResource('casos', CasoController::class);
