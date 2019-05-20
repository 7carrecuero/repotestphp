@extends('layouts.app')

@section('modulo', 'Procesos')
@section('title', 'Editar Proceso (Paso 2)')


@section('content')

    <div class="form-group">
        {!! Form::label('initial_date','Fecha Inicial'); !!}
            {{ $process->pcs_initial_date }}
    </div>

    <div class="form-group">
        {!! Form::label('final_date','Fecha Final'); !!}
        {{ $process->pcs_final_date }}
    </div>
               
    <div class="form-group pull-right">
          
        <a href="{{ route('processes.step3', $process->id) }}" class="btn btn-primary">Siguiente</a>

    </div>


@endsection