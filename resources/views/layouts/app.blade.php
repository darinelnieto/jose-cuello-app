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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <!-- Styles -->
    
</head>
<body>
    <section class="contentApp">
        <article class="panelAdmin">
            <img src="{{asset('img/fondo-superior-panel-08.png')}}" class="fondoPanelSuperior">
            <div class="userPanel">
                <h4 class="nameUser">{{auth::User()->name}} {{auth::User()->surnames}}</h4>
                <div class="contentImg">
                    <img src="/storage/{{auth::User()->file}}" alt="Imagen de perfil">
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
                                @can('ordenes.create')
                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#createOrden">Agregar Nueva</a>
                                @endcan
                            </div>
                        </li>
                        @can('prendas.index')
                        <li>
                            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-address-book"></i>
                                <span>Operarios</span>
                            </a>
                            <div class="dropdown-menu">
                                @can('users.create')
                                    <a class="dropdown-item" href="{{route('reportes')}}">Todos los reportes</a>
                                @endcan
                                @can('prendas.create')
                                    <form action="{{route('index.register')}}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" value="{{auth::User()->id}}">
                                        <input type="submit" class="dropdown-item" value="Reportes">
                                    </form>
                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#reporteCreate">Agregar Nuevo</a>
                                @endcan
                            </div>
                        </li>
                        @endcan
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
                                <form action="{{route('users.editIndividual')}}" method="get">
                                    @csrf
                                    <input type="hidden" name="id" value="{{auth::User()->id}}">
                                    <button class="dropdown-item editUserPanel">Editar Información</button>
                                </form>
                                <a href="" class="dropdown-item" data-toggle="modal" data-target="#editFile">Cambiar Foto</a>
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
    <div class="modal fade" id="editFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog editFile" role="document">
          <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <p><strong>Selecciona la nueva imagen de perfil y presiona el botón guardar</strong></p>
                    </div>
                </div>
                <form action="{{route('edit.file')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{auth::User()->id}}">
                    <div class="fom-group row">
                        <div class="col-12 mt-3 text-center">
                            <input type="file" name="file" accept="image/*">
                        </div>
                        <div class="col-12 mt-3 text-center">
                            <input type="submit" value="Guardar" class="btn btn-sm btn-dark">
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="reporteCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog editFile" role="document">
          <div class="modal-content">
            <div class="modal-body">
                @include('prendas.create')
            </div>
          </div>
        </div>
    </div>
    @include('ordenes.create')
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/adminApp.js') }}" defer></script>
<script src="{{ asset('js/order.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</html>
