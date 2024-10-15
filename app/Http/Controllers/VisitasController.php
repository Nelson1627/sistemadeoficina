<?php

namespace App\Http\Controllers;

use App\Models\Visitantes;
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
    $visitantes = Visitantes::all(); // Asegúrate de tener el modelo correcto
    return view('visitas.create', compact('visitantes'));
}


    public function store(Request $request)
    {
        $data = $request->validate([
            'id_visitante' => 'required|integer', // Asegúrate de que sea un entero
            'fecha_hora_entrada' => 'required|date',
            'fecha_hora_salida' => 'nullable|date',
            'proposito' => 'required|string' // Asegúrate de que sea una cadena
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
        $visita = Visitas::findOrFail($id);
        return view('visitas.showDetail')->with(['visita' => $visita]);
    }

    public function edit($id)
    {
        $visita = Visitas::findOrFail($id);
        return view('visitas.update', ['visita' => $visita]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'id_visitante' => 'required|integer', // Asegúrate de que sea un entero
            'fecha_hora_entrada' => 'required|date',
            'fecha_hora_salida' => 'nullable|date',
            'proposito' => 'required|string' // Asegúrate de que sea una cadena
        ]);
    
        $visita = Visitas::findOrFail($id);
        $visita->update($data);
    
        return redirect()->route('visitas.index')->with('success', 'Visita actualizada con éxito');
    }

    public function destroy($id)
    {
        try {
            Visitas::destroy($id);
            return redirect()->route('visitas.index')->with('success', 'Visita eliminada con éxito');
        } catch (\Exception $e) {
            return response()->json(['res' => false, 'message' => $e->getMessage()]);
        }
    }

    public function __construct() 
    { 
        $this->middleware('auth'); 
    }
}
