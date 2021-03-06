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

Route::get('/', 'NoticiasLandingController@getLandingPage');
Route::get('/landingpage/videos', 'NoticiasLandingController@getLandingPageVideos');
Route::get('/landingpage/news', 'NoticiasLandingController@getLandingPageNews');
Route::get('/landingpage/news/{id}', 'NoticiasLandingController@getLandingPageNew');

Route::get('/admin', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('filmes', 'FilmeController', ['middleware' => 'auth']);

//FUTURAMENTE, ISSO SERÁ DINÃMICO POR CONVÊNIO - POR SINDICATO
Route::get('saaebauru/convenios/alameda', 'FilmeController@indice');
Route::get('saaebauru/convenios/alameda/filmes', 'FilmeController@indexpublic');
Route::get('saaebauru/convenios/alameda/eventos', 'EventoController@indexpublic');
Route::get('saaebauru/convenios/alameda/promocoes', 'PromocaoController@indexpublic');

//Listagem de convenções de 1 sindicato/usuario

//Listagem de noticias de 1 sindicato

Route::get('carteirinha/{id}', 'UserController@getCarteirinha');

Route::get('detalhaconvencao/{id}', 'ConvencaoController@detalhaConvencao');
Route::get('detalhanoticia/{id}', 'NoticiasController@detalhaNoticia');

//ROTAS WEB - APP
Route::get('sindicatos/{idUsuario}/convencoes', 'ConvencaoController@getConvencoesPorSindicato');
Route::get('sindicatos/{idSindicato}/noticias', 'NoticiasController@getNoticiasPorSindicato');
Route::get('faleconosco/{idSindicato}', 'FaleConoscoController@createApp');
Route::resource('faleConoscos', 'FaleConoscoController');
/*
 * Rotas protegidas
 */
Route::group(['middleware' => 'auth:web'], function () {

    /*
     * Rotas de Entidades (CRUD's via admin)
     */
    Route::resource('users', 'UserController');

    Route::get('sindicatos/{idSindicato}/usuarios', 'UserController@getFuncionariosSindicato');
    Route::get('instituicaos/{idInstituicao}/usuarios', 'UserController@getFuncionariosInstituicao');
    Route::get('usuarios', 'UserController@getAll');
    Route::get('usuarios/administradores', 'UserController@getAdmins');
    Route::get('usuarios/sindicalistas', 'UserController@getSindicalistas');
    Route::get('usuarios/funcionarios', 'UserController@getFuncionarios');
    Route::get('trashed/usuarios/funcionarios', 'UserController@getFuncionariosTrashed');
    Route::get('usuarios/administradores/create', 'UserController@createAdmin');
    Route::get('usuarios/sindicalistas/create', 'UserController@createSindicalista');
    Route::get('usuarios/funcionarios/create', 'UserController@createFuncionario');

    Route::get('usuarios/administradores/{id}/edit', 'UserController@edit');
    Route::get('usuarios/sindicalistas/{id}/edit', 'UserController@edit');
    Route::get('usuarios/funcionarios/{id}/edit', 'UserController@edit');
    Route::get('usuarios/importar', 'UserController@importarUsuarios');
    Route::post('usuarios/importar', 'UserController@postAssociadosImportacao');

    Route::resource('categorias', 'CategoriaController');
    Route::resource('sindicatos', 'SindicatoController');
    Route::get('trashed/sindicatos', 'SindicatoController@indexTrashed');
    Route::resource('eventos', 'EventoController');
    Route::resource('promocaos', 'PromocaoController');
    Route::resource('beneficios', 'BeneficioController');
    Route::resource('videos', 'VideoController');

    Route::post('videos/{id}/destaque', 'VideoController@postVideoDestaque');

    Route::resource('convencaos', 'ConvencaoController');

    Route::resource('noticias', 'NoticiasController');

    Route::resource('instituicaos', 'InstituicaoController');

    Route::resource('propagandas', 'PropagandaController');

    Route::resource('noticiasLandings', 'NoticiasLandingController');

    Route::resource('videosLandings', 'VideosLandingController');
});
