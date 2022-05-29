<?php 
require 'function.php';
$jadwal = query("SELECT * FROM jadwal ORDER BY id_pesan DESC");
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
            <?php $no = 1; ?>
                        <?php foreach ($id_pesan as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['id_pesan']; ?></td>
                                <td><?= $row['tanggal']; ?></td>
                                <td><?= $row['tahun']; ?></td>
                                <td><?= $row['id_paket']; ?></td>
                                <td><?= $row['status']; ?></td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td>
                                    <a href= "admin_index.php?url=admin_edit_jadwal.php&id_pesan=<?= $row['id_pesan']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Edit</a> |

                                    <a href="admin_hapus_jadwal.php?id_pesan=<?= $row['id_pesan'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['id_pesan']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
            </tbody>
    
        </table>

        </div>
		</div>
        </div>
        </div>
        </div>
        </div>
        