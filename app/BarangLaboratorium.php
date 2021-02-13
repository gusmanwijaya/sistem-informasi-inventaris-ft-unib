<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangLaboratorium extends Model
{
    protected $table = 'barang_laboratorium';

    protected $fillable = ['kode_barang', 'nama_barang', 'merek' ,'jumlah', 'satuan', 'asal_barang', 'tahun_barang', 'laboratorium_id', 'kondisi', 'ada_tidak'];

    public function laboratorium()
    {
        return $this->belongsTo('App\Laboratorium', 'laboratorium_id');
    }
}
