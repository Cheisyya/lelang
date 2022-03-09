<?php
session_start();
if($_SESSION['status_login']!=true){
header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tambah Barang</title>
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

  <head>
    <title></title>
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

    .py-5 {
      margin-top: 100px;
      margin-left: 100px;
    }
    </style>
  </head>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/ss.png" alt="">
        <span class="d-none d-lg-block">AdminSecond</span>
    </a>

    </header><!-- End Header -->

      <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed " href="home.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Barang</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="barang.php">
          <i class="bi bi-circle"></i><span>Data Barang</span>
        </a>
      </li>
      <li>
        <a href="tambah_barang.php">
          <i class="bi bi-circle"></i><span>Tambah Barang</span>
        </a>
      </li>
      </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="">
      <i class="bi bi-person"></i><span>Pelelang</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="pelelang.php">
          <i class="bi bi-circle"></i><span>Data Pelelang</span>
        </a>
      </li>
      <li>
        <a href="tambah_pelelang.php">
          <i class="bi bi-circle"></i><span>Tambah Pelelang</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="data_lelang.php">
      <i class="bi bi-bar-chart"></i>
      <span>Data Lelang</span>
    </a>
  </li><!-- End Barang Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="laporan.php">
      <i class="bi bi-journal-text"></i>
      <span>Laporan</span>
    </a>
  </li><!-- End Barang Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="proses_logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Log Out</span>
    </a>
  </li><!-- End Login Page Nav -->

  

</ul>

</aside><!-- End Sidebar-->
    

    </ul>

    </aside><!-- End Sidebar-->
    <?php
        include "koneksi.php";
        $query_detail_barang = mysqli_query($koneksi, 
        "SELECT * FROM barang WHERE id_barang = '".$_GET['id_barang']."'");
        $data_barang = mysqli_fetch_array($query_detail_barang);
    ?>
    <main class="container">
    <section class="py-5 text-center container">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./gambar/<?= $data_barang['foto_barang'] ?>" class="img-fluid" alt=".."
                 width="250px" height="1000px">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <form action="proses_lelang.php" method="POST">
                    <input type="hidden" name="id_barang" value="<?= $data_barang['id_barang'] ?>">
                    <table class="table table-hover table-striped">
                        <thead style="text-align: left;">


                    <label>Nama</label>
                    <br><select name="id_masyarakat" class="form-control">
                    <?php 
                        include "koneksi.php";
                            $qry_masyarakat=mysqli_query($koneksi,"select * from masyarakat");
                                while($data_masyarakat=mysqli_fetch_array($qry_masyarakat)){
                                echo '<option value="'.$data_masyarakat['id_masyarakat'].'">'.$data_masyarakat['nama_masyarakat'].'</option>';    
                        }
                        ?>
                    </select></br>
                    <div>
                        <label>Tanggal Lelang</label>
                        <input type="date" name="tgl_lelang" autofocus="" required="" />
                    </div>
                    
                    <input type="hidden" name="harga_awal" value=" <?=$data_barang['harga_awal']?>">
                    <div>
                        <label>Harga</label>
                        <input type="text" name="harga_akhir" required="" />
                    </div>
                    <br><select name="status" class="form-control">
                        <option>Status</option>
                        <option value="Diproses">Diproses</option>
                        <option value="Telah Selesai">Telah Selesai</option>
                    </select></br>
                    </thead>
                </table>
                <br>
                <div style="float: left;">
                <input type="submit" class="btn btn-success" value="Submit">
                </div>
            </form>
            </div>
        </div>
        </div>
    </section>
    </main>
  <br>



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

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