<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Empleado;
use App\Models\Habilidad;

class EmpleadoController extends Controller
{
    public function perfil()
    {
        // Usuario autenticado
        $usuario = Auth::guard('empleado')->user(); 
        // Si usas el guard por defecto: Auth::user()

        // Relación con empleado
        $empleado = $usuario->empleado;

        // Ejemplo: traer trabajos completados desde relación
        $trabajosCompletados = $empleado ? $empleado->contratos()->where('idEstatus', 1)->count() : 0;

        // Ejemplo: tasa de éxito
        $totalTrabajos = $empleado ? $empleado->contratos()->count() : 0;
        $tasaExito = $totalTrabajos > 0 ? round(($trabajosCompletados / $totalTrabajos) * 100) . '%' : '0%';

        // Habilidades desde relación
        $habilidades = $empleado ? $empleado->habilidades()->pluck('nombre')->toArray() : [];

        return view('Empleado.perfilempleado', compact(
            'usuario',
            'trabajosCompletados',
            'tasaExito',
            'habilidades'
        ));
    }
}

