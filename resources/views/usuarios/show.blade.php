@extends('layout.app')

@section('title', 'Detalles del Usuario')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Detalles del Usuario</h1>
    <hr class="my-4">
    <div class="text-right mb-3">
        <a class="btn btn-success btn-lg" href="{{ route('usuarios.create') }}">Agregar nuevo usuario</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered shadow-lg mt-4">
            <thead class="thead-light">
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
                        <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

<style>
    body {
        background-color: #f8f9fa;
    }
    h1 {
        font-family: 'Arial Black', sans-serif;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }
    .table th {
        background-color: #007bff;
        color: white;
    }
    .table td {
        transition: background-color 0.3s;
    }
    .table tr:hover td {
        background-color: #e9ecef;
    }
</style>
