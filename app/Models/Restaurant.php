<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom', 'telephone','email','mot_de_passe','adresse','photo','type_utilisateur','etat','idReservation','idPlat','idCommentaire'];
    public function plats()
    {
        return $this->hasMany(Plat::class, 'idPlat');
    }

}
