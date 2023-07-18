<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Grupo::all();
        return view('grupos.index', [
            'grupos' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grupos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required'. 'unique:grupos,nombre'],
        ],
        [
            'nombre.required' => 'El campo Grupo es obligatorio',
            'nombre.unique' => 'El Grupo ya existe',
        ]);

        $medio = new Grupo();
        $medio->nombre = $request->nombre;
        $medio->estatus = '1';
        $medio->save();

        return Redirect::route('grupo.index')->with('success', 'Grupo Registrado Exitósamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $count = Grupo::where('id', $id)->count();
        if ($count) {
            $data = Grupo::find($id);
            return view('grupos.edit', ['data' => $data]);
        }else {
            return Redirect::route('grupo.index')->with('error', 'Problemas para mostrar el registro.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $count = Grupo::where('id', $id)->count();

        if ($count>0) {
        
            $request->validate([
                'nombre' => ['required'],
            ],
            [
                'nombre.required' => 'El campo Grupo es obligatorio',
            ]);

            $medio = Grupo::find($id);
            $medio->nombre = $request->nombre;
            $medio->save();

            return Redirect::route('grupo.index')->with('success', 'Grupo Actualizado Exitósamente.');
        } else {
            return Redirect::route('grupo.index')->with('error', 'Problemas para mostrar el registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $count = Grupo::where('id', $id)->count();

        if ($count>0) {

            $medio = Grupo::find($id);
            $medio->estatus = '0'; 
            $medio->save();

            return Redirect::route('grupo.index')->with('success', 'Grupo Desactivado Exitósamente.');
        } else {
            return Redirect::route('grupo.index')->with('error', 'Problemas con el registro.');
        }
    }

    /**
     * Active the specified resource from storage.
     */
    public function active($id)
    {
        $count = Grupo::where('id', $id)->count();

        if ($count>0) {

            $grupo = Grupo::find($id);
            $grupo->estatus = '1'; 
            $grupo->save();
            
            return Redirect::route('grupo.index')->with('success', 'Grupo Activado Exitósamente.');
        } else {
            return Redirect::route('grupo.index')->with('error', 'Problemas con el registro.');
        }
    }
}
