<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

   <form class="form-horizontal" data-toggle="validator" method="post">
   {{ csrf_field() }} {{ method_field('POST') }}

   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title"></h3>
   </div>

<div class="modal-body">

   <input type="hidden" id="id" name="id">
   <div class="form-group">
      <label for="nik" class="col-md-3 control-label">Nik</label>
      <div class="col-md-6">
         <input id="nik" type="text" class="form-control" name="nik" autofocus required>
         <span class="help-block with-errors"></span>
      </div>
   </div>
   <div class="form-group">
      <label for="nama" class="col-md-3 control-label">Nama</label>
      <div class="col-md-6">
         <input id="nama" type="text" class="form-control" name="nama" autofocus required>
         <span class="help-block with-errors"></span>
      </div>
   </div>
   <div class="form-group">
      <label for="jenis_kelamin" class="col-md-3 control-label">Jenis Kelamin</label>
      <div class="col-md-6">
        <label class="select state-success">
            <select name="jenis_kelamin" id="jenis_kelamin">
                <option value="null" selected disabled>Pilih</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </label>
         {{-- <input id="jenis_kelamin" type="text" class="form-control" name="jenis_kelamin" autofocus required> --}}
         <span class="help-block with-errors"></span>
      </div>
   </div>
   <div class="form-group">
      <label for="nomor_telepon" class="col-md-3 control-label">Nomor Telepon</label>
      <div class="col-md-6">
         <input id="nomor_telepon" type="text" class="form-control" name="nomor_telepon" autofocus required>
         <span class="help-block with-errors"></span>
      </div>
   </div>
   <div class="form-group">
      <label for="instansi" class="col-md-3 control-label">Instansi</label>
      <div class="col-md-6">
         <input id="instansi" type="text" class="form-control" name="instansi" autofocus required>
         <span class="help-block with-errors"></span>
      </div>
   </div>
   <div class="form-group">
       <label for="alamat" class="col-md-3 control-label">Alamat</label>
       <div class="col-md-6">
         <textarea id="alamat" type="text" class="form-control" name="alamat" rows="10" placeholder="Masukan Alamat Anda" required></textarea>
         <span class="help-block with-errors"></span>
       </div>
    </div>
    <div class="form-group">
        <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
        <div class="col-md-6">
          <textarea id="keterangan" type="text" class="form-control" name="keterangan" rows="10" placeholder="Masukan Keterangan Anda" required></textarea>
          <span class="help-block with-errors"></span>
        </div>
     </div>
</div>

   <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
      <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
   </div>

   </form>

         </div>
      </div>
   </div>
