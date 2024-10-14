<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.show', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'rol' => 'required',
            'correo' => 'required|email'
        ]);

        try {
            $usuario = Usuarios::create($data);
            return redirect()->route('usuarios.show', $usuario->id_usuario)->with('success', 'Usuario creado con éxito');
        } catch (\Exception $e) {
            return redirect('/usuarios/create')->with('error', 'Error al crear Usuario: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuarios.showDetail', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuarios.update', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'rol' => 'required',
            'correo' => 'required|email'
        ]);

        $usuario = Usuarios::findOrFail($id);
        $usuario->update($data);
        return redirect()->route('usuarios.show', $usuario->id_usuario)->with('success', 'Usuario actualizado con éxito');
    }

    public function destroy($id)
    {
        try {
            Usuarios::destroy($id);
            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')->with('error', 'Error al eliminar Usuario: ' . $e->getMessage());
        }
    }

    public function __construct() 
    { 
        $this->middleware('auth'); 
    }
}
