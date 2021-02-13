<?php

namespace App\Exports;

use App\BarangDekanat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangDekanatExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return BarangDekanat::all();
    }

    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Merek',
            'Jumlah',
            'Satuan',
            'Asal Barang',
            'Tahun Barang',
            'Ruangan',
            'Kondisi',
            'Ada/Tidak'
        ];
    }

    public function map($data_barang_dekanat): array
    {
        return [
            $data_barang_dekanat->kode_barang,
            $data_barang_dekanat->nama_barang,
            $data_barang_dekanat->merek,
            $data_barang_dekanat->jumlah,
            $data_barang_dekanat->satuan,
            $data_barang_dekanat->asal_barang,
            $data_barang_dekanat->tahun_barang,
            $data_barang_dekanat->dekanat->nama_ruangan,
            $data_barang_dekanat->kondisi,
            $data_barang_dekanat->ada_tidak
        ];
    }
}
