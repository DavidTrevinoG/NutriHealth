<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dieta;
use App\Models\Rango;
use App\Models\Colacion;

use Illuminate\Http\Request;

class UsuarioDietaController extends Controller
{
    public function index(Request $request)
    {
        $rango_id = $request->input('rango_id');
        
        // Obtener todos los rangos para el select
        $rangos = Rango::all();

        // Filtrar dietas según el rango seleccionado
        if ($rango_id) {
            $rango = Rango::find($rango_id);
            $dietas = Dieta::where('calorias', '>=', $rango->inicio)
                            ->where('calorias', '<=', $rango->fin)
                            ->get();
        } else {
            $dietas = collect(); // Si no hay rango seleccionado, no mostrar dietas
        }

        return view('usuarios.dietas.index', compact('dietas', 'rangos'));
    }
    public function show($id)
    {
        // Obtener la dieta con las colaciones asociadas
        $dieta = Dieta::with(['colacion1', 'colacion2', 'colacion3', 'colacion4', 'colacion5'])->findOrFail($id);
    
        // Obtener las colaciones
        $colaciones = [];
        foreach (['colacion1', 'colacion2', 'colacion3', 'colacion4', 'colacion5'] as $colacionKey) {
            $colacionId = $dieta->{$colacionKey};
            if ($colacionId) {
                $colaciones[$colacionKey] = Colacion::with('ingredientes')->find($colacionId);
            } else {
                $colaciones[$colacionKey] = null;
            }
        }
    
        // Pasar los datos a la vista
        return view('usuarios.dietas.show', compact('dieta', 'colaciones'));
    }
    
    public function show2($id)
    {
        // Obtener la dieta con las colaciones asociadas
        $dieta = Dieta::with(['colacion1', 'colacion2', 'colacion3', 'colacion4', 'colacion5'])->findOrFail($id);

        // Obtener las colaciones
        $colaciones = [];
        foreach (['colacion1', 'colacion2', 'colacion3', 'colacion4', 'colacion5'] as $colacionKey) {
            $colacionId = $dieta->{$colacionKey};
            if ($colacionId) {
                $colaciones[$colacionKey] = Colacion::find($colacionId);
            } else {
                $colaciones[$colacionKey] = null;
            }
        }

        // Pasar los datos a la vista
        return view('usuarios.dietas.show', compact('dieta', 'colaciones'));
    }
    
    
    
    
    
    
    
}
