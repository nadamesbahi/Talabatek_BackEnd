<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom', 'prenom','telephone','email','mot_de_passe','matricule','adresse','photo','status','type_utilisateur','etat','idCommande','idCommentaire'];

}
