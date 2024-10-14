@extends('layout.app')

@section('title', 'Lista de Visitantes')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Lista de Visitantes</h1>
    <a class="btn btn-danger btn-sm" href="/visitantes/create">Agregar nuevo visitante</a>
    <br> <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Visitante</th>             
                <th>Nombre</th>
                <th>Documento ID</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitantes as $visitante)
            <tr>
                <td>{{ $visitante->id_visitante }}</td>
                <td>{{ $visitante->nombre }}</td>
                <td>{{ $visitante->documento_id }}</td>
                <td>{{ $visitante->telefono }}</td>
                <td>{{ $visitante->correo }}</td>
                <td>
                    <a href="{{ route('visitantes.edit', $visitante->id_visitante) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('visitantes.destroy', $visitante->id_visitante) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
