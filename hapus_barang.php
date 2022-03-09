<?php 
    include "koneksi.php";
    $id_barang = $_GET['id_barang'];
    $folder = "gambar/";
    $sql = "select * from barang where id_barang = '$id_barang'";
    $query = mysqli_query($koneksi, $sql);
    $barang = mysqli_fetch_array($query);
    $path = $folder.$barang["foto_barang"];
    if(file_exists($path)){
      unlink($path);
    }

    $sql = "DELETE FROM barang WHERE id_barang = '$id_barang'";
    $result = mysqli_query($koneksi, $sql);
    if($result){
        echo "<script>alert('Sukses hapus');location.href='barang.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus');location.href='hapus_barang.php';</script>";
    mysqli_error($koneksi);
    }
?>