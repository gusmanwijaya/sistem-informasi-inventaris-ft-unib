<?php
use \App\BarangLaboratorium;
use \App\BarangDekanat;
use \App\Laboratorium;
use \App\Dekanat;
use \App\Prodi;
use \App\User;

function totalBarangLaboratorium()
{
    return BarangLaboratorium::count();
}

function totalLaboratorium()
{
    return Laboratorium::count();
}

function totalBarangDekanat()
{
    return BarangDekanat::count();
}

function totalDekanat()
{
    return Dekanat::count();
}

function totalProdi()
{
    return Prodi::count();
}

function totalUser()
{
    return User::count();
}

?>