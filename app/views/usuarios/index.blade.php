@extends('layoutUsuarios')
@section("cuerpo")
	
	<h1>Todas los usuarios</h1>
	
	<!-- will be used to show any messages -->
	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Username</td>
				
				
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
			
		@foreach($usuarios as  $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->username }}</td>
				
				

				<!-- we will also add show, edit, and delete buttons -->
				<td>

					<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
					<!-- we will add this later since its a little more complicated than the first two buttons -->
					{{ Form::open(array('url' => 'usuarios/' . $value->id, 'class' => 'pull-right')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Eliminar usuario', array('class' => 'btn btn-warning' ,'onclick'=>'return confirm("Realmente desea eliminar este registro?")')) }}
					{{ Form::close() }}

					<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
					<a class="btn btn-small btn-success" href="{{ URL::to('usuarios/' . $value->id) }}">Ver usuario</a>

					<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
					<a class="btn btn-small btn-info" href="{{ URL::to('usuarios/' . $value->id . '/edit') }}">Editar usuario</a>

				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

	
@stop
