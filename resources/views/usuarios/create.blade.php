@extends('layout.app')

@section('title', 'Crear Usuario')

@section('content')

<div class="container mt-5">
    <h2>Crear Usuario</h2>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <input type="text" class="form-control" name="rol" id="rol" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" name="correo" id="correo" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

@endsection
