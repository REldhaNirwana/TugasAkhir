

<?php 

if (isset($_POST['submit'])) {
 $bln = date($_POST['bulan']);

 if (!empty($bln)) {
  // perintah tampil data berdasarkan periode bulan
  $q = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE MONTH(tanggalpakai)= '$bln' && status=1");
 } else {
  // perintah tampil semua data
  $q = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE status=1");
 }
} else {
 // perintah tampil semua data
 $q = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE status=1");
}

// hitung jumlah baris data
$s = $q->num_rows;

?>

<body>
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Laporan Keuangan</h4>
			<h6 class="m-0  text">*Hanya penyewa dengan pembayaran sukses</h6>
        </div>
        <div class="card-body">
    <div class="row">
     <div class="col-md-4 pt-2">
      <span>Jumlah data: <b><?= $s ?></b></span>
     </div>
     <div class="col-md-8">
      <form method="POST" action="" class="form-inline">
       <label for="date1">Tampilkan transaksi bulan  </label>
       <select class="form-control mr-2" name="bulan">
        <option value="">All</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
       </select>
       <button type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
      </form>
     </div>
    </div>

    <div class="mt-3" style="max-height: 340px; overflow-y: auto;">
     <table class="table table-bordered">
      <tr>
       <th>#</th>
       <th>ID Sewa</th>
       <th>Nama Penyewa</th>
       <th>Tgl. Pakai</th>
	   <th>Tgl. Tempo</th>
	   <th>Total Bayar</th>
      </tr>

      <?php
      $totbayar = 0;
      $no = 1;
      while ($r = $q->fetch_assoc()) {
		$total = $r['totalbayar'];
		$totbayar += $total ;
     ?>
      
	
      <tr>
       <td><?= $no++ ?></td>
       <td><?= ucwords($r['id_sewa']) ?></td>
       <td><?= $r['nama_penyewa'] ?></td>
       <td><?= date('d-M-Y', strtotime($r['tanggalpakai'])) ?></td>
	   <td><?= date('d-M-Y', strtotime($r['tanggaltempo'])) ?></td>
	   <td>Rp <?= $r['totalbayar'] ?></td>
      </tr>
  
      <?php   
      }
      ?>
	  <tr>
      <th colspan="5">Total Pendapatan</th>
	  
      <th>Rp <?= $totbayar ?></th>
     </tr>

     </table>
    </div>
   </div>
        </div>
        </div>
        </div>
        </div>
		
		
</body>
</html>