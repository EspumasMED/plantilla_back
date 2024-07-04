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
                        <li class="breadcrumb-item active">Editar</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Actualizacion de Usuario</div>
                        @include('includes.alertas')
                        <div class="card-body">
                            <form action="{{ url('/usuarios/actualizar/' . $usuario->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $usuario->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $usuario->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tipo" class="col-md-4 col-form-label text-md-end"
                                        value={{ $usuario->tipo }}>Tipo de Usuario</label>

                                    <div class="col-md-6">
                                        <select class="form-select" name="tipo" id="tipo"
                                            aria-label="Default select example">
                                            @if ($usuario->tipo == 'Administrador')
                                                <option selected value="Administrador">Administrador</option>
                                                <option value="Cajero">Cajero</option>
                                            @else
                                                <option value="Administrador">Administrador</option>
                                                <option selected value="Cajero">Cajero</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <a href="{{ url('/usuarios/listar') }}"><button type="button"
                                        class="btn btn-danger">Cancelar</button></a>


                                <button type="submit" class="btn btn-primary">Actualizar</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
