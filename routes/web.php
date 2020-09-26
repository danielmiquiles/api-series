<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router){
    $router->group(['prefix' => 'series'], function () use($router){
        $router->post('','SeriesController@inserir');
        $router->get('', 'SeriesController@index');
        $router->get('{id}', 'SeriesController@buscarPorId');
        $router->put('{id}', 'SeriesController@atualizar');
        $router->delete('{id}', 'SeriesController@deletar');
        $router->get('{serieId}/episodios', 'EpisodiosController@buscaPorSerie');
    });
    $router->group(['prefix'=>'episodios'],function () use($router){
        $router->post('','EpisodiosController@inserir');
        $router->get('', 'EpisodiosController@index');
        $router->get('{id}', 'EpisodiosController@buscarPorId');
        $router->put('{id}', 'EpisodiosController@atualizar');
        $router->delete('{id}', 'EpisodiosController@deletar');
    });

});

$router->post('/api/login', 'TokenController@gerarToken');



