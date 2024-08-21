<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rango;
use Illuminate\Http\Request;

class RangoController extends Controller
{
    public function index()
    {
        
        $rangos = Rango::all();
        return view('admin.rangos.index', compact('rangos'));
    }

  
    public function create()
    {
        return view('admin.rangos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'inicio' => 'required|integer',
            'fin' => 'required|integer|gt:inicio',
        ]);

        Rango::create($request->all());

        return redirect()->route('admin.rangos.index')->with('success', 'Rango creado con éxito.');
    }
    public function destroy($id)
    {
        $rango = Rango::findOrFail($id);
        $rango->delete();

        return redirect()->route('admin.rangos.index')->with('success', 'Rango de calorías eliminado con éxito.');
    }
    public function edit($id)
    {
        $rango = Rango::findOrFail($id);
        return view('admin.rangos.edit', compact('rango'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'inicio' => 'required|numeric|min:1',
            'fin' => 'required|numeric|gt:inicio',
        ]);

        $rango = Rango::findOrFail($id);
        $rango->inicio = $request->inicio;
        $rango->fin = $request->fin;
        $rango->save();

        return redirect()->route('admin.rangos.index')->with('success', 'Rango actualizado correctamente.');
    }
}

