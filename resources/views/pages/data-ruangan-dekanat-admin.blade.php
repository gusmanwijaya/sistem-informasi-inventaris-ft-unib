@extends('layouts.app')

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
            <div class="card-header">
                <a
                    data-toggle="modal"
                    data-target="#tambahRuanganDekanatModal"
                    href="#"
                    data-aos="fade-left"
                    class="btn btn-sm btn-tambah ml-0"
                    ><i class="fas fa-plus p-1"></i> Tambah</a
                >
            </div>
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
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_dekanat as $dekanat)
                        <tr>
                            <td>{{ $dekanat->id }}</td>
                            <td>{{ $dekanat->nama_ruangan }}</td>
                            <td>{{ $dekanat->kode_ruangan }}</td>
                            <td>
                                <div class="row justify-content-center">
                                    <a href="/data-ruangan-dekanat-admin/editDekanat-{{ $dekanat->id }}" class="mr-2"
                                    ><i class="far fa-edit ml-0 edit-icon"></i
                                    ></a>
                                    <a
                                    href="#"
                                    class="deleteDekanat"
                                    dekanat-id="{{ $dekanat->id }}"
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
    @include('includes.tambahRuanganDekanat-modal')
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
            $('#dataTableRuanganDekanat').DataTable({
                lengthMenu: [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100],
                ],
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.deleteDekanat').click(function() {
            var dekanat_id = $(this).attr('dekanat-id');
            swal({
                title: "Apakah anda yakin ingin menghapus ruangan?",
                text: "Ruangan yang sudah dihapus tidak dapat dikembalikan lagi!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/data-ruangan-dekanat-admin/hapusDekanat-"+dekanat_id+"";
                }
            });
        });
    </script>
@endpush
