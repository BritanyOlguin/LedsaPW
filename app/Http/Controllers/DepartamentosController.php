<?php

namespace App\Http\Controllers;

use App\Models\departamentos;
use Illuminate\Http\Request;
use App\Models\Contactos;

class DepartamentosController extends Controller
{
    public function bannerData()
    {
        $departamentos = Departamentos::all();
        return response()->json($departamentos);
    }

    public function registrarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        $departamento = new Departamentos;
        $departamento->nombre = $request->nombre;
        $departamento->save();

        return response()->json('Departamento added successfully');
    }

    public function editarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        $departamento = Departamentos::find($request->id);
        $departamento->nombre = $request->nombre;
        $departamento->save();

        return response()->json('Departamento updated successfully');
    }

    public function eliminarBanner(Request $request)
    {
        $departamento = Departamentos::find($request->id);
        $departamento->delete();

        return response()->json('Departamento deleted successfully');
    }
}
