@extends('layouts.app')

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
            <div class="card-header">
                <a
                    data-toggle="modal"
                    data-target="#tambahRuanganLaboratoriumModal"
                    href="#"
                    data-aos="fade-left"
                    class="btn btn-sm btn-tambah ml-0"
                    ><i class="fas fa-plus p-1"></i> Tambah</a
                >
            </div>
            <div class="card-body">
                <form action="/data-ruangan-laboratorium-admin" method="GET">
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
                            <a href="/data-ruangan-laboratorium-admin" class="btn btn-sm btn-outline-secondary"><i class="fas fa-sync p-1"></i> Refresh</a>
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
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_ruangan_laboratorium as $laboratorium)
                        <tr>
                            <td>{{ $laboratorium->id }}</td>
                            <td>{{ $laboratorium->nama_laboratorium }}</td>
                            <td>{{ $laboratorium->prodi->nama_prodi }}</td>
                            <td>
                                <div class="row justify-content-center">
                                    <a href="/data-ruangan-laboratorium-admin/editLaboratorium-{{ $laboratorium->id }}" class="mr-2"
                                    ><i class="far fa-edit ml-0 edit-icon"></i
                                    ></a>
                                    <a
                                    href="#"
                                    class="deleteLaboratorium"
                                    laboratorium-id="{{ $laboratorium->id }}"
                                    ><i class="far fa-trash-alt ml-1 delete-icon"></i
                                    ></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection

@section('addon-modal')
    @include('includes.tambahRuanganLaboratorium-modal')
@endsection

@push('addon-script')
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/js/demo/datatables-demo.js"></script>

    <script>
        @if (count($errors) > 0)
            Vue.use(Toasted);
            var toastvue = new Vue({
                el: "#toastvue",
                mounted() {
                    AOS.init();
                    this.$toasted.error(
                        "Maaf terjadi kesalahan, periksa kembali validasi data anda!",
                        {
                            position: "top-center",
                            className: "rounded",
                            duration: 2000,
                        }
                    );
                },
            });
        @endif
    </script>

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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.deleteLaboratorium').click(function() {
            var laboratorium_id = $(this).attr('laboratorium-id');
            swal({
                title: "Apakah anda yakin ingin menghapus laboratorium?",
                text: "Laboratorium yang sudah dihapus tidak dapat dikembalikan lagi!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/data-ruangan-laboratorium-admin/hapusLaboratorium-"+laboratorium_id+"";
                }
            });
        });
    </script>
@endpush
