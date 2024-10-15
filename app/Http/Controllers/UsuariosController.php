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
        $roles = ['administrativo', 'encargado', 'otro']; // O bien, si tienes una tabla de roles:
        // $roles = Rol::pluck('nombre')->toArray(); // Si tienes un modelo Rol
        return view('usuarios.create', compact('roles'));
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'rol' => 'required|in:administrativo,encargado,otro',
            'correo' => 'required|email'
        ]);
    
        // Crear el nuevo usuario
        $usuario = Usuarios::create($data);
    
        // Redirigir a la vista de show del nuevo usuario
        return redirect()->route('usuarios.show', $usuario->id_usuario)->with('success', 'Usuario creado con éxito');
    }
    

    public function show($id)
{
    $usuario = Usuarios::findOrFail($id);
    $usuarios = Usuarios::all(); // Cargar todos los usuarios
    return view('usuarios.show', compact('usuario', 'usuarios'));
}


    public function edit($id)
    {
        $usuario = Usuarios::findOrFail($id);
        $roles = ['administrativo', 'encargado', 'otro']; // O bien, si tienes una tabla de roles
        return view('usuarios.update', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id)
{
    $usuario = Usuarios::findOrFail($id);

    $data = $request->validate([
        'nombre' => 'required',
        'rol' => 'sometimes|required|in:administrativo,encargado,otro', // Cambiar a 'sometimes'
        'correo' => 'required|email'
    ]);

    // Si el rol no se ha cambiado, mantener el rol actual
    if (empty($data['rol'])) {
        $data['rol'] = $usuario->rol;
    }

    $usuario->update($data);

    return redirect()->route('usuarios.show', $usuario->id_usuario)->with('success', 'Usuario actualizado con éxito');
}


    public function destroy($id)
    {
        try {
            Usuarios::destroy($id);
            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')->with('error', 'Error al eliminar usuario: ' . $e->getMessage());
        }
    }
}
