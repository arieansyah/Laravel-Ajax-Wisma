<div class="modal" id="modal-nik" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title">Cari Member</h3>
   </div>

<div class="modal-body">
   <table class="table table-striped tabel-nik">
      <thead>
         <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Telpon</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @foreach($detailNik as $data)
         <tr>
            <th>{{ $data->nik }}</th>
            <th>{{ $data->nama }}</th>
            <th>{{ $data->nomor_telepon }}</th>
            <th><a onclick="selectNik({{ $data->nik }})" class="btn btn-primary"><i class="fa fa-check-circle"></i> Pilih</a></th>
          </tr>
         @endforeach
      </tbody>
   </table>

</div>

         </div>
      </div>
   </div>
