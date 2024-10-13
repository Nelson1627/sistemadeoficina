<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informes extends Model
{
    use HasFactory;
    protected $table = 'informes'; // Nombre de la tabla 
    protected $primaryKey = 'id'; // Llave primaria de la tabla

    protected $fillable = ['id_visita', 'id_usuario', 'fecha_informe', 'contenido']; // Campos para asignación masiva
}


