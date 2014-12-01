<?php

Route::get('/', function()
{	
	if(Auth::check()){
		return View::make('layoutPrincipal2');
	}else{
		return View::make('layoutPrincipal1');
	}
});
Route::get('/twitter', function()
{
    return Twitter::destroyTweet("535473953884864512", array( 'format' => 'json'));
});

Route::resource('canales', 'CanalController');
Route::resource('alertas', 'AlertaController');

Route::resource('noticias', 'NoticiaController');
Route::post('noticias/canal', array('uses' => 'NoticiaController@indexCanal'));

Route::resource('usuarios', 'UserController');

Route::get('iniciar', 'AuthController@iniciarSesion');
Route::post('login', 'AuthController@doLogin');
Route::get('logout', 'AuthController@doLogout');




?>