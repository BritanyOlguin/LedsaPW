<?php

namespace App\Http\Controllers;

use App\Models\nosotros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NosotrosController extends Controller
{
    public function bannerData()
    {
        $datosBanner = Nosotros::all();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
        ]);

        $date = date('Y-m-d H-i-s');
        //obtener el nombre de la imagen
        $fotoName = $date . '_' . $request->file('foto')->getClientOriginalName();
        //guardar la imagen public storage
        $fotoPath = $request->file('foto')->storeAs('public', $fotoName);

        // Create a new banner instance
        $banner = new Nosotros;
        $banner->nombre = $request->nombre;
        $banner->contenido = $request->contenido;
        $banner->imagen = $fotoName;
        $banner->save();

        return response()->json('Banner registered successfully');
    }

    public function editarBanner(Request $request)
    {


        $request->validate([
            'nombre' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
        ]);

        $banner =Nosotros::find($request->id);


        if ($request->hasFile('foto')) {

            $date = date('Y-m-d H-i-s');
            //obtener el nombre de la imagen
            $fotoName = $date . '_' . $request->file('foto')->getClientOriginalName();

            //guardar en public en carpeta img, con el nombre de la imagen de fotoName
            $fotoPath = $request->file('foto')->storeAs('public', $fotoName);

            // Luego, eliminar la imagen anterior
            if ($banner->imagen) {
                Storage::delete('public/' . $banner->imagen);
            }

            $banner->imagen = $fotoName;
        }

        $banner->nombre = $request->nombre;
        $banner->contenido = $request->contenido;
        $banner->save();

        return response()->json('Banner edited successfully');
    }

    public function eliminarBanner(Request $request)
    {
        $banner = Nosotros::find($request->id);
        //eliminar la imagen del storage
        Storage::delete('public/' . $banner->imagen);
        $banner->delete();

        return response()->json('Banner deleted successfully');
    }
}
