<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitantes extends Model
{
    use HasFactory;
    protected $table = 'visitantes'; // Nombre de la tabla 
    protected $primaryKey = 'id'; // Llave primaria de la tabla

    protected $fillable = ['id_visitante','nombre', 'documento_id', 'telefono', 'correo']; // Campos para asignación masiva

}
