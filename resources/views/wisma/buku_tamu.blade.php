<div class="modal" id="modal-tamu" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
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
       <label for="tamu" class="col-md-2 control-label">Buku Tamu</label>
       <div class="col-md-5">
         <div class="input-group">
           <input id="tamu" type="text" class="form-control" name="tamu" autofocus required>
           <span class="input-group-btn">
             <button onclick="showTamu()" type="button" class="btn btn-info">...</button>
           </span>
         </div>
       </div>
   </div>

   <div class="form-group">
      <label for="tanggal" class="col-md-3 control-label">Tanggal Berakhir</label>
      <div class="col-md-6">
         <input id="tanggal" type="text" class="form-control" name="tanggal" autofocus required>
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

@include('wisma.buku_tamu')

<script type="text/javascript">
var table;

function showTamu(){
  $('#modal-tamu').modal('show');
}

</script>
