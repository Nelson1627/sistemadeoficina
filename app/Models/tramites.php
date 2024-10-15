<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramites extends Model
{
    use HasFactory;

    protected $table = 'tramites'; // Nombre de la tabla
    protected $primaryKey = 'id_tramite'; // Llave primaria de la tabla
    public $timestamps = true; // Para manejar created_at y updated_at

    protected $fillable = [
        'id_visita',
        'id_usuario',
        'descripcion',
        'estado',
        'fecha_creacion',
    ]; // Campos para asignación masiva

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }

    public function visita()
    {
        return $this->belongsTo(Visitas::class, 'id_visita');
    }
}
