<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Empleado;
use App\Models\Empleador;
use App\Models\Direccion;
use App\Models\Calle;
use App\Models\Colonia;
use App\Models\Municipio;
use App\Models\Estado;
use App\Models\Habilidad;
use App\Models\HabilidadesEmpleado;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class RegistroController extends Controller
{
    public function registrar(Request $request)
    {
        // Validación de campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,Correo',
            'telefono' => 'required|digits:10',
            'contrasena' => 'required|string|min:8',
            'codigo_postal' => 'required|digits:5',
            'estado' => 'required|string',
            'municipio' => 'required|string',
            'colonia' => 'required|string',
            'calle' => 'required|string',
            'numero_exterior' => 'required|string',
            'fotografia' => 'nullable|image|max:2048',
            'tipo_usuario' => 'required|in:empleado,empleador',
            'experiencia' => 'required_if:tipo_usuario,empleado|string',
            'descripcion' => 'required_if:tipo_usuario,empleador|string',
            'habilidades' => 'nullable|string', // será un JSON
        ]);

        DB::beginTransaction();

        try {
            // --- DIRECCIÓN ---
            // 1. Estado
            $estado = Estado::firstOrCreate(['nombre' => $request->estado]);

            // 2. Municipio
            $municipio = Municipio::firstOrCreate([
                'nombre' => $request->municipio,
                'idEstado' => $estado->id
            ]);

            // 3. Colonia
            $colonia = Colonia::firstOrCreate([
                'nombre' => $request->colonia,
                'idMunicipio' => $municipio->id,
                'CodigoPostal' => $request->codigo_postal
            ]);

            // 4. Calle
            $calle = Calle::firstOrCreate([
                'nombre' => $request->calle,
                'idColonia' => $colonia->id
            ]);

            // 5. Dirección
            $direccion = Direccion::create([
                'nombre' => $request->calle, 
                'idCalle' => $calle->id,
                'numInterior' => $request->numInterior,
                'numExterior' => $request->numExterior
            ]);

            // --- USUARIO ---
            $usuario = new Usuario();
            $usuario->Nombre = $request->nombre;
            $usuario->apellido_paterno = $request->apellido_paterno;
            $usuario->apellido_materno = $request->apellido_materno;
            $usuario->correo = $request->correo;
            $usuario->telefono = $request->telefono;
            $usuario->contrasena = Hash::make($request->contrasena);
            $usuario->fechainscripcion = Carbon::now();
            $usuario->idEstatus = 1; // asumimos "activo"
            $usuario->idUbicacion = $direccion->id;

            // Fotografía
            if ($request->hasFile('fotografia')) {
                $path = $request->file('fotografia')->store('public/fotografias');
                $usuario->Fotografía = basename($path);
            }

            $usuario->save();

            // --- EMPLEADO ---
            if ($request->tipo_usuario === 'empleado') {
                $empleado = new Empleado();
                $empleado->idUsuario = $usuario->id;
                $empleado->experiencia = $request->experiencia;
                $empleado->numTareas = 0;
                $empleado->save();

                // Habilidades
                if ($request->habilidades) {
                    $habilidadesArray = json_decode($request->habilidades, true);
                    foreach ($habilidadesArray as $nombreHabilidad) {
                        $habilidad = Habilidad::firstOrCreate(['nombre' => $nombre]);
                        HabilidadesEmpleado::create([
                            'idempleado' => $empleado->id,
                            'idhabilidad' => $habilidad->id
                        ]);
                    }
                }
            }

            // --- EMPLEADOR ---
            if ($request->tipo_usuario === 'empleador') {
                $empleador = new Empleador();
                $empleador->idUsuario = $usuario->id;
                $empleador->nombre = $request->nombre ?? $usuario->nombre;
                $empleador->descripcion = $request->descripcion;
                $empleador->numTareas = 0;
                $empleador->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Registro exitoso');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
