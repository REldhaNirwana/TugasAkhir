<!-- Begin Page Content
<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Mengambil data idruang
$id_gedung = $_GET['id_gedung'];

// Mengambil data dari table
$gedung = query("SELECT * FROM gedung WHERE id_gedung = $id_gedung")[0];

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['simpanperubahan'])) {
    if (editgedung($_POST) > 0) {
         echo "<script>
                alert('Data berhasil diupdate!');
                document.location.href ='admin_index.php?url=admin_gedung';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data pinjam gagal ditambahkan!');
            </script>";
    }
}
?> -->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Data Gedung</h5>

        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="fotoLama" value="<?= $gedung['foto_gedung']; ?>">
            <div class="row mb-3">
                <label for="id_gedung" class="col-sm-2 col-form-label">ID Gedung</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id ="id_gedung" name="id_gedung" value="<?= $gedung['id_gedung'][0]; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama_gedung" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_gedung" value="<?= $gedung['nama_gedung'][0]; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="foto_gedung" class="col-sm-2 col-form-label">Foto</label>	
                <div class="col-sm-10">
                <img src="img/<?= $gedung['foto_gedung']; ?>" width=70px height=75px>
                <input type="file" name="foto_gedung" class="isian-formulir isian-formulir-border">
				
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" value="<?= $gedung['deskripsi'][0]; ?>" required>
                </div>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="simpanperubahan">Simpan Perubahan</button>
               
            </div>
        </form><!-- End Horizontal Form -->
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
