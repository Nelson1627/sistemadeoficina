<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitas;

class VisitasController extends Controller
{
    public function index()
    {
        $visitas = Visitas::all();
        return view('visitas.show')->with(['visitas' => $visitas]);
    }

    public function create()
    {
        return view('visitas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_visitante' => 'required',
            'fecha_hora_entrada' => 'required|date',
            'fecha_hora_salida' => 'nullable|date',
            'proposito' => 'required'
        ]);
    
        try {
            Visitas::create($data);
            return redirect()->route('visitas.index')->with('success', 'Visita creada con éxito');
        } catch (\Exception $e) {
            return redirect()->route('visitas.create')->with('error', 'Error al crear visita: ' . $e->getMessage());
        }
    }
    

    public function show($id)
    {
        $visitas = Visitas::findOrFail($id);
        return view('visitas.showDetail')->with(['visita' => $visitas]);
    }

    public function edit($id)
    {
        $visitas = Visitas::findOrFail($id);
        return view('visitas.update', ['visita' => $visitas]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'id_visitante' => 'required',
            'fecha_hora_entrada' => 'required|date',
            'fecha_hora_salida' => 'nullable|date',
            'proposito' => 'required'
        ]);
    
        $visitas = Visitas::findOrFail($id);
        $visitas->update($data);
    
        return redirect()->route('visitas.index')->with('success', 'Visita actualizada con éxito');
    }
    

    public function destroy($id)
    {
        try {
            Visitas::destroy($id);
            return response()->json(['res' => true]);
        } catch (\Exception $e) {
            return response()->json(['res' => false, 'message' => $e->getMessage()]);
        }
    }

    public function __construct() 
    { 
        $this->middleware('auth'); 
    }
}
