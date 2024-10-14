@extends('layout.app')

@section('title', 'Detalles del Usuario')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Detalles del Usuario</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Usuario</th>             
                <th>Nombre</th>
                <th>Rol</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id_usuario }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->rol }}</td>
                <td>{{ $usuario->correo }}</td>
                <td>
                    <a href="{{ route('usuarios.show', $usuario->id_usuario) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
