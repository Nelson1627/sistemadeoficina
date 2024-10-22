@extends('layout.app')

@section('title', 'Detalles del Informe')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Detalles del Informe</h1>
    <hr class="my-4">
    <div class="text-right mb-3">
        <a class="btn btn-success btn-lg" href="{{ route('informes.create') }}">Agregar nuevo informe</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-lg">
            <thead class="thead-light">
                <tr>
                    <th>ID Informe</th>             
                    <th>ID Visita</th>
                    <th>ID Usuario</th>
                    <th>Fecha del Informe</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($informes as $informe)
                <tr>
                    <td>{{ $informe->id_informe }}</td>
                    <td>{{ $informe->id_visita }}</td>
                    <td>{{ $informe->id_usuario }}</td>
                    <td>{{ \Carbon\Carbon::parse($informe->fecha_informe)->format('d/m/Y H:i') }}</td>
                    <td>{{ $informe->contenido }}</td>
                    <td>
                        <a href="{{ route('informes.edit', $informe->id_informe) }}" class="btn btn-outline-warning">Editar</a>
                        <form action="{{ route('informes.destroy', $informe->id_informe) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este informe?');">Eliminar</button>
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
