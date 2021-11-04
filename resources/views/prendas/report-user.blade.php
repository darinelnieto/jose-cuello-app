@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="hhttps://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <div class="container">
        <div class="row mt-5 content-table-report">
            <div class="col-12">
                <table id="reporte" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Numero de referencia</th>
                            <th>Cantidad</th>
                            <th>Fecha y hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($reports->garments)
                            @foreach ($reports->garments as $report)
                                <tr>
                                    <td>{{$report->name}}</td>
                                    <td>{{$report->sku}}</td>
                                    <td>{{$report->amount}}</td>
                                    <td>{{$report->created_at}}</td>
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
    $('#reporte').DataTable();
</script>
@endsection