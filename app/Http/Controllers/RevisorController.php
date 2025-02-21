<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\profesor;
use App\Models\Ponencia; // Asegúrate de tener un modelo de Ponencia
use Illuminate\Support\Facades\Auth;
class RevisorController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:users,email',
            'tematica' => 'required|string|max:255',
            'correo.unique' => 'El correo ingresado ya está registrado.', // Mensaje personalizado
        
        ]);
        
            

        // Crear el usuario (revisor)
        $user = User::create([
            'name' => $request->nombre . ' ' . $request->apellido,
            'email' => $request->correo,
            'password' => bcrypt('password'), // Contraseña temporal
            'role' => 2, // Asigna el rol de profesor/revisor
        ]);
       
        // Crear el registro en la tabla de profesores
        Profesor::create([
            'user_id' => $user->id,
            'tematica' => $request->tematica,
        ]);

        return redirect()->route('agg_revisor')->with('success', 'Revisor agregado exitosamente.');
    }
    public function index()
    {
        
        $profesores = Profesor::with('user')->get(); // Cargar los usuarios relacionados
        
        $profesores = Profesor::all(); // Obtener todos los profesores
        return view('agg_revisor.create', compact('profesores')); // Retornar la vista con los datos
    }
    public function edit($id)
    {
        $profesor = Profesor::findOrFail($id); // Encuentra el profesor/revisor por su ID
        return view('revisor.edit', compact('profesor')); // Muestra la vista de edición
    }
    public function update(Request $request, $id)
{
    $profesor = Profesor::findOrFail($id);

    $request->validate([
        'nombre' => 'required|string|max:255',
        
        'correo' => 'required|email|unique:users,email,' . $profesor->user_id, // Ignorar correo existente del usuario actual
        'tematica' => 'required|string|max:255',
    ]);

    // Actualizar los datos del usuario y profesor
    $profesor->user->update([
        'name' => $request->nombre . ' ' . $request->apellido,
        'email' => $request->correo,
    ]);

    $profesor->update([
        'tematica' => $request->tematica,
    ]);

    return redirect()->route('agg_revisor')->with('success', 'Revisor actualizado con éxito.');
}
public function destroy($id)
{
    $profesor = Profesor::findOrFail($id);
    $profesor->user->delete(); // Elimina el usuario relacionado
    $profesor->delete(); // Elimina el revisor

    return redirect()->route('revisor.index')->with('success', 'Revisor eliminado con éxito.');
}
public function dashboard()

{
    // Obtener el profesor autenticado
    $profesor = Profesor::where('user_id', Auth::id())->first();

    // Validar que el profesor exista
    if (!$profesor) {
        abort(403, 'Acceso no autorizado.');
    }
    $ponencias = Ponencia::where('tematica', $profesor->tematica)
    ->paginate(20)
    ->onEachSide(2);
    // Retornar la vista con las ponencias asignadas
   
    return view('profesor.index', compact('ponencias'));
    
}

}

