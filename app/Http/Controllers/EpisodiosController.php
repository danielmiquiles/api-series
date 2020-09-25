<?php

namespace App\Http\Controllers;

use App\Models\Episodios;
use Illuminate\Http\Request;


class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodios::class;
    }

    public function buscaPorSerie(int $serieId)
    {
        $episodios = Episodios::query()
            ->where('serie_id',$serieId)
            ->paginate();

        return $episodios;
    }

}
