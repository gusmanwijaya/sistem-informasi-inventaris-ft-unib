<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\BarangDekanat;
use \App\BarangLaboratorium;
use \App\Dekanat;
use \App\Laboratorium;
use \App\Prodi;
use Maatwebsite\Excel\Facades\Excel;
use \App\Exports\BarangDekanatExport;
use \App\Exports\BarangLaboratoriumExport;
use App\KodeBarang;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function dataBarangDekanat(Request $request)
    {
        $data_dekanat = Dekanat::all();
        $nama_barang_filter = BarangDekanat::all();
        $kode_barang = KodeBarang::all();

        $data_barang_dekanat = BarangDekanat::query();

        if ($request->filled('kode_barang')) {
            $data_barang_dekanat->where('kode_barang', $request->kode_barang);
        }

        if ($request->filled('ruangan_id')) {
            $data_barang_dekanat->where('ruangan_id', $request->ruangan_id);
        }

        if ($request->filled('kondisi')) {
            $data_barang_dekanat->where('kondisi', $request->kondisi);
        }

        return view('pages.data-barang-dekanat-operator', [
                'data_barang_dekanat' => $data_barang_dekanat->get(),
                'data_dekanat' => $data_dekanat,
                'nama_barang_filter' => $nama_barang_filter,
                'kode_barang' => $kode_barang
            ]
        );
    }

    public function dataBarangLaboratorium(Request $request)
    {
        $data_laboratorium = Laboratorium::all();
        $nama_barang_filter = BarangLaboratorium::all();
        $data_prodi = Prodi::all();
        $kode_barang = KodeBarang::all();

        $data_barang_laboratorium = BarangLaboratorium::query();

        if ($request->filled('kode_barang')) {
            $data_barang_laboratorium->where('kode_barang', $request->kode_barang);
        }

        if ($request->filled('laboratorium_id')) {
            $data_barang_laboratorium->where('laboratorium_id', $request->laboratorium_id);
        }

        if ($request->filled('id_prodi')) {
            $data_barang_laboratorium->join('laboratorium', 'laboratorium.id', '=', 'barang_laboratorium.laboratorium_id')
                ->join('prodi', 'prodi.id', '=', 'laboratorium.prodi_id')
                ->where('laboratorium.prodi_id', '=', $request->id_prodi);
        }

        if ($request->filled('kondisi')) {
            $data_barang_laboratorium->where('kondisi', $request->kondisi);
        }

        return view('pages.data-barang-laboratorium-operator', [
                'data_barang_laboratorium' => $data_barang_laboratorium->get(),
                'data_laboratorium' => $data_laboratorium,
                'nama_barang_filter' => $nama_barang_filter,
                'data_prodi' => $data_prodi,
                'kode_barang' => $kode_barang
            ]
        );
    }

    // public function fetch(Request $request)
    // {
    //     $select = $request->get('select');
    //     $value = $request->get('value');
    //     $dependent = $request->get('dependent');
    //     $data = DB::table('kode_barang')->where($select, $value)->get();

    //     $output = '
    //         <option value="">Pilih</option>
    //     ';

    //     foreach ($data as $row) {
    //         $output .= '
    //             <option value="'.$row->$dependent.'">'.$row->$dependent.'</option>
    //         ';
    //     }

    //     echo $output;
    // }

    public function dataRuanganDekanat()
    {
        $data_dekanat = Dekanat::all();
        $data_prodi = Prodi::all();
        return view('pages.data-ruangan-dekanat-operator', 
            [
                'data_dekanat' => $data_dekanat,
                'data_prodi' => $data_prodi
            ]
        );
    }

    public function dataRuanganLaboratorium(Request $request)
    {
        $data_prodi = Prodi::all();
        $data_ruangan_laboratorium = Laboratorium::query();

        if ($request->filled('prodi_id')) {
            $data_ruangan_laboratorium->where('prodi_id', $request->prodi_id);
        }

        return view('pages.data-ruangan-laboratorium-operator', [
                'data_ruangan_laboratorium' => $data_ruangan_laboratorium->get(),
                'data_prodi' => $data_prodi
            ]
        );
    }

    public function editLaboratorium(BarangLaboratorium $barangLaboratorium)
    {
        $data_laboratorium = Laboratorium::all();
        $kode_barang = KodeBarang::all();
        return view('pages.edit-barang-laboratorium-operator', 
            [
                'data_barang_laboratorium' => $barangLaboratorium,
                'data_laboratorium' => $data_laboratorium,
                'kode_barang' => $kode_barang
            ]
        );
    }

    public function updateLaboratorium(Request $request, BarangLaboratorium $barangLaboratorium)
    {
        $barangLaboratorium->update($request->all());
        return redirect('/data-barang-laboratorium-operator')->with('sukses', 'Data barang berhasil di edit!');
    }

    public function editDekanat(BarangDekanat $barangDekanat)
    {
        $data_dekanat = Dekanat::all();
        $kode_barang = KodeBarang::all();
        return view('pages.edit-barang-dekanat-operator', 
            [
                'data_barang_dekanat' => $barangDekanat,
                'data_dekanat' => $data_dekanat,
                'kode_barang' => $kode_barang
            ]
        );
    }

    public function updateDekanat(Request $request, BarangDekanat $barangDekanat)
    {
        $barangDekanat->update($request->all());
        return redirect('/data-barang-dekanat-operator')->with('sukses', 'Data barang berhasil di edit!');
    }

    public function laporanBarangDekanat(Request $request)
    {
        $date = Carbon::now()->isoFormat('Y');

        $data_barang_dekanat = BarangDekanat::query();

        if ($request->filled('nama_barang')) {
            $data_barang_dekanat->where('nama_barang', $request->nama_barang);
        }

        if ($request->filled('ruangan_id')) {
            $data_barang_dekanat->where('ruangan_id', $request->ruangan_id);
        }

        if ($request->filled('kondisi')) {
            $data_barang_dekanat->where('kondisi', $request->kondisi);
        }

        $data_dekanat = Dekanat::all();

        return view('pages.laporan-barang-dekanat-operator', [
                'data_barang_dekanat' => $data_barang_dekanat->get(),
                'data_dekanat' => $data_dekanat,
                'date' => $date
            ]
        );
    }

    public function laporanBarangLaboratorium(Request $request)
    {
        $date = Carbon::now()->isoFormat('Y');

        $data_laboratorium = Laboratorium::all();
        $data_barang_laboratorium = BarangLaboratorium::query();
        $data_prodi = Prodi::all();

        if ($request->filled('kode_barang')) {
            $data_barang_laboratorium->where('kode_barang', $request->kode_barang);
        }

        if ($request->filled('nama_barang')) {
            $data_barang_laboratorium->where('nama_barang', $request->nama_barang);
        }

        if ($request->filled('laboratorium_id')) {
            $data_barang_laboratorium->where('laboratorium_id', $request->laboratorium_id);
        }

        if ($request->filled('id_prodi')) {
            $data_barang_laboratorium->join('laboratorium', 'laboratorium.id', '=', 'barang_laboratorium.laboratorium_id')
                ->join('prodi', 'prodi.id', '=', 'laboratorium.prodi_id')
                ->where('laboratorium.prodi_id', '=', $request->id_prodi);
        }

        if ($request->filled('kondisi')) {
            $data_barang_laboratorium->where('kondisi', $request->kondisi);
        }

        return view('pages.laporan-barang-laboratorium-operator', [
                'data_barang_laboratorium' =>$data_barang_laboratorium->get(),
                'data_laboratorium' => $data_laboratorium,
                'data_prodi' => $data_prodi,
                'date' => $date
            ]
        );
    }

    public function cetakBarangDekanat(Request $request)
    {
        $data_barang_dekanat = BarangDekanat::query();

        if ($request->filled('kode_barang')) {
            $data_barang_dekanat->where('kode_barang', $request->kode_barang);
        }

        if ($request->filled('nama_barang')) {
            $data_barang_dekanat->where('nama_barang', $request->nama_barang);
        }

        if ($request->filled('ruangan_id')) {
            $data_barang_dekanat->where('ruangan_id', $request->ruangan_id);
        }

        if ($request->filled('kondisi')) {
            $data_barang_dekanat->where('kondisi', $request->kondisi);
        }

        if ($request->filled('tahun_laporan')) {
            $date = $request->tahun_laporan;
        }

        if ($request->filled('tahun_laporan') == null) {
            $date = "";
        }

        return view('pages.cetak-barang-dekanat-operator', [
                'data_barang_dekanat' => $data_barang_dekanat->get(),
                'date' => $date
            ]
        );
    }

    public function cetakBarangLaboratorium(Request $request)
    {
        $data_barang_laboratorium = BarangLaboratorium::query();

        if ($request->filled('kode_barang')) {
            $data_barang_laboratorium->where('kode_barang', $request->kode_barang);
        }

        if ($request->filled('nama_barang')) {
            $data_barang_laboratorium->where('nama_barang', $request->nama_barang);
        }

        if ($request->filled('laboratorium_id')) {
            $data_barang_laboratorium->where('laboratorium_id', $request->laboratorium_id);
        }

        if ($request->filled('id_prodi')) {
            $data_barang_laboratorium->join('laboratorium', 'laboratorium.id', '=', 'barang_laboratorium.laboratorium_id')
                ->join('prodi', 'prodi.id', '=', 'laboratorium.prodi_id')
                ->where('laboratorium.prodi_id', '=', $request->id_prodi);
        }

        if ($request->filled('kondisi')) {
            $data_barang_laboratorium->where('kondisi', $request->kondisi);
        }

        if ($request->filled('tahun_laporan')) {
            $date = $request->tahun_laporan;
        }

        if ($request->filled('tahun_laporan') == null) {
            $date = "";
        }

        return view('pages.cetak-barang-laboratorium-operator', [
                'data_barang_laboratorium' => $data_barang_laboratorium->get(),
                'date' => $date
            ]
        );
    }

    public function exportDekanatExcel()
    {
        return Excel::download(new BarangDekanatExport, 'Data Barang Dekanat - Sistem Informasi Inventaris Barang FT UNIB.xlsx');
    }

    public function exportLaboratoriumExcel()
    {
        return Excel::download(new BarangLaboratoriumExport, 'Data Barang Laboratorium - Sistem Informasi Inventaris Barang FT UNIB.xlsx');
    }
}

