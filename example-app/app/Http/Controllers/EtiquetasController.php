<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;

class EtiquetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Etiquetas = Label::orderBy('created_at', 'desc')->get();
        return view('Labels.index', ['Etiquetas' => $Etiquetas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Labels.createLabel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Etiquetas = new Label;
        $Etiquetas->nombreEtiquetas = $request["NombreEtiquetas"];
        $Etiquetas->descripcion = $request["Descripcion"];
        $Etiquetas->fechaCreacion = date("Y-m-d H:i:s");
        $Etiquetas->usuarioCreador = 'Alejandro';
        $Etiquetas->save();

        return redirect()->route('etiquetas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etiqueta = Label::findOrFail($id); // Obtén la etiqueta según el ID proporcionado
        return view('Labels.editLabel', compact('etiqueta')); // Pasa la etiqueta a la vista
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
        $EtiquetaRequest = request()->except(['_token', '_method']);
        Label::where('id', '=', $id)->update($EtiquetaRequest);
        return redirect()->route('etiquetas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etiqueta = Label::findOrFail($id);
        $etiqueta->delete();

        return redirect()->route('etiquetas.index')->with('success', 'Etiqueta eliminada correctamente');
    }
}
