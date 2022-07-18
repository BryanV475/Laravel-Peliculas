<?php

use App\Http\Controllers\API\ActoreController;
use App\Http\Controllers\API\ActorPeliculaApiController;
use App\Http\Controllers\API\SocioController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::resource('actores', ActoreController::class);

Route::resource('actores-peliculas', ActorPeliculaApiController::class);

Route::resource('socios', SocioController::class);
