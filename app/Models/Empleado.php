<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'nombre', 
        'idUsuario', 
        'experiencia',
        'idhabilidadesEmpleado', 
        'numtareas'
    ];

    /**
     * Un empleado pertenece a un usuario
     */
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'idUsuario', 'id');
    }

    /**
     * Un empleado puede tener muchas tareas
     */
    public function tareas()
    {
        return $this->hasMany(Tareas::class, 'idEmpleado', 'id');
    }

    /**
     * Un empleado puede tener muchos contratos
     */
    public function contratos()
    {
        return $this->hasMany(Contratos::class, 'idEmpleado', 'id');
    }


        // Un empleado tiene muchas habilidades (Many to Many)
    public function habilidades()
    {
        return $this->belongsToMany(
            Habilidad::class,     // Modelo relacionado
            'empleado_habilidad', // Tabla pivote
            'idEmpleado',         // FK hacia empleados
            'idHabilidad'         // FK hacia habilidades
        )->withTimestamps();
    }
}


