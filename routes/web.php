<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route Home
Route::get('/', 'HomeController@index')->name('login');
Route::post('/postlogin', 'HomeController@postlogin')->name('postlogin');
Route::get('/logout', 'HomeController@logout')->name('logout');

//Route autentikasi dengan menggunakan middleware
Route::group(['middleware' => ['auth', 'role:admin']], function () {

    //Route Admin

    //Dashboard
    Route::get('/dashboard-admin', 'AdminController@index')->name('dashboard-admin');

    //Profile Admin
    Route::get('/profile-admin', 'AdminController@profile')->name('profile-admin');
    Route::post('/profile-admin/edit-{user}', 'AdminController@profileEdit')->name('profile-admin-edit');
    Route::get('/ubah-password-admin', 'AdminController@ubahPassword')->name('ubah-password-admin');
    Route::post('/ubah-password-admin/edit-{user}', 'AdminController@updatePassword')->name('update-password-admin');

    //Read
    Route::get('/data-barang-dekanat-admin', 'AdminController@dataBarangDekanat')->name('data-barang-dekanat-admin');
    Route::get('/data-barang-laboratorium-admin', 'AdminController@dataBarangLaboratorium')->name('data-barang-laboratorium-admin');

    //Create
    Route::post('/data-barang-laboratorium-admin/tambahLaboratorium', 'AdminController@tambahBarangLaboratorium')->name('data-barang-laboratorium-admin-tambahBarangLaboratorium');
    Route::post('/data-barang-dekanat-admin/tambahDekanat', 'AdminController@tambahBarangDekanat')->name('data-barang-dekanat-admin-tambahBarangDekanat');
    
    // Route::post('/data-barang-dekanat-admin/fetch', 'AdminController@fetch')->name('data-barang-dekanat-admin-fetch');
    // Route::post('/data-barang-laboratorium-admin/fetch', 'AdminController@fetch')->name('data-barang-laboratorium-admin-fetch');
    
    //Update
    Route::get('/data-barang-laboratorium-admin/editLaboratorium-{barangLaboratorium}', 'AdminController@editLaboratorium')->name('data-barang-laboratorium-admin-editLaboratorium');
    Route::post('/data-barang-laboratorium-admin/updateLaboratorium-{barangLaboratorium}', 'AdminController@updateLaboratorium')->name('data-barang-laboratorium-admin-updateLaboratorium');
    Route::get('/data-barang-dekanat-admin/editDekanat-{barangDekanat}', 'AdminController@editDekanat')->name('data-barang-dekanat-admin-editDekanat');
    Route::post('/data-barang-dekanat-admin/updateDekanat-{barangDekanat}', 'AdminController@updateDekanat')->name('data-barang-dekanat-admin-updateDekanat');
    
    //Delete
    Route::get('/data-barang-laboratorium-admin/hapusLaboratorium-{barangLaboratorium}', 'AdminController@hapusBarangLaboratorium')->name('data-barang-laboratorium-admin-hapusLaboratorium');
    Route::get('/data-barang-dekanat-admin/hapusDekanat-{barangDekanat}', 'AdminController@hapusBarangDekanat')->name('data-barang-dekanat-admin-hapusDekanat');
    
    //Import & Export
    Route::post('/data-barang-dekanat-admin/importDekanat', 'AdminController@importDekanatExcel')->name('data-barang-dekanat-admin-import-dekanat-excel');
    Route::post('/data-barang-laboratorium-admin/importLaboratorium', 'AdminController@importLaboratoriumExcel')->name('data-barang-laboratorium-admin-import-laboratorium-excel');
    Route::get('/data-barang-dekanat-admin/exportDekanat', 'AdminController@exportDekanatExcel')->name('data-barang-dekanat-admin-export-dekanat-excel');
    Route::get('/data-barang-laboratorium-admin/exportLaboratorium', 'AdminController@exportLaboratoriumExcel')->name('data-barang-laboratorium-admin-export-laboratorium-excel');

    //Read
    Route::get('/data-ruangan-dekanat-admin', 'AdminController@dataRuanganDekanat')->name('data-ruangan-dekanat-admin');
    Route::get('/data-ruangan-laboratorium-admin', 'AdminController@dataRuanganLaboratorium')->name('data-ruangan-laboratorium-admin');
    
    //Create
    Route::post('/data-ruangan-dekanat-admin/tambahRuanganDekanat', 'AdminController@tambahRuanganDekanat')->name('data-ruangan-dekanat-admin-tambah-ruangan-dekanat');
    Route::post('/data-ruangan-laboratorium-admin/tambahRuanganLaboratorium', 'AdminController@tambahRuanganLaboratorium')->name('data-ruangan-laboratorium-admin-tambah-ruangan-laboratorium');
    
    //Update
    Route::get('/data-ruangan-dekanat-admin/editDekanat-{dekanat}', 'AdminController@editRuanganDekanat')->name('data-ruangan-dekanat-admin-edit-ruangan-dekanat');
    Route::post('/data-ruangan-dekanat-admin/updateDekanat-{dekanat}', 'AdminController@updateRuanganDekanat')->name('data-ruangan-dekanat-admin-update-ruangan-dekanat');
    Route::get('/data-ruangan-laboratorium-admin/editLaboratorium-{laboratorium}', 'AdminController@editRuanganLaboratorium')->name('data-ruangan-laboratorium-admin-edit-ruangan-laboratorium');
    Route::post('/data-ruangan-laboratorium-admin/updateLaboratorium-{laboratorium}', 'AdminController@updateRuanganLaboratorium')->name('data-ruangan-laboratorium-admin-update-ruangan-laboratorium');

    //Delete
    Route::get('/data-ruangan-dekanat-admin/hapusDekanat-{dekanat}', 'AdminController@hapusRuanganDekanat')->name('data-ruangan-dekanat-admin-hapus-ruangan-dekanat');
    Route::get('/data-ruangan-laboratorium-admin/hapusLaboratorium-{laboratorium}', 'AdminController@hapusRuanganLaboratorium')->name('data-ruangan-laboratorium-admin-hapus-ruangan-laboratorium');

    //Cetak
    Route::get('/laporan-barang-dekanat-admin', 'AdminController@laporanBarangDekanat')->name('laporan-barang-dekanat-admin');
    Route::get('/laporan-barang-laboratorium-admin', 'AdminController@laporanBarangLaboratorium')->name('laporan-barang-laboratorium-admin');
    Route::get('/cetak-barang-dekanat-admin', 'AdminController@cetakBarangDekanat')->name('cetak-barang-dekanat-admin');
    Route::get('/cetak-barang-laboratorium-admin', 'AdminController@cetakBarangLaboratorium')->name('cetak-barang-laboratorium-admin');

    //Read
    Route::get('/user-operator-admin', 'AdminController@dataUserOperator')->name('user-operator-admin');

    //Create
    Route::post('/user-operator-admin/tambah', 'AdminController@tambahUserOperator')->name('tambah-user-operator-admin');

    //Update
    Route::get('/user-operator-admin/edit-{user}', 'AdminController@editUserOperator')->name('user-operator-admin-edit');
    Route::post('/user-operator-admin/update-{user}', 'AdminController@updateUserOperator')->name('user-operator-admin-update');
    Route::get('/ubah-password-user-operator-admin/edit-{user}', 'AdminController@ubahPasswordUserOperator')->name('ubah-password-user-operator-admin-edit');
    Route::post('/ubah-password-user-operator-admin/update-{user}', 'AdminController@updatePasswordUserOperator')->name('update-password-user-operator-admin-update');

    //Delete
    Route::get('/user-operator-admin/hapus-{user}', 'AdminController@hapusUserOperator')->name('user-operator-admin-hapus');
});

