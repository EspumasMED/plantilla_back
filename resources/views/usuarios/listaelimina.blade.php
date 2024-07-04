@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Usuarios</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Usuarios</a>
                        </li>
                        <li class="breadcrumb-item active">Eliminados</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Listado de Usuarios Eliminados</div>
                    <div class="card-body">
                        @include('includes.alertas')
                        <div class="row">
                            <div class="col-md-6 text-end mb-2">

                            </div>
                            <div class="col-md-6 text-end mb-2">
                                <a href="{{ url('/usuarios/listar') }}" class="btn btn-success">Ver usuarios activos</a>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NOMBRE</th>
                                                <th>E-MAIL</th>
                                                <th>TIPO</th>
                                                <th>ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usuarios as $item)
                                                <tr>
                                                    @if (auth()->user()->id == $item->id)
                                                        <td class="text-muted">{{ $item->id }}</td>
                                                        <td class="text-muted">{{ $item->name }}</td>
                                                        <td class="text-muted">{{ $item->email }}</td>
                                                        <td class="text-muted">
                                                            @if ($item->tipo == 'Administrador')
                                                                <span
                                                                    class="badge text-danger badge-success">Administrador</span>
                                                            @else
                                                                <span
                                                                    class="badge text-secondary badge-danger">Cajero</span>
                                                            @endif
                                                        </td class="text-muted">
                                                        <td class="text-muted">
                                                            <p>Usuario Actual</p>
                                                        </td>
                                                </tr>
                                            @else
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    @if ($item->tipo == 'Administrador')
                                                        <span class="badge text-danger badge-success">Administrador</span>
                                                    @else
                                                        <span class="badge text-secondary badge-danger">Cajero</span>
                                                    @endif
                                                </td>
                                                <td>

                                                    <a href="{{ url('/usuarios/elimina/' . $item->id) }}"
                                                        class="btn btn-sm btn-primary"><i class="fas fa-user-check"></i></a>

                                                </td>
                                            @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{ $usuarios->links('pagination::bootstrap-4') }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
