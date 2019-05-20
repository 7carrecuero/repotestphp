@extends('layouts.app')

@section('content')

<div class="alert alert-primary" role="alert">
    El proceso esta siendo gestionado por el aprobador.
</div>

<a class="btn btn-primary" href="{{ route('processes.index') }}">Procesos</a>
@endsection 
