@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($orders)
            @foreach ($orders as $order)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="">
                        
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
