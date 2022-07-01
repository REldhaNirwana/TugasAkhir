<?php
// Sesi dimulai
session_start();
require 'function.php';
 
// Cek sesi, kalau gk ada kembali ke login
if(!isset($_SESSION["loggedin_penyewa"]) || $_SESSION["loggedin_penyewa"] !== true){
    header("location: login.php?alert=logindulu");
    exit;
}
if(isset($_SESSION["loggedin_admin"]) == true){
    header("location: logout.php");
    exit;
}
if(isset($_SESSION["loggedin_review"]) == true){
    header("location: logout.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gedung Serbaguna Bahari Sejahtera</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<!-- Bootstrap dan jquery Modal -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- Intruksi modal auto show -->


<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notifikasi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
				<table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
				<th>No</th>
                <th>ID Bayar</th>
				<th>Total</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>
			
			<!-- Get data dengan status sewa 0 (pending) -->
            <?php 
            $no = 1;

			$tampil = mysqli_query($koneksi, "SELECT * FROM transaksi_sewa WHERE (status=1 || status=2) && username='$_SESSION[username]' ORDER BY id_bayar DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['id_bayar']; ?></td>
					<td>Rp <?= $hasil['totalbayar']; ?></td>
					
					<!--  intruksi status --> 
					<td> <a><?php if ($hasil['status'] == 1) : ?>
                            <span class="badge badge-pill badge-success">Success</span>
                         <?php elseif ($hasil['status'] == 2) : ?>
                           <span class="badge badge-pill badge-danger">Ditolak</span>
						 <?php else : ?>
                           <span class="badge badge-pill badge-warning">Pending</span>
                         <?php endif ?></a>
                    </td>
                </tr>
				
            <?php } ?>
            </tbody>
        </table>
		<th colspan="4"><center><a href="penyewa_index.php?url=penyewa_bayarsewapaket.php&id_sewa=SILAHKAN%20KE%20MENU%20SEWA&totalbayar=0">Lihat selengkapnya</a></center></th>

		
            </div>
        </div>
    </div>
</div>

<div id="logoutModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
				Apakah anda yakin ingin logout?</br></br>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>	
            </div>
        </div>
    </div>
</div>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dasboard.php">
                <div class="sidebar-brand-text mx-0">Gedung Serbaguna Bahari Sejahtera</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="?url=penyewa_dashboard">
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=carapesan">
                    <span>Cara Pesan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=penyewa_gedung">
                    <span>Gedung</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=penyewa_fasilitas">
                    <span>Fasilitas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=penyewa_paket">
                    <span>Paket</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse"
                    aria-expanded="true" aria-controls="collapse">
                    <span>Jadwal</span>
                </a>
                <div id="collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?url=penyewa_jadwal_paket">Paket</a>
                        <a class="collapse-item" href="?url=penyewa_jadwal">Biasa</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Sewa</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?url=penyewa_sewapaket.php">Paket</a>
                        <a class="collapse-item" href="?url=penyewa_sewabiasa.php">Biasa</a>
                    </div>
                </div>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="?url=penyewa_bayarsewa.php&id_sewa=SILAHKAN KE MENU SEWA&totalbayar=0">
                    <span>Konfirmasi Pembayaran</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=penyewa_ganti_rugi">
                    <span>Ganti Rugi</span></a>
            </li>
             <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-bell"></i>
                            </a>
                        </li>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 big"><?=$_SESSION['username'];?></span>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

               <!-- Begin Page Content -->
               <div class="container-fluid"> 
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"></h1>
                    <!-- menginclude menu_operator, jika diklik tiap menu akan menampilkan halaman menu yang dipilih -->
                    <?php
                        include 'penyewa_menu_operator.php'
                    ?>
                </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Gedung Serbaguna Bahari Sejahtera</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>