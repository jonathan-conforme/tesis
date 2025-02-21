<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    

    public function create()
    {
        return view('temas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tema_principal' => 'string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'canton' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'subtema' => 'required|string|max:255',
        ]);

        Tema::create($request->all());

        return redirect()->route('temas.index')->with('success', 'Tema creado correctamente.');
    }

    public function show(Tema $tema)
    {
        return view('temas.show', compact('tema'));
    }

    public function edit(Tema $tema)
    {
        return view('temas.edit', compact('tema'));
    }

    public function update(Request $request, Tema $tema)
    {
        $request->validate([
            'tema_principal' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'canton' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'subtema' => 'required|string|max:255',
        ]);

        $tema->update($request->all());

        return redirect()->route('temas.index')->with('success', 'Tema actualizado correctamente.');
    }

    public function destroy(Tema $tema)
    {
        $tema->delete();

        return redirect()->route('temas.index')->with('success', 'Tema eliminado correctamente.');
    }
}
