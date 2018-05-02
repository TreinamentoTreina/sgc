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

Route::group(['middleware' => ['auth']], function () {
	Route::resource('condominio', 'CondominioController', ['except' => ['destroy']]);

	Route::resource('condomino', 'CondominoController');

	Route::resource('reuniao', 'ReuniaoController');
	Route::match(['PUT', 'PATCH'], 'reuniao/{reuniao}/gerarAta', ['as' => 'reuniao.gerarAta', 'uses' => 'ReuniaoController@gerarAta']);
	Route::match(['PUT', 'PATCH'], 'reuniao/{reuniao}/agendar', ['as' => 'reuniao.agendar', 'uses' => 'ReuniaoController@agendar']);

	Route::resource('reuniaoC', 'ReuniaoCController', ['except' => ['destroy', 'edit', 'update']]);
	/*Route::match(['PUT', 'PATCH'], 'reuniaoC/{reuniaoC}/gerarAta', ['as' => 'reuniaoC.gerarAta', 'uses' => 'ReuniaoCController@gerarAta']);
	Route::match(['PUT', 'PATCH'], 'reuniaoC/{reuniaoC}/agendar', ['as' => 'reuniaoC.agendar', 'uses' => 'ReuniaoCController@agendar']);*/

	Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);

	Route::get('assunto', ['as' => 'assunto.index', 'uses' => 'AssuntoController@index']);
	Route::post('assunto', ['as' => 'assunto.store', 'uses' => 'AssuntoController@store']);
	Route::match(['PUT', 'PATCH'], 'assunto/{assunto}', ['as' => 'assunto.update', 'uses' => 'AssuntoController@update']);
	Route::delete('assunto/{assunto}', ['as' => 'assunto.destroy', 'uses' => 'AssuntoController@destroy']);

	Route::get('area', ['as' => 'area.index', 'uses' => 'AreaComumController@index']);
	Route::post('area', ['as' => 'area.store', 'uses' => 'AreaComumController@store']);
	Route::match(['PUT', 'PATCH'], 'area/{area}', ['as' => 'area.update', 'uses' => 'AreaComumController@update']);
	Route::delete('area/{area}', ['as' => 'area.destroy', 'uses' => 'AreaComumController@destroy']);

	Route::resource('reserva', 'ReservaAreaComumController');
});