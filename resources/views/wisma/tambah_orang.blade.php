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
  <button type="button" onclick="addTanggal({{ $tambah->id_wisma }})" class="btn-lg btn-primary btn-save pull-right"><i class="fa fa-floppy-o"></i> Finish </button>
      </div>
    </div>
  </div>
</div>

@include('wisma.nik')
@include('wisma.tanggal')
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

   $('#modal-tanggal form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
         var id = $('#id').val();

         $.ajax({
           url : "update",
           type : "POST",
           data : $('#modal-tanggal form').serialize(),
           success : function(data){
             $('#modal-tanggal').modal('hide');
             window.location.assign("{{ route('wisma1') }}")
           },
           error : function(){
             alert("Tidak dapat menyimpan data!");
           }
         });
         return false;
     }
   });
});

function addNik(){
  $('#modal-nik').modal('show');
}

function addTanggal(id){
  $('input[name=_method]').val('PATCH');
  $('#modal-tanggal form')[0].reset();
  $.ajax({
    url : "edit",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $('#modal-tanggal').modal('show');

      $('#id').val(data.id_wisma);

    },
    error : function(){
      alert("Tidak dapat menampilkan data!");
    }
  });
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
    },
    error : function(){
      alert("Tidak dapat menyimpan data!");
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
