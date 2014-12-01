@extends('layoutUsuarios')
@section("cuerpo")
	<h1>Crear nuevo usuario</h1>

	<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all() )}}

	{{ Form::open(array('url' => 'usuarios')) }}

		<div class="form-group">
			{{ Form::label('nombre', 'Nombre') }}
			{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'required'=>'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', Input::old('username'), array('class' => 'form-control',  'required'=>'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', Input::old('email'), array('class' => 'form-control',  'required'=>'required')) }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', Input::old('password'), array('class' => 'form-control',  'required'=>'required')) }}
		</div>

		{{ Form::submit('Crear Usuario', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}

	
@stop