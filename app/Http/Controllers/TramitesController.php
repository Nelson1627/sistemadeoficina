<?php

namespace App\Http\Controllers;

use App\Models\Tramites;
use App\Models\Usuarios;
use App\Models\Visitas;
use Illuminate\Http\Request;

class TramitesController extends Controller
{
    public function index()
    {
        $tramites = Tramites::all(); // Recupera todos los trámites
        return view('tramites.show')->with(['tramites' => $tramites]); // Cambia a la vista de índice
    }

    public function show($id_tramite)
    {
        $tramite = Tramites::findOrFail($id_tramite);
        return view('tramites.showDetail', compact('tramite')); // Vista de detalle
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        $visitas = Visitas::all();
        return view('tramites.create', compact('usuarios', 'visitas')); // Vista para crear trámite
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_visita' => 'required|exists:visitas,id_visita',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'descripcion' => 'required|string',
            'estado' => 'required|string|in:Pendiente,En Proceso,Finalizado',
            'fecha_creacion' => 'required|date',
        ]);

        Tramites::create($data); // Crear nuevo trámite
        return redirect()->route('tramites.index')->with('success', 'Trámite creado exitosamente.');
    }

    public function edit($id)
    {
        $tramite = Tramites::findOrFail($id);
        $usuarios = Usuarios::all();
        $visitas = Visitas::all();

        return view('tramites.update', compact('tramite', 'usuarios', 'visitas')); // Vista para editar
    }

    public function update(Request $request, $id)
    {
        $tramite = Tramites::findOrFail($id);

        $data = $request->validate([
            'id_visita' => 'required|exists:visitas,id_visita',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'descripcion' => 'required|string',
            'estado' => 'required|string|in:Pendiente,En Proceso,Finalizado',
            'fecha_creacion' => 'required|date',
        ]);

        $tramite->update($data); // Actualizar el trámite
        return redirect()->route('tramites.index')->with('success', 'Trámite actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $tramite = Tramites::findOrFail($id);
        
        try {
            $tramite->delete(); // Eliminar el trámite
            return redirect()->route('tramites.index')->with('success', 'Trámite eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('tramites.index')->with('error', 'Error al eliminar el trámite.');
        }
    }
}
