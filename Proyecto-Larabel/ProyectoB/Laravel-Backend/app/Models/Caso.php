<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    use HasFactory;

    protected $table = 'caso'; // nombre exacto de tu tabla
    protected $primaryKey = 'id_caso'; // clave primaria personalizada
    public $timestamps = false; // si no usas created_at / updated_at automáticos

    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'fecha_creacion',
        'fecha_actualizacion',
        'id_usuario',
    ];

    // Opcional: relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
}
