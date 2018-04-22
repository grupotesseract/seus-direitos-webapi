<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/admin', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('filmes', 'FilmeController', ['middleware' => 'auth']);

//FUTURAMENTE, ISSO SERÁ DINÃMICO POR CONVÊNIO - POR SINDICATO
Route::get('saaebauru/convenios/alameda', 'FilmeController@indice');
Route::get('saaebauru/convenios/alameda/filmes', 'FilmeController@indexpublic');
Route::get('saaebauru/convenios/alameda/eventos', 'EventoController@indexpublic');
Route::get('saaebauru/convenios/alameda/promocoes', 'PromocaoController@indexpublic');

//Listagem de convenções de 1 sindicato
Route::get('sindicatos/{idSindicato}/convencoes', 'ConvencaoController@getConvencoesPorSindicato');

//Listagem de noticias de 1 sindicato
Route::get('sindicatos/{idSindicato}/noticias', 'NoticiasController@getNoticiasPorSindicato');

Route::get('downloadconvencao/{id}', 'ConvencaoController@downloadConvencao');
Route::get('detalhanoticia/{id}', 'NoticiasController@detalhaNoticia');


/*
 * Rotas protegidas
 */
Route::group(['middleware' => 'auth:web'], function () {

    /*
     * Rotas de Entidades (CRUD's via admin)
     */
    Route::resource('users', 'UserController');

    Route::get('usuarios', 'UserController@getAll');
    Route::get('usuarios/administradores', 'UserController@getAdmins');
    Route::get('usuarios/sindicalistas', 'UserController@getSindicalistas');
    Route::get('usuarios/funcionarios', 'UserController@getFuncionarios');
    Route::get('usuarios/administradores/create', 'UserController@createAdmin');
    Route::get('usuarios/sindicalistas/create', 'UserController@createSindicalista');

    Route::resource('categorias', 'CategoriaController');
    Route::resource('sindicatos', 'SindicatoController');
    Route::resource('eventos', 'EventoController');
    Route::resource('promocaos', 'PromocaoController');
    Route::resource('beneficios', 'BeneficioController');
    Route::resource('videos', 'VideoController');

    Route::post('videos/{id}/destaque', 'VideoController@postVideoDestaque');
});


Route::resource('convencaos', 'ConvencaoController');

Route::resource('noticias', 'NoticiasController');