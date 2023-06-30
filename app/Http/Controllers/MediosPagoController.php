<?php

namespace App\Http\Controllers;

use App\Models\MediosPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MediosPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = MediosPago::all();
        return view('mediospagos.index', [
            'mediospagos' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('mediospagos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => ['required'],
        ],
        [
            'tipo.required' => 'El campo Medio de Pago es obligatorio',
            'tipo.unique' => 'El Medio de Pago ya existe',
        ]);

        $medio = new MediosPago();
        $medio->tipo = $request->tipo;
        $medio->estatus = '1';
        $medio->save();

        return Redirect::route('mediospago.index')->with('success', 'Medio de Pago Registrado Exitósamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MediosPago $mediosPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MediosPago $mediosPago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MediosPago $mediosPago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MediosPago $mediosPago)
    {
        //
    }
}
