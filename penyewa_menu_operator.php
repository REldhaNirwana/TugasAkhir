<?php
    if(isset($_GET['url'])){
        $url =$_GET['url'];
        switch ($url){
//Menu Operator Penyewa
            case'penyewa_dashboard' :
                include"penyewa_dashboard.php";
                break;
            case'penyewa_gedung' :
                include"penyewa_gedung.php";
                break;
            case'penyewa_fasilitas' :
                include"penyewa_fasilitas.php";
                break;
            case'penyewa_paket' :
                include"penyewa_paket.php";
                break;
            default:
            echo "<center><h3>Maaf</h3></center>";
            break;
        }
    }
?>
