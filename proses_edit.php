<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id_barang = $_POST['id_barang'];
  $nama_barang   = $_POST['nama_barang'];
  $deskripsi     = $_POST['deskripsi'];
  $harga_awal  = $_POST['harga_awal'];
  $foto_barang = $_FILES['foto_barang']['name'];
  $folder = "gambar/";

  $sql = "select * from barang where id_barang = '$id_barang'";
  $query = mysqli_query($koneksi, $sql);
  $barang = mysqli_fetch_array($query);
  $path = $folder.$barang["foto_barang"];
  if(file_exists($path)){
    unlink($path);
  }
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($foto_barang != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto_barang); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto_barang']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto_barang; //menggabungkan angka acak dengan nama file sebenarnya

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                    $query  = "UPDATE barang SET nama_barang = '$nama_barang', deskripsi = '$deskripsi', harga_awal = '$harga_awal', foto_barang = '$nama_gambar_baru'";
                    $query .= "WHERE id_barang = '$id_barang'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='barang.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='proses_edit.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE barang SET nama_barang = '$nama_barang', deskripsi = '$deskripsi', harga_awal = '$harga_awal'";
      $query .= "WHERE id_barang = '$id_barang'";
      $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='barang.php';</script>";
      }
    }

 
