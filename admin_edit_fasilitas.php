<!-- Begin Page Content
<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Mengambil data id fasilitas
$id_fasilitas = $_GET['id_fasilitas'];

// Mengambil data dari table
$fasilitas = query("SELECT * FROM fasilitas WHERE id_fasilitas = id_fasilitas")[0];

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['simpanperubahan'])) {
    if (editfasilitas($_POST) > 0) {
         echo "<script>
                alert('Data fasilitas berhasil diupdate!');
                document.location.href ='admin_index.php?url=admin_fasilitas';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data fasilitas gagal ditambahkan!');
            </script>";
    }
}
?> -->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Data Fasilitas</h5>

        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="fotoLama" value="<?= $fasilitas['foto_fasilitas']; ?>">
            <div class="row mb-3">
                <label for="id_fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id ="id_fasilitas" name="id_fasilitas" value="<?= $fasilitas['id_fasilitas'][0]; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="foto_fasilitas" class="col-sm-2 col-form-label">Foto</label>	
                <div class="col-sm-10">
                <img src="img/<?= $fasiitas['foto_fasilitas']; ?>" width=70px height=75px>
                <input type="file" name="foto_fasilitas" class="isian-formulir isian-formulir-border">
				
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" value="<?= $fasilitas['deskripsi'][0]; ?>" required>
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
