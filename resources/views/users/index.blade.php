@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-6 pl-lg-5">
            <a href="{{route('view.create.users')}}" class="btn btn-sm btn-dark pr-4 pl-4 botonBlack">Crear Usuario</a>
        </div>
        <div class="col-6 pr-lg-5">
            
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 pl-lg-5 pr-lg-5 mt-4 mb-4">
            <table class="tableUsersList" style="width:100%">
                <thead>
                    <tr>
                        <th class="pl-3">Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td class="pl-3">{{$usuario->name}} {{$usuario->surnames}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->phone}}</td>
                            <td>
                                @if(!empty($usuario->getRoleNames()))
                                    @foreach ($usuario->getRoleNames() as $userRole)
                                        {{$userRole}}
                                    @endforeach
                                @endif
                            </td>
                            <td>{{$usuario->state}}</td>
                            <td width="50px">
                                <form action="{{route('users.edit')}}" method="get">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$usuario->id}}">
                                    <button class="btn btn-sm btn-dark"><i class="fas fa-pencil-alt"></i></button>
                                </form>
                            </td>
                            <td width="50px">
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$usuario->id}}">
                                    <button class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection