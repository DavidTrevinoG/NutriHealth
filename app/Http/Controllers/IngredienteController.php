<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejercicio;
use App\Models\Dieta;
use App\Models\Colacion;
use App\Models\Ingrediente;
class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las dietas
        $dietas = Dieta::all();

        // Obtener todas las colaciones
        $colaciones = Colacion::all();

        // Obtener todos los ingredientes
        $ingredientes = Ingrediente::all();

        // Pasar los datos a la vista
        return view('admin.ingredientes.index', [
            'dietas' => $dietas,
            'colaciones' => $colaciones,
            'ingredientes' => $ingredientes
        ]);
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
    public function show(string $id)
    {
        //
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
