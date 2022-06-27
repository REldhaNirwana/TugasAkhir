<?php 
require 'function.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gedung Serbaguna Bahari Sejahtera</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
	<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">JADWAL SEWA GEDUNG</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight text">Jadwal Biasa</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM jadwal_sewa WHERE paket='0' ORDER BY id_jadwal DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    
                </tr>
            <?php } ?>
            </tbody>

        </table>

        </div>
		</div>
        </div>
        </div>
		
		<div class="modal-body">
         <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight text">Jadwal Paket</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Tempo</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;

            $tampil = mysqli_query($koneksi, "SELECT * FROM jadwal_sewa WHERE paket='1' ORDER BY id_jadwal DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hasil['tanggalpakai']; ?></td>
                    <td><?= $hasil['tanggaltempo']; ?></td>
                    
                </tr>
            <?php } ?>
            </tbody>

        </table>

        </div>
		</div>
        </div>
		<center>Silahkan masuk untuk melihat ketersediaan jadwal.</center>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
        
      </div>
    </div>
  </div>
    <body>
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="assets/mp4/bg.mp4" type="video/mp4" /></video>
        <div class="masthead">
            <div class="masthead-content text-white">
                <div class="container-fluid px-4 px-lg-0">
                    <h1 class="fst-italic lh-1 mb-4"><a style="color:#297ecf">G</a>edung Serbaguna Bahari Sejahtera</h1>
                    <p class="mb-5">Selamat Datang! <a style="color:#297ecf" data-toggle="modal" data-target="#myModal"> Cek Jadwal</a></p>
                   
                </div>
				<div class="dropdown">
					<button class="dropbtn">Masuk</button>
					<div class="dropdown-content">
						<a href="login.php">Penyewa</a>
						<a href="login_admin.php">Admin</a>
						<a href="login_review.php">Review</a>
					</div>
				</div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
		<style>
.dropbtn {
  background-color: #297ecf;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #4d6f8f;
}
</style>
    </body>
</html>
