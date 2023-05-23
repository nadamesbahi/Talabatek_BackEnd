<?php

namespace App\Http\Controllers\Api;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CommandesController extends Controller
{
    //
    public function filtrerDate($val)
    {
        if ($val === "Aujourd") {
            $res = DB::table('clients')
            ->join('commandes', 'clients.idCommande', '=', 'commandes.id')
            ->select('clients.nom', 'clients.prenom', 'commandes.date', 'commandes.id', 'commandes.adresse', 'commandes.total')
            ->whereDate('commandes.date', '=', DB::raw('CURDATE()'))
            ->get();
        } else if ($val === "Hier") {
            $res = DB::table('clients')
            ->join('commandes', 'clients.idCommande', '=', 'commandes.id')
            ->select('clients.nom', 'clients.prenom', 'commandes.date', 'commandes.id', 'commandes.adresse', 'commandes.total')
            ->whereDate('commandes.date', '=', DB::raw('CURDATE() - INTERVAL 1 DAY'))
            ->get();

        } else {
            $res = DB::table('clients')
                ->join('commandes', 'clients.idCommande', '=', 'commandes.id')
                ->select('clients.nom', 'clients.prenom', 'commandes.date', 'commandes.id', 'commandes.adresse', 'commandes.total')
                ->get();
        }
        return $res;
        // hello
    }
    public function changerEtatAnnuler($id)
    {
        $command = Commande::find($id);
        if ($command) {
            $command->etat = 'annuler';
            $command->save();
            return 'with succeee';
        }
    }
    public function changerEtatAccepter($id)
    {
        $command = Commande::find($id);
        if ($command) {
            $command->etat = 'accepter';
            $command->save();
            return 'with succeee';
        }
    }
}
