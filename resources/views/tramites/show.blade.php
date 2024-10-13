@extends('layout.app')
@section('title', 'Detalles del Tramite')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Detalles del Tramite</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Tramite</th>             
                <th>ID Visita</th>
                <th>ID Usuario</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>101</td>
                <td>1</td>
                <td>Visita de evaluación</td>
                <td>Activo</td>
                <td>2024-10-01</td>
                <td>
                    <a href="/tramites/edit/1" class="btn btn-warning btn-sm">Editar</a>
                    <form action="/tramites/delete/1" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            <!-- Puedes agregar más filas aquí -->
        </tbody>
    </table>
</div>

@endsection
