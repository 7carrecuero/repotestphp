@extends('layouts.app')

@section('modulo', 'Formulario 1')
@section('title', 'Cliente')


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
          
          <a href="{{ route('processesAp.step2', ['id' => $process->id]) }}" class="btn btn-primary">Siguiente</a>

     </div>



@endsection
