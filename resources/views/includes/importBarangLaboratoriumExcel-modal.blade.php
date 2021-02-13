<!-- Modal -->
<div class="modal fade" id="importBarangLaboratoriumExcelModal" tabindex="-1" aria-labelledby="importBarangLaboratoriumExcelModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="importBarangLaboratoriumExcelModalLabel">Import Barang Laboratorium Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            {!! Form::open([
            'route' => 'data-barang-laboratorium-admin-import-laboratorium-excel', 
            'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data'
            ]) !!}
        
            {!! Form::file('data-barang-laboratorium') !!}
          </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-import" value="Import">Import</button>
        </form>
      </div>
    </div>
  </div>
</div>
