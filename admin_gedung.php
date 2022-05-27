<?php 
require 'function.php';
$gedung = query("SELECT * FROM gedung ORDER BY id_gedung DESC");
?>

<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    <a href="?url=admin_tambah_gedung.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Gedung</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Gedung</th>
                <th>Nama Gedung</th>
                <th>Foto Gedung</th>
                <th>Deskripsi</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
                        <?php foreach ($gedung as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['id_gedung']; ?></td>
                                <td><?= $row['nama_gedung']; ?></td>
                                <td><img style="width:120px;" src="img/<?= $row['foto_gedung']; ?>"></td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td>
                                    <button class="btn btn-success btn-sm text-white detail" data-id="<?= $row['idruang']; ?>" style="font-weight: 600;"><i class="bi bi-info-circle-fill"></i>&nbsp;Detail</button> |

                                    <a href= "admin_index.php?url=admin_edit_gedung.php&id_gedung=<?= $row['id_gedung']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Edit</a> |

                                    <a href="admin_hapus_gedung.php?id_gedung=<?= $row['id_gedung'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['nama_gedung']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
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
        