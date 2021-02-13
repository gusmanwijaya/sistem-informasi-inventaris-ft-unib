<div class="modal fade" id="tambahRuanganLaboratoriumModal" tabindex="-1" aria-labelledby="tambahRuanganLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahRuanganLabel">Tambah Ruangan Laboratorium</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="/data-ruangan-laboratorium-admin/tambahRuanganLaboratorium">
          {{ csrf_field() }}
          <div class="form-group {{ $errors->has('nama_laboratorium') ? 'has-error' : '' }}">
              <label for="nama_laboratorium" class="label-modal">Nama Laboratorium</label>
              <input type="text" class="form-control" id="nama_laboratorium" name="nama_laboratorium"
              value="{{ old('nama_laboratorium') }}">
              @if($errors->has('nama_laboratorium'))
                <span class="help-block">{{ $errors->first('nama_laboratorium') }}</span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('prodi_id') ? 'has-error' : '' }}">
              <label for="prodi_id" class="label-modal">Prodi</label>
              <select
              name="prodi_id"
              id="prodi_id"
              class="form-control"
              >
                @foreach($data_prodi as $prodi)
                <option value="{{ $prodi->id }}" 
                  {{ (old('prodi_id') == $prodi->id) ? 'selected' : '' }}>
                    {{ $prodi->nama_prodi }}
                </option>
                @endforeach
              </select>
              @if($errors->has('prodi_id'))
                <span class="help-block">{{ $errors->first('prodi_id') }}</span>
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