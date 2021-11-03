@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row pl-md-5 pr-md-5 content-order-view">
                <div class="col-12 mb-4">
    
                </div>
                <div class="col-12 col-lg-5 text-center">
                    <img src="/storage/{{$view->file}}" alt="" class="image-view-order">
                </div>
                <div class="col-12 col-lg-7">
                    <p><strong>Nombre:</strong> {{$view->name}}</p>
                    <p><strong>Número de referencia:</strong> {{$view->sku}}</p>
                    <p><strong>Cantidad Solicitada:</strong> {{$view->quantity}} unidades</p>
                    <p><strong>Fecha y hora del pedido:</strong> {{$view->created_at}}</p>
                    <p><strong>Fecha de entrega:</strong> {{$view->deadline}}</p>
                    <p><strong>Nombre de cliente o empresa:</strong> {{$view->customer_name}}</p>
                    @if ($view->users)
                        @foreach ($view->users as $operario)
                            <p><strong>Nombre del operario encargado:</strong> {{$operario->name}} {{$operario->surnames}}</p>
                        @endforeach
                    @endif
                    @if ($view->states)
                        @foreach ($view->states as $state)
                            <p><strong>Estado:</strong> {{$state->state}}</p>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-4">
                    <a href="{{route('home')}}" class="btn btn-sm btn-dark btn-back-order"><i class="fas fa-arrow-left mr-3"></i> atras</a>
                </div>
            </div>
        </div>
    </section>
@endsection