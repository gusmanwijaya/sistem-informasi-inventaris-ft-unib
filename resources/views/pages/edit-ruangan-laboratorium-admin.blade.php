@extends('layouts.app')

@section('title')
    Edit Ruangan {{ auth()->user()->name }} - SI Inventaris Barang FT UNIB
@endsection

@section('content')
<div class="container-fluid" id="toastvue">
    <a href="/data-ruangan-laboratorium-admin"><i class="fas fa-fw fa-arrow-left mb-3"></i></a>
    <h4 class="mb-3">Edit Ruangan Laboratorium</h4>
    <div class="row">
        <div class="col-12">
        <form method="POST" action="/data-ruangan-laboratorium-admin/updateLaboratorium-{{ $data_laboratorium->id }}">
            {{ csrf_field() }}
            <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('nama_laboratorium') ? 'has-error' : '' }}">
                            <label for="nama_laboratorium" class="label-modal">Nama Laboratorium</label>
                            <input type="text" class="form-control" id="nama_laboratorium" 
                            name="nama_laboratorium" value="{{ $data_laboratorium->nama_laboratorium }}">
                            @if($errors->has('nama_laboratorium'))
                            <span class="help-block">{{ $errors->first('nama_laboratorium') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('prodi_id') ? 'has-error' : '' }}">
                            <label for="prodi_id" class="label-modal">Prodi</label>
                            <select
                            name="prodi_id"
                            id="prodi_id"
                            class="form-control"
                            >
                            @foreach($data_prodi as $prodi)
                            <option value="{{ $prodi->id }}" @if($data_laboratorium->prodi_id == $prodi->id) selected @endif>
                                {{ $prodi->nama_prodi }}
                            </option>
                            @endforeach
                            </select>
                            @if($errors->has('prodi_id'))
                            <span class="help-block">{{ $errors->first('prodi_id') }}</span>
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