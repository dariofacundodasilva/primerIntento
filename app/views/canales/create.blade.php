@extends('layoutCanales')
@section("cuerpo")
	<h1>Crear nuevo canal</h1>

	<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all() )}}

	{{ Form::open(array('url' => 'canales')) }}

		<div class="form-group">
			{{ Form::label('nombre', 'Nombre') }}
			{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
		</div>

		
		{{ Form::submit('Crear Canal', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}

	
@stop