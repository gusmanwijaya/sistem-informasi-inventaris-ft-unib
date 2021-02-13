@extends('layouts.operator')

@section('title')
    Edit Ruangan {{ auth()->user()->name }} - SI Inventaris Barang FT UNIB
@endsection

@section('content')
<div class="container-fluid" id="toastvue">
    <a href="/data-ruangan-dekanat-operator"><i class="fas fa-fw fa-arrow-left mb-3"></i></a>
    <h4 class="mb-3">Edit Ruangan Dekanat</h4>
    <div class="row">
        <div class="col-12">
        <form method="POST" action="/data-ruangan-dekanat-operator/updateDekanat-{{ $data_dekanat->id }}">
            {{ csrf_field() }}
            <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('nama_ruangan') ? 'has-error' : '' }}">
                            <label for="nama_ruangan" class="label-modal">Nama Ruangan</label>
                            <input type="text" class="form-control" id="nama_ruangan" 
                            name="nama_ruangan" value="{{ $data_dekanat->nama_ruangan }}">
                            @if($errors->has('nama_ruangan'))
                            <span class="help-block">{{ $errors->first('nama_ruangan') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('kode_ruangan') ? 'has-error' : '' }}">
                            <label for="kode_ruangan" class="label-modal">Kode Ruangan</label>
                            <input type="text" class="form-control" id="kode_ruangan" 
                            name="kode_ruangan" value="{{ $data_dekanat->kode_ruangan }}" >
                            @if($errors->has('kode_ruangan'))
                            <span class="help-block">{{ $errors->first('kode_ruangan') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col text-right">
                    <button
                    type="submit"
                    class="btn btn-edit"
                    >
                    <i class="fas fa-save p-1"></i> Simpan
                    </button>
                </div>
                </div>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection