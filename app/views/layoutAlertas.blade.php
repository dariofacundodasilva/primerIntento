<!DOCTYPE html>
<html>
<head>
	<title>Alertas</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="/">Principal</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('alertas') }}">Ver todas las alertas</a></li>
		<li><a href="{{ URL::to('alertas/create') }}">Crear nueva alerta</a>
	</ul>
</nav>
@section("cuerpo")
	
@show
</div>
</body>
</html>