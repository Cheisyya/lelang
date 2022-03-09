
<?php
if($_POST){
    $nama_petugas = $_POST["nama_petugas"];
    $username = $_POST['username'];
    $coba = $_POST['coba'];
    if(empty($nama_petugas)){
        echo "<script>alert('nama tidak boleh kosong');location.href='create_acc.php';</script>";
 
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='create_acc.php';</script>";
    } elseif(empty($coba)){
        echo "<script>alert('password tidak boleh kosong');location.href='create_acc.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi,"insert into petugas (nama_petugas, username, password) value ('".$nama_petugas."','".$username."','".md5($coba)."')") or die(mysqli_error($koneksi));
        if($insert){
            echo "<script>alert('Sukses membuat akun');location.href='create_acc.php';</script>";
        } else {
            echo "<script>alert('Gagal');location.href='create_acc.php';</script>";
        }
    }
}
?>