@extends('layout.app')

@section('title', 'Detalles del Usuario')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Detalles del Usuario</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Usuario</th>             
                <th>Nombre</th>
                <th>Rol</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Julissa</td>
                <td>Administrador</td>
                <td>julissa@gmail.com</td>
                <td>
                    <a href="/usuarios/edit/1" class="btn btn-warning btn-sm">Editar</a>
                    <form action="/usuarios/delete/1" method="POST" style="display:inline;">
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
