<!-- Begin Page Content -->
<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['kirim'])) {
    if (bayarsewapaket($_POST) > 0) {
         echo "<script>
                alert('Terima Kasih');
                document.location.href ='?url=penyewa_bayarsewapaket.php';
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
        <h5 class="card-title">Form Pembayaran</h5>
        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="row mb-3">
                <label for="alamat_penyewa" class="col-sm-2 col-form-label">ID Sewa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_sewapaket" placeholder="Masukkan Alamat Lengkap Anda" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama_penyewa" class="col-sm-2 col-form-label">No. Rekening</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="norek" placeholder="Masukkan Nama Sesuai KTP" required>
                </div>
            </div> 
            <div class="row mb-3">
                <label for="foto" class="col-sm-2 col-form-label">Bukti Transaksi</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" id="foto" class="isian-formulir isian-formulir-border" required>
                </div>
            </div>
            <div class="text-center">
            <a href="?url=admin_paket" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
               
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
            <h4 class="m-0 font-weight-bold text-primary">Riwayat Pembayaran</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>ID Bayar</th>
                <th>ID Sewa</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM transaksi_sewapaket INNER JOIN sewapaket on transaksi_sewapaket.id_sewapaket = sewapaket.id_sewapaket 
             ORDER BY id_bayar DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_bayar']; ?></td>
                    <td><?= $hasil['id_sewapaket']; ?></td>
                    <td>
                        
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