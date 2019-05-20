@extends('layouts.app')

@section('modulo', 'Procesos')
@section('title', 'Crear Proceso (Paso 1)')

@section('content')

     {!! Form::open(['route' => 'processes.store', 'method' => 'POST']) !!}
               
          <div class="form-group">
          {!! Form::label('description','Descripción'); !!}
               {!! Form::textarea('description', null,['class' => 'form-control','required']); !!}

               <small class="text-danger">{{ $errors->first('description') }}</small>
          </div>

          <div class="form-group">
          {!! Form::label('department','Departamento'); !!}
               {!! Form::select('department', $departments,['id' => 'department','class' => 'form-control','required']); !!}

               <small class="text-danger">{{ $errors->first('department') }}</small>
          </div>

          <div class="form-group">
          {!! Form::label('municipalitie','Municipio'); !!}
               {!! Form::select('municipalitie', [],['id' => 'municipalitie','class' => 'form-control','required']); !!}

               <small class="text-danger">{{ $errors->first('municipalitie') }}</small>
          </div>
               
          {!! Form::submit('Registrar', ['class' => 'btn btn-primary pull-right']); !!}  

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