<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitas extends Model
{
    use HasFactory;

    protected $table = 'visitas'; // Nombre de la tabla 
    protected $primaryKey = 'id_visita'; // Llave primaria de la tabla

    protected $fillable = ['id_visitante', 'fecha_hora_entrada', 'fecha_hora_salida', 'proposito']; // Campos para asignación masiva
}
