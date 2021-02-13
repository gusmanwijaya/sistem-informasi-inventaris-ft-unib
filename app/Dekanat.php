<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dekanat extends Model
{
    protected $table = 'dekanat';

    protected $fillable = ['nama_ruangan', 'kode_ruangan'];

    public function barangDekanat()
    {
        return $this->hasMany('App\BarangDekanat', 'id');
    }
}
