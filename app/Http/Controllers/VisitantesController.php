<?php

namespace App\Http\Controllers;

use App\Models\Visitantes;
use Illuminate\Http\Request;

class VisitantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitantes = Visitantes::all(); 
        return view('visitantes.show')->with(['visitantes' => $visitantes]); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'documento_id' => 'required',
            'telefono' => 'nullable',
            'correo' => 'nullable|email'
        ]);

        try {
            Visitantes::create($data);
            return redirect('/visitantes/show')->with('success', 'Visitante creado con éxito');
        } catch (\Exception $e) {
            return redirect('/visitantes/create')->with('error', 'Error al crear Visitantes: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visitante = Visitantes::findOrFail($id);
        return view('visitantes.showDetail')->with(['visitante' => $visitante]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitante = Visitantes::findOrFail($id);
        return view('visitantes.update', ['visitante' => $visitante]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'documento_id' => 'required',
            'telefono' => 'nullable',
            'correo' => 'nullable|email'
        ]);

        $visitante = Visitantes::findOrFail($id);
        $visitante->update($data);
        return redirect('/visitantes/show')->with('success', 'Visitante actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Visitantes::destroy($id);
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
