<?php

namespace App\Http\Controllers;

use App\Models\Dato;
use Illuminate\Http\Request;

class Datos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo='Inicio';
        $items = Dato::all();
        return view ('index',compact('titulo','items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo='Agregar';
        return view('create',compact('titulo'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Dato();
        $item ->tipo = $request->tipo;
        $item ->categoria = $request->categoria;
        $item ->cantidad = $request->cantidad;
        $item ->descripcion = $request->descripcion;
        $item ->fecha = $request->fecha;
        if ($request->input('tipo') == '' || $request->input('categoria') == ''|| $request->input('cantidad') == ''|| $request->input('fecha') == '') {
            // Redirigir a la pestaña de nuevo con Sweet Alert de error
            alert()->error('Campos vacios','vuelve a intentarlo');
            return redirect('/create')->with('error', 'Por favor, completa todos los campos');
        } else {
            // Redirigir a la pestaña de éxito con Sweet Alert de éxito
            $item->save();
            alert()->success('Guardado','Datos guardados');
            return redirect('/index')->with('success', 'Datos ingresados');
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
        $titulo = "Eliminar";
        $items = Dato::find($id);
        return view("eliminar", compact('items', 'titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulo = 'Actualizar';
        $items = Dato::find($id);
        return view('edit', compact('items', 'titulo'));
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
        $item = Dato::find($id);
        $item ->tipo = $request->tipo;
        $item ->categoria = $request->categoria;
        $item ->cantidad = $request->cantidad;
        $item ->descripcion = $request->descripcion;
        $item ->fecha = $request->fecha;
        $item->save();
        alert()->success('Actualizado','Datos Actualizados');
        return redirect('/index')->with('success', 'Datos ingresados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Dato::find($id);
        alert()->success('Eliminado','Datos eliminados');
        $item->delete();
        return redirect('/index');
    }
}
