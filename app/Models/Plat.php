<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom', 'prix','description','photo','idCategorie'];
    public function categories(){
        $this->hasMany(Categorie::class,'idCategorie');
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'idPlat');
    }
}
