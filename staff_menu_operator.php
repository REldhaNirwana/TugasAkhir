<?php
    if(isset($_GET['url'])){
        $url =$_GET['url'];
        switch ($url){
//Menu Operator Penyewa
            case'staff_dashboard' :
                include"staff_datapenyewa.php";
                break;
            case'staff_cekfasilitas' :
                include"staff_cekfasilitas.php";
                break;
            case'staff_informasifasilitas' :
                include"staff_informasifasilitas.php";
                break;
            default:
            echo "<center><h3>Maaf</h3></center>";
            break;
        }
    }
?>
