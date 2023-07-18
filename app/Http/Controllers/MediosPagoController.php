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
            'tipo' => ['required', 'unique:medios_pagos,tipo'],
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
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $count = MediosPago::where('id', $id)->count();
        if ($count) {
            $data = MediosPago::find($id);
            return view('mediospagos.edit', ['data' => $data]);
        }else {
            return Redirect::route('mediospago.index')->with('error', 'Problemas para mostrar el registro.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $count = MediosPago::where('id', $id)->count();

        if ($count>0) {
        
            $request->validate([
                'tipo' => ['required'],
            ],
            [
                'tipo.required' => 'El campo Medio de Pago es obligatorio',
            ]);

            $medio = MediosPago::find($id);
            $medio->tipo = $request->tipo;
            $medio->save();

            return Redirect::route('mediospago.index')->with('success', 'Medio de Pago Actualizada Exitósamente.');
        } else {
            return Redirect::route('mediospago.index')->with('error', 'Problemas para mostrar el registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $count = MediosPago::where('id', $id)->count();

        if ($count>0) {

            $medio = MediosPago::find($id);
            $medio->estatus = '0'; 
            $medio->save();

            return Redirect::route('mediospago.index')->with('success', 'Medio de Pago Desactivada Exitósamente.');
        } else {
            return Redirect::route('mediospago.index')->with('error', 'Problemas con el registro.');
        }
    }

    /**
     * Active the specified resource from storage.
     */
    public function active($id)
    {
        $count = MediosPago::where('id', $id)->count();

        if ($count>0) {

            $medio = MediosPago::find($id);
            $medio->estatus = '1'; 
            $medio->save();
            
            return Redirect::route('mediospago.index')->with('success', 'Medio de Pago Activada Exitósamente.');
        } else {
            return Redirect::route('mediospago.index')->with('error', 'Problemas con el registro.');
        }
    }
}
