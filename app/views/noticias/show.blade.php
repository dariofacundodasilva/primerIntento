@extends('layoutNoticias')
@section("cuerpo")
	<h1>{{ $noticia->titulo }}</h1>

		<div class="jumbotron text-center">
			
			<p>
				<strong>Titulo:</strong> {{ $noticia->titulo }}<br>
				<strong>Descripcion:</strong> {{ $noticia->descripcion }}<br>
				<strong>Canal:</strong> {{ $canal->nombre }}
			</p>
		</div>
@stop