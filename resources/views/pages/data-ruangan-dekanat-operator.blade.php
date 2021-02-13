@extends('layouts.operator')

@section('title')
    Data Ruangan - SI Inventaris Barang FT UNIB
@endsection

@push('prepend-style')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"/>
@endpush

@section('content')
<div class="container-fluid" id="toastvue">
        <!-- DataTales Example -->
        <div class="alert alert-success"><i class="fas fa-fw fa-door-open"></i> Dekanat</div>
        <div class="card shadow mb-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table
                    class="table table-bordered"
                    id="dataTableRuanganDekanat"
                    width="100%"
                    cellspacing="0"
                    >
                    <thead>
                        <tr>
                        <th>ID Ruangan</th>
                        <th>Nama Ruangan</th>
                        <th>Kode Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_dekanat as $dekanat)
                        <tr>
                            <td>{{ $dekanat->id }}</td>
                            <td>{{ $dekanat->nama_ruangan }}</td>
                            <td>{{ $dekanat->kode_ruangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection

@push('addon-script')
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTableRuanganDekanat').DataTable({
                lengthMenu: [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100],
                ],
            });
        });
    </script>
@endpush
