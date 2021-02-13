<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    protected $table = 'laboratorium';

    protected $fillable = ['nama_laboratorium', 'prodi_id'];

    public function prodi()
    {
        return $this->belongsTo('App\Prodi', 'prodi_id');
    }

    public function barangLaboratorium()
    {
        return $this->hasMany('App\BarangLaboratorium');
    }
}
