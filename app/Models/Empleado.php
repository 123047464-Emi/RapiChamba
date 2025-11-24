<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id'; // tu PK real
    public $timestamps = false;   // si tu tabla no tiene created_at/updated_at

    protected $fillable = [
        'idUsuario',
        'Experiencia',
        'NumTareas',
        'idHabilidades'
    ];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'id');
    }

    // Relación con Contratos
    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'idEmpleado', 'id');
    }

    // Relación con Habilidades (Many-to-Many)
    public function habilidades()
    {
        return $this->belongsToMany(
            Habilidad::class,
            'empleado_habilidad', // tabla pivote
            'idEmpleado',
            'idHabilidad'
        );
    }

    // Si quieres contar tareas completadas, relación con Contratos o Calificaciones
    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class, 'idEmpleado', 'id');
    }
}
