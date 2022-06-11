<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';
?>
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Sewa Biasa</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Sewa</th>
                <th>Penyewa</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                <th>Status Pembayaran</th>
      
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            $totalbayar = 0;
            
            $tampil = mysqli_query($koneksi, "SELECT * FROM sewabiasa INNER JOIN sewapaket on sewabiasa.id_sewabiasa = sewapaket.id_sewapaket INNER JOIN fasilitas on sewabiasa.id_fasilitas = fasilitas.id_fasilitas
             ORDER BY id_sewabiasa DESC");

            while($hasil = mysqli_fetch_array($tampil)){
                $totalbayar =($hasil['harga_gdg'] + $hasil['harga_fsl'])* $hasil['lamasewa'];
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_sewabiasa']; ?></td>
                    <td><?= $hasil['nama_penyewa']; ?></td>
                    <td><?= $hasil['id_gedung']; ?></td>
                    <td><?= $hasil['id_fasilitas']; ?></td>
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    <td><?= $hasil['lamasewa']; ?></td>
                    <td>
                        <a href="penyewa_hapus_sewa.php?id_sewabiasa=<?= $hasil['id_sewabiasa'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin membatalkan penyewaan ?');"><i class="bi bi-trash-fill"></i>&nbsp;Batal Sewa</a>
                    </td>
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