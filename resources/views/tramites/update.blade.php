@extends('layout.app')

@section('title', 'Modificar Trámite')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Modificar Trámite</h1>
    <form action="{{ route('tramites.update', $tramite->id_tramite) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="id_visita">Seleccionar Visita</label>
            <select class="form-control" name="id_visita" id="id_visita" required>
                <option value="">Seleccione una visita</option>
                @foreach($visitas as $visita)
                    <option value="{{ $visita->id_visita }}" {{ $visita->id_visita == $tramite->id_visita ? 'selected' : '' }}>
                        {{ $visita->proposito }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_usuario">Seleccionar Usuario</label>
            <select class="form-control" name="id_usuario" id="id_usuario" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}" {{ $usuario->id_usuario == $tramite->id_usuario ? 'selected' : '' }}>
                        {{ $usuario->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $tramite->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" name="estado" id="estado" required>
                <option value="Pendiente" {{ $tramite->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="En Proceso" {{ $tramite->estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                <option value="Finalizado" {{ $tramite->estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="datetime-local" class="form-control" id="fecha_creacion" name="fecha_creacion" value="{{ \Carbon\Carbon::parse($tramite->fecha_creacion)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <button class="btn btn-success btn-block">Actualizar</button>
        </div>
    </form>
</div>
@endsection
