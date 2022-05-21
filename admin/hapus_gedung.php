<?php

require '../koneksi.php';

// Mengambil data idruang dengan get
$id_gedung = $_GET['id_gedung'];

// Jika fungsi hapus lebih dari 0/data terhapus, maka munculkan alert dibawah
if (hapusgedung($id_gedung) > 0) {
    echo "<script>
                alert('Data ruang berhasil dihapus!');
                document.location.href ='?url=m_gedung';
            </script>";
} else {
    // Jika fungsi hapus dibawah dari 0/data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Data ruang gagal dihapus!');
        </script>";
}