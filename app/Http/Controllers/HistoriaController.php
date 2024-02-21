<?php

namespace App\Http\Controllers;

use App\Models\Historia;
use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    public function bannerData()
    {
        $datosTexto = Historia::all();
        return response()->json($datosTexto);
    }

    public function bannerDataNew()
    {
        $datosBanner = Historia::oldest()->take(1)->get();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
        ]);

        // Create a new banner instance
        $texto = new Historia();
        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text registered successfully');
    }

    public function editarBanner(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
        ]);

        $texto = Historia::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }



    public function eliminarBanner(Request $request)
    {
        $texto = Historia::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
