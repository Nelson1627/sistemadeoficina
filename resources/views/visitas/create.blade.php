@extends('layout.app')

@section('title', 'Crear Visitas')

@section('content')
<div class="container mt-5">
    <h2>Crear Visita</h2>
    <form action="{{ route('visitas.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <label for="id_visitante">Seleccionar Visitante</label>
                <select class="form-control" name="id_visitante" id="id_visitante" required>
                    <option value="">Seleccione un visitante</option>
                    @foreach($visitantes as $visitante)
                        <option value="{{ $visitante->id_visitante }}">{{ $visitante->nombre }}</option>
                    @endforeach
                </select>
                @error('id_visitante')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-6">
                <label for="entrada">Fecha y Hora de Entrada</label>
                <input type="datetime-local" class="form-control" name="fecha_hora_entrada" id="entrada" required>
                @error('fecha_hora_entrada')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-6 mt-3">
                <label for="salida">Fecha y Hora de Salida</label>
                <input type="datetime-local" class="form-control" name="fecha_hora_salida" id="salida">
                @error('fecha_hora_salida')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-12 mt-3">
                <label for="proposito">Propósito</label>
                <input type="text" class="form-control" name="proposito" id="proposito" required>
                @error('proposito')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
@endsection
