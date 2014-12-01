<!DOCTYPE html>
<html>
<head>
	<title>UPE alertas y noticias</title>
	<script type="text/javascript" src="js/jquery-latest.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	
<nav class="navbar navbar-inverse" role="navigation">
	<div class="navbar-header">
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
		<a class="navbar-brand" href="/">Principal</a>
	</div>
	<div id="navbarCollapse" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('usuarios') }}">Usuarios</a></li>
			<li><a href="{{ URL::to('noticias') }}">Noticias</a></li>
			<li><a href="{{ URL::to('alertas') }}">Alertas</a></li>
			<li><a href="{{ URL::to('canales') }}">Canales</a></li>
			<li><a  href="{{ URL::to('iniciar') }}">iniciar sesion</a></li>
			
		</ul>
	</div>
</nav>
@section("cuerpo")
	<div class="jumbotron text-center">
		<h2>Aca seria la vista principal</h2>
		<p>Deberian verse ultimas alertas y noticias de todas los canales</p>
	</div>
@show
</div>
</body>
</html>