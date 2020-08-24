<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Livro;

class Autor extends Model
{
    protected $fillable = [
        'nome', 'anoNascimento', 'sexo', 'nacionalidade',
    ];
}

