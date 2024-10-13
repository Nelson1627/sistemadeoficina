@extends('layout.app')

@section('title', 'Crear Visitante')

@section('content')


<div class="container mt-5">
    <h1 class="text-center">Detalles de la Visita</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Visitntes</th>             
                <th>Nombre</th>
                <th>Documento_ID</th>
                <th>Telefono</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Julissa</td>
                <td>12345678-0</td>
                <td>70314246</td>
                <td>julissaqgmail.com</td>
                <td>
                    <a href="/visitantes/edit/1" class="btn btn-warning btn-sm">Editar</a>
                    <form action="/visitantes/delete/1" method="POST" style="display:inline;">
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