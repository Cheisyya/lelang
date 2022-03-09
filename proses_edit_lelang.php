<?php
    include "koneksi.php";

    $id_masyarakat = $_POST['id_masyarakat']; 
    $nama_masyarakat = $_POST['nama_masyarakat'];
    $tlp = $_POST['tlp'];

    $update_pelelang = mysqli_query($koneksi, "UPDATE masyarakat SET nama_masyarakat = '".$nama_masyarakat."', 
                    tlp = '".$tlp."' WHERE id_masyarakat = '".$id_masyarakat."'");
    if ($update_pelelang) {
        echo "<script>alert('Sukses update');location.href='pelelang.php';</script>";
    } else {
        echo "<script>alert('Gagal update');location.href='edit.pelelang.php?id_masyarakat=".$id_masyarakat."';</script>";
    }
?>