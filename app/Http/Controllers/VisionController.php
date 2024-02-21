<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function bannerData()
    {
        $datosTexto = Vision::all();
        return response()->json($datosTexto);
    }

    public function bannerDataNew()
    {
        $datosBanner = Vision::oldest()->take(1)->get();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
        ]);

        // Create a new banner instance
        $texto = new Vision();
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

        $texto = Vision::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }



    public function eliminarBanner(Request $request)
    {
        $texto = Vision::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
