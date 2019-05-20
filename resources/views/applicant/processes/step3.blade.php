@extends('layouts.app')

@section('modulo', 'Procesos')
@section('title', 'Editar Proceso (Paso 3)')


@section('content')

     {!! Form::open(['route' => ['processes.edit.step3', $process], 'method' => 'PUT', 'files' => true]) !!}

        <div class="form-group">
            
            {!! Form::label('file','Documento'); !!} <br>
            <img src="{{ asset('docs/processes/'.$process->pcs_document) }}" alt="" width="70" height="65"> 
            <br>
        
            {{ $process->pcs_document }}
            <h4>Actualizar Documento</h4>
            {!! Form::file('file', null); !!}
        
        </div> 

          {!! Form::submit('Siguiente', ['class' => 'btn btn-primary pull-right']); !!}
          
     {!! Form::close() !!}

@endsection