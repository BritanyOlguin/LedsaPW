<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracion;
class ConfiguracionController extends Controller
{
    public function guardar(Request $request)
    {
        $configuracion = Configuracion::firstOrCreate([]);
        $configuracion->update([
            'pagination' => $request->pagination,
            'startAutoPlay' => $request->startAutoPlay,
            'timeout' => $request->timeout,
        ]);

        return response()->json(['message' => 'Configuraciones guardadas con éxito']);
    }

    public function obtener()
    {
        // Aquí lógica para obtener las configuraciones
        $configuracion = Configuracion::first();

        return response()->json($configuracion);
    }
}
