<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Actualizar Visitas</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div class="container mt-5">
      <h1 class="text-center">Modificar</h1>
      <h5 class="text-center">Formulario para actualizar visitas</h5>
      <hr>
      <form action="/visitas/update" method="POST">
          <div class="form-group">
              <label for="fecha_hora_entrada">Fecha y Hora de Entrada</label>
              <input type="datetime-local" class="form-control" id="fecha_hora_entrada" name="fecha_hora_entrada" required>
          </div>
          <div class="form-group">
              <label for="fecha_hora_salida">Fecha y Hora de Salida</label>
              <input type="datetime-local" class="form-control" id="fecha_hora_salida" name="fecha_hora_salida" required>
          </div>
          <div class="form-group">
              <label for="proposito">Propósito</label>
              <textarea class="form-control" id="proposito" name="proposito" rows="3" required></textarea>
          </div>
          <div class="form-group">
              <button class="btn btn-success btn-block">Actualizar</button>
          </div>
      </form>
  </div>
</body>
</html>