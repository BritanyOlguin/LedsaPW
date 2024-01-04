<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    public function bannerData()
    {
        $datosBanner = Productos::all();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
            'pdf' => 'required|mimes:pdf|max:1000000',
        ]);

        $date = date('Y-m-d H-i-s');
        //obtener el nombre de la imagen
        $fotoName = $date . '_' . $request->file('foto')->getClientOriginalName();
        //guardar la imagen public storage
        $fotoPath = $request->file('foto')->storeAs('public', $fotoName);

        
        $pdfName = time() . '_' . $request->file('pdf')->getClientOriginalName();
        $pdfPath = $request->file('pdf')->storeAs('public/pdfs', $pdfName);

        $banner = new Productos();
        $banner->nombre = $request->nombre;
        $banner->contenido = $request->contenido;
        $banner->imagen = $fotoName;
        $banner->pdf = $pdfName;
        $banner->save();

        return response()->json('Banner registrado exitosamente');
    }

    public function editarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
            'pdf' => 'mimes:pdf|max:1000000',
        ]);

        $banner = Productos::find($request->id);

        // Procesar imagen
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

        // Procesar PDF
        if ($request->hasFile('pdf')) {
            // Guardar el nuevo PDF y actualizar el nombre en la base de datos
            $pdfName = time() . '_' . $request->file('pdf')->getClientOriginalName();
            $pdfPath = $request->file('pdf')->storeAs('public/pdfs', $pdfName);

            // Eliminar el PDF anterior del servidor
            if ($banner->pdf) {
                Storage::delete('public/pdfs/' . $banner->pdf);
            }

            $banner->pdf = $pdfName;
        }

        $banner->nombre = $request->nombre;
        $banner->contenido = $request->contenido;
        $banner->save();
        return response()->json('Banner editado exitosamente');
    }

    public function eliminarBanner(Request $request)
    {
        $banner = Productos::find($request->id);

        // Eliminar imagen y PDF
        Storage::delete('public/' . $banner->imagen);
        Storage::delete('public/pdfs/' . $banner->pdf);

        $banner->delete();
        return response()->json('Banner eliminado exitosamente');
    }
}
