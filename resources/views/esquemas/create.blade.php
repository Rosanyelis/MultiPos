@extends('layouts.app')
@section('styles')
@section('title')
    Esquemas | Nuevo Esquema
@endsection
@endsection
@section('contenido')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Nueva Esquema</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Configuraciones</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('esquema.index') }}">Esquemas</a></li>
                            <li class="breadcrumb-item active">Nuevo Esquema</li>
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
                            <a href="{{ route('esquema.index') }}" class="btn btn-secondary waves-effect waves-light">Regresar</a>
                        </div>
                        <form action="{{ route('esquema.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label @error('tipo') parsley-error @enderror">Tipo *</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="tipo" placeholder="Ejem: IVA"
                                        id="example-text-input" value="{{ old('tipo') }}">
                                    @if ($errors->has('tipo'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                        <li class="parsley-required">
                                            {{ $errors->first('tipo') }}
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Tasa *</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="tasa"
                                        placeholder="Ejem: 16%" id="example-text-input"
                                        value="{{ old('tasa') }}">
                                    @if ($errors->has('tasa'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                        <li class="parsley-required">
                                            {{ $errors->first('tasa') }}
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Esquema</button>
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
