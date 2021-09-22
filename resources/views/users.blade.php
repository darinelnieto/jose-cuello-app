@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <a href="{{route('nuevo.usuario')}}">Agregar nuevo</a>
        </div>
        <div class="col-12 pl-5 pr-5 mt-4 mb-4">
            <table id="usuarios" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->phone}}</td>
                            <td>{{$usuario->rol}}</td>
                            <td>{{$usuario->state}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection