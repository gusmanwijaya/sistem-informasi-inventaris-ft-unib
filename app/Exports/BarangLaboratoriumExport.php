<?php

namespace App\Exports;

use App\BarangLaboratorium;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangLaboratoriumExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return BarangLaboratorium::all();
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
            'Laboratorium',
            'Kondisi',
            'Ada/Tidak'
        ];
    }

    public function map($data_barang_laboratorium): array
    {
        return [
            $data_barang_laboratorium->kode_barang,
            $data_barang_laboratorium->nama_barang,
            $data_barang_laboratorium->merek,
            $data_barang_laboratorium->jumlah,
            $data_barang_laboratorium->satuan,
            $data_barang_laboratorium->asal_barang,
            $data_barang_laboratorium->tahun_barang,
            $data_barang_laboratorium->laboratorium->nama_laboratorium,
            $data_barang_laboratorium->kondisi,
            $data_barang_laboratorium->ada_tidak
        ];
    }
}
