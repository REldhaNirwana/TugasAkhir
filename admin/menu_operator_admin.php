<?php
    if(isset($_GET['url'])){
        $url =$_GET['url'];
        switch ($url){
            case'dashboard' :
                include"admin/dashboard.php";
                break;
            case'm_gedung' :
                include"admin/m_gedung.php";
                break;
            case'tambah_gedung.php' :
                include"admin/tambah_gedung.php";
                break;
            case'hapus_gedung.php' :
                include"admin/hapus_gedung.php";
                break;
            case'edit_gedung.php' :
                include"admin/edit_gedung.php";
                break;
            
            
            case'fasilitas' :
                include"admin/m_fasilitas.php";
                break;
            case'fasilitasadd' :
                include"admin/tambah_fasilitas.php";
                break;    
            case'fasilitasedit' :
                include"admin/m_fasilitasedit.php";
                break; 

            case'paket' :
                include"admin/m_paket.php";
                break;
            case'paketadd' :
                include"admin/tambah_paket.php";
                break;    
            case'paketedit' :
                include"admin/m_paketedit.php";
                break;

            case'jadwal' :
                include"admin/m_jadwal.php";
                break;
                case'jadwaladd' :
                    include"admin/m_jadwaladd.php";
                    break;    
                case'jadwaledit' :
                    include"admin/m_jadwaledit.php";
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