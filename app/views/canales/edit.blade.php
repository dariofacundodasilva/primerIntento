@extends('layoutCanales')
@section("cuerpo")
	<h1>Editar {{ $canal->nombre }}</h1>

<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all()) }}

	{{ Form::model($canal, array('action' => array('CanalController@update', $canal->id), 'method' => 'PUT')) }}

		<div class="form-group">
			{{ Form::label('nombre', 'Nombre') }}
			{{ Form::text('nombre', null, array('class' => 'form-control')) }}
		</div>

		

		{{ Form::submit('Editar Canal', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
