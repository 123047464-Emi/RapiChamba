<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'telefono',
        'contrasena',
        'fechainscripcion',
        'idUbicacion',
        'idEstatus'
    ];

    public function direccion() {
        return $this->belongsTo(Direccion::class, 'idDireccion', 'id');
    }

    public function estatus() {
        return $this->belongsTo(Estatus::class, 'idEstatus', 'id');
    }

    public function empleado() {
        return $this->hasOne(Empleado::class, 'idEmpleado', 'id');
    }

    public function empleador() {
        return $this->hasOne(Empleador::class, 'idEmpleador', 'id');
    }
}
