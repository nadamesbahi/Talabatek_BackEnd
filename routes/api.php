<?php

use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\CommandeController;
use App\Http\Controllers\Api\CommandesController;
use App\Http\Controllers\Api\PlatController;
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
// Route::apiResource('commandes',CommandeController::class);
Route::apiResource('plats',PlatController::class);
Route::apiResource('categories',CategorieController::class);
Route::get('commandeAn/{id}',[CommandesController::class,'changerEtatAnnuler']);
Route::get('commandeAc/{id}',[CommandesController::class,'changerEtatAccepter']);
Route::get('commandes/{value}',[CommandesController::class,'filtrerDate']);
