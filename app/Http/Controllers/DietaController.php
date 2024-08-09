<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dieta;
use App\Models\Colacion;
use App\Models\Ingrediente;

class DietaController extends Controller
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
        return view('admin.dietas.index', [
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
        return view('admin.dietas.create');

    }
    public function edit()
    {

    }
    public function colaciones()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'colacion1_nombre' => 'required',
            'colacion1_imagen' => 'required|image',
            'colacion1_calorias' => 'required|numeric',
            'colacion1_ingrediente.*' => 'required',
            'colacion1_cantidad.*' => 'required',
            // Agrega reglas para colaciones 2 a 5
        ]);

        $colaciones = [];

        // Procesar las colaciones
        for ($i = 1; $i <= 5; $i++) {
            $nombre = $request->input("colacion{$i}_nombre");
            $calorias = $request->input("colacion{$i}_calorias");

            // Procesar imagen
            $imagen = $request->file("colacion{$i}_imagen");
            $imagenPath = $imagen->store('dietas', 'public');

            // Insertar colación
            $colacion = Colacion::create([
                'nombre_colacion' => $nombre,
                'imagen' => $imagenPath,
                'calorias' => $calorias
            ]);

            $colaciones[] = $colacion->id;

            // Procesar ingredientes
            $ingredientes = $request->input("colacion{$i}_ingrediente");
            $cantidades = $request->input("colacion{$i}_cantidad");

            foreach ($ingredientes as $key => $ingrediente) {
                Ingrediente::create([
                    'nombre_ingrediente' => $ingrediente,
                    'cantidad' => $cantidades[$key],
                    'id_colacion' => $colacion->id
                ]);
            }
        }

        // Insertar dieta
        Dieta::create([
            'colacion1' => $colaciones[0] ?? null,
            'colacion2' => $colaciones[1] ?? null,
            'colacion3' => $colaciones[2] ?? null,
            'colacion4' => $colaciones[3] ?? null,
            'colacion5' => $colaciones[4] ?? null,
        ]);

        return redirect()->route('dietas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
