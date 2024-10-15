@extends('layout.app')

@section('title', 'Modificar Informe')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Modificar Informe</h1>
    <form action="{{ route('informes.update', $informe->id_informe) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="id_informe">ID Informe</label>
            <input type="text" class="form-control" id="id_informe" name="id_informe" value="{{ $informe->id_informe }}" readonly>
        </div>
        <div class="form-group">
            <label for="id_visita">Seleccionar Visita</label>
            <select class="form-control" name="id_visita" id="id_visita" required>
                <option value="">Seleccione una visita</option>
                @foreach($visitas as $visita)
                    <option value="{{ $visita->id_visita }}" {{ $visita->id_visita == $informe->id_visita ? 'selected' : '' }}>
                        {{ $visita->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_usuario">Seleccionar Usuario</label>
            <select class="form-control" name="id_usuario" id="id_usuario" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}" {{ $usuario->id_usuario == $informe->id_usuario ? 'selected' : '' }}>
                        {{ $usuario->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_informe">Fecha del Informe</label>
            <input type="datetime-local" class="form-control" id="fecha_informe" name="fecha_informe" value="{{ \Carbon\Carbon::parse($informe->fecha_informe)->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" required>{{ $informe->contenido }}</textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block">Actualizar</button>
        </div>
    </form>
</div>

@endsection
