<?php

class AlertaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$alertas = Alerta::orderBy('updated_at', 'DESC')->get();
		$canales=Canal::all();
		$resultado=[];
		$resultado[0]="todos los canales";
		foreach ($canales as $value) {
			$resultado[$value->id]=$value->nombre;
		}
		return View::make('alertas.index',array('alertas' => $alertas,'canales'=>$resultado));
	}

	public function indexCanal()
	{
		$id_canal=Input::get('id_canal');
		if($id_canal!=0){
			$alertas = Alerta::where('id_canal', '=', $id_canal)->orderBy('updated_at', 'DESC')->get();
		}else{
			return Redirect::to('alertas');
		}
		
		$canales=Canal::all();
		$resultado=[];
		$resultado[0]="todos los canales";
		foreach ($canales as $value) {
			$resultado[$value->id]=$value->nombre;
		}
		// load the view and pass the nerds
		return View::make('alertas.index',array('alertas' => $alertas, 'canales'=>$resultado));
			
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$canales=Canal::all();
		$resultado=[];
		foreach ($canales as $value) {
			$resultado[$value->id]=$value->nombre;
		}
		return View::make('alertas.create')
			->with('canales', $resultado);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'titulo'       => 'required',
			'descripcion'      => 'required',
			'id_canal' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('alertas/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$alerta = new Alerta;
			$alerta->titulo       = Input::get('titulo');
			$alerta->descripcion      = Input::get('descripcion');
			$alerta->id_canal = Input::get('id_canal');
			$alerta->save();
			$tweet=Twitter::postTweet(array('status' => $alerta->descripcion ));
			
			$alertaTweet=new AlertaTweet;
			$alertaTweet->id_alerta=$alerta->id;
			$alertaTweet->id_tweet=$tweet->id_str;
			
			$alertaTweet->save();
			
			Session::flash('message',"alerta creada exitosamente" );
			return Redirect::to('alertas');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$alerta = Alerta::find($id);
		$canal= Canal::find($alerta->id_canal);



		// show the view and pass the nerd to it
		return View::make('alertas.show', array('alerta'=> $alerta,'canal' => $canal));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$alerta = Alerta::find($id);
		$canales=Canal::all();
		$resultado=[];
		foreach ($canales as $value) {
			$resultado[$value->id]=$value->nombre;
		}
		// show the edit form and pass the nerd
		return View::make('alertas.edit', array('alerta'=> $alerta,'canales' => $resultado));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'titulo'       => 'required',
			'descripcion'      => 'required',
			'id_canal' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('alertas/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$alerta = Alerta::find($id);
			$alerta->titulo       = Input::get('titulo');
			$alerta->descripcion      = Input::get('descripcion');
			$alerta->id_canal = Input::get('id_canal');
			$alerta->save();

			$temp=AlertaTweet::where('id_alerta', '=', $id)->get();
			$alertaTweet = AlertaTweet::find($temp[0]->id);

			Twitter::destroyTweet($temp[0]->id_tweet, array());
			$tweet=Twitter::postTweet(array('status' => Input::get('descripcion') ));
			
			
			$alertaTweet->id_tweet=$tweet->id_str;
			
			$alertaTweet->save();



			// redirect
			Session::flash('message', 'Cambios realizados con exito');
			return Redirect::to('alertas');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */


	
	
	public function destroy($id)
	{
		
		$temp=AlertaTweet::where('id_alerta', '=', $id)->get();
		$alerta = Alerta::find($id);
		$alerta->delete();
		Twitter::destroyTweet($temp[0]->id_tweet, array());
		$alertaTweet = AlertaTweet::find($temp[0]->id);
		$alertaTweet->delete();
		
		// redirect
		Session::flash('message', "alerta eliminada exitosamente");
		return Redirect::to('alertas');
	}

	public function lastAlertasAPI(){
		$alertas = Alerta::orderBy('updated_at', 'DESC')->take(10)->get();
		return $alertas->toJson();
	}
	public function lastAlertasByIdCanalAPI($id){
		$alertas = Alerta::where('id_canal', '=', $id)->orderBy('updated_at', 'DESC')->take(10)->get();
		return $alertas->toJson();
	}

}
