<?php
session_start();
if($_POST){
    $id_barang = $_POST["id_barang"];
    $tgl_lelang = $_POST["tgl_lelang"];
    $harga_akhir = $_POST["harga_akhir"];
    $harga_awal = $_POST["harga_awal"];
    $id_petugas = $_SESSION["id_petugas"];
    $status=$_POST['status'];
    $id_masyarakat = $_POST["id_masyarakat"];

    // echo $harga_awal;
    if($harga_akhir <= $harga_awal){
        echo "<script>alert('tidak dapat menawar lebih rendah');location.href='home.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi,"insert into lelang (id_barang, tgl_lelang, harga_akhir, id_petugas, status, id_masyarakat) value ('".$id_barang."','".$tgl_lelang."','".$harga_akhir."','".$id_petugas."','".$status."','".$id_masyarakat."')") or die(mysqli_error($koneksi));
        if($insert){
            echo "<script>alert('Sukses ');location.href='data_lelang.php';</script>";
        } else {
            echo "<script>alert('Gagal ');location.href='home.php';</script>";
        }
    }
}
?>