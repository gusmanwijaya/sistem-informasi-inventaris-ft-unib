@extends('layouts.login')

@section('title')
    Login Page - SI Inventaris Barang FT UNIB
@endsection

@section('content')
<div class="page-login" id="toastvue">
    <div class="section-login" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center row-login">
        <div class="col-lg-6 text-center">
            <img
            src="/img/logo_unib.png"
            alt=""
            class="logo-unib w-auto mb-4 mb-lg-none"
            />
        </div>
        <div class="col-lg-5">
            <h2>
            Sistem Informasi Inventaris Barang <br />
            Fakultas Teknik <br />
            Universitas Bengkulu
            </h2>
            <form class="mt-3" method="POST" action="/postlogin">
                {{ csrf_field() }}
            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                <label class="label-form" for="username">Username</label>
                <input
                type="text"
                name="username"
                id="username"
                class="form-control w-75"
                aria-describedby="emailHelp"
                value="{{ old('username') }}"
                />
                @if($errors->has('username'))
                    <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label class="label-form" for="password">Password</label>
                <input name="password" id="password" type="password" class="form-control w-75" />
                @if($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block w-75 mt-4">Login</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
