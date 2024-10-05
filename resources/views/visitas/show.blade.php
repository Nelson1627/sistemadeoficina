<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mostrar Visitas</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div class="container mt-5">
      <h1 class="text-center">Detalles de la Visita</h1>
      <table class="table table-bordered">
          <thead>
              <tr>
                  <th>ID Visita</th>
                  <th>ID Visitante</th>
                  <th>Fecha y Hora de Entrada</th>
                  <th>Fecha y Hora de Salida</th>
                  <th>Propósito</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>1</td>
                  <td>123</td>
                  <td>2024-10-05 14:00</td>
                  <td>2024-10-05 16:00</td>
                  <td>Reunión de trabajo</td>
                  <td>
                      <a href="/visitas/edit/1" class="btn btn-warning btn-sm">Editar</a>
                      <form action="/visitas/delete/1" method="POST" style="display:inline;">
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
</body>
</html>