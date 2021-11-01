@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-4 mt-4 content-header-index-product">
            <a href="" class="btn btn-sm btn-dark add-new-order-btn" data-toggle="modal" data-target="#createOrden">Agregar nuevo</a>
            <form action="" class="form-search-product">
                <input type="search" name="name" class="search-orden" placeholder="Buscar...">
                <button class="btn-submit-search"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="row">
        @if($orders)
            @foreach ($orders as $order)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card content-product">
                        <img src="/storage/{{$order->file}}" alt="" class="image-product-index">
                        <div class="card-body">
                            <div class="name-product">
                                <h4>{{$order->name}}</h4>
                            </div>
                            <div class="content-description">
                                <p>Número de referencia: {{$order->sku}}</p>
                                <p>Cantidad solicitada: {{$order->quantity}} unidades</p>
                                <p>Fechas de entrega: {{$order->deadline}} </p>
                                <p>
                                    Estado:
                                    @if ($order->states)
                                        @foreach ($order->states as $item)
                                            @if ($item->state === 'Generado')
                                                <span style="color:#ff6027">{{$item->state}}</span>
                                            @endif
                                            @if ($item->state === 'Acabados')
                                                <span style="color:#22b993">{{$item->state}}</span>
                                            @endif
                                            @if ($item->state === 'Corte')
                                                <span style="color:#d1e230">{{$item->state}}</span>
                                            @endif
                                            @if ($item->state === 'En bodega')
                                                <span style="color:#0084ae">{{$item->state}}</span>
                                            @endif
                                            @if ($item->state === 'Producción')
                                                <span style="color:#00fc06">{{$item->state}}</span>
                                            @endif
                                        @endforeach 
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
