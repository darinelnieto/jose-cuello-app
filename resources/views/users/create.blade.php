@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="tituloRegistroUsuario">Registro de usuario</h2>
            
                    {!! Form::open(['route' => 'users.create']) !!}
                        @csrf
                        <div class="form-group row mt-4">
                            <div class="col-md-6">
                                {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('surnames', null, array('placeholder' => 'Apellido','class' => 'form-control')) !!}                                @error('surnames')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                {!! Form::tel('phone', null, array('placeholder' => 'Teléfono','class' => 'form-control')) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row optionsRoleFormRegisterUSers">
                            <div class="col-12 text-center">
                                <p><strong>Selecciona uno o más roles</strong></p>
                            </div>
                            @foreach ($roles as $rol)
                                <div class="col-6 col-md-3 col-lg-2">
                                    <label>
                                        <input type="radio" name="roles" value="{{ $rol->id }}" class="mr-1">
                                        {{ $rol->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Contraseña','class' => 'form-control')) !!}                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-sm btn-dark pl-5 pr-5 botonBlack">Crear</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
