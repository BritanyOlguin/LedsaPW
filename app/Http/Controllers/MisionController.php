<?php

namespace App\Http\Controllers;

use App\Models\Mision;
use Illuminate\Http\Request;

class MisionController extends Controller
{
    public function bannerData()
    {
        $datosTexto = Mision::all();
        return response()->json($datosTexto);
    }

    public function bannerDataNew()
    {
        $datosBanner = Mision::oldest()->take(1)->get();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
        ]);

        // Create a new banner instance
        $texto = new Mision();
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

        $texto = Mision::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }



    public function eliminarBanner(Request $request)
    {
        $texto = Mision::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
