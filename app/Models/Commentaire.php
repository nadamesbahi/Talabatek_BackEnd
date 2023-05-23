<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'texte', 'date'];
    public function client(){
        $this->belongsTo(Client::class,'idCommentaire');
    }
}
