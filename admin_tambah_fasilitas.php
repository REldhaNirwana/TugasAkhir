
<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambahfasilitas($_POST) > 0) {
         echo "<script>
                alert('Data fasilitas berhasil ditambahkan');
                document.location.href ='?url=admin_fasilitas';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data fasilitas gagal ditambahkan!');
            </script>";
    }
}
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah Data Fasilitas</h5>

        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="id_fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_fasilitas" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="foto_fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
                <div class="col-sm-10">
                    <input type="file" name="foto_fasilitas" id="foto_fasilitas" class="isian-formulir isian-formulir-border" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" required>
                </div>
            </div>
            
            <div class="text-center">
                <a href="?url=admin_fasilitas" class="btn btn-secondary">Kembali</a>
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
