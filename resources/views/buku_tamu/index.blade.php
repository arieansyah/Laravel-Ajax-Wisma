@extends('base')

@section('title')
  Buku Tamu
@endsection

@section('breadcrumb')
   @parent
   <li>Buku Tamu</li>
@endsection

@section('content')
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
      <th width="30">No</th>
      <th>Nik</th>
      <th>Nama</th>
      <th>Nomor Telepon</th>
      <th>Instansi</th>
      <th width="100">Aksi</th>
   </tr>
</thead>
<tbody></tbody>
</table>

      </div>
    </div>
  </div>
</div>

@include('buku_tamu.form')
@endsection

@section('script')
<script type="text/javascript">
var table, save_method;
$(function(){

   table = $('.table').DataTable({
     "processing" : true,
     "ajax" : {
       "url" : "{{ route('buku_tamu.data') }}",
       "type" : "GET"
     }
   });

   $('#modal-form form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
         var id = $('#id').val();
         if(save_method == "add") url = "{{ route('buku_tamu.store') }}";
         else url = "buku_tamu/"+id;

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
   $('.modal-title').text('Tambah Buku Tamu');
}

function editForm(id){
   save_method = "edit";
   $('input[name=_method]').val('PATCH');
   $('#modal-form form')[0].reset();
   $.ajax({
     url : "buku_tamu/"+id+"/edit",
     type : "GET",
     dataType : "JSON",
     success : function(data){
       $('#modal-form').modal('show');
       $('.modal-title').text('Edit Buku Tamu');

       $('#id').val(data.id_bukutamu);
       $('#nik').val(data.nik);
       $('#nama').val(data.nama);
       $('#nomor_telepon').val(data.nomor_telepon);
       $('#jenis_kelamin').val(data.jenis_kelamin);
       $('#instansi').val(data.instansi);
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
       url : "buku_tamu/"+id,
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
