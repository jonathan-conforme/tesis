<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first(); // Obtiene el primer registro
        return view('settings.edit', compact('setting'));
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'canton_name' => 'required|string|max:30',
            'date' => 'required|date',
            'youtube_video_1' => 'nullable|url',
            'youtube_video_2' => 'nullable|url',
            'page_title' => 'string|max:40',
            'page_subtitle' => '|string|max:80',
        ]);

         // Obtiene el registro (crea uno nuevo si no existe)
         $setting = Setting::firstOrNew([]);
        
         // Asigna los valores enviados desde el formulario
         $setting->canton_name = $request->input('canton_name');
         $setting->date = $request->input('date');
         $setting->youtube_video_1 = $request->input('youtube_video_1');
$setting->youtube_video_2 = $request->input('youtube_video_2');
$setting->page_title = $request->input('page_title'); // Nuevo campo
$setting->page_subtitle = $request->input('page_subtitle'); // Nuevo campo
         // Guarda los datos en la base de datos
         $setting->save();
        return redirect()->back()->with('success', 'Configuración actualizada correctamente.');
    }
    public function index()
{
    $setting = Setting::first();
    return view('index', compact('setting'));
}
}
