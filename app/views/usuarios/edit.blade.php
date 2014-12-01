@extends('layoutUsuarios')
@section("cuerpo")
	<h1>Editar {{ $usuario->username }}</h1>

<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all()) }}

	{{ Form::model($usuario, array('action' => array('UsuarioController@update', $usuario->id), 'method' => 'PUT')) }}

		<div class="form-group">
			{{ Form::label('nombre', 'Nombre') }}
			{{ Form::text('nombre', null, array('class' => 'form-control', 'required'=>'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', null, array('class' => 'form-control',  'required'=>'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', null, array('class' => 'form-control',  'required'=>'required')) }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', null, array('class' => 'form-control',  'required'=>'required')) }}
		</div>

		{{ Form::submit('Editar Usuario', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
