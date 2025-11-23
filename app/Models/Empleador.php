<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleador extends Model
{
    //
    protected $table = 'empleadores';

    protected $fillable = [
        'nombre', 
        'idUsuario', 
        'descripcion', 
        'numtareas'
    ];

    //Un empleador es un usuario
    public function usuarios(){
        return $this->belongTo(Usuarios::class, 'idUsuario', 'id');
    }

}
