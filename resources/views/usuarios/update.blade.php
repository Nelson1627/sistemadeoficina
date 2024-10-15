@extends('layout.app')

@section('title', 'Modificar Usuario')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Modificar Usuario</h1>
    <h5 class="text-center">Formulario para actualizar datos del usuario</h5>
    <hr>
    <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="id_usuario">ID Usuario</label>
            <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="{{ $usuario->id_usuario }}" required readonly>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="rol" id="rol" class="form-control">
                <option value="administrativo" {{ $usuario->rol == 'administrativo' ? 'selected' : '' }}>Administrativo</option>
                <option value="encargado" {{ $usuario->rol == 'encargado' ? 'selected' : '' }}>Encargado</option>
                <option value="otro" {{ $usuario->rol == 'otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{ $usuario->correo }}" required>
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block">Actualizar</button>
        </div>
    </form>
</div>

@endsection
