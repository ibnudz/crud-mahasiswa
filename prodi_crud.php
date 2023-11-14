<?php
require_once("koneksi.php");

if (isset($_POST['tambah'])) {
    $nama_fakultas = $_POST['nama_fakultas'];
    $kd_prodi = $_POST['kode_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $insertQuery = "INSERT INTO prodi (kd_prodi, nama_prodi, id_fakultas) VALUES ('$kd_prodi', '$nama_prodi', '$nama_fakultas')";
    $conn->query($insertQuery);
    header("Location: index.php");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_fakultas = $_POST['nama_fakultas'];
    $kd_prodi = $_POST['kode_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $updateQuery = "UPDATE prodi SET kd_prodi='$kd_prodi', nama_prodi='$nama_prodi', id_fakultas='$nama_fakultas' WHERE id=$id";
    $conn->query($updateQuery);
    header("Location: index.php");
}

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $deleteQuery = "DELETE FROM prodi WHERE id=$id";
    $conn->query($deleteQuery);
    header("Location: index.php");
}
?>