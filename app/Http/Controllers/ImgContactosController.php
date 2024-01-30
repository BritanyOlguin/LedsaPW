<?php

namespace App\Http\Controllers;

use App\Models\imgContactos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImgContactosController extends Controller
{
    public function bannerData()
    {
        $datosBanner = ImgContactos::all();
        return response()->json($datosBanner);
    }

    public function bannerDataNew()
    {
        $datosBanner = ImgContactos::oldest()->take(1)->get();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
        ]);

        $date = date('Y-m-d H-i-s');
        //obtener el nombre de la imagen
        $fotoName = $date . '_' . $request->file('foto')->getClientOriginalName();
        //guardar la imagen public storage
        $fotoPath = $request->file('foto')->storeAs('public', $fotoName);

        // Create a new banner instance
        $banner = new ImgContactos;
        $banner->nombre = $request->nombre;
        $banner->contenido = $request->contenido;
        $banner->foto = $fotoName;
        $banner->save();

        return response()->json('Banner registered successfully');
    }

    public function editarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
        ]);

        $banner = ImgContactos::find($request->id);


        if ($request->hasFile('foto')) {

            $date = date('Y-m-d H-i-s');
            //obtener el nombre de la imagen
            $fotoName = $date . '_' . $request->file('foto')->getClientOriginalName();

            //guardar en public en carpeta img, con el nombre de la imagen de fotoName
            $fotoPath = $request->file('foto')->storeAs('public', $fotoName);

            // Luego, eliminar la imagen anterior
            if ($banner->foto) {
                Storage::delete('public/' . $banner->foto);
            }

            $banner->foto = $fotoName;
        }

        $banner->nombre = $request->nombre;
        $banner->contenido = $request->contenido;
        $banner->save();

        return response()->json('Banner edited successfully');
    }

    public function eliminarBanner(Request $request)
    {
        $banner = ImgContactos::find($request->id);
        //eliminar la imagen del storage
        Storage::delete('public/' . $banner->foto);
        $banner->delete();

        return response()->json('Banner deleted successfully');
    }
}
