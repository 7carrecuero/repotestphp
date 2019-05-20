@extends('layouts.app')

@section('modulo', 'Detalle del Proceso')
@section('title', 'Consultar Proceso')


@section('content')

    <div class="form-group">
          {!! Form::label('nombre','Nombre'); !!}
          
          {{ $process->pcs_description}}

     </div>

     <div class="form-group">
          {!! Form::label('department','Departamento'); !!}
          
          {{ $process->department->dpt_name}}

     </div>

     <div class="form-group">
          {!! Form::label('municipalitie','Municipio'); !!}
          
          {{ $process->municipalitie->mcp_name}}

     </div>

     <div class="form-group">
        {!! Form::label('initial_date','Fecha Inicial'); !!}
            {{ $process->pcs_initial_date }}
    </div>

    <div class="form-group">
        {!! Form::label('final_date','Fecha Final'); !!}
        {{ $process->pcs_final_date }}
    </div>

    <div class="form-group">
            
        {!! Form::label('file','Documento'); !!} <br>
                 
        {{ $process->pcs_document }}

    </div> 

    <div class="form-group">
                
                @if($process->pcs_state == 1)
                    Aprobado
                @else
                    Rechazado
                @endif

            </div>

    <div class="form-group">
        {!! Form::label('comments','Comentarios'); !!}
        {{ $process->pcs_comments }}
    </div>
               

@endsection