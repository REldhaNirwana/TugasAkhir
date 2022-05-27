<?php

require 'function.php';
if(isset($_GET['id_gedung'])) {
    $id_gedung =htmlspecialchars($_GET["id_gedung"]);
    $sql ="delete from gedung where id_gedung = '$id_gedung'";
    $hasil = mysqli_query($koneksi,$sql);

    if($hasil){
        echo "<script>
                alert('Data ruang berhasil dihapus!');
                document.location.href ='admin_index.php?url=admin_gedung';
             </script>";
    }else{
        echo "<script>
                alert('Data pinjam gagal ditambahkan!');
            </script>";
    }

}


