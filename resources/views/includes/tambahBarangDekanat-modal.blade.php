<div class="modal fade" id="tambahBarangDekanat" tabindex="-1" aria-labelledby="tambahBarangLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahBarangLabel">Tambah Barang</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="/data-barang-dekanat-admin/tambahDekanat">
          {{ csrf_field() }}
          <div class="form-group {{ $errors->has('kode_barang') ? 'has-error' : '' }}">
            <label for="kode_barang" class="label-modal">Kode Barang</label>
            <select
              name="kode_barang"
              id="kode_barang"
              class="form-control"
              {{-- data-dependent="nama_barang" --}}
              >
                <option value="{{ null }}">Pilih</option>
                @foreach($kode_barang as $kode)
                <option value="{{ $kode->kode_barang }}" >
                    {{ $kode->kode_barang }}
                </option>
                @endforeach
            </select>
            @if($errors->has('kode_barang'))
              <span class="help-block">{{ $errors->first('kode_barang') }}</span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('nama_barang') ? 'has-error' : '' }}">
            <label for="nama_barang" class="label-modal">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" class="form-control" value="{{ old('nama_barang') }}">
            @if($errors->has('nama_barang'))
              <span class="help-block">{{ $errors->first('nama_barang') }}</span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('merek') ? 'has-error' : '' }}">
            <label for="merek" class="label-modal">Merek</label>
            <input type="text" class="form-control" id="merek" name="merek"
            value="{{ old('merek') }}">
            @if($errors->has('merek'))
              <span class="help-block">{{ $errors->first('merek') }}</span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
            <label for="jumlah" class="label-modal">Jumlah</label>
            <select
                name="jumlah"
                id="jumlah"
                class="form-control"
                >
                <option value="0">Pilih</option>
                @for ($i = 1; $i <= 500; $i++)
                <option value="{{ $i }}" {{ (old('jumlah') == $i) ? 'selected' : '' }}>
                  {{ $i }}</option>
                @endfor
            </select>
            @if($errors->has('jumlah'))
              <span class="help-block">{{ $errors->first('jumlah') }}</span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('satuan') ? 'has-error' : '' }}">
                <label for="satuan" class="label-modal">Satuan</label>
                <select
                name="satuan"
                id="satuan"
                class="form-control"
                >
                <option value="">Pilih</option>
                <option value="Set"
                {{ (old('satuan') == "Set") ? 'selected' : '' }}>Set</option>
                <option value="Buah" 
                {{ (old('satuan') == "Buah") ? 'selected' : '' }}>Buah</option>
                <option value="Lembar" 
                {{ (old('satuan') == "Lembar") ? 'selected' : '' }}>Lembar</option>
                </select>
                @if($errors->has('satuan'))
                  <span class="help-block">{{ $errors->first('satuan') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('asal_barang') ? 'has-error' : '' }}">
              <label for="asal_barang" class="label-modal">Asal Barang</label>
              <select name="asal_barang" id="asal_barang" class="form-control">
                <option value="">Pilih</option>
                <option value="APBN"
                {{ (old('asal_barang') == "APBN") ? 'selected' : '' }}>APBN</option>
                <option value="PNBP" 
                {{ (old('asal_barang') == "PNBP") ? 'selected' : '' }}>PNBP</option>
                <option value="HIBAH" 
                {{ (old('asal_barang') == "HIBAH") ? 'selected' : '' }}>HIBAH</option>
              </select>
              @if($errors->has('asal_barang'))
                <span class="help-block">{{ $errors->first('asal_barang') }}</span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('tahun_barang') ? 'has-error' : '' }}">
              <label for="tahun_barang" class="label-modal">Tahun Barang</label>
              <select name="tahun_barang" class="form-control">
                  <option value="0">Pilih</option>
                  @for ($i = 2000; $i <= 2100; $i++)
                  <option value="{{ $i }}" {{ (old('tahun_barang') == $i) ? 'selected' : '' }}>
                    {{ $i }}</option>
                  @endfor
              </select>
              @if($errors->has('tahun_barang'))
                <span class="help-block">{{ $errors->first('tahun_barang') }}</span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('ruangan_id') ? 'has-error' : '' }}">
                <label for="ruangan_id" class="label-modal">Ruangan</label>
                <select
                name="ruangan_id"
                id="ruangan_id"
                class="form-control"
                >
                  @foreach($data_dekanat as $dekanat)
                  <option value="{{ $dekanat->id }}" 
                    {{ (old('ruangan_id') == $dekanat->id) ? 'selected' : '' }}>
                      {{ $dekanat->nama_ruangan }}
                  </option>
                  @endforeach
                </select>
                @if($errors->has('ruangan_id'))
                  <span class="help-block">{{ $errors->first('ruangan_id') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('kondisi') ? 'has-error' : '' }}">
                <label for="kondisi" class="label-modal">Kondisi</label>
                <select
                name="kondisi"
                id="kondisi"
                class="form-control"
                >
                <option value="">Pilih</option>
                <option value="Baik"
                {{ (old('kondisi') == "Baik") ? 'selected' : '' }}>Baik</option>
                <option value="Rusak" 
                {{ (old('kondisi') == "Rusak") ? 'selected' : '' }}>Rusak</option>
                </select>
                @if($errors->has('kondisi'))
                  <span class="help-block">{{ $errors->first('kondisi') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('ada_tidak') ? 'has-error' : '' }}">
                <label for="ada_tidak" class="label-modal">Ada/Tidak</label>
                <select
                name="ada_tidak"
                id="ada_tidak"
                class="form-control"
                >
                <option value="">Pilih</option>
                <option value="Ada"
                {{ (old('ada_tidak') == "Ada") ? 'selected' : '' }}>Ada</option>
                <option value="Tidak" 
                {{ (old('ada_tidak') == "Tidak") ? 'selected' : '' }}>Tidak</option>
                </select>
                @if($errors->has('ada_tidak'))
                  <span class="help-block">{{ $errors->first('ada_tidak') }}</span>
                @endif
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-tambah">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
