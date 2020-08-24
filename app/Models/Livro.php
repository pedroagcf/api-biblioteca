<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Autor;
use App\Models\GeneroLiterario;
use App\Models\Editora;

class Livro extends Model
{
    protected $hidden = ['autor_id', 'genero_id', 'editora_id'];

    protected $with = ['autor', 'genero', 'editora'];

    protected $fillable = [
        'titulo', 'anoLancamento', 'autor_id', 'genero_id', 'editora_id'
    ];

    public function autor() {
        return $this->belongsTo(Autor::class, 'autor_id');
    }

    public function genero() {
        return $this->belongsTo(GeneroLiterario::class, 'genero_id');
    }

    public function editora() {
        return $this->belongsTo(Editora::class, 'editora_id');
    }

}
