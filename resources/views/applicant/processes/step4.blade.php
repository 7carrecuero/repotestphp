@extends('layouts.app')

@section('modulo', 'Procesos')
@section('title', 'Editar Proceso (Paso 4)')


@section('content')
  

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
               
            <div class="form-group pull-right">
          
                <a href="{{ route('processes.step5', $process->id) }}" class="btn btn-primary">Siguiente</a>

            </div>


@endsection