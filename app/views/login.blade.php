@extends('layout')



@section('content2')
	<h2>Identificarse</h2>

	@if(Session::get('msg'))
		<p>{{ Session::get('msg') }}</p>
	@endif

	{{ Form::open(array('url' => '/login', 'method' => 'POST')) }}
		E-mail <input type="text" name="email" /> <br />
		Contraseña <input type="password" name="password" /> <br />
		<input type="submit" value="Ingresar" />
		<a href="usuarios/create">no tengo cuenta</a>
	{{ Form::close() }}
@stop

@section('content')
<div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"> <strong class="">Iniciar Sesion</strong>

                </div>
                @if(Session::get('msg'))
					<p>{{ Session::get('msg') }}</p>
				@endif
                <div class="panel-body">
                    <form class="form-horizontal" role="form"  method="post" action="/login">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="">
                            </div>
                        </div>
                        
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default">Ingresar</button>
                                <a href="/">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">Aun no tienes cuenta? <a href="/usuarios/create" class="">Registrate aqui</a>
                </div>
            </div>
        </div>
    </div>


@stop