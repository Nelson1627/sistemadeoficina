<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Nombre de la tabla 
    protected $primaryKey = 'id_usuario'; // Llave primaria de la tabla

    protected $fillable = ['nombre', 'rol', 'correo']; // Campos para asignación masiva
}
