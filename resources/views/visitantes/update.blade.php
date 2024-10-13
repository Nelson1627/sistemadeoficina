@extends('layout.app')

@section('title', 'Crear Visitante')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Modificar Visitante</h1>
    <h5 class="text-center">Formulario para actualizar datos del visitante</h5>
    <hr>
    <form action="/visitantes/update" method="POST">
      
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="documento_id">Documento ID</label>
            <input type="text" class="form-control" id="documento_id" name="documento_id" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block">Actualizar</button>
        </div>
    </form>
</div>
</body>
</html>


@endsection
  