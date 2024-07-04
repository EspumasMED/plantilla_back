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
                                    <h5 class="text-primary">Registro de Cuenta !</h5>
                                    <p class="text-muted">Obtenga su cuenta gratuita ahora</p>
                                </div>
                                <div class="">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-1">
                                            <label for="name"
                                                class="col-md-4 col-form-label ">{{ __('Name') }}</label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class=" mb-1">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label for="password"
                                                class="col-md-6 col-form-label ">{{ __('Password') }}</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-1">
                                            <label for="password-confirm"
                                                class="col-md-6 col-form-label ">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-8">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <p>Ya tienes una cuenta?
                                                @if (Route::has('login'))
                                                    <a class="btn btn-link" href="{{ route('login') }}">
                                                        {{ __('Login') }}
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
