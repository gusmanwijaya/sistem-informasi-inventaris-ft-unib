@extends('layouts.cetak')

@section('title')
    Cetak Barang Dekanat - SI Inventaris Barang FT UNIB
@endsection

@push('addon-style')
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
@endpush

@section('content')
    <center>
        <table>
            <tr>
                <td>
                    <img src="/img/unib1.png" width="125" height="125" style="margin-left: 0px;">
                </td>
                <td width="50px"></td>
                <td>
                    <center>
                        <font size="4">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</font> <br>
                        <font size="4">UNIVERSITAS BENGKULU</font> <br>
                        <font size="4"><b>FAKULTAS TEKNIK</b></font> <br>
                        <font size="3">Jalan W.R. Supratman Kandang Limun Bengkulu 38371 <br>
                        Telepon (0736)344087 Ext. 308 Faksimile (0736)349134 <br>
                        Laman: ft.unib.ac.id e-mail: ft@unib.ac.id</font>
                    </center>
                </td>
                <td width="30px"></td>
            </tr>
        </table>
    </center>

    <hr>
    <br>

    <p style="text-align:center; font-family: Times New Roman ; font-size: 10 "> <b>LAPORAN INVENTARIS BARANG <br>
        TAHUN {{ $date }}
        </b>
    </p>
	
    <br>

    <div class="form-group">
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Merek</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Asal Barang</th>
                <th>Tahun Barang</th>
                <th>Ruangan</th>
                <th>Kondisi</th>
                <th>Ada/Tidak</th>
            </tr>
            
            @php
                $no = 1;
            @endphp
            @foreach($data_barang_dekanat as $barang)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->merek }}</td>
                <td>{{ $barang->jumlah }}</td>
                <td>{{ $barang->satuan }}</td>
                <td>{{ $barang->asal_barang }}</td>
                <td>{{ $barang->tahun_barang }}</td>
                <td>{{ $barang->dekanat->nama_ruangan }}</td>
                <td>{{ $barang->kondisi }}</td>
                <td>{{ $barang->ada_tidak }}</td>
            </tr>
            @endforeach

        </table>
    </div>

    <br>
    <br>

@endsection

@push('addon-script')
    <script>
        window.print();
    </script>
@endpush