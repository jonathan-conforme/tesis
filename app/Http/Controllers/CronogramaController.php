<?php

namespace App\Http\Controllers;

use App\Models\Cronograma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TeamMember;
class CronogramaController extends Controller
{
    public function create()
{
    $cronogramas = Cronograma::all(); // Obtener todos los cronogramas
    
    return view('cronogramas.create', compact('cronogramas')); // Pasar los cronogramas a la vista
}


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'tema_exposicion' => 'required|string|max:255',
            'lugar' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'dia' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes', // Validación de días de lunes a viernes
            'dia_numero' => 'required|integer|min:1|max:31', // Validación del número de día
            'mes' => 'required|in:Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre', // Validación del mes
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('cronogramas_fotos', 'public');
        }

        Cronograma::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'tema_exposicion' => $request->tema_exposicion,
            'lugar' => $request->lugar,
            'descripcion' => $request->descripcion,
            'dia' => $request->dia,
            'dia_numero' => $request->dia_numero,
            'mes' => $request->mes,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('cronogramas.create')->with('success', 'Cronograma creado exitosamente');
    }

    public function index()
    {
        $cronogramas = Cronograma::all();
       
        return view('index', compact('cronogramas'));
    }
    // Editar cronograma
public function edit($id)
{
    $cronograma = Cronograma::findOrFail($id);
    return view('cronogramas.edit', compact('cronograma'));
}
// Actualizar cronograma
public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'nullable|string|max:255',
        'apellido' => 'nullable|string|max:255',
        'tema_exposicion' => 'nullable|string|max:255',
        'lugar' => 'nullable|string|max:255',
        'descripcion' => 'nullable|string',
      'dia' => 'nullable|in:Lunes,Martes,Miércoles,Jueves,Viernes', // Validación de días de lunes a viernes
            'dia_numero' => 'nullable|integer|min:1|max:31', // Validación del número de día
            'mes' => 'nullable|in:Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre', // Validación del mes
              'hora_inicio' => 'nullable|date_format:H:i',
        'hora_fin' => 'nullable|date_format:H:i|after:hora_inicio',
       
    ]);

    $cronograma = Cronograma::findOrFail($id);
    $cronograma->update($request->all());

    $data = array_filter($request->only([
        'nombre', 'apellido', 'tema_exposicion', 'lugar', 
        'descripcion', 'dia', 'dia_numero', 'mes', 'hora_inicio', 'hora_fin'
    ]), function ($value) {
        return $value !== null;
    });
    
    $cronograma->update($data);
    
    
    return redirect()->route('cronogramas.create')->with('success', 'Cronograma actualizado correctamente');
}
// Eliminar cronograma
public function destroy($id)
{
    $cronograma = Cronograma::findOrFail($id);
    $cronograma->delete();
    return redirect()->route('cronogramas.create')->with('success', 'Cronograma eliminado correctamente');
}
}
