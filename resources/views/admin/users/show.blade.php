@extends('layouts.app')

@section('modulo', 'Usuarios')
@section('title', 'Consultar Usuario')


@section('content')

      <div class="form-group">
            {!! Form::label('name','Nombre:'); !!}
            {!! $user->name !!}    
      </div>

      <div class="form-group">
            {!! Form::label('name','Apellido:'); !!}
            {!! $user->last_name !!}    
      </div>

      <div class="form-group">
            {!! Form::label('email','Email:'); !!}
			      {!! $user->email !!}    
      </div>

      <div class="form-group">
          {!! Form::label('type', 'Role:'); !!}
          {!! $user->roles[0]->name !!}
      </div> 

@endsection