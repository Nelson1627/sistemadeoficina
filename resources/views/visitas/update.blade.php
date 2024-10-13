@extends('layout.app')

@section('title', 'Modificar Visita')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Modificar Visita</h1>
    <h5 class="text-center">Formulario para actualizar visitas</h5>
    <hr>
    <form action="{{ route('visitas.update', $visita->id_visita) }}" method="POST">
        @csrf
        @method('PUT') <!-- Asegúrate de que este método esté presente -->
        <div class="form-group">
            <label for="id_visitante">ID Visitante</label>
            <input type="text" class="form-control" id="id_visitante" name="id_visitante" value="{{ $visita->id_visitante }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_hora_entrada">Fecha y Hora de Entrada</label>
            <input type="datetime-local" class="form-control" id="fecha_hora_entrada" name="fecha_hora_entrada" value="{{ \Carbon\Carbon::parse($visita->fecha_hora_entrada)->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_hora_salida">Fecha y Hora de Salida</label>
            <input type="datetime-local" class="form-control" id="fecha_hora_salida" name="fecha_hora_salida" value="{{ $visita->fecha_hora_salida ? \Carbon\Carbon::parse($visita->fecha_hora_salida)->format('Y-m-d\TH:i') : '' }}">
        </div>
        <div class="form-group">
            <label for="proposito">Propósito</label>
            <textarea class="form-control" id="proposito" name="proposito" rows="3" required>{{ $visita->proposito }}</textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block">Actualizar</button>
        </div>
    </form>
</div>
@endsection
