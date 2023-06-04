<?php

namespace App\Http\Controllers\Api;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DetailCommande;
use App\Models\Plat;

class DetailCommandeController extends Controller
{
    //
    public function getDetail_commande()
    {
        $detail=DB::select('SELECT detail_commandes.idPlat, detail_commandes.quantité_commander, detail_commandes.total, plats.nom AS nom_plat,plats.photo,plats.prix
        FROM detail_commandes,plats WHERE plats.id = detail_commandes.idPlat');
        return $detail;
    }
    public function detail_commandeClient($idC)
    {
        $detail = DB::select('SELECT detail_commandes.idPlat, detail_commandes.quantité_commander, detail_commandes.total, plats.nom AS nom_plat,plats.photo,plats.prix
        FROM detail_commandes
        JOIN clients ON clients.id = detail_commandes.idClient
        JOIN plats ON plats.id = detail_commandes.idPlat
        WHERE clients.id = ?', [$idC]);

        return $detail;
    }

    public function ajouterPlat(Request $request)
    {
        $request->validate([
            'idPlat' => 'required',
            'idClient' => 'required',
            'quantité_commander' => 'required',
        ]);
        DetailCommande::create($request->post());
        return 'Ajouter avec success';
    }



    public function afficherPlat($idPlat)
    {
        $plat = DB::selectOne('SELECT plats.id, plats.nom, plats.description, plats.prix, plats.photo, detail_commandes.idClient, detail_commandes.quantité_commander, detail_commandes.total, clients.nom AS nom_client, clients.prenom AS prenom_client,clients.photo AS photo_client
        FROM detail_commandes
        JOIN plats ON plats.id = detail_commandes.idPlat
        JOIN clients ON clients.id = detail_commandes.idClient
        WHERE plats.id = ?', [$idPlat]);

        return $plat;
    }

    public function supprimerPlat($id)
    {
        //
        DetailCommande::where('idPlat', $id)->delete();
        return 'Supression avec sucess!!';
    }
    public function updatePlat(Request $request,$idPlat){
        $plat = DetailCommande::find($idPlat);
        $plat->quantité_commander=$request->quantité_commander;
        $plat->total=$request->total;
        $plat->save();
        return 'Modification avec sucess!!';
    }
}
