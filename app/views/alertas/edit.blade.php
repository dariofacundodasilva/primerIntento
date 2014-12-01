@extends('layoutAlertas')
@section("cuerpo")
	<h1>Editar {{ $alerta->titulo }}</h1>

<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all()) }}

	{{ Form::model($alerta, array('action' => array('AlertaController@update', $alerta->id), 'method' => 'PUT')) }}

		<div class="form-group">
			{{ Form::label('titulo', 'Titulo') }}
			{{ Form::text('titulo', null, array('class' => 'form-control', 'required'=>'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('descripcion', 'Descripcion') }}
			{{ Form::textarea('descripcion', null, array('class' => 'form-control', 'required'=>'required', 'maxlength'=>140)) }}
		</div>

		<div class="form-group">
			{{ Form::label('id_canal', 'Canal') }}
			{{ Form::select('id_canal', $canales, null, array('class' => 'form-control', 'required'=>'required')) }}
		</div>

		{{ Form::submit('Editar Alerta', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
