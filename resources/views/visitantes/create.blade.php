@extends('layout.app')

@section('title', 'Crear Visitante')

@section('content')

<div class="container mt-5">
    <h2>Crear Visitante</h2>
    <form action="{{ route('visitantes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
        </div>
        <div class="form-group">
            <label for="documento_id">Documento ID</label>
            <input type="text" class="form-control" name="documento_id" id="documento_id" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" name="telefono" id="telefono">
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" name="correo" id="correo">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

@endsection
