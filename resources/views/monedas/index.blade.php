@extends('layouts.app')
@section('title')
    Monedas
@endsection
@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
        <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />     
@endsection
@section('contenido')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Monedas</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Configuraciones</a></li>
                                <li class="breadcrumb-item active">Monedas</li>
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
                                <a href="{{ route('moneda.create') }}" class="btn btn-primary waves-effect waves-light">Nueva Moneda</a>
                            </div>
                            
                            <table id="datatable" class="table table-sm table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Abreviatura</th>
                                        <th>Descripción</th>
                                        <th>Cant. Decimales</th>
                                        <th>Símbolo</th>
                                        <th>Estatus</th>
                                        <th width="80px"></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($monedas as $moneda)
                                    <tr>
                                        <td>{{ $moneda->abreviatura }}</td>
                                        <td>{{ $moneda->descripcion }}</td>
                                        <td>{{ $moneda->decimales }}</td>
                                        <td>{{ $moneda->simbolo }}</td>
                                        <td>
                                            @if ($moneda->estatus == 1)
                                            <span class="badge bg-success">Activo</span>
                                            @else
                                            <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-link p-1" href="javascript:;"><i class="fas fa-edit"></i> </a>
                                            <a class="btn btn-link p-1 text-danger" href="javascript:;"><i class="fas fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    {{-- <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script> --}}

    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
