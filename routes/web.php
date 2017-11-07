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

/*
 * Rotas protegidas
 */
Route::group(['middleware' => 'auth:web'], function () {

    /*
     * Rotas de Entidades (CRUD's via admin)
     */
    Route::resource('users', 'UserController');
    Route::resource('categorias', 'CategoriaController');
    Route::resource('sindicatos', 'SindicatoController');
});
