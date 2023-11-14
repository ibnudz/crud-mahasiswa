<?php
require_once("koneksi.php");

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_lengkap'];
    $jenisKelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $noTelepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];
    $almamater = $_POST['almamater'];
    $insertQuery = "INSERT INTO dosen (nama_lengkap, jenis_kelamin, agama, no_telepon, email, alamat, jurusan, almamater)
                    VALUES ('$nama', '$jenisKelamin', '$agama', '$noTelepon', '$email', '$alamat', '$jurusan', '$almamater')";
    $conn->query($insertQuery);
    header("Location: index.php");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_lengkap'];
    $jenisKelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $noTelepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];
    $almamater = $_POST['almamater'];
    $updateQuery = "UPDATE dosen SET nama_lengkap='$nama', jenis_kelamin='$jenisKelamin', agama='$agama',
                    no_telepon='$noTelepon', email='$email', alamat='$alamat', jurusan='$jurusan', almamater='$almamater'
                    WHERE id=$id";
    $conn->query($updateQuery);
    header("Location: index.php");
}

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $deleteQuery = "DELETE FROM dosen WHERE id=$id";
    $conn->query($deleteQuery);
    header("Location: index.php");
}
?>