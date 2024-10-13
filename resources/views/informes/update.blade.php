@extends('layout.app')

@section('title', 'Modificar Informe')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Modificar Informe</h1>
    <h5 class="text-center">Formulario para actualizar datos del informe</h5>
    <hr>
    <form action="/informes/update" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="id_informe">ID Informe</label>
            <input type="text" class="form-control" id="id_informe" name="id_informe" required readonly>
        </div>
        <div class="form-group">
            <label for="id_visita">ID Visita</label>
            <input type="text" class="form-control" id="id_visita" name="id_visita" required>
        </div>
        <div class="form-group">
            <label for="id_usuario">ID Usuario</label>
            <input type="text" class="form-control" id="id_usuario" name="id_usuario" required>
        </div>
        <div class="form-group">
            <label for="fecha_informe">Fecha del Informe</label>
            <input type="date" class="form-control" id="fecha_informe" name="fecha_informe" required>
        </div>
        <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" required></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block">Actualizar</button>
        </div>
    </form>
</div>

@endsection
