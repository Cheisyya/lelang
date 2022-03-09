<?php 
    if($_GET['id_masyarakat']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi,"delete from masyarakat where id_masyarakat='".$_GET['id_masyarakat']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus data');location.href='pelelang.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data');location.href='pelelang.php';</script>";
        }
    }
?>
