<?php

namespace App\Http\Controllers;


use App\Models\informes;
use Illuminate\Http\Request;

class InformesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informes = informes::all();
        return view('informes.show')->with(['informes' => $informes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informes.create');
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
            'id_visita' => 'required',
            'id_usuario' => 'required',
            'fecha_informe' => 'required|date',
            'contenido' => 'required'
        ]);

        try {
            informes::create($data);
            return redirect('/informes/show')->with('success', 'Informe creado con éxito');
        } catch (\Exception $e) {
            return redirect('/informes/create')->with('error', 'Error al crear informes: ' . $e->getMessage());
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
        $informe = informes::findOrFail($id);
        return view('informes.showDetail')->with(['informe' => $informe]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informe = informes::findOrFail($id);
        return view('informes.update', ['informe' => $informe]);

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
            'id_visita' => 'required',
            'id_usuario' => 'required',
            'fecha_informe' => 'required|date',
            'contenido' => 'required'
        ]);

        $informe = informes::findOrFail($id);
        $informe->update($data);
        return redirect('/informes/show')->with('success', 'Informe actualizado con éxito');

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
            informes::destroy($id);
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
