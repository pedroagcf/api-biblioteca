<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneroLiterario extends Model
{
    protected $table = 'generos_literarios';

    protected $fillable = [
        'nome'
    ];
}
