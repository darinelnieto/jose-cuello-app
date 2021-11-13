@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-4 mt-4 content-header-index-product">
            @can('ordenes.create')
                <a href="" class="btn btn-sm btn-dark add-new-order-btn" data-toggle="modal" data-target="#createOrden">Agregar nuevo</a>
            @endcan
            <form action="{{route('search.order')}}" method="get" class="form-search-product">
                <input type="date" name="deadline" class="search-orden">
                <button class="btn-submit-search"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="row content-product-list">
        @if($orders)
            @foreach ($orders as $order)
                <div class="col-10 offset-1 offset-md-0 col-md-4 col-lg-3 mb-4">
                    <div class="card content-product">
                        <div class="content-img-order-index" style="background-image:url(/storage/{{$order->file}});">
                            <div class="content-form-animate-order">
                                @can('ordenes.edit')
                                    <div class="content-edit">
                                        <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editOrder{{$order->id}}"><i class="fas fa-pencil-alt"></i></a>
                                    </div>
                                @endcan
                                <div class="content-view">
                                    <form action="{{route('view.order')}}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$order->id}}">
                                        <button class="btn btn-sm btn-dark"><i class="far fa-eye"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                <div class="modal fade" id="editOrder{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog editFile" role="document">
                      <div class="modal-content">
                        <div class="modal-body text-center">
                            <a href="" class="close" data-dismiss="modal" aria-label="Close">X</a>
                            {{-- tabs --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home{{$order->id}}" role="tab" aria-controls="home" aria-selected="true">Cambiar estado</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile{{$order->id}}" role="tab" aria-controls="profile" aria-selected="false">Asignar a operario</a>
                                </li>
                            </ul>
                            {{-- end tabs --}}
                            {{-- area tab --}}
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home{{$order->id}}" role="tabpanel" aria-labelledby="home-tab">
                                    {{-- form edit state --}}
                                    <form action="{{route('edit.order')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-12 mb-4 text-center">
                                                <input type="hidden" name="id" value="{{$order->id}}">
                                                @if ($states)
                                                   <select name="state_id" id="">
                                                        @if ($order->states)
                                                            @foreach ($order->states as $item)
                                                                <option value="{{$item->id}}">{{$item->state}}</option>
                                                            @endforeach 
                                                        @endif
                                                        @foreach ($states as $state)
                                                            <option value="{{$state->id}}">{{$state->state}}</option>
                                                        @endforeach
                                                   </select>
                                                @endif
                                            </div>
                                            <div class="col-12 text-center">
                                                <input type="submit" value="Guardar" class="btn btn-sm btn-dark">
                                            </div>
                                        </div>
                                    </form>
                                    {{-- end form edit state --}}
                                </div>
                                <div class="tab-pane fade" id="profile{{$order->id}}" role="tabpanel" aria-labelledby="profile-tab">
                                    {{-- form assign order --}}
                                    <form action="{{route('assign.order')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$order->id}}">
                                        <div class="form-group row">
                                            <div class="col-12 text-center mb-4">
                                                @if ($users)
                                                    <select name="user_id" id="">
                                                        <option value="">Selecciona un osuario</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{$user->id}}">{{$user->name}} {{$user->surnames}}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                            <div class="col-12 text-center">
                                                <input type="submit" value="Guardar" class="btn btn-sm btn-dark">
                                            </div>
                                        </div>
                                    </form>
                                    {{-- end form assign order --}}
                                </div>
                            </div>
                            {{-- end area tabs --}}
                        </div>
                      </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="row">
        <div class="col-12 text-right mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection