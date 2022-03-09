<?php
    $nama_masyarakat = $_POST["nama_masyarakat"];
    $tlp = $_POST["tlp"];

    
    include "koneksi.php";
    $input = mysqli_query($koneksi, "INSERT INTO masyarakat (nama_masyarakat, tlp) VALUES ('{$nama_masyarakat}', '{$tlp}')");

    if ($input) {
        echo "<script>alert('Berhasil');location.href='pelelang.php';</script>";
    }
    else {
        echo "<script>alert('Gagal');location.href='tambah_pelelang.php';</script>";
    }
?>