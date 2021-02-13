@extends('layouts.app')

@section('title')
    Data Barang - SI Inventaris Barang FT UNIB
@endsection

@push('prepend-style')
    {{-- Bootstrap --}}
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"/>

    {{-- Style Button Export tanpa Internet --}}
    <link rel="stylesheet" href="/vendor/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">
    
    {{-- Style Button Export dengan Internet --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"> --}}
@endpush

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid" id="toastvue">
    <div class="alert alert-success" data-aos="fade-left"><i class="fas fa-fw fa-database"></i> Laboratorium</div>
    <div class="card shadow mb-4" data-aos="fade-left">
        <div class="card-header">
            <div class="row justify-content-start align-items-center ml-0">
                <a
                    data-toggle="modal"
                    data-target="#tambahBarangLaboratorium"
                    href="#"
                    data-aos="fade-left"
                    class="btn btn-sm btn-tambah"
                    ><i class="fas fa-plus p-1"></i> Tambah</a>
                <a href="/data-barang-laboratorium-admin/exportLaboratorium" data-aos="fade-left" class="btn btn-sm btn-import ml-2">
                    <i class="fas fa-file-excel p-1"></i> Export .xlsx</a>
                <a
                    data-toggle="modal"
                    data-target="#importBarangLaboratoriumExcelModal"
                    href="#"
                    data-aos="fade-left"
                    class="btn btn-sm btn-import ml-2"
                    ><i class="fas fa-file-excel p-1"></i> Import .xls</a>
            </div>
        </div>
        <div class="card-body">
            <form action="/data-barang-laboratorium-admin" method="GET">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Filter berdasarkan</h4>
                    </div>
                    <div class="col-md-3">
                        <select name="kode_barang" class="form-control">
                            <option value="">Kode Barang</option>
                            @foreach($kode_barang as $barang)
                            <option value="{{ $barang->kode_barang }}">{{ $barang->kode_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="laboratorium_id" class="form-control">
                            <option value="">Ruangan</option>
                            @foreach($data_laboratorium as $laboratorium)
                            <option value="{{ $laboratorium->id }}">{{ $laboratorium->nama_laboratorium }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="id_prodi" class="form-control">
                            <option value="">Prodi</option>
                            @foreach($data_prodi as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="kondisi" class="form-control">
                            <option value="">Kondisi</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-2">
                        <button type="submit" class="btn btn-sm btn-outline-info mr-1"><i class="fas fa-filter p-1"></i> Filter</button>
                        <a href="/data-barang-laboratorium-admin" class="btn btn-sm btn-outline-secondary"><i class="fas fa-sync p-1"></i> Refresh</a>
                    </div>
                    <div class="col-md-12 mt-1 mb-1">
                        <div class="dropdown-divider"></div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table
                class="table table-bordered"
                id="dataTableBarangLaboratorium"
                width="100%"
                cellspacing="0"
                >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Merek</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Asal Barang</th>
                        <th>Tahun Barang</th>
                        <th>Laboratorium</th>
                        <th>Prodi</th>
                        <th>Kondisi</th>
                        <th>Ada/Tidak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($data_barang_laboratorium as $laboratorium)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $laboratorium->kode_barang }}</td>
                        <td>{{ $laboratorium->nama_barang }}</td>
                        <td>{{ $laboratorium->merek }}</td>
                        <td>{{ $laboratorium->jumlah }}</td>
                        <td>{{ $laboratorium->satuan }}</td>
                        <td>{{ $laboratorium->asal_barang }}</td>
                        <td>{{ $laboratorium->tahun_barang }}</td>
                        <td>{{ $laboratorium->laboratorium->nama_laboratorium }}</td>
                        <td>{{ $laboratorium->laboratorium->prodi->nama_prodi }}</td>
                        <td>{{ $laboratorium->kondisi }}</td>
                        <td>{{ $laboratorium->ada_tidak }}</td>
                        <td>
                            <div class="row justify-content-center">
                                <a href="/data-barang-laboratorium-admin/editLaboratorium-{{ $laboratorium->id }}" class="mr-2"
                                ><i class="far fa-edit ml-0 edit-icon"></i
                                ></a>
                                <a href="#" class="deleteLaboratorium" barang-laboratorium-id="{{ $laboratorium->id }}">
                                    <i class="far fa-trash-alt ml-1 delete-icon"></i>
                                </a>
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
    @include('includes.importBarangLaboratoriumExcel-modal')
    @include('includes.tambahBarangLaboratorium-modal')
@endsection

@push('addon-script')
    {{-- Bootstrap --}}
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/js/demo/datatables-demo.js"></script>

    {{-- Plugin Export --}}
    <script src="/vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/vendor/jszip/jszip.min.js"></script>
    <script src="/vendor/pdfmake/pdfmake.min.js"></script>
    <script src="/vendor/pdfmake/vfs_fonts.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.colVis.min.js"></script>

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
            // $('#tambahBarangDekanat').modal('show');
        @endif
    </script>

    <script>
        $(document).ready(function() {
            var dataTableBarangLaboratorium = $('#dataTableBarangLaboratorium').DataTable({
                // buttons: ['copy', 'excel', 'pdf', 'print', 'colvis'],
                // dom:
                // "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                // "<'row'<'col-md-12'tr>>" +
                // "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100],
                ],
            });
            dataTableBarangLaboratorium.buttons().container()
                .appendTo('#dataTableBarangLaboratorium_wrapper .col-md-5:eq(0)');
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.deleteLaboratorium').click(function() {
            var barang_laboratorium_id = $(this).attr('barang-laboratorium-id');
            swal({
                title: "Apakah anda yakin ingin menghapus barang?",
                text: "Barang yang sudah dihapus tidak dapat dikembalikan lagi!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/data-barang-laboratorium-admin/hapusLaboratorium-"+barang_laboratorium_id+"";
                }
            });
        });
    </script>

    {{-- <script>
        $(document).ready(function(){
            $('.dynamic').change(function(){
                if($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ route('data-barang-laboratorium-admin-fetch') }}",
                        method: "POST",
                        data: {
                            select:select, value:value, _token:_token, dependent:dependent
                        },
                        success: function(result){
                            $('#'+dependent).html(result);
                        }
                    })
                }
            });
        });
    </script> --}}

    {{-- Plugin Export dengan Internet --}}
    {{-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> --}}

@endpush