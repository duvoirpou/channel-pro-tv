<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = "commentaires";

    /* Attributs autorisés à être modifiés par un tableau */
    public $fillable = [
        'id_post',
        'id_utilisateur',
        'commentaire',
    ];
}
