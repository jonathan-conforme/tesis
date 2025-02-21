<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use App\Models\Cronograma;
use App\Models\Product;
use App\Models\Image;
use App\Models\Ponencia;
use App\Models\Item;
class TeamMemberController extends Controller
{
   
    
    public function index()
{
    $teamMembers = TeamMember::all();
    $cronogramas = Cronograma::all();
    $products = Product::all();
    $images = Image::all();
    $Ponencias = ponencia::all();
    $items = Item::all();
    // Obtener todas las imágenes almacenadas

    $setting = Setting::first();
    return view('index', compact('teamMembers', 'setting',  'cronogramas' ,'products', 'Ponencias', 'images' ));}

    
    public function create()
    {$teamMembers = TeamMember::all(); // Obtenemos todos los miembros del equipo
        return view('team-members.create', compact('teamMembers'));
       
    }

    // Guardar los datos en la base de datos
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'team' => 'required|string|max:255',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
            'details' => 'nullable|string',
        ]);

        // Manejo de imagen
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/team_members', 'public');
        } else {
            $imagePath = null;
        }

        // Guardar en la base de datos
        TeamMember::create([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'team' => $validated['team'],
            'twitter' => $validated['twitter'],
            'linkedin' => $validated['linkedin'],
           'bio' => $validated ['bio'],
        'details' => $validated ['details'],
            'image' => $imagePath,
        ]);


        
        return redirect()->route('team-members.create')->with('success', 'Miembro del equipo agregado con éxito.');
    }
    public function destroy($id)
{
    $member = TeamMember::findOrFail($id);
    
    // Eliminar imagen si existe
    if ($member->image && Storage::disk('public')->exists($member->image)) {
        Storage::disk('public')->delete($member->image);
    }
    
    $member->delete();

    return redirect()->route('team-members.create')->with('success', 'Miembro eliminado correctamente.');
}
public function edit($id)
{
    $member = TeamMember::findOrFail($id);
    return view('team-members.edit', compact('member'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'team' => 'required|string|max:255',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required|nullable|string',
        'details' => 'required|nullable|string',
    ]);

    $member = TeamMember::findOrFail($id);
    $member->name = $request->name;
    $member->role = $request->role;
    $member->team = $request->team;
    $member->twitter = $request->twitter;
    $member->linkedin = $request->linkedin;
    $member->bio = $request->bio;
    $member->details = $request->details;

    if ($request->hasFile('image')) {
        // Eliminar imagen previa
        if ($member->image && Storage::exists($member->image)) {
            Storage::delete($member->image);
        }
        $path = $request->file('image')->store('images/team_members');
        $member->image = $path;
    }

    $member->save();

    return redirect()->route('team-members.create')->with('success', 'Miembro actualizado correctamente.');
}



}
