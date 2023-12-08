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

    // // Upload foto
    // $targetDir = "./assets/img/foto/";
    // $targetFile = $targetDir . basename($_FILES["foto"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // // Periksa apakah file gambar valid
    // $check = getimagesize($_FILES["foto"]["tmp_name"]);
    // if ($check === false) {
    //     $uploadOk = 0;
    // }

    // // Periksa ukuran file
    // if ($_FILES["foto"]["size"] > 500000) {
    //     $uploadOk = 0;
    // }

    // // Izinkan hanya beberapa tipe file tertentu
    // if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    //     $uploadOk = 0;
    // }

    // // Cek jika $uploadOk bernilai 0
    // if ($uploadOk == 1) {
    //     move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile);
    // }

    $foto = basename($_FILES["foto"]["name"]);
    $target_dir = "assets/img/foto/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (file_exists($target_file)) {
        echo "Maaf, nama file yang di upload sudah ada" . "<br>";
        $uploadOk = 0;
    }
    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
        echo "Maaf, jenis file yang di upload tidak sesuai" . "<br>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Maaf, file tidak bisa di upload";
    } else {
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    }

    // Insert biodata ke dalam database
    $insertQuery = "INSERT INTO biodata (nim, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, no_telepon, alamat, foto)
                    VALUES ('$nim', '$nama', '$jenisKelamin', '$tempatLahir', '$tanggalLahir', '$agama', '$notlpn', '$alamat', '$target_file')";
    $conn->query($insertQuery);
    $idBiodata = $conn->insert_id;

    // Insert mahasiswa ke dalam database
    $insertQuery = "INSERT INTO mahasiswa (id_biodata, id_prodi, semester) VALUES ('$idBiodata', '$prodi', 1)";
    $conn->query($insertQuery);

    // Redirect ke halaman mahasiswa
    header("Location: mahasiswa.php");
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
    header("Location: mahasiswa.php");
}

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $deleteQuery = "DELETE FROM mahasiswa WHERE id_biodata=$id";
    $conn->query($deleteQuery);
    $deleteQuery = "DELETE FROM biodata WHERE id=$id";
    $conn->query($deleteQuery);
    header("Location: mahasiswa.php");
}
