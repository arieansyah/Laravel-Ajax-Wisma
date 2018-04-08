@extends('base')

@section('title')
  Wisma 1
@endsection

@section('breadcrumb')
   @parent
   <li>Wisma 1</li>
@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
      </div>
      <div class="box-body">

<table class="table table-striped">
<thead>
   <tr>
      <th width="30">Nomor Kamar</th>
      <th>Status</th>
      <th>Tanggal Akhir</th>
      <th width="100">Aksi</th>
   </tr>
</thead>
<tbody></tbody>
</table>

      </div>
    </div>
  </div>
</div>

{{-- @include('wisma.form')
@include('wisma.formBooking') --}}
@endsection

@section('script')
<script type="text/javascript">
var table, save_method;
$(function(){

  $('#tanggal').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });

   table = $('.table').DataTable({
     "processing" : true,
     "bPaginate" : false,
     "ajax" : {
       "url" : "{{ route('wisma1.data') }}",
       "type" : "GET"
     }
   });

   $('#modal-form form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
         var id = $('#id').val();
         if(save_method == "add") url = "{{ route('wisma1.store') }}";
         else url = "wisma1/"+id;

         $.ajax({
           url : url,
           type : "POST",
           data : $('#modal-form form').serialize(),
           success : function(data){
             $('#modal-form').modal('hide');
             table.ajax.reload();
           },
           error : function(){
             alert("Tidak dapat menyimpan data!");
           }
         });
        return false;
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

function resetData(id){
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  if(confirm("Apakah yakin ?? semua pada kamar ini akan dihapus")){
    $.ajax({
      url : "wisma1/"+id+"/reset",
      type : "PATCH",
      success : function(data){
        table.ajax.reload();
      },
      error : function(){
        alert("Semua Data Sudah di Reset");
      }
    });
  }
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
