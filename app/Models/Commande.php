<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'etat', 'mode_paiement','adresse','total'];
    public function client(){
        $this->belongsTo(Client::class,'idCommande');
    }

}
