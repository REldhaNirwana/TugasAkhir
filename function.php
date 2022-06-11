<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "dbsewagedung");
if(!$koneksi){
    die("koneksi dengan database gagal: ".mysqli_connect_error());
}

//Tambah gedung
function tambahgedung($data){
        global $koneksi;
    
        $id_gedung = htmlspecialchars($data['id_gedung']);
        $nama_gedung = htmlspecialchars($data['nama_gedung']);
        $foto = upload();
        $harga_gdg = htmlspecialchars($data['harga_gdg']);
        $keterangan = htmlspecialchars($data['keterangan']);
    
        if (!$foto) {
            return false;
        }
    
        $sql = "INSERT INTO gedung VALUES ('$id_gedung','$nama_gedung','$foto','$harga_gdg','$keterangan')";
    
        mysqli_query($koneksi, $sql);
        return mysqli_affected_rows($koneksi);
    
    }

// Membuat fungsi edit
function editgedung($data){
    global $koneksi;

    $id_gedung = htmlspecialchars($data['id_gedung']);
    $nama_gedung = htmlspecialchars($data['nama_gedung']);
    $harga_gdg = htmlspecialchars($data['harga_gdg']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $fotoLama = $data['fotoLama'];

    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    $sql = "UPDATE gedung SET  nama_gedung = '$nama_gedung', foto = '$foto', harga_gdg = '$harga_gdg',keterangan = '$keterangan' WHERE id_gedung = '$id_gedung'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

//Tambah fasilitas
function tambahfasilitas($data){
    global $koneksi;

    $id_fasilitas = htmlspecialchars($data['id_fasilitas']);
    $fasilitas = htmlspecialchars($data['fasilitas']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $harga_fsl = htmlspecialchars($data['harga_fsl']);
    $foto = upload();
    $keterangan = htmlspecialchars($data['keterangan']);

    if (!$foto) {
        return false;
    }

    $sql = "INSERT INTO fasilitas VALUES ('$id_fasilitas','$fasilitas','$jumlah','$foto','$harga_fsl','$keterangan')";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}

// Membuat fungsi edit
function editfasilitas($data){
global $koneksi;

$id_fasilitas= htmlspecialchars($data['id_fasilitas']);
$fasilitas= htmlspecialchars($data['fasilitas']);
$jumlah= htmlspecialchars($data['jumlah']);
$harga_fsl= htmlspecialchars($data['harga_fsl']);
$keterangan = htmlspecialchars($data['keterangan']);

$fotoLama = $data['fotoLama'];

if ($_FILES['foto']['error'] === 4) {
    $foto = $fotoLama;
} else {
    $foto = upload();
}

$sql = "UPDATE fasilitas SET fasilitas= '$fasilitas', jumlah = '$jumlah', foto = '$foto',harga_fsl = '$harga_fsl', keterangan = '$keterangan' WHERE id_fasilitas = '$id_fasilitas'";

mysqli_query($koneksi, $sql);

return mysqli_affected_rows($koneksi);
}

//Tambah paket
function tambahpaket($data){
    global $koneksi;

    $id_paket = htmlspecialchars($data['id_paket']);
    $paket = htmlspecialchars($data['paket']);
    $fasilitas = htmlspecialchars($data['fasilitas']);
    $harga = htmlspecialchars($data['harga']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $sql = "INSERT INTO paket VALUES ('$id_paket','$paket','$fasilitas','$harga','$keterangan')";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}

// Membuat fungsi edit
function editpaket($data){
global $koneksi;

$id_paket = htmlspecialchars($data['id_paket']);
$paket = htmlspecialchars($data['paket']);
$fasilitas = htmlspecialchars($data['fasilitas']);
$harga = htmlspecialchars($data['harga']);
$keterangan = htmlspecialchars($data['keterangan']);

$sql = "UPDATE paket SET  paket= '$paket',fasilitas= '$fasilitas',harga= '$harga', keterangan = '$keterangan' WHERE id_paket = '$id_paket'";

mysqli_query($koneksi, $sql);

return mysqli_affected_rows($koneksi);
}
//Tambah paket
function tambahjadwal($data){
    global $koneksi;

    $id_jadwal = htmlspecialchars($data['id_jadwal']);
    
    $tanggalpakai = htmlspecialchars($data['tanggalpakai']);
    $tanggalpakai = Date('Y-m-d', strtotime($tanggalpakai));
    $tanggaltempo = htmlspecialchars($data['tanggaltempo']);
    $tanggaltempo = Date('Y-m-d', strtotime($tanggaltempo));
    

    $sql = "INSERT INTO jadwal_sewa VALUES ('$id_jadwal','$tanggalpakai','$tanggaltempo')";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}


//Proses Sewa Paket
function sewapaket($data){
    global $koneksi;

    $id_sewa = htmlspecialchars($data['id_sewa']);
    $nama_penyewa = htmlspecialchars($data['nama_penyewa']);
    $alamat_penyewa = htmlspecialchars($data['alamat_penyewa']);
    $telp_penyewa = htmlspecialchars($data['telp_penyewa']);
    $id_paket = $data['id_paket'];
    $tanggalpakai = htmlspecialchars($data['tanggalpakai']);
    $tanggalpakai = Date('Y-m-d', strtotime($tanggalpakai));
    $tanggaltempo = htmlspecialchars($data['tanggaltempo']);
    $tanggaltempo = Date('Y-m-d', strtotime($tanggaltempo));
    $lamasewa = htmlspecialchars($data['lamasewa']);

    $sql = "INSERT INTO sewapaket VALUES ('$id_sewa','$nama_penyewa','$alamat_penyewa','$telp_penyewa','$id_paket','$tanggalpakai','$tanggaltempo','$lamasewa')";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}
//Proses Sewa Paket
function sewabiasa($data){
    global $koneksi;

    $id_sewa = htmlspecialchars($data['id_sewa']);
    $nama_penyewa = htmlspecialchars($data['nama_penyewa']);
    $alamat_penyewa = htmlspecialchars($data['alamat_penyewa']);
    $telp_penyewa = htmlspecialchars($data['telp_penyewa']);
    $id_gedung = $data['id_gedung'];
    $id_fasilitas = $data['id_fasilitas'];
    $tanggalpakai = htmlspecialchars($data['tanggalpakai']);
    $tanggalpakai = Date('Y-m-d', strtotime($tanggalpakai));
    $tanggaltempo = htmlspecialchars($data['tanggaltempo']);
    $tanggaltempo = Date('Y-m-d', strtotime($tanggaltempo));
    $lamasewa = htmlspecialchars($data['lamasewa']);
    
        
        $sql = "INSERT INTO sewabiasa VALUES ('$id_sewa','$nama_penyewa','$alamat_penyewa','$telp_penyewa','$id_gedung','$id_fasilitas','$tanggalpakai','$tanggaltempo','$lamasewa')";

        mysqli_query($koneksi, $sql);
        return mysqli_affected_rows($koneksi);
    
    
}

//Proses Bayar Sewa Biasa
function bayarsewabiasa($data){
    global $koneksi;
    $id_bayar = "SELECT max(id_bayarr)FROM transaksi_sewabiasa";
    $id_sewabiasa = $data['id_sewabiasa'];
    $norek = htmlspecialchars($data['norek']);
    $foto = upload();

    $sql = "INSERT INTO transaksi_sewabiasa VALUES ('$id_bayar','$id_sewabiasa','$norek','$foto')";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}

//Proses Bayar Sewa Paket
function bayarsewapaket($data){
    global $koneksi;
    $id_bayar = "SELECT max(id_bayar)FROM transaksi_sewapaket";
    $id_sewapaket = $data['id_sewapaket'];
    $norek = htmlspecialchars($data['norek']);
    $foto = upload();

    $sql = "INSERT INTO transaksi_sewapaket VALUES ('$id_bayar','$id_sewapaket','$norek','$foto')";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}
// Membuat fungsi upload foto
function upload()
{
    // Syarat
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];


    // Jika tidak mengupload gambar atau tidak memenuhi persyaratan diatas maka akan menampilkan alert dibawah
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    // format atau ekstensi yang diperbolehkan untuk upload gambar adalah
    $extValid = ['jpg', 'jpeg', 'png'];
    $ext = explode('.', $namaFile);
    $ext = strtolower(end($ext));

    // Jika format atau ekstensi bukan gambar maka akan menampilkan alert dibawah
    if (!in_array($ext, $extValid)) {
        echo "<script>alert('Yang anda upload bukanlah gambar!');</script>";
        return false;
    }

    // Jika ukuran gambar lebih dari 3.000.000 byte maka akan menampilkan alert dibawah
    if ($ukuranFile > 3000000) {
        echo "<script>alert('Ukuran gambar anda terlalu besar!');</script>";
        return false;
    }

    // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ext;

    // memindahkan file ke dalam folde img dengan nama baru
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
    
}

?>