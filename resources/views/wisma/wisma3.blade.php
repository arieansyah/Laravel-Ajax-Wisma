@extends('base')

@section('title')
  Wisma 3
@endsection

@section('breadcrumb')
   @parent
   <li>Wisma 3</li>
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
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
       "url" : "{{ route('wisma3.data') }}",
       "type" : "GET"
     }
   });

   $('#modal-form form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
         var id = $('#id').val();
         if(save_method == "add") url = "{{ route('wisma.store') }}";
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
      url : "wisma/"+id+"/reset",
      type : "PATCH",
      success : function(data){
        table.ajax.reload();
      },
      error : function(){
        alert("Semua Data Sudah di Reset");
        table.ajax.reload();
      }
    });
  }
}
</script>
@endsection
