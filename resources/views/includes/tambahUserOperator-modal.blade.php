<div class="modal fade" id="tambahUserOperatorModal" tabindex="-1" aria-labelledby="tambahUserOperatorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahUserOperatorLabel">Tambah User</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="/user-operator-admin/tambah">
          {{ csrf_field() }}
          <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name" class="label-modal">Nama User</label>
                <input type="text" class="form-control" id="name" name="name"
                value="{{ old('name') }}">
                @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
          </div>
          <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                <label for="username" class="label-modal">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                value="{{ old('username') }}">
                @if($errors->has('username'))
                <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
          </div>
          <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password" class="label-modal">Password</label>
                <input type="text" class="form-control" id="password" name="password"
                value="{{ old('password') }}">
                @if($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
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