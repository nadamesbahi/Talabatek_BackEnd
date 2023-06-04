<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCommande extends Model
{
    use HasFactory;
    protected $fillable = ['idPlat', 'idClient', 'quantité_commander','total'];
    protected $primaryKey = 'idPlat';
}
