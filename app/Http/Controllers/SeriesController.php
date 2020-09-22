<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController
{
    public function index(Request $request)
    {
        return Series::all();
    }

    public function inserir(Request $request)
    {
        return response()
            ->json(Series::create(['nome'=> $request->nome]),201);
    }

    public function buscarPorId(int $id)
    {
        $serie = Series::find($id);
        if (is_null($serie)){
            return response()->json('', 204);
        }
        return response()->json($serie, 200);
    }

    public function atualizar(Request $request,int $id)
    {
        $serie = Series::find($id);
        if (is_null($serie)){
            return response()->json(['erro'=>'Recurso não encontrado'], 404);
        }
        $serie->fill($request->all());
        $serie->save();

        return $serie;
    }

    public function deletar(int $id)
    {
        $serie = Series::destroy($id);
        if ($serie === 0){
            return response()->json(['erro'=>'Recurso não encontrado'], 404);
        }
        return response()->json('', 200);
    }
}
