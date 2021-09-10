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
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 col-xl-6 offset-md-2 offset-lg-3 offset-xl-3 text-center content-form">
                <img src="{{asset('img/logo-05.png')}}" alt="Estas es el logo de la masca José cuello" class="logoFormulario">
                <form action="">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12 pt-4 mb-4">
                            <input type="email" name="email" class="inputLogin">
                        </div>
                        <div class="col-12 mb-4">
                            <input type="password" name="password" class="inputLogin">
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Ingresar" class="SubmitLogin">
                        </div>
                    </div>
                </form>
                <div class="dataSecure mt-3">
                    <p class="mb-0">Tus datos estan seguros con <br> JOSÉ CUELLO</p>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</html>