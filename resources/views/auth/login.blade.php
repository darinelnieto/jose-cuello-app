<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    <title>Login app</title>
</head>
<body>
<section class="sectionFormLogin">
    <img src="{{asset('img/fondo-izquierda-login.png')}}" alt="" class="imgIzquierdaLogin">
    <img src="{{asset('img/fondo-derecha-login.png')}}" alt="" class="imgDerechaLogin">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center content-form">
                <img src="{{asset('img/logo-05.png')}}" alt="Estas es el logo de la masca José cuello" class="logoFormulario">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 pt-4 mb-4">
                            <input id="email" type="email" class="inputLogin @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="col-md-12 mb-4">
                            <input id="password" type="password" class="inputLogin @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="SubmitLogin">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
                <div class="dataSecure mt-3">
                    <p class="mb-0">Tus datos estan seguros con <br> JOSÉ CUELLO</p>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</html>
