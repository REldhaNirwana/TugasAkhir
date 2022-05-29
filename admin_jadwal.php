<?php 
require 'function.php';
// $jadwal = query("SELECT * FROM jadwal ORDER BY id_pesan DESC");
?>

<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    <a href="?url=admin_tambah_jadwal.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jadwal</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Pesan</th>
                <th>Tanggal</th>
                <th>Tahun</th>
                <th>Paket</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM jadwal ORDER BY id_pesan DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_pesan']; ?></td>
                    <td><?= $hasil['tanggal']; ?></td>
                    <td><?= $hasil['tahun']; ?></td>
                    <td><?= $hasil['id_paket']; ?></td>
                    <td><?= $hasil['status']; ?></td>
                    <td><?= $hasil['deskripsi']; ?></td>
                    <td>               
                        <a href= "admin_index.php?url=admin_edit_jadwal.php&id_pesan=<?= $hasil['id_pesan']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Edit</a> |
                        <a href="admin_hapus_pesan.php?id_pesan=<?= $hasil['id_pesan'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['id_pesan']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                    </td>
                </tr>
            <?php 
        } ?>
            </tbody>

        </table>

        </div>
		</div>
        </div>
        </div>
        </div>
        </div>
        