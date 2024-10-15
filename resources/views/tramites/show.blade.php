@extends('layout.app')

@section('title', 'Detalles del Trámite')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Detalles del Trámite</h1>
    <hr class="my-4">
    <div class="text-right mb-3">
        <a class="btn btn-success btn-lg" href="{{ route('tramites.create') }}">Agregar nuevo trámite</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-lg">
            <thead class="thead-light">
                <tr>
                    <th>ID Trámite</th>
                    <th>ID Visita</th>
                    <th>ID Usuario</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tramites as $tramite)
                <tr>
                    <td>{{ $tramite->id_tramite }}</td>
                    <td>{{ $tramite->id_visita }}</td>
                    <td>{{ $tramite->id_usuario }}</td>
                    <td>{{ $tramite->descripcion }}</td>
                    <td>{{ $tramite->estado }}</td>
                    <td>{{ \Carbon\Carbon::parse($tramite->fecha_creacion)->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('tramites.edit', $tramite->id_tramite) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('tramites.destroy', $tramite->id_tramite) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este trámite?');">Eliminar</button>
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
