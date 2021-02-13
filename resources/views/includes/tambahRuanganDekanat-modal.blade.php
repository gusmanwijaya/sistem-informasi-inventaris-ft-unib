<div class="modal fade" id="tambahRuanganDekanatModal" tabindex="-1" aria-labelledby="tambahRuanganLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahRuanganLabel">Tambah Ruangan Dekanat</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="/data-ruangan-dekanat-admin/tambahRuanganDekanat">
          {{ csrf_field() }}
          <div class="form-group {{ $errors->has('nama_ruangan') ? 'has-error' : '' }}">
                <label for="nama_ruangan" class="label-modal">Nama Ruangan</label>
                <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan"
                value="{{ old('nama_ruangan') }}">
                @if($errors->has('nama_ruangan'))
                <span class="help-block">{{ $errors->first('nama_ruangan') }}</span>
                @endif
          </div>
          <div class="form-group {{ $errors->has('kode_ruangan') ? 'has-error' : '' }}">
                <label for="kode_ruangan" class="label-modal">Kode Ruangan</label>
                <input type="text" class="form-control" id="kode_ruangan" name="kode_ruangan"
                value="{{ old('kode_ruangan') }}">
                @if($errors->has('kode_ruangan'))
                <span class="help-block">{{ $errors->first('kode_ruangan') }}</span>
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