<?php

require 'function.php';
if(isset($_GET['id_sewabiasa'])) {
    $id_sewabiasa =htmlspecialchars($_GET["id_sewabiasa"]);
    $sql ="delete from sewabiasa where id_sewabiasa = '$id_sewabiasa'";
    $hasil = mysqli_query($koneksi,$sql);

    if($hasil){
        echo "<script>
                alert('Pemesanan berhasil di batalkan!');
                document.location.href ='penyewa_index.php?url=penyewa_sewabiasa.php';
             </script>";
    }else{
        echo "<script>
                alert('Maaf pembatalan sewa gagal!');
            </script>";
    }

}
if(isset($_GET['id_sewapaket'])) {
    $id_sewapaket =htmlspecialchars($_GET["id_sewapaket"]);
    $sql ="delete from sewapaket where id_sewapaket = '$id_sewapaket'";
    $hasil = mysqli_query($koneksi,$sql);

    if($hasil){
        echo "<script>
                alert('Pemesanan berhasil di batalkan!');
                document.location.href ='penyewa_index.php?url=penyewa_sewapaket.php';
             </script>";
    }else{
        echo "<script>
                alert('Maaf pembatalan sewa gagal!');
            </script>";
    }

}


