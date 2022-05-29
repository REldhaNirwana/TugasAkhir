<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "dbsewagedung");
if(!$koneksi){
    die("koneksi dengan database gagal: ".mysql_connect_error());
}


//Tambah gedung
function tambahgedung($data){
        global $koneksi;
    
        $id_gedung = htmlspecialchars($data['id_gedung']);
        $nama_gedung = htmlspecialchars($data['nama_gedung']);
        $foto_gedung = upload();
        $deskripsi = htmlspecialchars($data['deskripsi']);
    
        if (!$foto_gedung) {
            return false;
        }
    
        $sql = "INSERT INTO gedung VALUES ('$id_gedung','$nama_gedung','$foto_gedung','$deskripsi')";
    
        mysqli_query($koneksi, $sql);
        return mysqli_affected_rows($koneksi);
    
    }

// Membuat fungsi edit
function editgedung($data){
    global $koneksi;

    $id_gedung = htmlspecialchars($data['id_gedung']);
    $nama_gedung = htmlspecialchars($data['nama_gedung']);
    $deskripsi = htmlspecialchars($data['deskripsi']);

    $fotoLama = $data['fotoLama'];

    if ($_FILES['foto_gedung']['error'] === 4) {
        $foto_gedung = $fotoLama;
    } else {
        $foto_gedung = upload();
    }

    $sql = "UPDATE gedung SET  nama_gedung = '$nama_gedung', foto_gedung = '$foto_gedung', deskripsi = '$deskripsi' WHERE id_gedung = '$id_gedung'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}
// Membuat fungsi upload foto
function upload()
{
    // Syarat
    $namaFile = $_FILES['foto_gedung']['name'];
    $ukuranFile = $_FILES['foto_gedung']['size'];
    $error = $_FILES['foto_gedung']['error'];
    $tmpName = $_FILES['foto_gedung']['tmp_name'];

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