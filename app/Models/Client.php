<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom', 'prenom','telephone','email','mote_de_passe','adresse','photo','type_utilisateur','etat','idReservation','idCommande','idCommentaire'];
    public function commandes(){
        $this->hasMany(Commande::class,'idCommande');
    }
    public function commentaires(){
        $this->hasMany(Commentaire::class,'idCommentaire');
    }
}
