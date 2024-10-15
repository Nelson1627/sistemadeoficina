@extends('layout.app')

@section('title', 'Lista de Visitas')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Detalles de la Visita</h1>
    <hr class="my-4">
    <div class="text-right mb-3">
        <a class="btn btn-success btn-lg" href="{{ route('visitas.create') }}">Agregar nueva visita</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-lg">
            <thead class="thead-light">
                <tr>
                    <th>ID Visita</th>
                    <th>ID Visitante</th>
                    <th>Fecha y Hora de Entrada</th>
                    <th>Fecha y Hora de Salida</th>
                    <th>Propósito</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visitas as $visita)
                <tr>
                    <td>{{ $visita->id_visita }}</td>
                    <td>{{ $visita->id_visitante }}</td>
                    <td>{{ $visita->fecha_hora_entrada }}</td>
                    <td>{{ $visita->fecha_hora_salida ?? 'N/A' }}</td>
                    <td>{{ $visita->proposito }}</td>
                    <td>
                        <a href="{{ route('visitas.edit', $visita->id_visita) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('visitas.destroy', $visita->id_visita) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta visita?');">Eliminar</button>
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
