<?php
require_once("koneksi.php");

if (isset($_POST['tambah'])) {
    $kdMatakuliah = $_POST['kode_matakuliah'];
    $namaMatakuliah = $_POST['nama_matakuliah'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $sks = $_POST['sks'];
    $insertQuery = "INSERT INTO matakuliah (kd_matakuliah, nama_matakuliah, id_prodi, semester, sks)
                    VALUES ('$kdMatakuliah', '$namaMatakuliah', $prodi, $semester, $sks)";
    $conn->query($insertQuery);
    header("Location: index.php");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $kdMatakuliah = $_POST['kode_matakuliah'];
    $namaMatakuliah = $_POST['nama_matakuliah'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $sks = $_POST['sks'];
    $updateQuery = "UPDATE matakuliah SET kd_matakuliah='$kdMatakuliah', nama_matakuliah='$namaMatakuliah',
                    id_prodi=$prodi, semester=$semester, sks=$sks
                    WHERE id=$id";
    $conn->query($updateQuery);
    header("Location: index.php");
}

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $deleteQuery = "DELETE FROM matakuliah WHERE id=$id";
    $conn->query($deleteQuery);
    header("Location: index.php");
}
?>