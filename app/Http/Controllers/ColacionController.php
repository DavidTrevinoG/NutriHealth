<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dieta;
use App\Models\Colacion;
use App\Models\Ingrediente;


class ColacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtener todas las dietas
        $dietas = Dieta::all();

        // Obtener todas las colaciones
        $colaciones = Colacion::all();

        // Obtener todos los ingredientes
        $ingredientes = Ingrediente::all();
        $search = $request->query('search');

        $colaciones = Colacion::when($search, function ($query, $search) {
            return $query->where('nombre_colacion', 'like', '%' . $search . '%');
        })->get();


        // Pasar los datos a la vista
        return view('admin.colaciones.index', [
            'dietas' => $dietas,
            'colaciones' => $colaciones,
            'ingredientes' => $ingredientes
        ], compact('colaciones'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $colacion = Colacion::with('ingredientes')->findOrFail($id);
    
        return view('admin.colaciones.show', compact('colacion'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
