<!-- Begin Page Content
<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Mengambil data id paket
$id_paket = $_GET['id_paket'];

// Mengambil data dari table
$paket = query("SELECT * FROM paket WHERE id_paket = id_paket")[0];

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['simpanperubahan'])) {
    if (editpaket($_POST) > 0) {
         echo "<script>
                alert('Data paket berhasil diupdate!');
                document.location.href ='admin_index.php?url=admin_paket';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data paket gagal ditambahkan!');
            </script>";
    }
}
?> -->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Data Paket</h5>

        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Paket</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id ="id_paket" name="id_paket" value="<?= $paket['id_paket'][0]; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" value="<?= $paket['deskripsi'][0]; ?>" required>
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
