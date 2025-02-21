<?php
namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecursoController extends Controller
{
    public function index()
    {
        $recursos = Recurso::all(); // Obtener todos los recursos
        // Comprobar el rol del usuario autenticado
        if (Auth::user()->role === 'admin') {
            return view('recurso.create', compact('recursos')); // Vista para administradores
        } else {
            return view('recurso.index', compact('recursos')); // Vista para estudiantes
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'archivo' => 'required|file|mimes:pdf,doc,docx,pptx,ppt',
        ]);

        $path = $request->file('archivo')->store('recursos', 'public');

        Recurso::create([
            'user_id' => Auth::id(),
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'],
            'archivo' => $path,
        ]);

        return redirect()->route('recurso')->with('success', 'Recurso subido con éxito');
    }

    public function edit($id)
    {
        $recurso = Recurso::findOrFail($id);
        return view('recurso.edit', compact('recurso'));
    }

    public function update(Request $request, $id)
    {
        $recurso = Recurso::findOrFail($id);
        $recurso->update($request->only(['titulo', 'descripcion']));
        return redirect()->route('recurso.index')->with('success', 'Recurso actualizado con éxito');
    }
    public function create()
    {
        $recursos = Recurso::all(); // Obtener todos los recursos
        return view('recurso.create', compact('recursos')); // Enviar los recursos a la vista
    }
    
    public function destroy($id)
    {
        $recurso = Recurso::findOrFail($id);
        $recurso->delete();
        return redirect()->route('recurso')->with('success', 'Recurso eliminado con éxito');
    }
}
