<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangDekanat extends Model
{
    protected $table = 'barang_dekanat';

    protected $fillable = ['kode_barang', 'nama_barang', 'merek' ,'jumlah', 'satuan', 'asal_barang', 'tahun_barang', 'ruangan_id', 'kondisi', 'ada_tidak'];

    public function dekanat()
    {
        return $this->belongsTo('App\Dekanat', 'ruangan_id');
    }
}
