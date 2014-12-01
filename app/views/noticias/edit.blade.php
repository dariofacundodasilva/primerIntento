@extends('layoutNoticias')
@section("cuerpo")
	<h1>Editar {{ $noticia->titulo }}</h1>

<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all()) }}

	{{ Form::model($noticia, array('action' => array('NoticiaController@update', $noticia->id), 'method' => 'PUT')) }}

		<div class="form-group">
			{{ Form::label('titulo', 'Titulo') }}
			{{ Form::text('titulo', null, array('class' => 'form-control', 'required'=>'required')) }}
		</div>

		<div class="form-group">
			{{ Form::label('descripcion', 'Descripcion') }}
			{{ Form::textarea('descripcion', null, array('class' => 'form-control', 'required'=>'required', 'maxlength'=>255)) }}
		</div>

		<div class="form-group">
			{{ Form::label('id_canal', 'Canal') }}
			{{ Form::select('id_canal', $canales, null, array('class' => 'form-control', 'required'=>'required')) }}
		</div>

		{{ Form::submit('Editar Noticia', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
