@extends('layouts.app')

@section('modulo', 'Usuarios')
@section('title', 'Crear Usuario')


@section('content')

  
{!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
        <div>
          <div class="form-group">
            {!! Form::label('name','Nombre'); !!}
            {!! Form::text('name', null,['class' => 'form-control']); !!} 

            <small class="text-danger">{{ $errors->first('name') }}</small>
          </div>

          <div class="form-group">
            {!! Form::label('last_name','Apellido'); !!}
            {!! Form::text('last_name', null,['class' => 'form-control', 'required']); !!} 

            <small class="text-danger">{{ $errors->first('last_name') }}</small>
          </div>

          <div class="form-group">
            {!! Form::label('email','Correo Electrónico'); !!}
            {!! Form::email('email', null,['class' => 'form-control', 'required']); !!}
            
            <small class="text-danger">{{ $errors->first('email') }}</small>
          </div>

          <div class="form-group">
            {!! Form::label('password','Password'); !!}
            {!! Form::password('password', ['class' => 'form-control', 'id' => 'pass','required']); !!}   

          </div>

          <div class="form-group">
            {!! Form::label('password_confirmation','Repetir Password'); !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'required']); !!}
            
            <small class="text-danger">{{ $errors->first('password') }}</small>
          </div> 

          <div class="form-group">
            {!! Form::label('role','Role'); !!}
            {!! Form::select('role', $roles,null,['class' => 'form-control', 'required']); !!}

            <small class="text-danger">{{ $errors->first('role') }}</small>
          </div>


          {!! Form::submit('Registrar', ['class' => 'btn btn-primary pull-right']); !!}  
          
        </div>
{!! Form::close() !!}


@endsection

