<?php

namespace App\Http\Controllers;

use App\Models\Folio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class FolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Folio::all();
        return view('folio.index', [
            'folios' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('folio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => ['required'],
            'tipo' => ['required', 'unique:folios'],
        ],
        [
            'codigo.required' => 'El campo Código de Folio es obligatorio',
            'tipo.required' => 'El campo Tipo de Folio es obligatorio',
        ]);

        $folio = new Folio();
        $folio->codigo = $request->codigo;
        $folio->tipo = $request->tipo;
        $folio->estatus = '1';
        $folio->save();

        return Redirect::route('folio.index')->with('success', 'Folio Registrado Exitósamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $count = Folio::where('id', $id)->count();
        if ($count) {
            $data = Folio::find($id);
            return view('folio.edit', ['data' => $data]);
        }else {
            return Redirect::route('folio.index')->with('error', 'Problemas para mostrar el registro.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Folio $folio)
    {
        $count = Folio::where('id', $id)->count();
            if ($count) {
                $request->validate([
                'codigo' => ['required'],
                'tipo' => ['required'],
            ],
            [
                'codigo.required' => 'El campo Código de Folio es obligatorio',
                'tipo.required' => 'El campo Tipo de Folio es obligatorio',
            ]);

            $folio = Folio::find($id);
            $folio->codigo = $request->codigo;
            $folio->tipo = $request->tipo;
            $folio->save();

            return Redirect::route('folio.index')->with('success', 'Folio Actualizado Exitósamente.');
        }else {
            return Redirect::route('folio.index')->with('error', 'Problemas para mostrar el registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        $count = Folio::where('id', $id)->count();

        if ($count>0) {

            $folio = Folio::find($id);
            $folio->estatus = '0'; 
            $folio->save();

            return Redirect::route('folio.index')->with('success', 'Folio Desactivado Exitósamente.');
        } else {
            return Redirect::route('folio.index')->with('error', 'Problemas con el registro.');
        }
    }

    /**
     * Active the specified resource from storage.
     */
    public function active($id)
    {
        $count = Folio::where('id', $id)->count();

        if ($count>0) {

            $folio = Folio::find($id);
            $folio->estatus = '1'; 
            $folio->save();
            
            return Redirect::route('folio.index')->with('success', 'Folio Activado Exitósamente.');
        } else {
            return Redirect::route('folio.index')->with('error', 'Problemas con el registro.');
        }
    }
}
