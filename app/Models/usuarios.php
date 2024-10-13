<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;
    protected $table = 'usuarios'; // Nombre de la tabla 
    protected $primaryKey = 'id'; // Llave primaria de la tabla

    protected $fillable = ['nombre', 'rol', 'correo']; // Campos para asignación masiva
}
