<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    /* Attributs autorisés à être modifiés par un tableau */
    public $fillable = [
        'id_rubrique',
        'titre',
        'description',
        'video',
    ];
}
