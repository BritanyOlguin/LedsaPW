<?php

namespace App\Http\Controllers;

use App\Models\Valores;
use Illuminate\Http\Request;


class ValoresController extends Controller
{
    public function bannerData()
    {
        $datosBanner = Valores::all();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Create a new banner instance
        $banner = new Valores;
        $banner->nombre = $request->nombre;
        $banner->save();

        return response()->json('Banner registered successfully');
    }

    public function editarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $banner = Valores::find($request->id);

        $banner->nombre = $request->nombre;
        $banner->save();

        return response()->json('Banner edited successfully');
    }

    public function eliminarBanner(Request $request)
    {
        $banner = Valores::find($request->id);
        //eliminar la imagen del storage
        $banner->delete();

        return response()->json('Banner deleted successfully');
    }
}
