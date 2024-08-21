<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ColacionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ComentarioDeComentarioController;
use App\Http\Controllers\DietaController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ForoController;
use App\Http\Controllers\TipoEjercicioController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\ComentarioDeComentarioController as AdminComentarioDeComentarioController;
use App\Http\Controllers\RangoController;
use App\Http\Controllers\UsuarioDietaController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'check.role'])->name('dashboard');

Route::post('/dietas', [DietaController::class, 'store'])->name('admin.dietas.store');

// Ruta para mostrar la lista de dietas
Route::get('/dietas', [DietasController::class, 'index'])->name('dietas.index');

// Ruta para mostrar el formulario para crear una nueva dieta
Route::get('/dietas/create', [DietasController::class, 'create'])->name('dietas.create');

// Ruta para almacenar una nueva dieta
Route::post('/dietas', [DietasController::class, 'store'])->name('dietas.store');

// Ruta para mostrar el formulario para editar una dieta existente
Route::get('/dietas/{id}/edit', [DietasController::class, 'edit'])->name('dietas.edit');

// Ruta para actualizar una dieta existente
Route::put('/dietas/{id}', [DietasController::class, 'update'])->name('dietas.update');

// Ruta para eliminar una dieta
Route::delete('/dietas/{id}', [DietasController::class, 'destroy'])->name('dietas.destroy');

// Ruta para mostrar las colaciones de una dieta específica
Route::get('/dietas/{id}/colaciones', [DietasController::class, 'colaciones'])->name('dietas.colaciones');
Route::get('/admin/dietas/{id}/eliminar', [DietaController::class, 'destroy'])->name('admin.dietas.destroy');
Route::get('/admin/dietas/{id}/ver', [DietaController::class, 'show'])->name('admin.dietas.show');
Route::get('/admin/colaciones/{id}/ver', [ColacionController::class, 'show'])->name('admin.colaciones.show');
Route::get('/admin/ejercicios/create', [EjercicioController::class, 'create'])->name('admin.ejercicios.create');

// Ruta para mostrar todas las publicaciones
Route::get('/posts', [PostController::class, 'index'])->name('usuarios.posts.index');

// Ruta para mostrar una publicación específica con sus comentarios
Route::get('/posts/{id}', [PostController::class, 'show'])->name('usuarios.posts.show');

// Ruta para manejar la creación de una nueva publicación
Route::post('/posts', [PostController::class, 'store'])->name('usuarios.posts.store');

// Ruta para manejar la creación de un comentario en una publicación
Route::post('/posts/{id}/comment', [CommentController::class, 'store'])->name('usuarios.comments.store');

