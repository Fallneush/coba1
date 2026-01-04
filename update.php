<?php
include "config/database.php";
$id = $_POST['id'];
$kategori = $_POST['kategori'];
$tipe = $_POST['tipe'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];
$tanggal = $_POST['tanggal'];

$sql = "UPDATE transaksi SET kategori_id='$kategori', tipe='$tipe', jumlah='$jumlah', keterangan='$keterangan', tanggal='$tanggal' WHERE id='$id'";
mysqli_query($conn, $sql);

header("Location: index.php?status=sukses_update");
?>