<?php

use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CommandesController;
use App\Http\Controllers\Api\CommentaireController;
use App\Http\Controllers\Api\DetailCommandeController;
use App\Http\Controllers\Api\PlatController;
use App\Http\Controllers\Api\RestaurantController;
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
//plats
Route::apiResource('plats',PlatController::class);
Route::get('plat/{id}',[PlatController::class,'platCategorie']);

//restau
Route::apiResource('restaurants',RestaurantController::class);
Route::get('restaurant/{id}',[RestaurantController::class,'changerEtatSupress']);

//categotrie
Route::apiResource('categories',CategorieController::class);
Route::get('categorie/{id}',[CategorieController::class,'categoriPlat']);

//commandes
Route::get('commandeAn/{id}',[CommandesController::class,'changerEtatAnnuler']);
Route::get('commandeAc/{id}',[CommandesController::class,'changerEtatAccepter']);
Route::get('commandes/{value}',[CommandesController::class,'filtrerDate']);
Route::get('commandes',[CommandesController::class,'allCommandes']);
Route::get('commande/{id}',[CommandesController::class,'getcommande']);
Route::post('ajouterCommande',[CommandesController::class,'ajouterCommande']);

//detail commande
Route::get('detailcommandeClient/{idC}',[DetailCommandeController::class,'detail_commandeClient']);
Route::get('afficherplat/{idPlat}',[DetailCommandeController::class,'afficherPlat']);
Route::get('getdetailcommande',[DetailCommandeController::class,'getDetail_commande']);
Route::post('ajouterPlat',[DetailCommandeController::class,'ajouterPlat']);
Route::delete('supprimerPlat/{id}', [DetailCommandeController::class,'supprimerPlat']);
Route::patch('updatePlat/{idPlat}', [DetailCommandeController::class,'updatePlat']);

//commentaire
Route::apiResource('commentaires',CommentaireController::class);

//client
Route::apiResource('clients',ClientController::class);
Route::get('clientCommande/{id}',[CommandesController::class,'afficherCommandesClient']);


