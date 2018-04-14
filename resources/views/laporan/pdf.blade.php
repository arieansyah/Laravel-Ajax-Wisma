<!DOCTYPE html>
<html>
<head>
  <title>Produk PDF</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<h3 class="text-center">Laporan Kunjungan Tamu</h3>
<h4 class="text-center">Tanggal  {{ tanggal_indonesia($tanggal_awal) }} s/d {{ tanggal_indonesia($tanggal_akhir) }} </h4>


<table class="table table-striped">
<thead>
   <tr>
    <th>No</th>
    <th>NIK</th>
    <th>Nama</th>
    <th>instansi</th>
    <th>Nomor Telepon</th>
    <th>Jenis Kelamin</th>
   </tr>

   <tbody>
    @foreach($output as $row)
    <tr>
    @foreach($row as $col)
     <td>{{ $col }}</td>
    @endforeach
    </tr>
    @endforeach
   </tbody>
</table>

</body>
</html>
