<?php
 
   include "koneksi.php";
   $qry_get_barang = mysqli_query($koneksi, "select * from barang where id_barang = '".$_GET['id_barang']."'");
   $data=mysqli_fetch_array($qry_get_barang);
     
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Edit Barang</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style type="text/css">
     
      h1 {
        text-transform: uppercase;
        color: black;
      }
    button {
          background-color: black;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: cornflowerblue;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
     
    }
    </style>
</head>

<body>

  <?php
      include "sidebar.php";
  ?>

</aside><!-- End Sidebar-->
    <main id="main" class="main">
    <center>
        <h1><br>Edit Barang</br></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id_barang" value="<?php echo $data['id_barang']; ?>"  hidden />

        <div>
          <label>Nama Barang</label>
          <input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" autofocus="" required="" />
        </div>

        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" />
        </div>

        <div>
          <label>Harga</label>
          <input type="text" name="harga_awal" required="" value="<?php echo $data['harga_awal']; ?>"/>
        </div>

        <div>
          <label>Gambar Produk</label>
          <img src="gambar/<?php echo $data['foto_barang']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="foto_barang" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>

        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
    </main><!-- End #main -->


    <?php
        include "footer.php";
    ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>