<?php

namespace App\Http\Controllers;

use App\Models\contactos;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
    public function bannerData()
    {
        $datosTexto = Contactos::with('departamento')->get();
        return response()->json($datosTexto);
    }

    public function indexId($id)
    {
        $contacto = Contactos::with('departamento')->find($id);

        if (!$contacto) {
            return response()->json(['mensaje' => 'Registro no encontrado'], 404);
        }

        return response()->json($contacto);
    }

    public function indexDatafilter()
    {
        $datosTexto = Contactos::with('departamento')->where('estado', 1)->get();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
            'departamento_id' => 'required|integer',
        ]);

        // Create a new banner instance
        $contacto = new Contactos();
        $contacto->titulo = $request->titulo;
        $contacto->contenido = $request->contenido;
        $contacto->departamento_id = $request->departamento_id; // Asegúrate de que este ID exista en la tabla departamentos
        $contacto->save();

        return response()->json('Number registered successfully');
    }

    public function editarBanner(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
            'departamento_id' => 'required|integer',
        ]);

        $contacto = Contactos::find($request->id);

        $contacto->titulo = $request->titulo;
        $contacto->contenido = $request->contenido;
        $contacto->departamento_id = $request->departamento_id; // Asegúrate de que este ID exista en la tabla departamentoscontacto
        $contacto->save();

        return response()->json('Number edited successfully');
    }



    public function eliminarBanner(Request $request)
    {
        $contacto = Contactos::find($request->id);
        $contacto->delete();

        return response()->json('Number deleted successfully');
    }

    public function bannerDatafilter()
    {
        $datosBanner = Contactos::where('estado', 1)->get();
        return response()->json($datosBanner);
    }
}
