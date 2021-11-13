@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row pl-5 pr-5">
                <div class="col-12 mt-4 product-progress">
                    @if ($view->states)
                        @foreach ($view->states as $state)
                            @if ($state->state === 'Generado')
                                <div class="generado" style="width:20%;">20%</div>
                            @endif
                            @if ($state->state === 'Corte')
                                <div class="corte" style="width:40%;">40%</div>
                            @endif
                            @if ($state->state === 'Producción')
                                <div class="producción" style="width:60%;">60%</div>
                            @endif
                            @if ($state->state === 'Acabados')
                                <div class="acabados" style="width:80%;">80%</div>
                            @endif
                            @if ($state->state === 'En bodega')
                                <div class="bodega" style="width:100%;">100%</div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row pl-md-5 pr-md-5 mt-4 content-order-view">
                <div class="col-12 col-lg-5 p-lg-0 text-center">
                    <img src="/storage/{{$view->file}}" alt="" class="image-view-order">
                </div>
                <div class="col-12 mt-5 mt-lg-0 col-lg-7">
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
                    <div class="text-center text-lg-left">
                        <a href="{{route('home')}}" class="btn btn-sm btn-dark btn-back-order mt-5"><i class="fas fa-arrow-left mr-3"></i> atras</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection