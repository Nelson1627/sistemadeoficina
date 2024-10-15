<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informes extends Model
{
    use HasFactory;

    protected $table = 'informes'; // Nombre de la tabla 
    protected $primaryKey = 'id_informe'; // Llave primaria de la tabla
    public $timestamps = true; // Para manejar created_at y updated_at

    protected $fillable = [
        'id_visita', 
        'id_usuario', 
        'fecha_informe', 
        'contenido'
    ]; // Campos para asignación masiva
}
