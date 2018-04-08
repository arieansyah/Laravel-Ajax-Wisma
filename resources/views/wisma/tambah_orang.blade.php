@extends('base')

@section('title')
  Wisma 1
@endsection

@section('breadcrumb')
   @parent
   <li>Wisma 1</li>
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <form class="form form-horizontal form-produk" method="post">
          {{ csrf_field() }}
          <input type="hidden" id="id" name="id" value="{{ $tambah->id_wisma }}">
          <div class="form-group">
            <label for="nik" class="col-md-2 control-label">NIK</label>
            <div class="col-md-5">
              <div class="input-group">
                <input id="nik" type="text" class="form-control" name="nik" autofocus required>
                <span class="input-group-btn">
                  <button onclick="addNik()" type="button" class="btn btn-info">...</button>
                </span>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="box-body">


<table class="table table-striped table-orang">
  <thead>
     <tr>
        <th width="30">No</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Telepon</th>
        <th width="100">Aksi</th>
     </tr>
  </thead>
  <tbody></tbody>
</table>

      </div>
    </div>
  </div>
</div>

@include('wisma.nik')
@endsection

@section('script')
<script type="text/javascript">
var table, save_method;
$(function(){

  $('#tanggal').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });

  $('.tabel-nik').DataTable();

   table = $('.table-orang').DataTable({
     "processing" : true,
     "bPaginate" : false,
     "ajax" : {
       "url" : "{{ route('wisma.data', $tambah->id_wisma) }}",
       "type" : "GET"
     }
   });
});

function addForm(){
   save_method = "add";
   $('input[name=_method]').val('POST');
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();
   $('.modal-title').text('Tambah Wisma 1');
}

function addNik(){
  $('#modal-nik').modal('show');
}

function selectNik(nik){
  $('#nik').val(nik);
  $('#modal-nik').modal('hide');
  $.ajax({
    url : "{{ route('wisma1.store') }}",
    type : "POST",
    data : $('.form-produk').serialize(),
    success : function(data){
      table.ajax.reload();
      $('#nik').val('').focus();
    },
    error : function(){
      alert("Tidak dapat menyimpan data!");
    }
  });
}

function editForm(id){
   save_method = "edit";
   $('input[name=_method]').val('PATCH');
   $('#modal-booking form')[0].reset();
   $.ajax({
     url : "wisma1/"+id+"/edit",
     type : "GET",
     dataType : "JSON",
     success : function(data){
       $('#modal-booking').modal('show');
       $('.modal-title').text('Edit Wisma 1');

       $('#id').val(data.id_wisma);
       $('#nik').val(data.nik);
       $('#nama_tamu').val(data.nama_tamu);
       $('#status').val(data.status);
       $('#tanggal').val(data.tanggal);
       $('#alamat').val(data.alamat);
       $('#keterangan').val(data.keterangan);


     },
     error : function(){
       alert("Tidak dapat menampilkan data!");
     }
   });
}

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "wisma1/"+id,
       type : "POST",
       data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
       success : function(data){
         table.ajax.reload();
       },
       error : function(){
         alert("Tidak dapat menghapus data!");
       }
     });
   }
}
</script>
@endsection