Route::group(['middleware' => ['auth', 'role:operator']], function () {
    //Route Operator
    Route::get('/dashboard-operator', 'OperatorController@index')->name('dashboard-operator');

    //Read
    Route::get('/data-barang-dekanat-operator', 'OperatorController@dataBarangDekanat')->name('data-barang-dekanat-operator');
    Route::get('/data-barang-laboratorium-operator', 'OperatorController@dataBarangLaboratorium')->name('data-barang-laboratorium-operator');
    
    // Route::post('/data-barang-dekanat-operator/fetch', 'OperatorController@fetch')->name('data-barang-dekanat-operator-fetch');
    // Route::post('/data-barang-laboratorium-operator/fetch', 'OperatorController@fetch')->name('data-barang-laboratorium-operator-fetch');

    //Update
    Route::get('/data-barang-laboratorium-operator/editLaboratorium-{barangLaboratorium}', 'OperatorController@editLaboratorium')->name('data-barang-laboratorium-operator-editLaboratorium');
    Route::post('/data-barang-laboratorium-operator/updateLaboratorium-{barangLaboratorium}', 'OperatorController@updateLaboratorium')->name('data-barang-laboratorium-operator-updateLaboratorium');
    Route::get('/data-barang-dekanat-operator/editDekanat-{barangDekanat}', 'OperatorController@editDekanat')->name('data-barang-dekanat-operator-editDekanat');
    Route::post('/data-barang-dekanat-operator/updateDekanat-{barangDekanat}', 'OperatorController@updateDekanat')->name('data-barang-dekanat-operator-updateDekanat');
    
    //Read
    Route::get('/data-ruangan-dekanat-operator', 'OperatorController@dataRuanganDekanat')->name('data-ruangan-dekanat-operator');
    Route::get('/data-ruangan-laboratorium-operator', 'OperatorController@dataRuanganLaboratorium')->name('data-ruangan-laboratorium-operator');
    
    //Cetak
    Route::get('/laporan-barang-dekanat-operator', 'OperatorController@laporanBarangDekanat')->name('laporan-barang-dekanat-operator');
    Route::get('/laporan-barang-laboratorium-operator', 'OperatorController@laporanBarangLaboratorium')->name('laporan-barang-laboratorium-operator');
    Route::get('/cetak-barang-dekanat-operator', 'OperatorController@cetakBarangDekanat')->name('cetak-barang-dekanat-operator');
    Route::get('/cetak-barang-laboratorium-operator', 'OperatorController@cetakBarangLaboratorium')->name('cetak-barang-laboratorium-operator');

    //Export Excel
    Route::get('/data-barang-dekanat-operator/exportDekanat', 'OperatorController@exportDekanatExcel')->name('data-barang-dekanat-operator-export-dekanat-excel');
    Route::get('/data-barang-laboratorium-operator/exportLaboratorium', 'OperatorController@exportLaboratoriumExcel')->name('data-barang-laboratorium-operator-export-laboratorium-excel');

});

Auth::routes();
