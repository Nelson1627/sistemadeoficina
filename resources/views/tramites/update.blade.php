@extends('layout.app')

@section('title', 'Modificar Tramite')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Modificar Tramite</h1>
    <h5 class="text-center">Formulario para actualizar datos del tramite</h5>
    <hr>
    <form action="/tramites/update" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="id_tramite">ID Tramite</label>
            <input type="text" class="form-control" id="id_tramite" name="id_tramite" required readonly>
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
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" required>
        </div>
        <div class="form-group">
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" required>
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block">Actualizar</button>
        </div>
    </form>
</div>

@endsection
