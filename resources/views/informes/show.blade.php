@extends('layout.app')

@section('title', 'Detalles del Informe')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Detalles del Informe</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Informe</th>             
                <th>ID Visita</th>
                <th>ID Usuario</th>
                <th>Fecha del Informe</th>
                <th>Contenido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>101</td>
                <td>1</td>
                <td>2024-10-01</td>
                <td>Informe de evaluación de la visita.</td>
                <td>
                    <a href="/informes/edit/1" class="btn btn-warning btn-sm">Editar</a>
                    <form action="/informes/delete/1" method="POST" style="display:inline;">
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
