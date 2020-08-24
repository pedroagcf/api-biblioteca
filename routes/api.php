<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('autors', 'api\AutorController');
Route::apiResource('livros', 'api\LivroController');
Route::apiResource('editoras', 'api\EditoraController');
Route::apiResource('generos', 'api\GeneroLiterarioController');
