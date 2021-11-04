@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row alinea-row mt-4">
            <div class="col-12 col-lg-7">
                <h4>Lista de operarios</h4>
            </div>
            <div class="col-12 col-lg-5">
                <form action="" method="get">
                    <div class="form-group row">
                        <div class="col-5 col-5 pl-1 pr-1">
                            <input type="text" name="name" id="" class="form-search-operario" placeholder="nombre">
                        </div>
                        <div class="col-5 col-5 pl-1 pr-1">
                            <input type="text" name="surnames" id="" class="form-search-operario" placeholder="apellidos">
                        </div>
                        <div class="col-2 pl-1 pr-1">
                            <button class="btn-submit-search"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            @if ($users)
                @foreach ($users as $user)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card user-operario">
                            <div class="foto-perfil-operario" style="background-image: url(/storage/{{$user->file}})"></div>
                            <div class="text-center mt-3 mb-4">
                                <h5>{{$user->name}} {{$user->surnames}}</h5>
                                <form action="{{route('reporte.usuario')}}" method="get">
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <input type="submit" value="Ver Reportes" class="btn btn-sm btn-dark">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection