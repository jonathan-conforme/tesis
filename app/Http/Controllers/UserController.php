<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller

{
    public function index(Request $request)
    {
        if (auth()->user()->role != 1) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
        $query = User::query(); // No mostrar el usuario administrador

        // Si se envía un término de búsqueda
        if ($request->filled('search')) {
            $query->where('email', 'like', '%' . $request->search . '%');
        }
    
        $users = $query->paginate(10)->withQueryString();
        return view('usuarios.index', compact('users'));
    }


public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        'role' => ['required', 'integer'],
    ]);

    $user->update($request->only('name', 'email', 'role'));

    return redirect()->route('usuarios.index', ['page' => $request->input('page')])
    ->with('success', 'Usuario actualizado correctamente.');
}

public function destroy(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('usuarios.index', ['page' => $request->input('page')])
    ->with('success', 'Usuario eliminado correctamente.');

}
public function resetPassword(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->password = Hash::make('123456789'); // Contraseña predeterminada
    $user->save();

    return redirect()->route('usuarios.index', ['page' => $request->input('page')])
    ->with('success', 'Contraseña restablecida correctamente.');
}

}
