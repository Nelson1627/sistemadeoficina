@extends('layouts.app2')

@section('content')

<div class="login-background">
    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">Bienvenido al Sistema de Registro de Visitas</h1>
            <p class="lead">Administra y controla las visitas a tu oficina de manera eficiente.</p>
            <a href="/visitas/show" class="btn btn-outline-warning me-2">VER VISITAS</a>
            <a href="/visitas/create" class="btn btn-outline-danger">REGISTRAR NUEVA VISITA</a>

        </div>
    </div>
</div>
@endsection

@section('navbar')
<nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Inventario</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/visitas/show">Visitas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endsection
