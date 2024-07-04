@extends('layouts.auth')

@section('content')
    <div class="bg-overlay">
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Bienvenido de Regreso !</h5>
                                    <p class="text-muted">Inicie Sesión para continuar en Tiendas Todito</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf


                                        <div class="mb-3">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>


                                            <label for="password"
                                                class="col-md-4 col-form-label">{{ __('Password') }}</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-8">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>


                                            </div>
                                        </div>


                                        <div class="mt-4 text-center">
                                            <p>No tienes una cuenta?
                                                @if (Route::has('register'))
                                                    <a class="btn btn-link" href="{{ route('register') }}">
                                                        {{ __('Register') }}
                                                    </a>
                                                @endif
                                            </p>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
