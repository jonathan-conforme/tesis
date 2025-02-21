<?php
namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function showInicio()
{
    $images = Image::all(); // Obtener todas las imágenes almacenadas
    return view('index', compact('images'));
}

    public function index()
    {
        $images = Image::all(); // Obtener todas las imágenes almacenadas
        return view('image.index', compact('images'));
    }

    public function store(Request $request)
    {
        // Validación de la imagen
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        // Subir la imagen
        $imagePath = $request->file('image')->store('images', 'public');

        // Guardar la ruta de la imagen en la base de datos
        Image::create(['image_path' => $imagePath]);

        return redirect()->route('images.index')->with('success', 'Imagen agregada exitosamente.');
        
    }

    public function destroy($id)
    {
        // Buscar la imagen
        $image = Image::findOrFail($id);

        // Eliminar la imagen del almacenamiento
        Storage::disk('public')->delete($image->image_path);

        // Eliminar la imagen de la base de datos
        $image->delete();

        return redirect()->route('images.index')->with('success', 'Imagen eliminada exitosamente.');
    }
}
