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

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Auth::routes();

Route::resource('condominio', 'CondominioController', ['except' => ['destroy']]);

Route::resource('condomino', 'CondominoController');

Route::resource('reuniao', 'ReuniaoController');
Route::match(['PUT', 'PATCH'], 'reuniao/{reuniao}/gerarAta', ['as' => 'reuniao.gerarAta', 'uses' => 'ReuniaoController@gerarAta']);
Route::match(['PUT', 'PATCH'], 'reuniao/{reuniao}/agendar', ['as' => 'reuniao.agendar', 'uses' => 'ReuniaoController@agendar']);

Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);

Route::get('assunto', ['as' => 'assunto.index', 'uses' => 'AssuntoController@index']);
Route::post('assunto', ['as' => 'assunto.store', 'uses' => 'AssuntoController@store']);
Route::match(['PUT', 'PATCH'], 'assunto/{assunto}', ['as' => 'assunto.update', 'uses' => 'AssuntoController@update']);
Route::delete('assunto/{assunto}', ['as' => 'assunto.destroy', 'uses' => 'AssuntoController@destroy']);