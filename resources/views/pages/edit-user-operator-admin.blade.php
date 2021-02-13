@extends('layouts.app')

@section('title')
    Edit User Operator - SI Inventaris Barang FT UNIB
@endsection

@section('content')
<div class="container-fluid" id="toastvue">
    <a href="/user-operator-admin"><i class="fas fa-fw fa-arrow-left mb-3"></i></a>
    <h4 class="mb-3">Edit User Operator</h4>
    <div class="row">
        <div class="col-12">
        <form method="POST" action="/user-operator-admin/update-{{ $data_user->id }}">
            {{ csrf_field() }}
            <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name" class="label-modal">Nama User</label>
                            <input type="text" class="form-control" id="name" 
                            name="name" value="{{ $data_user->name }}" >
                            @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                            <label for="username" class="label-modal">Username</label>
                            <input type="text" class="form-control" id="username" 
                            name="username" value="{{ $data_user->username }}" disabled>
                            @if($errors->has('username'))
                            <span class="help-block">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password" class="label-modal">Password</label>
                            <input type="text" class="form-control" id="password" 
                            name="password" value="{{ $data_user->password }}" disabled>
                            @if($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <a href="/ubah-password-user-operator-admin/edit-{{ $data_user->id }}" class="btn btn-sm btn-logout mr-2"><i class="fas fa-key p-1"></i> Ubah Password</a>
                        <button type="submit" class="btn btn-sm btn-edit"><i class="fas fa-save p-1"></i> Simpan</button>
                    </div>
                </div>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection