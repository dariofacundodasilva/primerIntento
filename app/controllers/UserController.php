<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = User::all();
		
		// load the view and pass the nerds
		return View::make('usuarios.index',array('usuarios' => $usuarios));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('usuarios.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nombre'       => 'required',
			'username'      => 'required',
			'email' => 'required|email',
			'password' => 'required'

		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('usuarios/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$usuario = new User;
			$usuario->nombre       = Input::get('nombre');
			$usuario->username      = Input::get('username');
			$usuario->email = Input::get('email');
			$usuario->password =  Hash::make(Input::get('password'));
			$usuario->id_rango=1;
			$usuario->save();

			// redirect
			Session::flash('message', 'usuario creado exitosamente!');
			return Redirect::to('usuarios');
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
		$usuario = User::find($id);
		

		// show the view and pass the nerd to it
		return View::make('usuarios.show', array('usuario'=> $usuario));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = User::find($id);
		
		// show the edit form and pass the nerd
		return View::make('usuarios.edit', array('usuario'=> $usuario));
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
			'nombre'       => 'required',
			'username'      => 'required',
			'email' => 'required|email',
			'password' => 'required'

		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('usuarios/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$usuario = User::find($id);
			$usuario->nombre       = Input::get('nombre');
			$usuario->username      = Input::get('username');
			$usuario->email = Input::get('email');
			$usuario->password = Input::get('password');
			$usuario->save();

			// redirect
			Session::flash('message', 'Cambios realizados con exito');
			return Redirect::to('usuarios');
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
		$usuario = User::find($id);
		$usuario->delete();

		// redirect
		Session::flash('message', 'Se ha eliminado usuario exitosamente');
		return Redirect::to('usuarios');
	}


}
