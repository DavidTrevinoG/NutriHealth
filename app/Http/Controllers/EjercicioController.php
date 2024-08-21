<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use App\Models\TipoEjercicio;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class EjercicioController extends Controller
{
    public function index($id_tipo = null): View
    {
        if ($id_tipo) {
            $ejercicios = Ejercicio::where('id_tipo', $id_tipo)->paginate(10); // Cambia 10 por el número de elementos que desees por página
            $tipoEjercicio = TipoEjercicio::find($id_tipo);
        } else {
            $ejercicios = Ejercicio::paginate(10); // Cambia 10 por el número de elementos que desees por página
            $tipoEjercicio = null;
        }

        $tiposEjercicio = TipoEjercicio::all(); // Obtener todos los tipos de ejercicio para los formularios, etc.

        return view('admin.ejercicios.index', compact('ejercicios', 'tipoEjercicio', 'tiposEjercicio'));
    }

    public function indexUsuarios($id_tipo = null)
    {
        
        // Obtener todos los tipos de ejercicios
        $tiposEjercicio = TipoEjercicio::all();
        
        // Obtener los ejercicios basados en el tipo seleccionado o todos los ejercicios si $id_tipo es null
        if ($id_tipo) {
            $ejercicios = Ejercicio::where('id_tipo', $id_tipo)->get();
        } else {
            $ejercicios = Ejercicio::all();
        }
    
        return view('usuarios.ejercicios.index', compact('ejercicios', 'tiposEjercicio'));
    }

    public function showExercise($id)
    {
        $ejercicio = Ejercicio::find($id);
    
        if (!$ejercicio) {
            abort(404, 'Ejercicio no encontrado');
        }
    
        return view('usuarios.ejercicios.show', compact('ejercicio'));
    } 

    public function create()
    {
        $tiposEjercicio = TipoEjercicio::all(); // Obtener todos los tipos de ejercicio
        return view('admin.ejercicios.create', compact('tiposEjercicio')); // Asegúrate de que la vista existe en esta ruta
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nombre_ejercicio' => 'required|string|max:255',
            'duracion' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'id_tipo' => 'required|exists:tipo_ejercicio,id_tipo',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dificultad' => 'required|integer|min:1|max:5', // Validación del campo dificultad
        ]);

        if ($request->hasFile('imagen')) {
            $imagenNombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/ejercicios'), $imagenNombre);
            $validatedData['imagen'] = '/images/ejercicios/' . $imagenNombre;
        }

        Ejercicio::create($validatedData);

        return redirect()->route('admin.ejercicios.index')->with('success', 'Ejercicio creado correctamente.');
    }

    public function show(Ejercicio $ejercicio): View
    {
        $ejercicios = Ejercicio::inRandomOrder()->limit(4)->get();
        $ejercicio->load('tipoEjercicio');
        return view('admin.ejercicios.show', compact('ejercicio', 'ejercicios'));
    }

    public function edit(Ejercicio $ejercicio): View
    {
        $tiposEjercicio = TipoEjercicio::all();
        return view('admin.ejercicios.edit', compact('ejercicio', 'tiposEjercicio'));
    }

    public function update(Request $request, Ejercicio $ejercicio): RedirectResponse
    {
        $validatedData = $request->validate([
            'nombre_ejercicio' => [
                'required',
                Rule::unique('ejercicios', 'nombre_ejercicio')->ignore($ejercicio->id)
            ],
            'duracion' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'id_tipo' => 'nullable|exists:tipo_ejercicio,id_tipo',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'dificultad' => 'nullable|integer|min:1|max:5', // Validación del campo dificultad
        ]);

        if ($request->hasFile('imagen')) {
            // Si ya existe una imagen, puedes eliminarla aquí si es necesario
            $imagenNombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/ejercicios'), $imagenNombre);
            $validatedData['imagen'] = '/images/ejercicios/' . $imagenNombre;
        }

        $ejercicio->update($validatedData);

        $request->session()->flash('success', 'Ejercicio actualizado correctamente.');

        return redirect()->route('admin.ejercicios.index');
    }

    public function destroy(Ejercicio $ejercicio): RedirectResponse
    {
        // Si el ejercicio tiene una imagen asociada, puedes eliminarla aquí si es necesario
        if ($ejercicio->imagen) {
            unlink(public_path($ejercicio->imagen)); // Elimina la imagen del servidor
        }
        $ejercicio->delete();
        return redirect()->route('admin.ejercicios.index');
    }
}
