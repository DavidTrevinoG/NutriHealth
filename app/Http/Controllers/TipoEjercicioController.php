<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEjercicio;
use App\Models\Ejercicio; 
use Illuminate\Http\RedirectResponse;

class TipoEjercicioController extends Controller
{
    public function index()
    {
        // Obtener todos los tipos de ejercicio con paginación (opcional)
        $tiposEjercicio = TipoEjercicio::paginate(10); // Puedes ajustar la cantidad según tus necesidades

        // Pasar los datos a la vista
        return view('admin.tipo-ejercicio.index', compact('tiposEjercicio'));
    }

    
    public function create()
    {
        return view('admin.tipo-ejercicio.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre_tipo' => 'required|unique:tipo_ejercicio',
        ]);

        TipoEjercicio::create($request->all());

        return redirect()->route('admin.tipo-ejercicio.index')->with('success', 'Tipo de ejercicio creado correctamente.');
    }
   

    public function show(TipoEjercicio $tipoEjercicio)
    {
        return view('admin.tipo-ejercicio.show', compact('tipoEjercicio')); // Muestra los detalles del tipo de ejercicio
    }

   
    public function edit($id_tipo)
    {
        $tipoEjercicio = TipoEjercicio::findOrFail($id_tipo);
        return view('admin.tipo-ejercicio.edit', compact('tipoEjercicio'));
    }

    
    public function update(Request $request, TipoEjercicio $tipoEjercicio)
    {
        $request->validate([
            'nombre_tipo' => [
                'required',
                Rule::unique('tipo_ejercicio')->ignore($tipoEjercicio->id),
            ],
        ]);

        $tipoEjercicio->update($request->all());

        return redirect()->route('admin.tipo_ejercicios.index')->with('success', 'Tipo de ejercicio actualizado correctamente.');
    }

    
    public function destroy($id_tipo): RedirectResponse
    {
        // Encuentra el tipo de ejercicio por el ID
        $tipoEjercicio = TipoEjercicio::findOrFail($id_tipo);

        // Verifica si el tipo de ejercicio está asociado a algún ejercicio
        $isUsed = Ejercicio::where('id_tipo', $tipoEjercicio->id_tipo)->exists();

        if ($isUsed) {
            // Si está en uso, redirige con un mensaje de error
            return redirect()->route('admin.tipo-ejercicio.index')
                ->with('error', 'No se puede eliminar este tipo de ejercicio porque está siendo utilizado por uno o más ejercicios.');
        }

        // Si no está en uso, procede a eliminar
        $tipoEjercicio->delete();

        // Redirige con un mensaje de éxito solo si se eliminó correctamente
        return redirect()->route('admin.tipo-ejercicio.index')
            ->with('success', 'Tipo de ejercicio eliminado correctamente.');
    }



}
