@extends('layouts.operator')

@section('title')
    Data Ruangan - SI Inventaris Barang FT UNIB
@endsection

@push('prepend-style')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"/>
@endpush

@section('content')
<div class="container-fluid" id="toastvue">
        <div class="alert alert-success" data-aos="fade-left"><i class="fas fa-fw fa-door-open"></i> Laboratorium</div>
        <div class="card shadow mb-4" data-aos="fade-left">
            <div class="card-body">
                <form action="/data-ruangan-laboratorium-operator" method="GET">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Filter berdasarkan</h4>
                        </div>
                        <div class="col-md-4">
                            <select name="prodi_id" class="form-control mb-2">
                                <option value="">Prodi</option>
                                @foreach($data_prodi as $prodi)
                                <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm btn-outline-info mr-1"><i class="fas fa-filter p-1"></i> Filter</button>
                            <a href="/data-ruangan-laboratorium-operator" class="btn btn-sm btn-outline-secondary"><i class="fas fa-sync p-1"></i> Refresh</a>
                        </div>
                        <div class="col-md-12 mt-1 mb-1">
                            <div class="dropdown-divider"></div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table
                    class="table table-bordered"
                    id="dataTableRuanganLaboratorium"
                    width="100%"
                    cellspacing="0"
                    >
                    <thead>
                        <tr>
                        <th>ID Laboratorium</th>
                        <th>Nama Laboratorium</th>
                        <th>Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_ruangan_laboratorium as $laboratorium)
                        <tr>
                            <td>{{ $laboratorium->id }}</td>
                            <td>{{ $laboratorium->nama_laboratorium }}</td>
                            <td>{{ $laboratorium->prodi->nama_prodi }}</td>
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
            $('#dataTableRuanganLaboratorium').DataTable({
                lengthMenu: [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100],
                ],
            });
        });
    </script>
@endpush
