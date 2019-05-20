@extends('layouts.app')

@section('modulo', 'Usuarios')
@section('title', 'Lista de Usuarios')

@section('content')
<div class="dataTable_wrapper">
	<a href="{{ route('users.create') }}" class="btn btn-success">Registrar Usuario</a>
	<hr>
	<table class="table table-hover">
 		<thead>
 			<th>ID</th>
 			<th class="text-center">Nombre</th>
 			<th class="text-center">Correo</th>
 			<th class="text-center">Role</th>
 			<th class="text-right">Acción</th>
 		</thead>
 		<tbody>

			@foreach($users as $user)


					<tr>
						<td class="text-center">{{ $user->id }}</td>
						<td class="text-center">{{ $user->name }} {{ $user->last_name }}</td>
						<td class="text-center">{{ $user->email }}</td>	
						<td class="text-center">{{ $user->roles[0]->name }}</td> 								
						<td class="text-right">
							<a href="{{ route('users.show', $user->id) }}" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></a>
							@if($user->roles[0]->name != 'admin')

								<a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
								<a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"><i class="glyphicon glyphicon-remove-sign"></i></a>

							@endif
						</td>
					</tr>
				

			@endforeach
			
 		</tbody>
	</table>
	<div class="text-center">
		{!! $users->render() !!}
	</div>
</div>
@endsection