<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Rota para login via API
Route::post('login', 'AuthAPIController@login');

//Rota para register via API
Route::post('register', 'AuthAPIController@register');

/*
 * Rotas protegidas
 */
Route::group(['middleware' => 'auth:api'], function () {

    //Retorna o usuario logado
    Route::get('/user', function (Request $request) {
        $user = $request->user();
        $user->load('sindicato');

        return $user;
    });

    //Rota para Aceitar ou Cancelar a contribuição sindical
    Route::post('/toggl', 'UserAPIController@postTogglContribuicaoSindical');
});

//Listagem de estados
Route::resource('estados', 'EstadoAPIController', ['except' => [
    'edit', 'create', 'show', 'store', 'update', 'destroy',
]]);

//Listagem de cidades
Route::resource('cidades', 'CidadeAPIController', ['except' => [
    'edit', 'create', 'show', 'store', 'update', 'destroy',
]]);

//Listagem de cidades de 1 estado
Route::get('estados/{id}/cidades', 'EstadoAPIController@getCidadesPorEstado');

//Listagem de Categorias
Route::resource('categorias', 'CategoriaAPIController', ['except' => [
    'edit', 'create', 'show', 'store', 'update', 'destroy',
]]);

Route::resource('sindicatos', 'SindicatoAPIController', ['except' => [
    'create', 'edit',
]]);

//Listagem de beneficios de 1 estado
Route::get('sindicatos/{id}/beneficios', 'SindicatoAPIController@getBeneficiosPorSindicato');

//Listagem de videos de 1 estado
Route::get('sindicatos/{id}/videos', 'SindicatoAPIController@getVideosPorSindicato');

//Video em destaque
Route::get('video-home', 'VideoAPIController@getVideoHome');

Route::resource('beneficios', 'BeneficioAPIController');
Route::resource('videos', 'VideoAPIController');
