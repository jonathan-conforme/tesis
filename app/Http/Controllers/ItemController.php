<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
public function index()
{
    // Obtener todos los elementos
    $items = Item::all();
    
    // Verificar el rol del usuario y retornar la vista correspondiente
    if (Auth::user()->role === 'admin') {
        return view('items.index', compact('items')); // Vista para administradores
    } else {
        return view('items.items', compact('items')); // Vista para estudiantes
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
       
        return view('items.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'fecha' => 'required|date',
            
        ]);

        Item::create($request->all());
       
        return redirect()->route('items.create')->with('success', 'Recurso agregado exitosamente');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $item = Item::findOrFail($id);
    return response()->json($item); // Para devolverlo en AJAX si lo necesitas
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validar los datos
    $request->validate([
        'descripcion' => 'required|string|max:255',
        'fecha' => 'required|date',
    ]);

    // Buscar el item y actualizarlo
    $item = Item::findOrFail($id);
    $item->update([
        'descripcion' => $request->descripcion,
        'fecha' => $request->fecha,
    ]);

    // Redireccionar con mensaje de éxito
    return redirect()->back()->with('success', 'Item actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $items = item::findOrFail($id);
        $items->delete();
        
        return redirect()->route('items.create')->with('success', 'Recurso eliminado exitosamente');
    }
}
