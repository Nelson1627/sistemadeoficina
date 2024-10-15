@extends('layout.app')

@section('title', 'Crear Informe')

@section('content')

<div class="container mt-5">
    <h2>Crear Informe</h2>
    <form action="{{ route('informes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_visita">Seleccionar Visita</label>
            <select class="form-control" name="id_visita" id="id_visita" required>
                <option value="">Seleccione una visita</option>
                @foreach($visitas as $visita)
                    <option value="{{ $visita->id_visita }}">{{ $visita->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_usuario">Seleccionar Usuario</label>
            <select class="form-control" name="id_usuario" id="id_usuario" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_informe">Fecha del Informe</label>
            <input type="datetime-local" class="form-control" name="fecha_informe" id="fecha_informe" required>
        </div>
        <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea class="form-control" name="contenido" id="contenido" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

@endsection
