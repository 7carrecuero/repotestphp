@extends('layouts.app')

@section('modulo', 'Procesos')
@section('title', 'Listado de Procesos')

@section('content')

	{!! Form::open(['route' => 'processes.index', 'method' => 'GET']) !!}

		<div class="form-group">
            {!! Form::label('initial_date','Fecha Inicial'); !!}
        	{!! Form::date('initial_date', $initial_date,['class' => 'form-control']); !!}     
        </div>

	    <div class="form-group">
			{!! Form::label('state','Estado'); !!}
			{!! Form::select('state', [1 => 'Aprobado', 0 => 'Rechazado'],$state,['class' => 'form-control', 'required']); !!}

        </div>

		<div class="form-group">
			{!! Form::submit('Buscar', ['class' => 'btn btn-primary']); !!}  

        </div>


	{!! Form::close() !!}	


<div class="dataTable_wrapper">
<a href="{{ route('processes.create') }}" class="btn btn-success">Registrar Proceso</a>
<hr>
	<table class="table table-hover">
 		<thead>
 			<th>ID</th>
 			<th class="text-right">Nombre</th>
 			<th class="text-right">Fecha Inicial</th>
 			<th class="text-right">Estado</th>
 			<th class="text-right">Acción</th>
 		</thead>
 		<tbody>
 		@foreach($processes as $process)
 			<tr>
 				<td>{{ $process->id }}</td>
	
 				<td class="text-right">{{ $process->pcs_description}}</td>										
 				<td class="text-right">{{ $process->pcs_initial_date}}</td>										
 				<td class="text-right">{{ $process->pcs_state}}</td>										
 				<td class="text-right">  				
				 <a href="{{ route('processes.show', $process->id) }}" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></a>

					@if($process->pcs_final_date > date('Y-m-d'))
 						<a href="{{ route('processes.edit', $process->id) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
 					@endif
 				</td>
 			</tr>
 		@endforeach
 		</tbody>
	</table>
	<div class="text-center">
	{!! $processes->render() !!}
	</div>
	</div>
@endsection