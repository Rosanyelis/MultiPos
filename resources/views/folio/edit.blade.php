@extends('layouts.app')
@section('styles')
@section('title')
    Folios | Editar Folio
@endsection
@endsection
@section('contenido')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Editar Folio</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Configuraciones</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('folio.index') }}">Folios</a></li>
                            <li class="breadcrumb-item active">Editar Folio</li>
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
                            <a href="{{ route('folio.index') }}" class="btn btn-secondary waves-effect waves-light">Regresar</a>
                        </div>
                        <form action="{{ route('folio.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Código *</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="codigo" placeholder="Ejem: VENT"
                                        id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Tipo *</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="tipo"
                                        placeholder="Ejem: Folio de Venta" id="example-text-input">
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Folio</button>
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
