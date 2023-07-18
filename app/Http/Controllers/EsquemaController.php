<?php

namespace App\Http\Controllers;

use App\Models\Moneda;
use App\Models\Esquema;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class EsquemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Esquema::all();
        return view('esquemas.index', [
            'esquemas' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('esquemas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => ['required', 'unique:esquemas,tipo'],
            'tasa' => ['required', 'unique:esquemas,tasa'],
        ],
        [
            'tipo.required' => 'El campo Tipo es obligatorio',
            'tasa.required' => 'El campo Tasa es obligatorio',
        ]);

        $moneda = new Esquema();
        $moneda->tipo = $request->tipo;
        $moneda->tasa = $request->tasa;
        $moneda->estatus = '1';
        $moneda->save();

        return Redirect::route('esquema.index')->with('success', 'Esquema Registrado Exitósamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $count = Esquema::where('id', $id)->count();
        if ($count) {
            $data = Esquema::find($id);
            return view('esquemas.edit', ['data' => $data]);
        }else {
            return Redirect::route('esquemas.index')->with('error', 'Problemas para mostrar el registro.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $count = Moneda::where('id', $id)->count();

        if ($count>0) {
        
            $request->validate([
                'tipo' => ['required'],
                'descripcion' => ['required' ],
            ],
            [
                'tipo.required' => 'El campo Tipo es obligatorio',
                'tasa.required' => 'El campo Tasa es obligatorio',
            ]);

            $esquema = Esquema::find($id);
            $esquema->tipo = $request->tipo;
            $esquema->tasa = $request->tasa;
            $esquema->save();

            return Redirect::route('esquema.index')->with('success', 'Esquema Actualizada Exitósamente.');
        } else {
            return Redirect::route('esquema.index')->with('error', 'Problemas para mostrar el registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        $count = Esquema::where('id', $id)->count();

        if ($count>0) {

            $esquema = Esquema::find($id);
            $esquema->estatus = '0'; 
            $esquema->save();

            return Redirect::route('esquema.index')->with('success', 'Esquema Desactivada Exitósamente.');
        } else {
            return Redirect::route('esquema.index')->with('error', 'Problemas con el registro.');
        }
    }

    /**
     * Active the specified resource from storage.
     */
    public function active($id)
    {
        $count = Esquema::where('id', $id)->count();

        if ($count>0) {

            $esquema = Esquema::find($id);
            $esquema->estatus = '1'; 
            $esquema->save();
            
            return Redirect::route('esquema.index')->with('success', 'Esquema Activada Exitósamente.');
        } else {
            return Redirect::route('esquema.index')->with('error', 'Problemas con el registro.');
        }
    }
}
