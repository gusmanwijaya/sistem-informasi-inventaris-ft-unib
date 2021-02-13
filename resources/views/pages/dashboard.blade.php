@extends('layouts.app')

@section('title')
    Dashboard {{ auth()->user()->name }} - SI Inventaris Barang FT UNIB
@endsection

@section('content')
<!-- Page Content -->
<div class="container-fluid" id="toastvue">
    <div class="alert alert-success"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</div>
    <div class="alert alert-success" data-aos="fade-up">
        <h4 class="mb-3">Selamat Datang!</h4>
        <p>
            Selamat datang di Sistem Informasi Inventaris Barang Fakultas Teknik Universitas Bengkulu.
            <br>Anda login sebagai <strong>{{ auth()->user()->name }}</strong>.
        </p>
    </div>
    <div class="row" data-aos="fade-left">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang Dekanat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ totalBarangDekanat() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-database fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Barang Laboratorium</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ totalBarangLaboratorium() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-database fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ruangan Dekanat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ totalDekanat() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-door-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ruangan Laboratorium</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ totalLaboratorium() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-door-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection