<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom', 'prix','description','photo','idCategorie'];
    public function categorie(){
        $this->belongsTo(Categorie::class,'idCategorie');
    }
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'idPlat');
    }
}
