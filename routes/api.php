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

//Listagem de estados
Route::resource('estados', 'EstadoAPIController', ['except' => [
    'create', 'show', 'store', 'update', 'destroy'
]]);

//Listagem de cidades
Route::resource('cidades', 'CidadeAPIController', ['except' => [
    'create', 'show', 'store', 'update', 'destroy'
]]);

//Listagem de cidades de 1 estado
Route::get('estados/{id}/cidades', 'EstadoAPIController@getCidadesPorEstado');




/**
 * Rotas protegidas
 */
Route::group(['middleware' => 'auth:api'], function(){

    //Retorna o usuario logado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

});








