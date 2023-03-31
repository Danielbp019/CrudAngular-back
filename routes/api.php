<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Articulo;
use App\Http\Controllers\ArticuloController;

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

// Route::get('/articulo/{id}', function ($id) {
//     return new ArticuloResource(Articulo::findOrFail($id));
// });
// Route::get('/articulos', function () {
//     return ArticuloResource::collection(Articulo::all());
// });
// Route::post('/articulos', [ArticuloController::class, 'store']);
// Route::put('/articulo/{id}', [ArticuloController::class, 'update']);
// Route::delete('/articulo/{id}', [ArticuloController::class, 'destroy']);

//Ruta api, nombre de la ruta y controlador asociado
Route::apiResource('articulos', ArticuloController::class);