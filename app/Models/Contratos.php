<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    //
    protected $table = 'contratos';

    protected $fillable = [
        'fechaInicio', 
        'fechaFin', 
        'idEstatus', 
        'idTarea', 
        'idEmpleado', 
        'idTipo'
    ];

    // Una estatus puede tener muchos contratos
    public function estatus(){
        return $this->hasMany(Estatus::class, 'idEstatus', 'id');
    }
    // Un empleado puede tener muchos contratos
    public function empleados(){
        return $this->hasMany(Empleados::class, 'idEmpleado', 'id');
    }
    // Una tarea puede tener muchos contratos

    // Un tipo puede tener muchos contratos

}
