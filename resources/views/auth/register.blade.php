@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="tituloRegistroUsuario">Registro de usuario</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row mt-4">
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="surnames" type="text" class="form-control" name="surnames" value="" required autocomplete="name" placeholder="Apellidos">
                                @error('surnames')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="tel" name="phone" id="" class="form-control" required placeholder="Teléfono">
                            </div>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <p>Selecciona uno o más roles</p>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirma contraseña">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
