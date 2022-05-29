<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

    $id_paket = $_GET['id_paket'];
    $tampil = mysqli_query($koneksi, "SELECT * FROM paket WHERE id_paket = '$id_paket'");
    $hasil = mysqli_fetch_array($tampil);

    if (isset($_POST['simpanperubahan'])) {
        if (editpaket($_POST) > 0) {
             echo "<script>
                    alert('Data paket berhasil diubah!');
                    document.location.href ='admin_index.php?url=admin_paket';
                </script>";
        
        } else {
            // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
            echo "<script>
                    alert('Data paket gagal diubah!');
                </script>";
        }
    }
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Data Paket</h5>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="id_paket" class="col-sm-2 col-form-label">Paket</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id ="id_paket" name="id_paket" value="<?php echo $hasil['id_paket'] ?>" required>
                </div>
            <div class="row mb-3">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" value="<?= $hasil['deskripsi']; ?>" required>
                </div>
            </div>
            
            <div class="text-center">
            <a href="?url=admin_paket" class="btn btn-secondary">Kembali</a>
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
