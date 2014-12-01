@extends('layoutAlertas')
@section("cuerpo")
	<h1>{{ $alerta->titulo }}</h1>

		<div class="jumbotron text-center">
			
			<p>
				<strong>Titulo:</strong> {{ $alerta->titulo }}<br>
				<strong>Descripcion:</strong> {{ $alerta->descripcion }}<br>
				<strong>Canal:</strong> {{ $canal->nombre }}
			</p>
		</div>
@stop