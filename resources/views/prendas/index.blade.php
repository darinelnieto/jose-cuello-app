@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="hhttps://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<div class="container">
    <div class="row mt-5 content-table-report">
        <div class="col-12">
            <table id="reporteIndividual" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Referencia</th>
                        <th>cantidad</th>
                        <th>Fecha y hora</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($user->garments)
                        @foreach ($user->garments as $register)
                            <tr>
                                <td>{{$register->name}}</td>
                                <td>{{$register->sku}}</td>
                                <td>{{$register->amount}}</td>
                                <td>{{$register->created_at}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('#reporteIndividual').DataTable();
</script>
@endsection