@extends('layout.app')

@section('title', 'Lista de Visitas')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Detalles de la Visita</h1>
    <hr>
 <a class="btn btn-danger btn-sm" href="/visitas/create">Agregar nueva visita</a>
 <br><br>
    <table class="table table-bordered">
        <thead>
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
                    <button class="btn btn-danger btn-sm" url="/visitas/destroy/{{$visita->id_visita}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 @endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/visitas.js') }}"></script>
@endsection



