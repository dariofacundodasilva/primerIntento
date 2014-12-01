<?php

Route::get('/', function()
{	
	if(Auth::check()){
		return View::make('layoutPrincipal2');
	}else{
		return View::make('layoutPrincipal1');
	}
});


//Route::resource('canales', 'CanalController');

Route::get('canales','CanalController@index');
Route::get('canales/create','CanalController@create');
Route::post('canales','CanalController@store');
Route::get('canales/{id}/edit','CanalController@edit');
Route::get('canales/{id}','CanalController@show');
Route::put('canales/{id}','CanalController@update');
Route::delete('canales/{id}','CanalController@destroy');


//Route::resource('alertas', 'AlertaController');
Route::post('alertas/canal', array('uses' => 'AlertaController@indexCanal'));
Route::get('alertas','AlertaController@index');
Route::get('alertas/create','AlertaController@create');
Route::post('alertas','AlertaController@store');
Route::get('alertas/{id}/edit','AlertaController@edit');
Route::get('alertas/{id}','AlertaController@show');
Route::put('alertas/{id}','AlertaController@update');
Route::delete('alertas/{id}','AlertaController@destroy');


//Route::resource('noticias', 'NoticiaController');
Route::post('noticias/canal', array('uses' => 'NoticiaController@indexCanal'));
Route::get('noticias','NoticiaController@index');
Route::get('noticias/create','NoticiaController@create');
Route::post('noticias','NoticiaController@store');
Route::get('noticias/{id}/edit','NoticiaController@edit');
Route::get('noticias/{id}','NoticiaController@show');
Route::put('noticias/{id}','NoticiaController@update');
Route::delete('noticias/{id}','NoticiaController@destroy');

//Route::resource('usuarios', 'UserController');
Route::get('usuarios','UserController@index');
Route::get('usuarios/create','UserController@create');
Route::post('usuarios','UserController@store');
Route::get('usuarios/{id}/edit','UserController@edit');
Route::get('usuarios/{id}','UserController@show');
Route::put('usuarios/{id}','UserController@update');
Route::delete('usuarios/{id}','UserController@destroy');

Route::get('iniciar', 'AuthController@iniciarSesion');
Route::post('login', 'AuthController@doLogin');
Route::get('logout', 'AuthController@doLogout');

Route::get('getLastAlertas','AlertaController@lastAlertasAPI');
Route::get('getLastAlertas/{id}','AlertaController@lastAlertasByIdCanalAPI');



?>