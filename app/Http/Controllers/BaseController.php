<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

Abstract class BaseController
{
    protected $classe;
    public function index(Request $request)
    {
        return $this->classe::paginate($request->per_page);
    }

    public function inserir(Request $request)
    {
        return response()
            ->json($this->classe::create($request->all()),201);
    }

    public function buscarPorId(int $id)
    {
        $recurso = $this->classe::find($id);
        if (is_null($recurso)){
            return response()->json('', 204);
        }
        return response()->json($recurso, 200);
    }

    public function atualizar(Request $request,int $id)
    {
        $recurso = $this->classe::find($id);
        if (is_null($recurso)){
            return response()->json(['erro'=>'Recurso não encontrado'], 404);
        }
        $recurso->fill($request->all());
        $recurso->save();

        return $recurso;
    }

    public function deletar(int $id)
    {
        $recurso = $this->classe::destroy($id);
        if ($recurso === 0){
            return response()->json(['erro'=>'Recurso não encontrado'], 404);
        }
        return response()->json('', 200);
    }
}
