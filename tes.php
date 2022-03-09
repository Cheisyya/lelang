<?php
$result = mysqli_query($koneksi,"SELECT max(harga_akhir) AS max_price from lelang where id_barang = '".$_GET['id_barang']."'");
$row = mysqli_fetch_array($result);
echo $row["max_price"];
?>