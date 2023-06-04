<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'etat', 'mode_paiement','adresse','total'];
    public function client(){
        $this->belongsTo(Client::class);
    }
    public function plats()
    {
        return $this->belongsToMany(Plat::class, 'detail_commande', 'idCommande', 'idPlat')->withPivot('quantité_commander','total');
    }

}
