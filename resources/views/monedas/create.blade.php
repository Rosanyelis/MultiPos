@extends('layouts.app')
@section('styles')
@section('title')
    Monedas | Nueva Moneda
@endsection
@endsection
@section('contenido')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Nueva Moneda</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Configuraciones</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('moneda.index') }}">Monedas</a></li>
                            <li class="breadcrumb-item active">Nueva Moneda</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex flex-row-reverse mb-3">
                            <a href="{{ route('moneda.index') }}" class="btn btn-secondary waves-effect waves-light">Regresar</a>
                        </div>
                        <form action="{{ route('moneda.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label @error('abreviatura') parsley-error @enderror">Abreviatura *</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="abreviatura" placeholder="Ejem: USD"
                                        id="example-text-input" value="{{ old('abreviatura') }}">
                                    @if ($errors->has('abreviatura'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                        <li class="parsley-required">
                                            {{ $errors->first('abreviatura') }}
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Descripción *</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="descripcion"
                                        placeholder="Ejem: Dólares" id="example-text-input"
                                        value="{{ old('descripcion') }}">
                                    @if ($errors->has('descripcion'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                        <li class="parsley-required">
                                            {{ $errors->first('descripcion') }}
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Cantidad de Décimales *</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="decimales"
                                        placeholder="Ejem: 2" id="example-text-input" value="{{ old('decimales') }}">
                                    @if ($errors->has('decimales'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                        <li class="parsley-required">
                                            {{ $errors->first('decimales') }}
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Símbolo *</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="simbolo"
                                        placeholder="Ejem: $" id="example-text-input" value="{{ old('simbolo') }}">
                                    @if ($errors->has('simbolo'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                        <li class="parsley-required">
                                            {{ $errors->first('simbolo') }}
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Moneda</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection
@section('scripts')
@endsection
