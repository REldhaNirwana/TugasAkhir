<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "dbsewagedung");
if(!$koneksi){
    die("koneksi dengan database gagal: ".mysqli_connect_error());
}

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat variable array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

//Tambah gedung
    function tambahgedung($data)
    {
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

// Membuat fungsi ubah
function editgedung($data)
{
    global $koneksi;

    $id_gedung = htmlspecialchars($data['id_gedung']);
    $nama_gedung = htmlspecialchars($data['nama_gedung']);
    //$foto_gedung = upload();
    $deskripsi = htmlspecialchars($data['deskripsi']);
    
    //$gambar = upload();

    $fotoLama = $data['fotoLama'];

    if ($_FILES['foto_gedung']['error'] === 4) {
        $foto_gedung = $fotoLama;
    } else {
        $foto_gedung = upload();
    }

    $sql = "UPDATE gedung SET id_gedung = '$id_gedung', nama_gedung = '$nama_gedung', foto_gedung = '$foto_gedung', deskripsi = '$deskripsi' WHERE id_gedung = '$id_gedung'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}
//Tambah fasilitas
    function tambahfasilitas($data)
    {
        global $koneksi;
    
        $id_fasilitas = htmlspecialchars($data['id_fasilitas']);
        $foto_fasilitas = upload();
        $deskripsi = htmlspecialchars($data['deskripsi']);
    
        if (!$foto_fasilitas) {
            return false;
        }
    
        $sql = "INSERT INTO fasilitas VALUES ('$id_fasilitas','$foto_fasilitas','$deskripsi')";
    
        mysqli_query($koneksi, $sql);
    
     
       return mysqli_affected_rows($koneksi);
    
    }

// Membuat fungsi ubah
function editfasilitas($data)
{
    global $koneksi;

    $id_fasilitas = htmlspecialchars($data['id_fasilitas']);
    //$foto_gedung = upload();
    $deskripsi = htmlspecialchars($data['deskripsi']);
    
    //$gambar = upload();

    $fotoLama = $data['fotoLama'];

    if ($_FILES['foto_fasilitas']['error'] === 4) {
        $foto_fasilitas = $fotoLama;
    } else {
        $foto_fasilitas = upload();
    }

    $sql = "UPDATE fasilitas SET id_fasilitas = '$id_fasilitas', foto_fasilitas = '$foto_fasilitas', deskripsi = '$deskripsi' WHERE id_fasilitas = '$id_fasilitas'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

//Tambah paket
function tambahpaket($data)
{
    global $koneksi;

    $id_paket = htmlspecialchars($data['id_paket']);
    $deskripsi = htmlspecialchars($data['deskripsi']);

    $sql = "INSERT INTO paket VALUES ('$id_paket','$deskripsi')";

    mysqli_query($koneksi, $sql);

 
   return mysqli_affected_rows($koneksi);

}

// Membuat fungsi ubah
function editpaket($data)
{
global $koneksi;

$id_paket = htmlspecialchars($data['id_paket']);
$deskripsi = htmlspecialchars($data['deskripsi']);

$sql = "UPDATE paket SET id_paket = '$id_paket', deskripsi = '$deskripsi' WHERE id_paket = '$id_paket'";

mysqli_query($koneksi, $sql);

return mysqli_affected_rows($koneksi);
}
function upload()
{
    // Syarat
    $namaFile = $_FILES['foto_gedung']['name'];
    $ukuranFile = $_FILES['foto_gedung']['size'];
    $error = $_FILES['foto_gedung']['error'];
    $tmpName = $_FILES['foto_gedung']['tmp_name'];

    $namaFile = $_FILES['foto_fasilitas']['name'];
    $ukuranFile = $_FILES['foto_fasilitas']['size'];
    $error = $_FILES['foto_fasilitas']['error'];
    $tmpName = $_FILES['foto_fasilitas']['tmp_name'];

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