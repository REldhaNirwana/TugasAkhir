<!-- Begin Page Content -->
<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['sewa'])) {
    if (sewapaket($_POST) > 0) {
         echo "<script>
                alert('Silahkan Melakukan Transaksi di menu Transaksi!');
                document.location.href ='?url=penyewa_sewapaket.php';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Maaf Anda Gagal Melakukan Penyewaan');
            </script>";
    }
}
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Sewa Paket Gedung</h5>

        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="id_penyewa" class="col-sm-2 col-form-label">ID Sewa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_sewa" placeholder="Masukkan NIK Anda" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama_penyewa" class="col-sm-2 col-form-label">Nama Penyewa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_penyewa" placeholder="Masukkan Nama Sesuai KTP" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="alamat_penyewa" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat_penyewa" placeholder="Masukkan Alamat Lengkap Anda" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="telp_penyewa" class="col-sm-2 col-form-label">No.Telp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telp_penyewa" placeholder="Masukkan No.Telp Anda" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="telp_penyewa" class="col-sm-2 col-form-label">ID Paket</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_paket" placeholder="Masukkan No.Telp Anda" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Tanggal Pakai</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggalpakai" placeholder="Masukkan Tanggal Pakai" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Tanggal Tempo</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggaltempo" placeholder="Masukkan Tanggal Pakai" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Lama Sewa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="lamasewa" placeholder="Lama sewa harian" required>
                </div>
            </div>
            <div class="text-center">
            <a href="?url=admin_paket" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="sewa">Sewa</button>
                
               
            </div>
        </form>
        <!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="card">
    <div class="card-body">
    <div class="card-title">
    </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Sewa Paket</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Sewa</th>
                <th>Penyewa</th>
                <th>ID Paket</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                <th>Lama Pakai</th>
                <th>Total Bayar</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            $totalbayar = 0;

            $tampil = mysqli_query($koneksi, "SELECT * FROM sewapaket INNER JOIN paket on sewapaket.id_paket = paket.id_paket
             ORDER BY id_sewapaket DESC");

            while($hasil = $tampil->fetch_assoc()){
                $totalbayar =$hasil['harga'] * $hasil['lamasewa'];
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_sewapaket']; ?></td>
                    <td><?= $hasil['nama_penyewa']; ?></td>
                    <td><?= $hasil['id_paket']; ?></td>
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    <td><?= $hasil['lamasewa']; ?></td>
                    <td><?= $totalbayar ?></td>
                    <td>
                        <a href="penyewa_hapus_sewa.php?id_sewapaket=<?= $hasil['id_sewapaket'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin membatalkan penyewaan ?');"><i class="bi bi-trash-fill"></i>&nbsp;Batal Sewa</a>
                        <a href="penyewa_index.php?url=penyewa_bayarsewapaket.php&id_sewapaket=<?= $hasil['id_sewapaket'];?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-trash-fill"></i>&nbsp;Bayar</a>
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
</div>
<!-- /.container-fluid -->
