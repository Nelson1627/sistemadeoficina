<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<center>
    <div class="container">
        <form action="/visitas/store" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="entrada">Fecha y Hora de Entrada</label>
                    <input type="datetime-local" class="form-control" name="fecha_hora_entrada" id="entrada" required>
                    @error('fecha_hora_entrada')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="salida">Fecha y Hora de Salida</label>
                    <input type="datetime-local" class="form-control" name="fecha_hora_salida" id="salida" required>
                    @error('fecha_hora_salida')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label for="proposito">Propósito</label>
                    <input type="text" class="form-control" name="proposito" id="proposito" required>
                    @error('proposito')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <br>
            <hr>
            <div class="col-12 mt-2">
                <button class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</center>
</html>