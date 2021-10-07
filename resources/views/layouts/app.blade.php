<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Styles -->
    
</head>
<body>
    <section class="contentApp">
        <article class="panelAdmin">
            <img src="{{asset('img/fondo-superior-panel-08.png')}}" class="fondoPanelSuperior">
            <div class="userPanel">
                <h4 class="nameUser">{{auth::User()->name}} {{auth::User()->surnames}}</h4>
                <div class="contentImg">
                    <img src="{{asset('img/imagen-user-invalid-10.jpg')}}" alt="Imagen de perfil">
                </div>
            </div>
            <div class="contentPanelAdmin">
                <div class="userCollapse">
                    <ul class="nav flex-column">
                        <li>
                            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-clipboard-list"></i>
                                <span>Ordenes</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('home')}}">Todos Las Ordenes</a>
                                <a class="dropdown-item" href="#">Agregar Nueva</a>
                            </div>
                        </li>
                        @can('users.create')
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span>Usuarios</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('users.index')}}">Todos Los Usuarios</a>
                                <a class="dropdown-item" href="{{route('view.create.users')}}">Agregar Nuevo</a>
                            </div>
                        </li>
                        @endcan
                        <li>
                            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-pencil-alt"></i>
                                <span>Editar Perfil</span>
                            </a>
                            <div class="dropdown-menu">
                                <form action="{{route('users.edit')}}" method="get">
                                    @csrf
                                    <input type="hidden" name="id" value="{{auth::User()->id}}">
                                    <button class="editUserPanel">Editar Información</button>
                                </form>
                                <a class="dropdown-item" href="#">Agregar Nueva</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="logout">
                <a class="cierreSesion" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i> Cerrar Sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <img src="{{asset('img/fondo-inferior-panel-09.png')}}" class="fondoPanelInferior">
        </article>
        <article class="bodyAdmin">
            <div class="headerApp">
                <div class="container">
                    <div class="row">
                        <div class="col-12 headerContent">
                            <a href="" class="barController">
                                <hr class="barCorto"/>
                                <hr class="barLargo"/>
                                <hr class="barLargo"/>
                            </a>
                            <img src="{{asset('img/logo-05.png')}}" alt="Logo José Cuello" class="logoApp">
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </article>
    </section>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/adminApp.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</html>
