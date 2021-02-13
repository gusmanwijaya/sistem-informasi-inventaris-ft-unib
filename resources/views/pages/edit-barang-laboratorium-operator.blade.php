@extends('layouts.operator')

@section('title')
    Edit Barang {{ auth()->user()->name }} - SI Inventaris Barang FT UNIB
@endsection

@section('content')
<div class="container-fluid" id="toastvue">
    <a href="/data-barang-laboratorium-operator"><i class="fas fa-fw fa-arrow-left mb-3"></i></a>
    <h4 class="mb-3">Edit Barang Laboratorium</h4>
    <div class="row">
        <div class="col-12">
        <form method="POST" action="/data-barang-laboratorium-operator/updateLaboratorium-{{ $data_barang_laboratorium->id }}">
            {{ csrf_field() }}
            <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('kode_barang') ? 'has-error' : '' }}">
                        <label for="kode_barang" class="label-modal">Kode Barang</label>
                        <select
                            name="kode_barang"
                            id="kode_barang"
                            class="form-control"
                            disabled
                            >
                                <option value="{{ null }}">Pilih</option>
                                @foreach($kode_barang as $kode)
                                <option value="{{ $kode->kode_barang }}" @if($data_barang_laboratorium->kode_barang == $kode->kode_barang) selected @endif>
                                    {{ $kode->kode_barang }}
                                </option>
                                @endforeach
                        </select>
                        @if($errors->has('kode_barang'))
                        <span class="help-block">{{ $errors->first('kode_barang') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('nama_barang') ? 'has-error' : '' }}">
                        <label for="nama_barang" class="label-modal">Nama Barang</label>
                        <input type="text" id="nama_barang" class="form-control" name="nama_barang" value="{{ $data_barang_laboratorium->nama_barang }}" disabled>
                        @if($errors->has('nama_barang'))
                        <span class="help-block">{{ $errors->first('nama_barang') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('merek') ? 'has-error' : '' }}">
                        <label for="merek" class="label-modal">Merek</label>
                        <input type="text" class="form-control" id="merek" 
                        name="merek" value="{{ $data_barang_laboratorium->merek }}" disabled>
                        @if($errors->has('merek'))
                        <span class="help-block">{{ $errors->first('merek') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
                        <label for="jumlah" class="label-modal">Jumlah</label>
                        <select
                            name="jumlah"
                            id="jumlah"
                            class="form-control"
                            disabled
                            >
                            <option value="0">Pilih</option>
                            @for ($i = 1; $i <= 500; $i++)
                            <option value="{{ $i }}" @if($data_barang_laboratorium->jumlah == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                        @if($errors->has('jumlah'))
                        <span class="help-block">{{ $errors->first('jumlah') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('satuan') ? 'has-error' : '' }}">
                        <label for="satuan" class="label-modal">Satuan</label>
                        <select
                        name="satuan"
                        id="satuan"
                        class="form-control"
                        disabled
                        >
                        <option value="">Pilih</option>
                        <option value="Set" @if($data_barang_laboratorium->satuan == "Set") selected @endif>Set</option>
                        <option value="Buah" @if($data_barang_laboratorium->satuan == "Buah") selected @endif>Buah</option>
                        <option value="Lembar" @if($data_barang_laboratorium->satuan == "Lembar") selected @endif>Lembar</option>
                        </select>
                        @if($errors->has('satuan'))
                        <span class="help-block">{{ $errors->first('satuan') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('asal_barang') ? 'has-error' : '' }}">
                        <label for="asal_barang" class="label-modal">Asal Barang</label>
                        <select name="asal_barang" id="asal_barang" class="form-control" disabled>
                            <option value="">Pilih</option>
                            <option value="APBN" @if($data_barang_laboratorium->asal_barang == "APBN") selected @endif>APBN</option>
                            <option value="PNBP" @if($data_barang_laboratorium->asal_barang == "PNBP") selected @endif>PNBP</option>
                            <option value="HIBAH" @if($data_barang_laboratorium->asal_barang == "HIBAH") selected @endif>HIBAH</option>
                        </select>
                        @if($errors->has('asal_barang'))
                        <span class="help-block">{{ $errors->first('asal_barang') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('tahun_barang') ? 'has-error' : '' }}">
                        <label for="tahun_barang" class="label-modal">Tahun Barang</label>
                        <select name="tahun_barang" class="form-control" disabled>
                            <option value="0">Pilih</option>
                            @for ($i = 2000; $i <= 2100; $i++)
                            <option value="{{ $i }}" @if($data_barang_laboratorium->tahun_barang == $i) selected @endif>
                                {{ $i }}</option>
                            @endfor
                        </select>
                        @if($errors->has('tahun_barang'))
                            <span class="help-block">{{ $errors->first('tahun_barang') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('laboratorium_id') ? 'has-error' : '' }}">
                        <label for="laboratorium_id" class="label-modal">Ruangan</label>
                        <select
                        name="laboratorium_id"
                        id="laboratorium_id"
                        class="form-control"
                        disabled
                        >
                        @foreach($data_laboratorium as $laboratorium)
                        <option value="{{ $laboratorium->id }}" @if($data_barang_laboratorium->laboratorium_id == $laboratorium->id) selected @endif>
                            {{ $laboratorium->nama_laboratorium }}
                        </option>
                        @endforeach
                        </select>
                        @if($errors->has('laboratorium_id'))
                        <span class="help-block">{{ $errors->first('laboratorium_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('kondisi') ? 'has-error' : '' }}">
                        <label for="kondisi" class="label-modal">Kondisi</label>
                        <select
                        name="kondisi"
                        id="kondisi"
                        class="form-control"
                        >
                        <option value="">Pilih</option>
                        <option value="Baik" @if($data_barang_laboratorium->kondisi == "Baik") selected @endif>Baik</option>
                        <option value="Rusak" @if($data_barang_laboratorium->kondisi == "Rusak") selected @endif>Rusak</option>
                        </select>
                        @if($errors->has('kondisi'))
                        <span class="help-block">{{ $errors->first('kondisi') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('ada_tidak') ? 'has-error' : '' }}">
                        <label for="ada_tidak" class="label-modal">Ada/Tidak</label>
                        <select
                        name="ada_tidak"
                        id="ada_tidak"
                        class="form-control"
                        >
                        <option value="">Pilih</option>
                        <option value="Ada" @if($data_barang_laboratorium->ada_tidak == "Ada") selected @endif>Ada</option>
                        <option value="Tidak" @if($data_barang_laboratorium->ada_tidak == "Tidak") selected @endif>Tidak</option>
                        </select>
                        @if($errors->has('ada_tidak'))
                        <span class="help-block">{{ $errors->first('ada_tidak') }}</span>
                        @endif
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col text-right">
                    <button
                    type="submit"
                    class="btn btn-edit"
                    >
                    <i class="fas fa-save p-1"></i> Simpan
                    </button>
                </div>
                </div>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    {{-- <script>
        $(document).ready(function(){
            $('.dynamic').change(function(){
                if($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ route('data-barang-laboratorium-operator-fetch') }}",
                        method: "POST",
                        data: {
                            select:select, value:value, _token:_token, dependent:dependent
                        },
                        success: function(result){
                            $('#'+dependent).html(result);
                        }
                    })
                }
            });
        });
    </script> --}}
@endpush