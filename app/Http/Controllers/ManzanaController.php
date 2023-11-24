<?php

namespace App\Http\Controllers;

use App\Models\Manzana;
use Illuminate\Http\Request;

class ManzanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $manzanas= Manzana::all();
        return view ('home', compact('manzanas'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agregarManzana');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipoManzana' => 'nullable',
            'precioKilo' => 'nullable'
        ]);
        $manzana = new Manzana();
        $manzana->tipoManzana = $request->input('tipoManzana');
        $manzana->precioKilo = $request->input('precioKilo');
        $manzana->save();

        return redirect()->back()->with('success', 'Manzana añadido con éxito y registrada en la base de datos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manzana $manzana)
    {
        return view('verManzana', compact('manzana'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manzana $manzana)
    {
        return view('editarManzana', compact('manzana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manzana $manzana)
    {
       
        $manzana = Manzana::find($manzana->id);
        $manzana->tipoManzana = $request->tipoManzana;
        $manzana->precioKilo = $request->precioKilo;
        $manzana->update($request->all());
        return redirect()->route('editarManzana', $manzana)->with('success', 'OK!, la manzana se actualizó correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manzana $manzana)
    {
        $manzana->delete();

        return redirect()->back()->with('success', 'Manzana eliminada con éxito y registrada en la base de datos');
    }
}
