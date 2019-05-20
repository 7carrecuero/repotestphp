@extends('layouts.app')

@section('modulo', 'Formulario 2')
@section('title', 'Cliente')


@section('content')
  
<div class="row">
     <div class="col-md-3">
          
     </div>
     <div class="col-md-6">

          {!! Form::open(['route' => ['processesAp.edit.step2', $process], 'method' => 'PUT']) !!}
               
               <div class="form-group">
               {!! Form::label('initial_date','Fecha Inicial'); !!}
                    {!! Form::date('initial_date', $process->pcs_initial_date,['class' => 'form-control']); !!}
     
                    <small class="text-danger">{{ $errors->first('initial_date') }}</small>
               </div>

               <div class="form-group">
               {!! Form::label('final_date','Fecha Final'); !!}
                    {!! Form::date('final_date', $process->pcs_final_date,['class' => 'form-control']); !!}
               
                    <small class="text-danger">{{ $errors->first('final_date') }}</small>
               </div>
               
               {!! Form::submit('Registrar', ['class' => 'btn btn-primary pull-right']); !!}  

          {!! Form::close() !!} 

     </div>
     <div class="col-md-3">
          
     </div>
</div>

@endsection
