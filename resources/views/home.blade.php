@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Bienvenido al Sistema de Registro de Visitas</h1>
            <p class="lead">Administra y controla las visitas a tu oficina de manera eficiente.</p>
            <a href="/visitas/show" class="btn btn-primary btn-lg">Ver Visitas</a>
            <a href="/visitas/create" class="btn btn-success btn-lg">Registrar Nueva Visita</a>
        </div>
</div>
@endsection
