@extends('layouts.app')

@section('title')
    Data User Operator - SI Inventaris Barang FT UNIB
@endsection

@push('prepend-style')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"/>
@endpush

@section('content')
<div class="container-fluid" id="toastvue">
        <!-- DataTales Example -->
        <div class="alert alert-success"><i class="fas fa-fw fa-user"></i> User Operator</div>
        <div class="card shadow mb-5">
            <div class="card-header">
                <a
                    data-toggle="modal"
                    data-target="#tambahUserOperatorModal"
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
                    id="dataTableUserOperator"
                    width="100%"
                    cellspacing="0"
                    >
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($data_user as $user)
                        @if($user->role == "operator")
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->password }}</td>
                            <td>
                                <div class="row justify-content-center">
                                    <a href="/user-operator-admin/edit-{{ $user->id }}" class="mr-2"
                                    ><i class="far fa-edit ml-0 edit-icon"></i
                                    ></a>
                                    <a
                                    href="#"
                                    class="deleteUserOperator"
                                    user-operator-id="{{ $user->id }}"
                                    ><i class="far fa-trash-alt ml-1 delete-icon"></i
                                    ></a>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection

@section('addon-modal')
    @include('includes.tambahUserOperator-modal')
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
            $('#dataTableUserOperator').DataTable({
                lengthMenu: [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100],
                ],
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.deleteUserOperator').click(function() {
            var user_operator_id = $(this).attr('user-operator-id');
            swal({
                title: "Apakah anda yakin ingin menghapus user?",
                text: "User yang sudah dihapus tidak dapat dikembalikan lagi!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/user-operator-admin/hapus-"+user_operator_id+"";
                }
            });
        });
    </script>
@endpush
