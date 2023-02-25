<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';

    protected $fillable = [
        'nombres',
        'apellidos',
        'genero',
        'celular',
        'telefono',
        'email',
        'direccion',
        'pais',
        'estado',
        'ciudad',
        'thumbnail',
        'usuario_id',
    ];

    function usuario(){
        return User::find($this->usuario_id);
    }
}
