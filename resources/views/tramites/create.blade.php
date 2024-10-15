@extends('layout.app')

@section('title', 'Crear Trámite')

@section('content')
<div class="container mt-5">
    <form action="{{ route('tramites.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <label for="id_visita">Seleccionar Visita</label>
                <select class="form-control" name="id_visita" id="id_visita" required>
                    <option value="">Seleccione una visita</option>
                    @foreach($visitas as $visita)
                        <option value="{{ $visita->id_visita }}">{{ $visita->proposito }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="id_usuario">Seleccionar Usuario</label>
                <select class="form-control" name="id_usuario" id="id_usuario" required>
                    <option value="">Seleccione un usuario</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}">{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-3">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
            </div>
            <div class="col-6 mt-3">
                <label for="estado">Estado</label>
                <select class="form-control" name="estado" id="estado" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="En Proceso">En Proceso</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
            </div>
            <div class="col-6 mt-3">
                <label for="fecha_creacion">Fecha de Creación</label>
                <input type="datetime-local" class="form-control" name="fecha_creacion" id="fecha_creacion" required>
            </div>
        </div>
        <hr>
        <div class="col-12 mt-2">
            <button class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
@endsection
