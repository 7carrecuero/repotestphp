@extends('layouts.app')

@section('modulo', 'Asientos')
@section('title', 'Editar Asiento')


@section('content')
  
<div class="row">
     <div class="col-md-3">
          
     </div>
     <div class="col-md-6">

          {!! Form::open(['route' => ['processesAp.edit.step4', $process], 'method' => 'PUT']) !!}
               
            <div class="form-group">
                {{ Form::radio('state', true , ($process->pcs_state == true),['id' => 'state','class' => 'state']) }} Aprobado

                {{ Form::radio('state', false , ($process->pcs_state == false),['id' => 'state','class' => 'state']) }} Rechazado

                <small class="text-danger">{{ $errors->first('state') }}</small>
            </div>

            <div class="form-group">
               {!! Form::label('comments','Comentarios'); !!}
               {!! Form::textarea('comments', $process->pcs_comments,['id' => 'comments','class' => 'form-control']); !!}
            
            </div>
               
               
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary pull-right']); !!}  

          {!! Form::close() !!} 

     </div>
     <div class="col-md-3">
          
     </div>
</div>


<script>

    $(document).ready(function(){

        if({{$process->pcs_state}} == false){

            $("#comments").removeAttr('disabled');

        }else{

            $("#comments").attr('disabled','disabled');
            $("#comments").val("");
        }


        $(".state").change(function(){

            if(this.value == false){

                $("#comments").removeAttr('disabled');

            }else{

                $("#comments").attr('disabled','disabled');
                $("#comments").val("");
            }
            
        });

    });

</script>

@endsection
