@extends('layout.app')

@section('title', 'Lista de Visitantes')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Lista de Visitantes</h1>
    <div class="text-right mb-3">
        <a class="btn btn-success btn-lg" href="/visitantes/create">Agregar nuevo visitante</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-lg">
            <thead class="thead-light">
                <tr>
                    <th>ID Visitante</th>             
                    <th>Nombre</th>
                    <th>Documento ID</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visitantes as $visitante)
                <tr>
                    <td>{{ $visitante->id_visitante }}</td>
                    <td>{{ $visitante->nombre }}</td>
                    <td>{{ $visitante->documento_id }}</td>
                    <td>{{ $visitante->telefono }}</td>
                    <td>{{ $visitante->correo }}</td>
                    <td>
                        <a href="{{ route('visitantes.edit', $visitante->id_visitante) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('visitantes.destroy', $visitante->id_visitante) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este visitante?');">Eliminar</button>
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
