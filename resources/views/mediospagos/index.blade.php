@extends('layouts.app')
@section('title')
    Medios de Pagos
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
                        <h4 class="mb-sm-0">Medios de Pagos</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Configuraciones</a></li>
                                <li class="breadcrumb-item active">Medios de Pagos</li>
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
                                <a href="{{ route('mediospago.create') }}" class="btn btn-primary waves-effect waves-light">Nuevo Medio de Pago</a>
                            </div>
                            
                            <table id="datatable" class="table table-sm table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Medio de Pago</th>
                                        <th>Estatus</th>
                                        <th width="80px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mediospagos as $medio)
                                    <tr>
                                        <td>{{ $medio->tipo }}</td>
                                        <td>
                                            @if ($medio->estatus == 1)
                                            <span class="badge bg-success">Activo</span>
                                            @else
                                            <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-link p-1" href="{{ route('mediospago.edit', $medio->id) }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            @if ($medio->estatus == '1')
                                                <button type="button" class="btn btn-link p-1 text-danger"
                                                    id="deleteRegistry" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Desactivar"  onclick="deleteRegistry('formDelete-{{ $medio->id }}')">
                                                    <i class="fas fa-lock"></i>
                                                </button>
                                                <form id="formDelete-{{ $medio->id }}"
                                                    action="{{ route('mediospago.destroy', $medio->id) }}" method="POST">
                                                    @csrf
                                                </form>
                                            @endif

                                            @if ($medio->estatus == '0')
                                                <button type="button" class="btn btn-link p-1 text-success"
                                                    id="activateRegistry" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Activar"
                                                    onclick="activeRegistry('formActivate-{{ $medio->id }}')">
                                                    <i class="fas fa-lock-open"></i>
                                                </button>
                                                <form id="formActivate-{{ $medio->id }}"
                                                    action="{{ route('mediospago.active', $medio->id) }}" method="POST">
                                                    @csrf
                                                </form>
                                            @endif
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
     <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        function ActiveRegistry(id) {
            Swal.fire({
                title: "Está Seguro de Activar el registro?",
                text: "Al darlo de alta, podrá usarlo en otras funciones del sistema",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#1cbb8c",
                cancelButtonColor: "#f32f53",
                confirmButtonText: "Si, estoy seguro!"
            }).then(function(result) {
                let form = '#'+id;
                if (result) {
                    $(form).submit();    
                }
            });
        }
        function deleteRegistry(id) {
            Swal.fire({
                title: "Está Seguro de Dar de Baja el registro?",
                text: "Al darlo de baja, no podra usarlo en otras funciones del sistema",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#1cbb8c",
                cancelButtonColor: "#f32f53",
                confirmButtonText: "Si, estoy seguro!"
            }).then(function(result) {
                if (result) {
                    let form = '#'+id;
                    $(form).submit();
                }
            });
        }
    </script>
@endsection
