<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitantes extends Model
{
    use HasFactory;

    protected $table = 'visitantes'; // Nombre de la tabla 
    protected $primaryKey = 'id_visitante'; // Llave primaria de la tabla

    protected $fillable = ['nombre', 'documento_id', 'telefono', 'correo']; // Campos para asignación masiva
    
    // Relación con Visitas
    public function visitas()
    {
        return $this->hasMany(Visitas::class, 'id_visitante');
    }
}
