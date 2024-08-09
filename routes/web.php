<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ColacionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ComentarioDeComentarioController;
use App\Http\Controllers\DietaController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\TipoEjercicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/dietas', [DietaController::class, 'store'])->name('admin.dietas.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para el panel de administración
    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        // Ruta para ver la lista de dietas
        Route::get('/admin/dietas', [DietaController::class, 'index'])->name('admin.dietas.index');
        // Ruta para crear una nueva dieta
        Route::get('/admin/dietas/create', [DietaController::class, 'create'])->name('admin.dietas.create');
        // Ruta para almacenar una nueva dieta
        Route::post('/admin/dietas', [DietaController::class, 'store'])->name('admin.dietas.store');
        Route::get('/admin/ejercicios', [EjercicioController::class, 'index'])->name('admin.ejercicios.index');
        Route::get('/admin/tipo-ejercicio', [TipoEjercicioController::class, 'index'])->name('admin.tipo-ejercicio.index');
        Route::get('/admin/colaciones', [ColacionController::class, 'index'])->name('admin.colaciones.index');
        Route::get('/admin/publicaciones', [PublicacionController::class, 'index'])->name('admin.publicaciones.index');
        Route::get('/admin/ingredientes', [IngredienteController::class, 'index'])->name('admin.ingredientes.index');
        Route::get('/admin/comentarios', [ComentarioController::class, 'index'])->name('admin.comentarios.index');
        Route::get('/admin/comentarios-comentarios', [ComentarioDeComentarioController::class, 'index'])->name('admin.comentarios-comentarios.index');
    });
});

require __DIR__.'/auth.php';
