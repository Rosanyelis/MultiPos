<?php

namespace App\Http\Controllers;

use App\Models\Moneda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MonedaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Moneda::all();
        return view('monedas.index', [
            'monedas' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('monedas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'abreviatura' => ['required', 'unique:monedas,abreviatura'],
            'descripcion' => ['required', 'unique:monedas,descripcion'],
            'decimales' => ['required'],
            'simbolo' => ['required'],
        ],
        [
            'abreviatura.required' => 'El campo Abreviatura es obligatorio',
            'descripcion.required' => 'El campo Descripción es obligatorio',
            'decimales.required' => 'El campo Cantidad de Decimales es obligatorio',
            'simbolo.required' => 'El campo Símbolo es obligatorio',
        ]);

        $moneda = new Moneda();
        $moneda->abreviatura = $request->abreviatura;
        $moneda->descripcion = $request->descripcion;
        $moneda->decimales = $request->decimales;
        $moneda->simbolo = $request->simbolo;
        $moneda->estatus = '1';
        $moneda->save();

        return Redirect::route('moneda.index')->with('success', 'Moneda Registrado Exitósamente.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $count = Moneda::where('id', $id)->count();
        if ($count) {
            $data = Moneda::find($id);
            return view('monedas.edit', ['data' => $data]);
        }else {
            return Redirect::route('moneda.index')->with('error', 'Problemas para mostrar el registro.');
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
                'abreviatura' => ['required'],
                'descripcion' => ['required' ],
                'decimales' => ['required'],
                'simbolo' => ['required'],
            ],
            [
                'abreviatura.required' => 'El campo Abreviatura es obligatorio',
                'descripcion.required' => 'El campo Descripción es obligatorio',
                'decimales.required' => 'El campo Cantidad de Decimales es obligatorio',
                'simbolo.required' => 'El campo Símbolo es obligatorio',
            ]);

            $moneda = Moneda::find($id);
            $moneda->abreviatura = $request->abreviatura;
            $moneda->descripcion = $request->descripcion;
            $moneda->decimales = $request->decimales;
            $moneda->simbolo = $request->simbolo; 
            $moneda->save();

            return Redirect::route('moneda.index')->with('success', 'Moneda Actualizada Exitósamente.');
        } else {
            return Redirect::route('moneda.index')->with('error', 'Problemas para mostrar el registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $count = Moneda::where('id', $id)->count();

        if ($count>0) {

            $moneda = Moneda::find($id);
            $moneda->estatus = '0'; 
            $moneda->save();

            return Redirect::route('moneda.index')->with('success', 'Moneda Desactivada Exitósamente.');
        } else {
            return Redirect::route('moneda.index')->with('error', 'Problemas con el registro.');
        }
    }

    /**
     * Active the specified resource from storage.
     */
    public function active($id)
    {
        $count = Moneda::where('id', $id)->count();

        if ($count>0) {

            $moneda = Moneda::find($id);
            $moneda->estatus = '1'; 
            $moneda->save();
            
            return Redirect::route('moneda.index')->with('success', 'Moneda Activada Exitósamente.');
        } else {
            return Redirect::route('moneda.index')->with('error', 'Problemas con el registro.');
        }
    }
}
