<!-- Begin Page Content -->
<?php
// Memanggil atau membutuhkan file function.php
require '../koneksi.php';

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (editgedung($_POST) > 0) {
        echo "<script>
                alert('Data ruang berhasil diubah!');
                document.location.href = '?url=m_gedung';
            </script>";
    } else {
        // Jika fungsi ubah dibawah dari 0/data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data ruang gagal diubah!');
            </script>";
    }
}
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Data Gedung</h5>

        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="id_gedung" class="col-sm-2 col-form-label">ID Gedung</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_gedung" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama_gedung" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_gedung" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="foto_gedung" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto_gedung" id="foto_gedung" class="isian-formulir isian-formulir-border" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" required>
                </div>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
               
            </div>
        </form><!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
