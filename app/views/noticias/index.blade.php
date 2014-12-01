@extends('layoutNoticias')
@section("cuerpo")
	
	<h1>Todas las noticias</h1>
	<table>
		<tbody>
			<tr>
				{{ Form::open(array('url' => 'noticias/canal')) }}
					{{ Form::hidden('_method', 'POST') }}

					<td>{{ Form::select('id_canal', $canales, null ,array('class'=>"form-control")) }}</td>
					<td>{{ Form::submit('Filtrar', array('class'=>"btn btn-default ")) }}</td>
				{{ Form::close() }}
			</tr>
		</tbody>
	</table>
	<!-- will be used to show any messages -->
	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Titulo</td>
				
				
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
			
		@foreach($noticias as  $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->titulo }}</td>
				
				

				<!-- we will also add show, edit, and delete buttons -->
				<td>

					<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
					<!-- we will add this later since its a little more complicated than the first two buttons -->
					{{ Form::open(array('url' => 'noticias/' . $value->id, 'class' => 'pull-right')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Eliminar noticia', array('class' => 'btn btn-warning' ,'onclick'=>'return confirm("Realmente desea eliminar este registro?")')) }}
					{{ Form::close() }}

					<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
					<a class="btn btn-small btn-success" href="{{ URL::to('noticias/' . $value->id) }}">Ver noticia</a>

					<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
					<a class="btn btn-small btn-info" href="{{ URL::to('noticias/' . $value->id . '/edit') }}">Editar esta noticia</a>

				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

	
@stop
