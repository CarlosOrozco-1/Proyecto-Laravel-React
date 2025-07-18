<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario'; // nombre de tu tabla
    protected $primaryKey = 'id_usuario'; // clave primaria personalizada
    public $timestamps = false; // si no tienes campos created_at / updated_at

    protected $fillable = [
        'nombre_usuario',
        'contrasena',
        'nombre',
        'apellido',
        'departamento',
        'direccion',
    ];

}
