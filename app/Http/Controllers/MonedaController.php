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
     * Display the specified resource.
     */
    public function show(Moneda $moneda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Moneda $moneda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Moneda $moneda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moneda $moneda)
    {
        //
    }
}
