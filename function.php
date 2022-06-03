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
        $keterangan = htmlspecialchars($data['keterangan']);
    
        if (!$foto) {
            return false;
        }
    
        $sql = "INSERT INTO gedung VALUES ('$id_gedung','$nama_gedung','$foto','$keterangan')";
    
        mysqli_query($koneksi, $sql);
        return mysqli_affected_rows($koneksi);
    
    }

// Membuat fungsi edit
function editgedung($data){
    global $koneksi;

    $id_gedung = htmlspecialchars($data['id_gedung']);
    $nama_gedung = htmlspecialchars($data['nama_gedung']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $fotoLama = $data['fotoLama'];

    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    $sql = "UPDATE gedung SET  nama_gedung = '$nama_gedung', foto = '$foto', keterangan = '$keterangan' WHERE id_gedung = '$id_gedung'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

//Tambah fasilitas
function tambahfasilitas($data){
    global $koneksi;

    $id_fasilitas = htmlspecialchars($data['id_fasilitas']);
    $fasilitas = htmlspecialchars($data['fasilitas']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $harga = htmlspecialchars($data['harga']);
    $foto = upload();
    $keterangan = htmlspecialchars($data['keterangan']);

    if (!$foto) {
        return false;
    }

    $sql = "INSERT INTO fasilitas VALUES ('$id_fasilitas','$fasilitas','$jumlah','$foto','$harga','$keterangan')";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}

// Membuat fungsi edit
function editfasilitas($data){
global $koneksi;

$id_fasilitas= htmlspecialchars($data['id_fasilitas']);
$fasilitas= htmlspecialchars($data['fasilitas']);
$jumlah= htmlspecialchars($data['jumlah']);
$harga= htmlspecialchars($data['harga']);
$keterangan = htmlspecialchars($data['keterangan']);

$fotoLama = $data['fotoLama'];

if ($_FILES['foto']['error'] === 4) {
    $foto = $fotoLama;
} else {
    $foto = upload();
}

$sql = "UPDATE fasilitas SET fasilitas= '$fasilitas', jumlah = '$jumlah', foto = '$foto',harga = '$harga', keterangan = '$keterangan' WHERE id_fasilitas = '$id_fasilitas'";

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