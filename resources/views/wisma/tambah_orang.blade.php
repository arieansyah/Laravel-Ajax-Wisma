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
          <div class="form-group">
            <label for="kode" class="col-md-2 control-label">Kode Produk</label>
            <div class="col-md-5">
              <div class="input-group">
                <input id="kode" type="text" class="form-control" name="kode" autofocus required>
                <span class="input-group-btn">
                  <button onclick="showProduct()" type="button" class="btn btn-info">...</button>
                </span>
              </div>
            </div>
          </div>
        </form>
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

@include('wisma.form')
@include('wisma.formBooking')
@endsection

@section('script')
{{-- <script type="text/javascript">
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

function addOrang(id){
  $('#modal-tambah-orang').modal('show');
}

function selectTamu(nik){
  $.ajax({
    url : "{{ route('wisma1.saveTamu') }}",
    type : "POST",
    data : $('.form-produk').serialize(),
    success : function(data){
      $('#kode').val('').focus();
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
</script> --}}
@endsection

{{-- <div class="modal" id="modal-tambah-orang" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

   <form class="form-horizontal" data-toggle="validator" method="post">
   {{ csrf_field() }} {{ method_field('POST') }}

   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title"></h3>
   </div>

   <div class="modal-body">
   	<table class="table table-striped tabel-produk">
   		<thead>
   		   <tr>
   		      <th>NIK</th>
   		      <th>Nama</th>
   		   </tr>
   		</thead>
   		<tbody>
   			@foreach($tamu as $data)
   			<tr>
   		      <th>{{ $data->nik }}</th>
   		      <th>{{ $data->nama }}</th>
   		      <th><a onclick="selectTamu({{ $data->nik }})" class="btn btn-primary"><i class="fa fa-check-circle"></i> Pilih</a></th>
   		    </tr>
   			@endforeach
   		</tbody>
   	</table>

   </div>

   <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
      <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
   </div>

   </form>

         </div>
      </div>
   </div> --}}
