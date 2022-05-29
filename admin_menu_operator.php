<?php
    if(isset($_GET['url'])){
        $url =$_GET['url'];
        switch ($url){
            case'admin_dashboard' :
                include"admin_dashboard.php";
                break;
            case'admin_gedung' :
                include"admin_gedung.php";
                break;
            case'admin_tambah_gedung.php' :
                include"admin_tambah_gedung.php";
                break;
            case'admin_hapus_gedung.php' :
                include"admin_hapus_gedung.php";
                break;
            case'admin_edit_gedung.php' :
                include"admin_edit_gedung.php";
                break;
            
            case'admin_fasilitas' :
                include"admin_fasilitas.php";
                break;
            case'admin_tambah_fasilitas' :                    
                include"admin_tambah_fasilitas.php";
                break;    
            case'admin_edit_fasilitas' :
                include"admin_edit_fasilitas.php";
                break; 
            
            case'admin_paket' :
                include"admin_paket.php";
                break;
            case'admin_tambah_paket' :                    
                include"admin_tambah_paket.php";
                break;    
            case'admin_edit_paket' :
                include"admin_edit_paket.php";
                break; 

            case'admin_jadwal' :
                include"admin_jadwal.php";
                break;
            case'admin_tambah_jadwal' :                    
                include"admin_tambah_jadwal.php";
                break;    
            case'admin_edit_paket' :
                include"admin_edit_jadwal.php";
                break; 

            case'transaksi' :
                include"admin/m_transaksi.php";
                break;
            case'data penyewa' :
                include"admin/m_data_penyewa.php";
                break;
            case'laporan keuangan' :
                include"admin/laporan_keuangan.php";
                break;
            case'info ganti rugi' :
                include"admin/i_ganti_rugi.php";
                break;
            case'info kritik dan saran' :
                include"admin/i_kritik_saran.php";
                break;

            case'profil' :
                include"admin/profil.php";
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
