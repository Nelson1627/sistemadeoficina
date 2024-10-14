@extends('layout.app')

@section('title', 'Modificar Visitante')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Modificar Visitante</h1>
    <h5 class="text-center">Formulario para actualizar datos del visitante</h5>
    <hr>
    <form action="{{ route('visitantes.update', $visitante->id_visitante) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $visitante->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="documento_id">Documento ID</label>
            <input type="text" class="form-control" id="documento_id" name="documento_id" value="{{ $visitante->documento_id }}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ $visitante->telefono }}">
        </div>
        <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{ $visitante->correo }}">
        </div>
        <button class="btn btn-success" type="submit">Actualizar</button>
    </form>
</div>

@endsection
