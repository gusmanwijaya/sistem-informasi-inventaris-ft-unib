@extends('layouts.operator')

@section('title')
    Laporan {{ auth()->user()->name }} - SI Inventaris Barang FT UNIB
@endsection

@section('content')
<!-- Page Content -->
<div class="container-fluid" id="toastvue">
    <div class="alert alert-success" data-aos="fade-left"><i class="fas fa-fw fa-clipboard"></i> Laporan Gedung Laboratorium</div>
    <div class="card shadow mb-5" data-aos="fade-left">
        <div class="card-body">
            <form action="/cetak-barang-laboratorium-operator" target="_blank" method="GET">
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <h4>Cetak laporan berdasarkan</h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <select name="kode_barang" class="form-control">
                            <option value="">Kode Barang</option>
                            @foreach($data_barang_laboratorium as $barang)
                            <option value="{{ $barang->kode_barang }}">{{ $barang->kode_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <select name="nama_barang" class="form-control">
                            <option value="">Nama Barang</option>
                            @foreach($data_barang_laboratorium as $barang)
                            <option value="{{ $barang->nama_barang }}">{{ $barang->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <select name="laboratorium_id" class="form-control">
                            <option value="">Laboratorium</option>
                            @foreach($data_laboratorium as $laboratorium)
                            <option value="{{ $laboratorium->id }}">{{ $laboratorium->nama_laboratorium }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <select name="id_prodi" class="form-control">
                            <option value="">Prodi</option>
                            @foreach($data_prodi as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <select name="kondisi" class="form-control">
                            <option value="">Kondisi</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="col-md-12 mb-1">
                        <h4>Tahun laporan</h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <select name="tahun_laporan" class="form-control">
                            <option value="">Pilih</option>
                            <option value="{{ $date }}">{{ $date }}</option>
                            @for ($i = 1; $i <= 100; $i++)
                                <option value="{{ $date + $i }}">{{ $date + $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-3 mt-1 mb-1">
                        <button type="submit" class="btn btn-sm btn-tambah mr-1"><i class="fas fa-print p-1"></i> Cetak</button>
                        <button type="reset" class="btn btn-sm btn-logout"><i class="fas fa-sync p-1"></i> Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection