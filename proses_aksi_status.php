
<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aksi Status</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" type="text/css" href="style.css"/>

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
</head>

<body>

<?php
        include "sidebar.php";
    ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <br>
      <h1>Hasil Pemenang</h1>
    </div><!-- End Page Title -->

        <table class="content-table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">ID Lelang</th>
        <th scope="col">ID Barang</th>
        <th scope="col">ID Masyarakat</th>
        <th scope="col">Harga</th>
        </tr>
    </thead>
    <tbody>
    <?php
      $id_barang = $_GET['id_barang'];
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      // $query = "SELECT `id_lelang`, `id_barang`, `id_masyarakat`, `harga_akhir`as max_price from lelang WHERE `harga_akhir` = (select max(`harga_akhir`) from lelang);";
      // $query = "SELECT * FROM lelang GROUP BY 'id_barang' WHERE `harga_akhir` = (select max(`harga_akhir`) from lelang);";
      $query = "SELECT `id_lelang`, `id_barang`, `id_masyarakat`, max(harga_akhir) as max_price FROM lelang WHERE id_barang = $id_barang";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['id_lelang']; ?></td>
          <td><?php echo $row['id_barang']; ?></td>
          <td><?php echo $row['id_masyarakat']; ?></td>
          <td><?php echo $row['max_price']; ?></td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
      <?php
        // $simpan = $koneksi->query("INSERT INTO history_lelang (id_lelang, id_barang, id_masyarakat, penawaran_harga) SELECT id_lelang, id_barang, id_masyarakat, harga_akhir FROM lelang WHERE `harga_akhir` = (select max(`harga_akhir`) from lelang)");
        $simpan = $koneksi->query("INSERT INTO history_lelang (id_lelang, id_barang, id_masyarakat, penawaran_harga) SELECT id_lelang, id_barang, id_masyarakat, max(harga_akhir) FROM lelang WHERE id_barang = $id_barang");
        $update = $koneksi->query("UPDATE barang SET status = 'telah selesai' WHERE  id_barang = '".$_GET['id_barang']."'");
        $update = $koneksi->query("UPDATE lelang SET status = 'telah selesai' WHERE  id_barang = '".$_GET['id_barang']."'");
    ?>

    </tbody>
    </table>

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