<?php

namespace App\Http\Controllers;
use App\Models\tramites;
use Illuminate\Http\Request;

class TramitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tramites =tramites::all();
        return view('tramites.show')->with(['tramites' => $tramites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tramites.create');
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
            'descripcion' => 'required',
            'estado' => 'required',
            'fecha_creacion' => 'required|date'
        ]);

        try {
           tramites::create($data);
            return redirect('/tramites/show')->with('success', 'Trámite creado con éxito');
        } catch (\Exception $e) {
            return redirect('/tramites/create')->with('error', 'Error al crear trámite: ' . $e->getMessage());
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
        $tramite =tramites::findOrFail($id);
        return view('tramites.showDetail')->with(['tramite' => $tramite]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tramite =tramites::findOrFail($id);
        return view('tramites.update', ['tramite' => $tramite]);
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
            'descripcion' => 'required',
            'estado' => 'required',
            'fecha_creacion' => 'required|date'
        ]);

        $tramite =tramites::findOrFail($id);
        $tramite->update($data);
        return redirect('/tramites/show')->with('success', 'Trámite actualizado con éxito');

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
            tramites::destroy($id);
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
