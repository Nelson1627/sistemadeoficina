<?php

namespace App\Http\Controllers;

use App\Models\Informes; // Asegúrate de que el nombre del modelo sea correcto

use App\Models\Visitas;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class InformesController extends Controller
{
    public function index()
    {
        $informes = Informes::all();
        return view('informes.show')->with(['informes' => $informes]);
    }

    public function create()
    {
        $visitas =Visitas::all(); // Asegúrate de que el modelo Visitas esté importado
        $usuarios = Usuarios::all(); // Asegúrate de que el modelo Usuarios esté importado
        return view('informes.create', compact('visitas', 'usuarios'));
    }
    
    public function store(Request $request)
{
    $data = $request->validate([
        'id_visita' => 'nullable|integer',
        'id_usuario' => 'nullable|integer',
        'fecha_informe' => 'required|date',
        'contenido' => 'nullable|string'
    ]);

    try {
        // Asegúrate de que la fecha se guarde correctamente
        $data['fecha_informe'] = $request->input('fecha_informe');
        Informes::create($data);
        return redirect()->route('informes.index')->with('success', 'Informe creado con éxito');
    } catch (\Exception $e) {
        return redirect()->route('informes.create')->with('error', 'Error al crear informes: ' . $e->getMessage());
    }
}

    public function show($id)
    {
        $informe = Informes::findOrFail($id);
        return view('informes.showDetail')->with(['informe' => $informe]);
    }

    public function edit($id)
    {
        // Busca el informe por su ID
        $informe = Informes::findOrFail($id);
        
        // Carga todas las visitas y usuarios
        $visitas = Visitas::all(); // Asegúrate de tener el modelo Visitas importado
        $usuarios = Usuarios::all(); // Asegúrate de tener el modelo Usuarios importado
        
        // Retorna la vista de edición con las variables necesarias
        return view('informes.update', compact('informe', 'visitas', 'usuarios'));
    }
    
    public function update(Request $request, $id)
{
    $data = $request->validate([
        'id_visita' => 'nullable|integer',
        'id_usuario' => 'nullable|integer',
        'fecha_informe' => 'required|date',
        'contenido' => 'nullable|string'
    ]);

    $informe = Informes::findOrFail($id);
    $informe->update($data);
    return redirect()->route('informes.index')->with('success', 'Informe actualizado con éxito');
}

    public function destroy($id)
    {
        try {
            Informes::destroy($id);
            return redirect()->route('informes.index');
        } catch (\Exception $e) {
            return response()->json(['res' => false, 'message' => $e->getMessage()]);
        }       
          
    }

    public function __construct() 
    { 
        $this->middleware('auth'); 
    }
}