// Ruta para manejar la creación de un comentario a un comentario
Route::post('/comments/{id}/reply', [CommentController::class, 'storeReply'])->name('usuarios.comments.reply.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('usuarios/ejercicios/{id_tipo?}', [EjercicioController::class, 'indexUsuarios'])->name('usuarios.ejercicios.indexUsuarios');
    Route::get('usuarios/ejercicio/{id}', [EjercicioController::class, 'showExercise'])->name('usuarios.ejercicios.show');



    Route::get('/usuarios/dietas', [UsuarioDietaController::class, 'index'])->name('usuarios.dietas.index');
    Route::get('/usuarios/dietas?rango_id={id}', [UsuarioDietaController::class, 'index'])->name('usuarios.dietas.indexSelect');
    Route::get('/usuarios/dietas/{id}', [UsuarioDietaController::class, 'show'])->name('usuarios.dietas.show');


Route::get('/usuarios/foro', [ForoController::class, 'index'])->name('usuarios.foro.index');

    // Rutas para el panel de administración
    Route::middleware('admin')->group(function () {

        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->middleware(['auth', 'verified'])->name('admin.dashboard');
        // Ruta para ver la lista de dietas
        Route::get('/admin/dietas', [DietaController::class, 'index'])->name('admin.dietas.index');
        // Ruta para crear una nueva dieta
        Route::get('/admin/dietas/create', [DietaController::class, 'create'])->name('admin.dietas.create');
        // Ruta para almacenar una nueva dieta
        Route::post('/admin/dietas', [DietaController::class, 'store'])->name('admin.dietas.store');
        // Ruta para mostrar el formulario para editar una dieta existente
        Route::get('/admin/dietas/{id}/edit', [DietasController::class, 'edit'])->name('admin.dietas.edit');
        // Ruta para actualizar una dieta existente
        Route::put('/admin/dietas/{id}', [DietasController::class, 'update'])->name('admin.dietas.update');
        // Ruta para eliminar una dieta
      //  Route::delete('/admin/dietas/{id}', [DietasController::class, 'destroy'])->name('admin.dietas.destroy');
        // Ruta para mostrar las colaciones de una dieta específica
        Route::get('/admin/colaciones', [ColacionController::class, 'index'])->name('admin.colaciones.index');
        Route::get('/admin/ingredientes', [IngredienteController::class, 'index'])->name('admin.ingredientes.index');
        // Ruta para crear una nueva dieta

        

        // Rutas para ejercicios
        Route::get('/admin/ejercicios/{id_tipo?}', [EjercicioController::class, 'index'])->name('admin.ejercicios.index');
        Route::get('/admin/ejercicios/create', [EjercicioController::class, 'create'])->name('admin.ejercicios.create');
        Route::post('/admin/ejercicios', [EjercicioController::class, 'store'])->name('admin.ejercicios.store');
        Route::get('/admin/ejercicios/{ejercicio}/edit', [EjercicioController::class, 'edit'])->name('admin.ejercicios.edit');
        Route::put('/admin/ejercicios/{ejercicio}', [EjercicioController::class, 'update'])->name('admin.ejercicios.update');
        Route::delete('/admin/ejercicios/{ejercicio}', [EjercicioController::class, 'destroy'])->name('admin.ejercicios.destroy');

        //Rutas para los tipos de ejercicio
        Route::get('/admin/tipo-ejercicio', [TipoEjercicioController::class, 'index'])->name('admin.tipo-ejercicio.index');
        Route::get('/admin/tipo-ejercicio/create', [TipoEjercicioController::class, 'create'])->name('admin.tipo-ejercicio.create');
        Route::post('/admin/tipo-ejercicio', [TipoEjercicioController::class, 'store'])->name('admin.tipo-ejercicio.store');
        Route::get('/admin/tipo-ejercicio/{id_tipo}/edit', [TipoEjercicioController::class, 'edit'])->name('admin.tipo-ejercicio.edit');
        Route::put('/admin/tipo-ejercicio/{id_tipo}', [TipoEjercicioController::class, 'update'])->name('admin.tipo-ejercicio.update');
        Route::delete('/admin/tipo-ejercicio/{id_tipo}', [TipoEjercicioController::class, 'destroy'])->name('admin.tipo-ejercicio.destroy');



        Route::get('/admin/colaciones', [ColacionController::class, 'index'])->name('admin.colaciones.index');
        Route::get('colaciones/{id}/edit', [ColacionController::class, 'edit'])->name('admin.colaciones.edit');
        Route::put('colaciones/{id}', [ColacionController::class, 'update'])->name('admin.colaciones.update');
    
        Route::resource('colaciones', ColacionController::class);


        Route::get('/admin/publicaciones', [PublicacionController::class, 'index'])->name('admin.publicaciones.index');
        Route::get('/admin/ingredientes', [IngredienteController::class, 'index'])->name('admin.ingredientes.index');
        Route::get('/admin/comentarios', [ComentarioController::class, 'index'])->name('admin.comentarios.index');
        Route::get('/admin/comentarios-comentarios', [ComentarioDeComentarioController::class, 'index'])->name('admin.comentarios-comentarios.index');


        Route::get('/admin/publicaciones', [AdminPostController::class, 'index'])->name('admin.publicaciones.index');
        Route::get('/admin/publicaciones/{id}', [AdminPostController::class, 'show'])->name('admin.publicaciones.show');
        Route::delete('/admin/publicaciones/{id}', [AdminPostController::class, 'destroy'])->name('admin.publicaciones.destroy');

        // Rutas para la administración de comentarios
        Route::get('/admin/comentarios', [AdminCommentController::class, 'index'])->name('admin.comentarios.index');
        Route::get('/admin/comentarios/{id}', [AdminCommentController::class, 'show'])->name('admin.comentarios.show');
        Route::delete('/admin/comentarios/{id}', [AdminCommentController::class, 'destroy'])->name('admin.comentarios.destroy');

        // Rutas para la administración de respuestas a comentarios
        Route::get('/admin/respuestas', [AdminComentarioDeComentarioController::class, 'index'])->name('admin.respuestas.index');
        Route::delete('/admin/respuestas/{id}', [AdminComentarioDeComentarioController::class, 'destroy'])->name('admin.respuestas.destroy');
    
        // Rutas para la administración de rangos
        Route::get('/admin/rangos/create', [RangoController::class, 'create'])->name('admin.rangos.create');
        Route::post('/admin/rangos', [RangoController::class, 'store'])->name('admin.rangos.store');
        Route::get('/admin/rangos', [RangoController::class, 'index'])->name('admin.rangos.index');
        Route::delete('/admin/rangos/{id}', [RangoController::class, 'destroy'])->name('admin.rangos.destroy');
        Route::get('rangos/{id}/edit', [RangoController::class, 'edit'])->name('admin.rangos.edit');
        Route::put('rangos/{id}', [RangoController::class, 'update'])->name('admin.rangos.update');

            //Usuario dieta 
   




    });
});

require __DIR__.'/auth.php';
