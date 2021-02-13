<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use \App\BarangLaboratorium;
use \App\BarangDekanat;
use \App\Dekanat;
use \App\Prodi;
use \App\Laboratorium;
use \App\Exports\BarangDekanatExport;
use \App\Exports\BarangLaboratoriumExport;
use App\KodeBarang;
use \App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function dataBarangDekanat(Request $request)
    {
        $data_dekanat = Dekanat::all();
        $nama_barang_filter = BarangDekanat::all();
        
        $data_barang_dekanat = BarangDekanat::query();

        $kode_barang = DB::table('kode_barang')->get();

        if ($request->filled('kode_barang')) {
            $data_barang_dekanat->where('kode_barang', $request->kode_barang);
        }

        if ($request->filled('ruangan_id')) {
            $data_barang_dekanat->where('ruangan_id', $request->ruangan_id);
        }

        if ($request->filled('kondisi')) {
            $data_barang_dekanat->where('kondisi', $request->kondisi);
        }

        return view('pages.data-barang-dekanat-admin', [
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

        return view('pages.data-barang-laboratorium-admin', [
                'data_barang_laboratorium' => $data_barang_laboratorium->get(),
                'data_laboratorium' => $data_laboratorium,
                'nama_barang_filter' => $nama_barang_filter,
                'data_prodi' => $data_prodi,
                'kode_barang' => $kode_barang
            ]
        );
    }

    public function dataRuanganDekanat()
    {
        $data_dekanat = Dekanat::all();
        $data_prodi = Prodi::all();
        return view('pages.data-ruangan-dekanat-admin', 
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

        return view('pages.data-ruangan-laboratorium-admin', [
                'data_ruangan_laboratorium' => $data_ruangan_laboratorium->orderBy('prodi_id', 'asc')->get(),
                'data_prodi' => $data_prodi
            ]
        );
    }

    public function tambahBarangLaboratorium(Request $request)
    {
        $rules = [
            'nama_barang' => 'required'
        ];

        $message = [
            'nama_barang.required' => 'Nama barang tidak boleh kosong!'
        ];

        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            BarangLaboratorium::create($request->all());
            return redirect('/data-barang-laboratorium-admin')->with('sukses', 'Data barang berhasil ditambahkan!');
        }
    }

    public function tambahBarangDekanat(Request $request)
    {
        $rules = [
            'nama_barang' => 'required'
        ];

        $message = [
            'nama_barang.required' => 'Nama barang tidak boleh kosong!'
        ];

        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            BarangDekanat::create($request->all());
            return redirect('/data-barang-dekanat-admin')->with('sukses', 'Data barang berhasil ditambahkan!');
        }
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

    public function editLaboratorium(BarangLaboratorium $barangLaboratorium)
    {
        $data_laboratorium = Laboratorium::all();
        $kode_barang = KodeBarang::all();
        return view('pages.edit-barang-laboratorium-admin', 
            [
                'data_barang_laboratorium' => $barangLaboratorium,
                'data_laboratorium' => $data_laboratorium,
                'kode_barang' => $kode_barang
            ]
        );
    }

    public function updateLaboratorium(Request $request, BarangLaboratorium $barangLaboratorium)
    {
        $rules = [
            'nama_barang' => 'required'
        ];

        $message = [
            'nama_barang.required' => 'Nama barang tidak boleh kosong!'
        ];

        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            $barangLaboratorium->update($request->all());
            return redirect('/data-barang-laboratorium-admin')->with('sukses', 'Data barang berhasil di edit!');
        }
    }

    public function editDekanat(BarangDekanat $barangDekanat)
    {
        $data_dekanat = Dekanat::all();
        $kode_barang = KodeBarang::all();
        return view('pages.edit-barang-dekanat-admin', 
            [
                'data_barang_dekanat' => $barangDekanat,
                'data_dekanat' => $data_dekanat,
                'kode_barang' => $kode_barang
            ]
        );
    }

    public function updateDekanat(Request $request, BarangDekanat $barangDekanat)
    {
        $rules = [
            'nama_barang' => 'required'
        ];

        $message = [
            'nama_barang.required' => 'Nama barang tidak boleh kosong!'
        ];

        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            $barangDekanat->update($request->all());
            return redirect('/data-barang-dekanat-admin')->with('sukses', 'Data barang berhasil di edit!');
        }
    }

    public function hapusBarangLaboratorium(BarangLaboratorium $barangLaboratorium)
    {
        $delete = $barangLaboratorium->delete();
        if($delete) {
            return redirect('/data-barang-laboratorium-admin')->with('sukses', 'Data barang berhasil di hapus!');
        } else {
            return redirect('/data-barang-laboratorium-admin')->with('gagal', 'Maaf terjadi kesalahan, data barang tidak berhasil di hapus!');
        }
    }

    public function hapusBarangDekanat(BarangDekanat $barangDekanat)
    {
        if($barangDekanat->delete()) {
            return redirect('/data-barang-dekanat-admin')->with('sukses', 'Data barang berhasil di hapus!');
        } else {
            return redirect('/data-barang-dekanat-admin')->with('gagal', 'Maaf terjadi kesalahan, data barang tidak berhasil di hapus!');
        }
    }

    public function tambahRuanganDekanat(Request $request)
    {
        $rules = ['nama_ruangan' => 'required'];

        $message = ['nama_ruangan.required' => 'Nama ruangan tidak boleh kosong!'];
        
        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            Dekanat::create($request->all());
            return redirect('/data-ruangan-dekanat-admin')->with('sukses', 'Ruangan berhasil ditambahkan!');
        } else {
            return redirect('/data-ruangan-dekanat-admin')->with('gagal', 'Maaf terjadi kesalahan, data ruangan tidak berhasil ditambahkan!');
        }
    }

    public function tambahRuanganLaboratorium(Request $request)
    {
        $rules = ['nama_laboratorium' => 'required'];

        $message = ['nama_laboratorium.required' => 'Nama laboratorium tidak boleh kosong!'];
        
        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            Laboratorium::create($request->all());
            return redirect('/data-ruangan-laboratorium-admin')->with('sukses', 'Ruangan berhasil ditambahkan!');
        } else {
            return redirect('/data-ruangan-laboratorium-admin')->with('gagal', 'Maaf terjadi kesalahan, data ruangan tidak berhasil ditambahkan!');
        }
    }

    public function editRuanganDekanat(Dekanat $dekanat)
    {
        return view('pages.edit-ruangan-dekanat-admin', 
            [
                'data_dekanat' => $dekanat
            ]
        );
    }

    public function updateRuanganDekanat(Request $request, Dekanat $dekanat)
    {
        $rules = ['nama_ruangan' => 'required'];

        $message = ['nama_ruangan.required' => 'Nama ruangan tidak boleh kosong!'];

        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            $dekanat->update($request->all());
            return redirect('/data-ruangan-dekanat-admin')->with('sukses', 'Ruangan berhasil di edit!');
        }
    }

    public function editRuanganLaboratorium(Laboratorium $laboratorium)
    {
        $data_prodi = Prodi::all();
        return view('pages.edit-ruangan-laboratorium-admin', 
            [
                'data_laboratorium' => $laboratorium,
                'data_prodi' => $data_prodi
            ]
        );
    }

    public function updateRuanganLaboratorium(Request $request, Laboratorium $laboratorium)
    {
        $rules = ['nama_laboratorium' => 'required'];

        $message = ['nama_laboratorium.required' => 'Nama laboratorium tidak boleh kosong!'];

        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            $laboratorium->update($request->all());
            return redirect('/data-ruangan-laboratorium-admin')->with('sukses', 'Ruangan berhasil di edit!');
        }
    }

    public function hapusRuanganDekanat(Dekanat $dekanat)
    {
        $check = $dekanat->barangDekanat()->count();

        if($check){
            return redirect('/data-ruangan-dekanat-admin')->with('gagal', 'Ruangan tidak bisa dihapus karena masih memiliki data barang!');
        } else {
            $dekanat->delete();
            return redirect('/data-ruangan-dekanat-admin')->with('sukses', 'Ruangan berhasil di hapus!');
        }
    }

    public function hapusRuanganLaboratorium(Laboratorium $laboratorium)
    {
        $check = $laboratorium->barangLaboratorium()->count();

        if($check){
            return redirect('/data-ruangan-laboratorium-admin')->with('gagal', 'Laboratorium tidak bisa dihapus karena masih memiliki data barang!');
        } else {
            $laboratorium->delete();
            return redirect('/data-ruangan-laboratorium-admin')->with('sukses', 'Laboratorium berhasil di hapus!');
        }
    }

    public function importDekanatExcel(Request $request)
    {
        if($request->file('data-barang-dekanat') == null) {
            return redirect('/data-barang-dekanat-admin')->with('gagal', 'Anda belum memilih file!');
        } else {
            $validate = $this->validate($request, ['data-barang-dekanat' => 'mimes:xls,xlsx']);
            
            if(!$validate) {
                return redirect('/data-barang-dekanat-admin')->with('gagal', 'Format file tidak sesuai!');
            } else {
                Excel::import(new \App\Imports\BarangDekanatImport, $request->file('data-barang-dekanat'));
                return redirect('/data-barang-dekanat-admin')->with('sukses', 'Data barang berhasil di import!');
            }
        }
    }

    public function importLaboratoriumExcel(Request $request)
    {
        if($request->file('data-barang-laboratorium') == null) {
            return redirect('/data-barang-laboratorium-admin')->with('gagal', 'Anda belum memilih file!');
        } else {
            $validate = $this->validate($request, ['data-barang-laboratorium' => 'mimes:xls,xlsx']);
            
            if(!$validate) {
                return redirect('/data-barang-laboratorium-admin')->with('gagal', 'Format file tidak sesuai!');
            } else {
                Excel::import(new \App\Imports\BarangLaboratoriumImport, $request->file('data-barang-laboratorium'));
                return redirect('/data-barang-laboratorium-admin')->with('sukses', 'Data barang berhasil di import!');
            }
        }
    }

    public function laporanBarangDekanat(Request $request)
    {
        $date = Carbon::now()->isoFormat('Y');

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

        $data_dekanat = Dekanat::all();

        return view('pages.laporan-barang-dekanat-admin', [
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

        return view('pages.laporan-barang-laboratorium-admin', [
                'data_barang_laboratorium' => $data_barang_laboratorium->get(),
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

        return view('pages.cetak-barang-dekanat-admin', [
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

        return view('pages.cetak-barang-laboratorium-admin', [
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

    public function dataUserOperator()
    {
        $data_user = User::query();

        return view('pages.user-operator-admin', ['data_user' => $data_user->get()]);
    }

    public function tambahUserOperator(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'min:4'
        ];

        $message = [
            'name.required' => 'Nama user tidak boleh kosong!',
            'username.required' => 'Username tidak boleh kosong!',
            'unique' => 'Username sudah terdaftar',
            'password.min' => 'Password minimal 4 karakter!'
        ];

        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => 'operator',
                'remember_token' => Str::random(60)
            ]);
            return redirect('/user-operator-admin')->with('sukses', 'User berhasil ditambahkan!');
        }
    }

    public function editUserOperator(User $user)
    {
        return view('pages.edit-user-operator-admin', 
            [
                'data_user' => $user
            ]
        );
    }

    public function updateUserOperator(Request $request, User $user)
    {
        $rules = [
            'name' => 'required'
        ];

        $message = [
            'name.required' => 'Nama user tidak boleh kosong!'
        ];

        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            $user->update([
                'name' => $request->name,
            ]);
            return redirect('/user-operator-admin')->with('sukses', 'User berhasil di edit!');
        }
    }

    public function ubahPasswordUserOperator(User $user)
    {
        return view('pages.ubah-password-user-operator-admin', 
            [
                'data_user' => $user
            ]
        );
    }

    public function updatePasswordUserOperator(Request $request, User $user)
    {
        if (!(Hash::check($request->password_lama, $user->password))) {
            return back()->with('gagal', 'Password lama anda salah!');
        }

        if (strcmp($request->password_lama, $request->password_baru) == 0) {
            return back()->with('gagal', 'Password lama tidak boleh sama dengan password baru!');
        }

        $rules = [
            'password_lama' => 'required',
            'password_baru' => 'required|string|min:4',
            'password_konfirmasi' => 'same:password_baru'
        ];

        $message = [
            'password_lama.required' => 'Password lama tidak boleh kosong!',
            'password_baru.required' => 'Password baru tidak boleh kosong!',
            'password_baru.string' => 'Password baru harus berupa karakter, huruf, atau angka!',
            'password_baru.min' => 'Password baru minimal 4 karakter!',
            'password_konfirmasi.same' => 'Password baru dan konfirmasi password tidak sama!'
        ];

        $request->validate($rules, $message);

        $user->password = bcrypt($request->password_baru);
        $user->save();
        return redirect('/user-operator-admin')->with('sukses', 'Password user berhasil di ubah!');
    }

    public function hapusUserOperator(User $user)
    {
        if($user->delete()) {
            return redirect('/user-operator-admin')->with('sukses', 'User berhasil di hapus!');
        } else {
            return redirect('/user-operator-admin')->with('gagal', 'User tidak berhasil di hapus!');
        }
    }

    public function profile()
    {
        return view('pages.profile-admin');
    }

    public function profileEdit(Request $request, User $user)
    {
        $rules = [
            'name' => 'required'
        ];

        $message = [
            'name.required' => 'Nama user tidak boleh kosong!'
        ];

        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            $user->update([
                'name' => $request->name,
            ]);
            return redirect('/profile-admin')->with('sukses', 'User berhasil di edit!');
        }
    }

    public function ubahPassword()
    {
        return view('pages.ubah-password-admin');
    }

    public function updatePassword(Request $request, User $user)
    {
        if (!(Hash::check($request->password_lama, $user->password))) {
            return back()->with('gagal', 'Password lama anda salah!');
        }

        if (strcmp($request->password_lama, $request->password_baru) == 0) {
            return back()->with('gagal', 'Password lama tidak boleh sama dengan password baru!');
        }

        $rules = [
            'password_lama' => 'required',
            'password_baru' => 'required|string|min:4',
            'password_konfirmasi' => 'same:password_baru'
        ];

        $message = [
            'password_lama.required' => 'Password lama tidak boleh kosong!',
            'password_baru.required' => 'Password baru tidak boleh kosong!',
            'password_baru.string' => 'Password baru harus berupa karakter, huruf, atau angka!',
            'password_baru.min' => 'Password baru minimal 4 karakter!',
            'password_konfirmasi.same' => 'Password baru dan konfirmasi password tidak sama!'
        ];

        $request->validate($rules, $message);

        $user->password = bcrypt($request->password_baru);
        $user->save();
        return redirect('/profile-admin')->with('sukses', 'Password user berhasil di ubah!');
    }

}
