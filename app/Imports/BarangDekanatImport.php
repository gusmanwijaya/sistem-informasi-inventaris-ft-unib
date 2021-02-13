<?php

namespace App\Imports;

use App\BarangDekanat;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BarangDekanatImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if($key >= 1) {
                BarangDekanat::create([
                    'kode_barang' => $row[0],
                    'nama_barang' => $row[1],
                    'merek' => $row[2],
                    'jumlah' => $row[3],
                    'satuan' => $row[4],
                    'asal_barang' => $row[5],
                    'tahun_barang' => $row[6],
                    'ruangan_id' => $row[7],
                    'kondisi' => $row[8],
                    'ada_tidak' => $row[9]
                ]);
            }
        }
    }
}
