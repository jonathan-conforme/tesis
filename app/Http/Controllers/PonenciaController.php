<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ponencia; // Asumiendo que tienes un modelo Ponencia
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PonenciaController extends Controller
{

    public function index()
{
    $ponencias = Ponencia::where('user_id', auth()->id())->get()->map(function ($ponencia) {
        $fechaEntrega  = null; // Inicializa la variable
        $ponencia->puedeReemplazar($fechaEntrega ); // Llama al método y pasa la variable por referencia
        $ponencia->fecha_entrega = $fechaEntrega ; // Asigna el tiempo restante
        return $ponencia;
    });
   
    
    return view('ponencia.create', compact('ponencias'));
}

    public function create()
    {

        return view('ponencia.create');
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'archivo' => 'required|file|mimes:pdf,doc,docx', // Aceptar archivos PDF o DOCX
            'imagen_pago' => 'required|file|mimes:jpeg,png,jpg|max:2048', // Aceptar archivos JPEG o PNG
            'tematica' => 'required|string|max:255',
            'correo' => 'required|email|unique:ponencias,correo',
            'telefono' => 'required|numeric',
            'universidad' => 'required|string|max:255',
            'modo_participacion' => 'required|string|max:255',

        ]);

        // Guardar el archivo de la ponencia
        $path = $request->file('archivo')->store('ponencias', 'public');
        $pathImagenPago = $request->file('imagen_pago')->store('pagos', 'public');
        // Crear la ponencia
        Ponencia::create([
            'user_id' => Auth::id(),
            'titulo' => $validated['titulo'],
            'autor' => $validated['autor'],
            'descripcion' => $validated['descripcion'],
            'archivo' => $path,
            'tematica' => $validated['tematica'],
            'imagen_pago' => $pathImagenPago,
        'correo' => $validated['correo'],
        'telefono' => $validated['telefono'],
        'universidad' => $validated['universidad'],
        'modo_participacion' => $validated['modo_participacion'],
        ]);

        return redirect()->route('ponencia')->with('success', 'Ponencia enviada con éxito');
    }
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'estado' => 'required|in:pendiente,aceptado,rechazado',
            'observaciones' => 'nullable|string',
        ]);
        $ponencia = Ponencia::findOrFail($id);

        // Actualiza el estado y las observaciones
        $ponencia->update([
            'estado' => $request->input('estado'),
            'observaciones' => $request->input('observaciones'),
        ]);
         // Captura la página actual de la solicitud
    $page = $request->input('page', 1); // Por defecto, redirige a la página 1 si no se proporciona

    
        $ponencia = Ponencia::findOrFail($id);
        $ponencia->estado = $request->estado;
        $ponencia->observaciones = $request->observaciones; // Guardar observaciones
        $ponencia->save();
         // Redirigir a la página de ponencias con un mensaje de éxito
  // Redirige de vuelta a la misma página
  return redirect()->route('profesor', ['page' => $page])
  ->with('success', 'Ponencia revisada con éxito.');

    }
    public function showPonencias()
    {

        return view('profesor', compact('ponencias'));
    }
    public function showPonencia($id)
    {
        
        $ponencia = Ponencia::Ponencia::all(); 
        return view('profesor', compact('ponencia'));
    }
    public function destroy($id)
    {
        $ponencia = Ponencia::findOrFail($id);

        // Opcional: Elimina el archivo asociado del almacenamiento
        if ($ponencia->archivo) {
            \Storage::disk('public')->delete($ponencia->archivo);
        }

        // Elimina la ponencia
        $ponencia->delete();

        return redirect()->back()->with('success', 'Ponencia eliminada correctamente.');
    }
    public function updateArchivo(Request $request, $id)
{
    $ponencia = Ponencia::findOrFail($id);

    // Validar que la ponencia esté rechazada
    if ($ponencia->estado !== 'rechazado') {
        return redirect()->back()->with('error', 'No puedes reemplazar el archivo de esta ponencia.');
    }

    // Validar el tiempo permitido para reemplazar el archivo
    if (!$ponencia->puedeReemplazar()) {
        return redirect()->back()->with('error', 'El tiempo para reemplazar el archivo ha expirado.');
    }

    // Validar el nuevo archivo
    $request->validate([
        'archivo' => 'required|file|mimes:pdf,doc,docx|',
    ]);

    // Eliminar el archivo anterior si existe
    if ($ponencia->archivo) {
        \Storage::disk('public')->delete($ponencia->archivo);
    }

    // Subir el nuevo archivo
    $nuevoArchivo = $request->file('archivo')->store('ponencias', 'public');
    $ponencia->archivo = $nuevoArchivo;

    // Cambiar el estado a "pendiente" para que sea revisado de nuevo
    $ponencia->observaciones = 'Archivo subido nuevamente con correcciones.';
    $ponencia->estado = 'pendiente';
    $ponencia->save();

    return redirect()->back()->with('success', 'El archivo fue reemplazado exitosamente.');
}
public function showAceptadas(Request $request)
{
    $search = $request->input('search');

    $ponencias = Ponencia::where('estado', 'aceptado')
        ->where(function($query) use ($search) {
            $query->where('titulo', 'like', "%$search%")
                  ->orWhere('autor', 'like', "%$search%")
                  ->orWhere('tematica', 'like', "%$search%");
        })
        ->paginate(30);
    // Pasar las ponencias a la vista
    return view('ponencia.aceptadas', compact('ponencias'));
}


}
