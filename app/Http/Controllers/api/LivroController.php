<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Livro;
use Illuminate\Support\Facades\Log;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Livro::with('autor', 'genero', 'editora')->get();
        return Livro::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>'required',
            'anoLancamento'=>'required'
        ]);

        $input = $request->all();

        $data = [
            'titulo' => $input["titulo"],
            'anoLancamento' => $input["anoLancamento"],
            'autor_id' => $input["autor"]["id"],
            'genero_id' => $input["genero"]["id"],
            'editora_id' => $input["editora"]["id"]
        ];

        $livro = Livro::create($data);
        return new Response($livro, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Livro::with('autor', 'genero', 'editora')->findOrFail($id);
        return Livro::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);
        $livro = tap($livro)->update($request->all());
        return new Response($livro, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return new Response(['status' => 'ok'], 204);
    }
}
