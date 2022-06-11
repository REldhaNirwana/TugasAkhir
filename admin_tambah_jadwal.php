<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['tambah'])) {
    if (tambahjadwal($_POST) > 0) {
         echo "<script>
                alert('Terima Kasih');
                document.location.href ='?url=admin_jadwal';
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
        <h5 class="card-title">Jadwal</h5>
        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
                <label for="nama_penyewa" class="col-sm-2 col-form-label">ID Jadwal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_jadwal" placeholder="Masukkan Nama Sesuai KTP" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="alamat_penyewa" class="col-sm-2 col-form-label">Tanggal Pakai</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggalpakai" placeholder="Masukkan Alamat Lengkap Anda" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama_penyewa" class="col-sm-2 col-form-label">Tanggal Tempo</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggaltempo" placeholder="Masukkan Nama Sesuai KTP" required>
                </div>
            </div> 
            
            <div class="text-center">
            <a href="?url=admin_paket" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
               
            </div>
        </form>
        <!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div>
</div>