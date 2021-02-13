@extends('layouts.app')

@section('title')
    Ubah Password User - SI Inventaris Barang FT UNIB
@endsection

@section('content')
<div class="container-fluid" id="toastvue">
    <a href="/user-operator-admin/edit-{{ $data_user->id }}"><i class="fas fa-fw fa-arrow-left mb-3"></i></a>
    <h4 class="mb-3">Ubah Password User</h4>
    <div class="row">
        <div class="col-12">
        <form method="POST" action="/ubah-password-user-operator-admin/update-{{ $data_user->id }}">
            {{ csrf_field() }}
            <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('password_lama') ? 'has-error' : '' }}">
                            <label for="password_lama" class="label-modal">Password Lama</label>
                            <input type="text" class="form-control" id="password_lama" 
                            name="password_lama" >
                            @if($errors->has('password_lama'))
                            <span class="help-block">{{ $errors->first('password_lama') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('password_baru') ? 'has-error' : '' }}">
                            <label for="password_baru" class="label-modal">Password Baru</label>
                            <input type="text" class="form-control" id="password_baru" 
                            name="password_baru" >
                            @if($errors->has('password_baru'))
                            <span class="help-block">{{ $errors->first('password_baru') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('password_konfirmasi') ? 'has-error' : '' }}">
                            <label for="password_konfirmasi" class="label-modal">Konfirmasi Password</label>
                            <input type="text" class="form-control" id="password_konfirmasi" 
                            name="password_konfirmasi" >
                            @if($errors->has('password_konfirmasi'))
                            <span class="help-block">{{ $errors->first('password_konfirmasi') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-sm btn-logout"><i class="fas fa-save p-1"></i> Simpan</button>
                    </div>
                </div>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection