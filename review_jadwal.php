<?php 
require 'function.php';
?>
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Informasi Jadwal Biasa</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM jadwal_sewa WHERE paket=0 ORDER BY id_jadwal DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    
                </tr>
            <?php } ?>
            </tbody>

        </table>

        </div>
		</div>
        </div>
		<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Sudah Dipesan</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>Penyewa</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                </tr>
            </thead>
            <tbody>
			
			<!--  WHERE id_paket=0  -- perintah menampilkan data berdasarkan yang bukan paket (0)--> 
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM sewa WHERE id_paket='0' ORDER BY id_sewa DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
					<td><?= $hasil['nama_penyewa']; ?></td>
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
		</div>
        </div>
        </div>
        </div>
        </div>
        