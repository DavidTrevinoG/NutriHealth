<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dieta;
use App\Models\Colacion;
use App\Models\Rango;
use App\Models\Ingrediente;

class DietaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtén todos los rangos disponibles
        $rangos = Rango::all();
        
        // Inicializa la consulta
        $query = Dieta::query();
        
        // Filtrar por rango de calorías
        if ($request->has('rango_id') && !empty($request->input('rango_id'))) {
            $rangoId = $request->input('rango_id');
            $rango = Rango::find($rangoId);
    
            if ($rango) {
                $query->whereBetween('calorias', [$rango->inicio, $rango->fin]);
            }
        }
    
        // Obtener todas las dietas con el filtro aplicado
        $dietas = $query->orderBy('calorias', 'asc')->get();
    
        // Obtener todas las colaciones
        $colaciones = Colacion::all();
    
        // Obtener todos los ingredientes
        $ingredientes = Ingrediente::all();
        
        // Pasar los datos a la vista
        return view('admin.dietas.index', [
            'dietas' => $dietas,
            'colaciones' => $colaciones,
            'ingredientes' => $ingredientes,
            'rangos' => $rangos
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
            'calorias_totales' => 'required|numeric',
            'colacion1_nombre' => 'required',
            'colacion1_imagen' => 'required|image',
            'colacion1_ingrediente.*' => 'required',
            'colacion1_cantidad.*' => 'required',
        ]);
    
        $colaciones = [];
    
        // Procesar las colaciones
        for ($i = 1; $i <= 5; $i++) {
            $nombre = $request->input("colacion{$i}_nombre");
    
            // Procesar imagen
            $imagen = $request->file("colacion{$i}_imagen");
    
            // Generar un nombre único para la imagen
            $imageName = uniqid() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('images/dietas'), $imageName);
    
            // Agregar la ruta de la imagen al validatedData
            $imagenPath = 'images/dietas/' . $imageName;
    
            // Insertar colación
            $colacion = Colacion::create([
                'nombre_colacion' => $nombre,
                'imagen' => $imagenPath,
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
    
        // Insertar dieta con calorías totales
        Dieta::create([
            'colacion1' => $colaciones[0] ?? null,
            'colacion2' => $colaciones[1] ?? null,
            'colacion3' => $colaciones[2] ?? null,
            'colacion4' => $colaciones[3] ?? null,
            'colacion5' => $colaciones[4] ?? null,
            'calorias' => $request->input('calorias_totales') ?? null,
        ]);
    
        return redirect()->route('admin.dietas.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener la dieta por su ID
        $dieta = Dieta::findOrFail($id);
    
        // Obtener las colaciones asociadas a esta dieta
        $colaciones = Colacion::whereIn('id', [
            $dieta->colacion1,
            $dieta->colacion2,
            $dieta->colacion3,
            $dieta->colacion4,
            $dieta->colacion5
        ])->get();
    
        // Pasar la dieta y las colaciones a la vista
        return view('admin.dietas.show', compact('dieta', 'colaciones'));
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
    public function destroy($id)
    {
        // Encontrar la dieta
        $dieta = Dieta::findOrFail($id);
    
        // Obtener las colaciones asociadas a la dieta
        $colacionesIds = [
            $dieta->colacion1,
            $dieta->colacion2,
            $dieta->colacion3,
            $dieta->colacion4,
            $dieta->colacion5
        ];
    
        // Eliminar la dieta primero
        $dieta->delete();
    
        // Eliminar los ingredientes relacionados
        Ingrediente::whereIn('id_colacion', $colacionesIds)->delete();
    
        // Eliminar las colaciones relacionadas
        Colacion::whereIn('id', $colacionesIds)->delete();
    
        // Redireccionar con un mensaje de éxito
        return redirect()->route('admin.dietas.index')->with('success', 'Dieta eliminada exitosamente');
    }
    

}
