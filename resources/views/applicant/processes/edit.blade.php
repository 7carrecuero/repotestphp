@extends('layouts.app')

@section('modulo', 'Procesos')
@section('title', 'Editar Proceso (Paso 1)')


@section('content')

     {!! Form::open(['route' => ['processes.update', $process], 'method' => 'PUT']) !!}

          <div class="form-group">
               {!! Form::label('description','Descripción'); !!}
               {!! Form::textarea('description', $process->pcs_description,['class' => 'form-control','required']); !!}

               <small class="text-danger">{{ $errors->first('description') }}</small>
          </div>

          <div class="form-group">
               {!! Form::label('department','Departamento'); !!}
               {!! Form::select('department', $departments,$process->dpt_id,['id' => 'department','class' => 'form-control','required']); !!}
         
               <small class="text-danger">{{ $errors->first('department') }}</small>
          </div>

          <div class="form-group">
               {!! Form::label('municipalitie','Municipio'); !!}
               {!! Form::select('municipalitie', $municipalitie,$process->mcp_id,['id' => 'municipalitie','class' => 'form-control','required']); !!}
          
               <small class="text-danger">{{ $errors->first('municipalitie') }}</small>
          </div>

          {!! Form::submit('Siguiente', ['class' => 'btn btn-primary pull-right']); !!}
          
     {!! Form::close() !!}

     <script>

          $(document).ready(function(){
               $("#department").change(function(e){

                    $.ajax({url: "http://localhost:8090/Processes/public/api/get/municipalities/"+this.value, success: function(result){
                         $('#municipalitie').empty();
                         $.each(result, function (mcp_id,mcp_name)
                         {
                              $('#municipalitie').append('<option value="' + mcp_id + '">' + mcp_name + '</option>');
                         });
                    
                    }});
               
               });
          });

     </script>

@endsection
