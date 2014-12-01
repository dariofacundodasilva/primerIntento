@extends('layoutUsuarios')
@section("cuerpo")
	<h1>{{ $usuario->usename }}</h1>

		<div class="jumbotron text-center">
			
			<p>
				<strong>Nombre:</strong> {{ $usuario->nombre }}<br>
				<strong>Email:</strong> {{ $usuario->email }}<br>
				<strong>Nombre de usuario:</strong> {{ $usuario->username }}<br>
			    
			</p>
		</div>
@stop