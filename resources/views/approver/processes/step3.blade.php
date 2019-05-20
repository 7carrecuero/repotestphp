@extends('layouts.app')

@section('modulo', 'Procesos')
@section('title', 'Editar Proceso (Paso 3)')


@section('content')


        <div class="form-group">
            
            {!! Form::label('file','Documento'); !!} <br>
                    
            {{ $process->pcs_document }}

        </div> 

        <div class="form-group">
            
            <a href="{{route('processesAp.download',$process->pcs_document) }}" class="btn btn-success" target="_blank">Descargar</a>
        
        </div> 

        <div class="form-group pull-right">
          
            <a href="{{ route('processesAp.step4', $process->id) }}" class="btn btn-primary">Siguiente</a>

        </div>
          

@endsection