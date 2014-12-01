<?php

class NoticiaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$noticias = Noticia::orderBy('updated_at', 'DESC')->get();
		$canales=Canal::all();
		$resultado=[];
		$resultado[0]="todos los canales";
		foreach ($canales as $value) {
			$resultado[$value->id]=$value->nombre;
		}
		// load the view and pass the nerds
		return View::make('noticias.index',array('noticias' => $noticias, 'canales'=>$resultado));
	}
	public function indexCanal()
	{
		$id_canal=Input::get('id_canal');
		if($id_canal!=0){
			$noticias = Noticia::where('id_canal', '=', $id_canal)->orderBy('updated_at', 'DESC')->get();
		}else{
			return Redirect::to('noticias');
		}
		
		$canales=Canal::all();
		$resultado=[];
		$resultado[0]="todos los canales";
		foreach ($canales as $value) {
			$resultado[$value->id]=$value->nombre;
		}
		// load the view and pass the nerds
		return View::make('noticias.index',array('noticias' => $noticias, 'canales'=>$resultado));
			
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
		return View::make('noticias.create')
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
			return Redirect::to('noticias/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$noticia = new Noticia;
			$noticia->titulo       = Input::get('titulo');
			$noticia->descripcion      = Input::get('descripcion');
			$noticia->id_canal = Input::get('id_canal');
			$noticia->save();

			// redirect
			Session::flash('message', 'noticia creada exitosamente!');
			return Redirect::to('noticias');
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
		$noticia = Noticia::find($id);
		$canal= Canal::find($noticia->id_canal);

		// show the view and pass the nerd to it
		return View::make('noticias.show', array('noticia'=> $noticia,'canal' => $canal));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$noticia = Noticia::find($id);
		$canales=Canal::all();
		$resultado=[];
		foreach ($canales as $value) {
			$resultado[$value->id]=$value->nombre;
		}
		// show the edit form and pass the nerd
		return View::make('noticias.edit', array('noticia'=> $noticia,'canales' => $resultado));
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
			return Redirect::to('noticias/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$noticia = Noticia::find($id);
			$noticia->titulo       = Input::get('titulo');
			$noticia->descripcion      = Input::get('descripcion');
			$noticia->id_canal = Input::get('id_canal');
			$noticia->save();

			// redirect
			Session::flash('message', 'Cambios realizados con exito');
			return Redirect::to('noticias');
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
		$noticia = Noticia::find($id);
		$noticia->delete();

		// redirect
		Session::flash('message', 'Se ha eliminado noticia exitosamente');
		return Redirect::to('noticias');
	}

	

}
