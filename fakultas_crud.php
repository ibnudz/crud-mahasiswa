<?php
require_once("koneksi.php");

if (isset($_POST['tambah'])) {
    $namaFakultas = $_POST['nama_fakultas'];
    $insertQuery = "INSERT INTO fakultas (nama_fakultas) VALUES ('$namaFakultas')";
    $conn->query($insertQuery);
    header("Location: fakultas.php");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $namaFakultas = $_POST['nama_fakultas'];
    $updateQuery = "UPDATE fakultas SET nama_fakultas='$namaFakultas' WHERE id=$id";
    $conn->query($updateQuery);
    header("Location: fakultas.php");
}

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $deleteQuery = "DELETE FROM fakultas WHERE id=$id";
    $conn->query($deleteQuery);
    header("Location: fakultas.php");
}
?>