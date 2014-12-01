@extends('layoutAlertas')
@section("cuerpo")
	<h1>Crear nueva alerta</h1>

	<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all() )}}

	{{ Form::open(array('url' => 'alertas')) }}

		<div class="form-group">
			{{ Form::label('titulo', 'Titulo') }}
			{{ Form::text('titulo', Input::old('titulo'), array('class' => 'form-control', 'required'=>'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('descripcion', 'Descripcion') }}
			{{ Form::textarea('descripcion', Input::old('descripcion'), array('class' => 'form-control', 'maxlength'=>140, 'required'=>'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('id_canal', 'Canal') }}
			{{ Form::select('id_canal', $canales, Input::old('id_canal'), array('class' => 'form-control', 'required'=>'required')) }}
		</div>

		{{ Form::submit('Crear Alerta', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}

	
@stop