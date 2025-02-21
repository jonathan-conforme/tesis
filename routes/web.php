<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PonenciaController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;

// Página principal (accesible para todos)


Route::get('/', [TeamMemberController::class, 'index'])->name('index');


// Página de ponencias
Route::get('/ponencias/aceptadas', [PonenciaController::class, 'showAceptadas'])->name('ponencias.aceptadas');

// Rutas de autenticación
require __DIR__ . '/auth.php';

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para estudiantes
    Route::middleware('estudiante')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('/ponencia', [PonenciaController::class, 'index'])->name('ponencia'); // Ruta para ver ponencias
        Route::resource('ponencias', PonenciaController::class)->only(['index', 'create', 'store']);
        Route::put('/ponencias/{id}/archivo', [PonenciaController::class, 'updateArchivo'])->name('ponencias.updateArchivo');
        Route::resource('recursos', RecursoController::class);
        Route::post('/ponencia', [PonenciaController::class, 'store'])->name('ponencias.store');
        
        
    });
    Route::resource('items', ItemController::class);
    // Rutas para administradores
    Route::middleware('admin')->group(function () {
        Route::get('/admin', function () {
            return view('admin');
        })->name('admin');

        Route::resource('revisor', RevisorController::class);
        Route::get('/agg_revisor', [RevisorController::class, 'index'])->name('agg_revisor');
        Route::resource('recurso', RecursoController::class);
        Route::get('/recurso', [RecursoController::class, 'create'])->name('recurso');
        Route::resource('cronogramas', CronogramaController::class);
        Route::resource('products', ProductController::class);
        Route::resource('images', ImageController::class);
        
        Route::resource('team-members', TeamMemberController::class);

        Route::get('settings', [SettingController::class, 'edit'])->name('admin.settings.edit');
        Route::post('settings', [SettingController::class, 'update'])->name('admin.settings.update');

        Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
        Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
        Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
        Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
        Route::post('/usuarios/{id}/reset-password', [UserController::class, 'resetPassword'])->name('usuarios.reset_password');
    });

    // Rutas para profesores
    Route::middleware('profesor')->group(function () {
        Route::get('/profesor', [RevisorController::class, 'dashboard'])->name('profesor');
        Route::resource('ponencias', PonenciaController::class);
        Route::put('/ponencias/{id}', [PonenciaController::class, 'update'])->name('ponencia.update');
        Route::delete('/ponencias/{id}', [PonenciaController::class, 'destroy'])->name('ponencia.destroy');
        
    });
});