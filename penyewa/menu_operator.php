<?php
    if(isset($_GET['url'])){
        $url =$_GET['url'];
        switch ($url){
            case'dashboard' :
                include"penyewa/dashboard.php";
                break;
            case'carapesan' :
                include"penyewa/carapesan.php";
                break;
            case'gedung' :
                include"penyewa/gedung.php";
                break;
            case'fasilitas' :
                include"penyewa/fasilitas.php";
                break;
            case'paket' :
                include"penyewa/paket.php";
                break;
            case'jadwal' :
                include"penyewa/jadwal.php";
                break;
            case'sewa' :
                include"penyewa/sewa.php";
                break;
            case'histori' :
                include"penyewa/histori.php";
                break;
            case'profil' :
                include"penyewa/profil.php";
                break; 
            case'logout' :
                include"logout.php";
                break;
            default:
            echo "<center><h3>Maaf</h3></center>";
            break;
        }
    }
?>
