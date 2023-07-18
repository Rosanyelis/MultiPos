@extends('layouts.app')
@section('styles')
@section('title')
    Grupos | Nuevo Grupo
@endsection
@endsection
@section('contenido')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Nuevo Grupo</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Configuraciones</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('grupo.index') }}">Grupos</a></li>
                            <li class="breadcrumb-item active">Nuevo Grupo</li>
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
                            <a href="{{ route('grupo.index') }}" class="btn btn-secondary waves-effect waves-light">Regresar</a>
                        </div>
                        <form action="{{ route('grupo.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Grupo *</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="nombre" placeholder="Ejem: Efectivo"
                                        id="example-text-input" value="{{ old('nombre') }}">
                                    @if ($errors->has('nombre'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                        <li class="parsley-required">
                                            {{ $errors->first('nombre') }}
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Grupo</button>
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
