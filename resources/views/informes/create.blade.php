@extends('layout.app')

@section('title', 'Crear Informe')

@section('content')

<div class="container mt-5">
    <h2>Crear Informe</h2>
    <form action="/informes/store" method="POST">
        <div class="form-group">
            <label for="id_informe">ID Informe</label>
            <input type="text" class="form-control" name="id_informe" id="id_informe" required>
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
            <label for="fecha_informe">Fecha del Informe</label>
            <input type="date" class="form-control" name="fecha_informe" id="fecha_informe" required>
        </div>
        <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea class="form-control" name="contenido" id="contenido" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
