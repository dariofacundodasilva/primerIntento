<!DOCTYPE html>
<html>
<head>
	<title>UPE alertas y noticias</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	
<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="/">Principal</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('usuarios') }}">Usuarios</a></li>
		<li><a href="{{ URL::to('noticias') }}">Noticias</a></li>
		<li><a href="{{ URL::to('alertas') }}">Alertas</a></li>
		<li><a href="{{ URL::to('canales') }}">Canales</a></li>
		<li><a  href="{{ URL::to('usuarios/'.Auth::user()->id) }}">{{ Auth::user()->username; }}</a></li>
		<li><a href="{{ URL::to('logout') }}">Salir</a></li>
	</ul>
</nav>
@section("cuerpo")
	<div class="jumbotron text-center">
		<h2>Aca seria la vista principal</h2>
		<p>Deberian verse ultimas alertas y noticias de todas los canales a los cuales usuario se encuentra suscripto</p>
	</div>
@show
</div>
</body>
</html>