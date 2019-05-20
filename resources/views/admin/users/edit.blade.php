@extends('layouts.app')

@section('modulo', 'Usuarios')
@section('title', 'Editar Usuario')


@section('content')

  
{!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}


      <div class="form-group">
            {!! Form::label('name','Nombre'); !!}
            {!! Form::text('name', $user->name,['class' => 'form-control','required']); !!}    

            <small class="text-danger">{{ $errors->first('name') }}</small>
      </div>

      <div class="form-group">
            {!! Form::label('last_name','Apellido'); !!}
            {!! Form::text('last_name', $user->last_name,['class' => 'form-control','required']); !!}   

            <small class="text-danger">{{ $errors->first('last_name') }}</small>
      </div>

      <div class="form-group">
            {!! Form::label('email','Email'); !!}
		{!! Form::text('email', $user->email,['class' => 'form-control','required']); !!}    

            <small class="text-danger">{{ $errors->first('email') }}</small>
      </div>
          
          {!! Form::submit('Registrar', ['class' => 'btn btn-primary pull-right']); !!}  
          
{!! Form::close() !!}


@endsection