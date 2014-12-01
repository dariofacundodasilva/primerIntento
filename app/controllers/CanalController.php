<?php

class CanalController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$canales = Canal::all();

		// load the view and pass the nerds
		return View::make('canales.index')
			->with('canales', $canales);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('canales.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nombre'       => 'required'
			
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('canales/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$canal = new Canal;
			$canal->nombre       = Input::get('nombre');
		
			$canal->save();

			// redirect
			Session::flash('message', 'canal creado exitosamente!');
			return Redirect::to('canales');
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
		$canal = Canal::find($id);

		// show the view and pass the nerd to it
		return View::make('canales.show')
			->with('canal', $canal);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$canal = Canal::find($id);

		// show the edit form and pass the nerd
		return View::make('canales.edit')
			->with('canal', $canal);
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
			'nombre'       => 'required'
			
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('canales/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$canal = Canal::find($id);
			$canal->nombre       = Input::get('nombre');
			$canal->save();

			// redirect
			Session::flash('message', 'Cambios realizados con exito');
			return Redirect::to('canales');
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
		$canal = Canal::find($id);
		$canal->delete();

		// redirect
		Session::flash('message', 'Se ha eliminado canal exitosamente');
		return Redirect::to('canales');
	}


}
