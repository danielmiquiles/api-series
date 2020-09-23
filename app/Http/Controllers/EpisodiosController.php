<?php


namespace App\Http\Controllers;


use App\Models\Episodios;


class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodios::class;
    }

}
