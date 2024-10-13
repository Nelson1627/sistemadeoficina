@extends('layouts.app2')

@section('title', 'Crear Tramite')

@section('content')

<div class="container mt-5">
    <h2>Crear Tramite</h2>
    <form action="/tramites/store" method="POST">
        <div class="form-group">
            <label for="id_tramite">ID Tramite</label>
            <input type="text" class="form-control" name="id_tramite" id="id_tramite" required>
        </div>
        <div class="form-group">
            <label for="id_visita">ID Visita</label>
            <input type="text" class="form-control" name="id_visita" id="id_visita" required>
        </div>
        <div class="form-group">
            <label for="id_usuario">ID Usuario</label>
            <input type="text" class="form-control" name="id_usuario" id="id_usuario" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" name="estado" id="estado" required>
        </div>
        <div class="form-group">
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="date" class="form-control" name="fecha_creacion" id="fecha_creacion" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
