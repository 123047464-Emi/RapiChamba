<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;

class PostulacionController extends Controller
{
    /**
     * Registrar una postulación (crear un contrato).
     */
    public function store(Request $request, $tareaId)
    {
        // Aquí asumimos que el empleado es el usuario autenticado
        $empleadoId = auth()->id();

        // Crear el contrato/postulación
        $contrato = Contrato::create([
            'fechaInicio'    => now(),
            'fechaFin'       => now()->addDays(7), 
            'idEstatus'      => 1, 
            'idTarea'        => $tareaId,
            'idEmpleado'     => $empleadoId,
            'idTipoContrato' => 1, 
        ]);

        return response()->json([
            'success'  => true,
            'message'  => 'Postulación registrada correctamente',
            'contrato' => $contrato
        ]);
    }
}
