<?php
require_once("koneksi.php");

if (isset($_POST['tambah'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_lengkap'];
    $jenisKelamin = $_POST['jenis_kelamin'];
    $tempatLahir = $_POST['tempat_lahir'];
    $tanggalLahir = $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];
    $notlpn = $_POST['no_telepon'];
    $insertQuery = "INSERT INTO biodata (nim, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, no_telepon, alamat)
                    VALUES ('$nim', '$nama', '$jenisKelamin', '$tempatLahir', '$tanggalLahir', '$agama', '$notlpn', '$alamat')";
    $conn->query($insertQuery);
    $idBiodata = $conn->insert_id;
    $insertQuery = "INSERT INTO mahasiswa (id_biodata, id_prodi, semester) VALUES ('$idBiodata', '$prodi', 1)";
    $conn->query($insertQuery);
    header("Location: index.php");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_lengkap'];
    $jenisKelamin = $_POST['jenis_kelamin'];
    $tempatLahir = $_POST['tempat_lahir'];
    $tanggalLahir = $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];
    $notlpn = $_POST['no_telepon'];
    $updateQuery = "UPDATE biodata SET nama_lengkap='$nama', jenis_kelamin='$jenisKelamin', 
                        tempat_lahir='$tempatLahir', tanggal_lahir='$tanggalLahir', 
                        agama='$agama', alamat='$alamat', no_telepon='$notlpn'
                    WHERE id=$id";
    $conn->query($updateQuery);
    $updateQuery = "UPDATE mahasiswa SET id_prodi='$prodi' WHERE id_biodata=$id";
    $conn->query($updateQuery);
    header("Location: index.php");
}

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $deleteQuery = "DELETE FROM mahasiswa WHERE id_biodata=$id";
    $conn->query($deleteQuery);
    $deleteQuery = "DELETE FROM biodata WHERE id=$id";
    $conn->query($deleteQuery);
    header("Location: index.php");
}
?>