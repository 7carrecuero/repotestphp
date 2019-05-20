@extends('layouts.app')

@section('content')

<div class="alert alert-primary" role="alert">
    El proceso esta siendo gestionado por el solicitante.
</div>

<a class="btn btn-primary" href="{{ route('processesAp.index') }}">Procesos</a>
@endsection 
