<?php
include "config/database.php";
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM transaksi WHERE id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Transaksi</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <body>
    <div class="bg-decorations">
        <div class="avatar-float jake"></div>
        <div class="avatar-float neytiri"></div>
    </div>

    <div class="container">
        ...
    </div>
</body>

<div class="container">
<h2>Edit Transaksi</h2>

<form method="POST" action="update.php">
<input type="hidden" name="id" value="<?= $d['id'] ?>">

Kategori:
<select name="kategori">
<?php
$kat = mysqli_query($conn, "SELECT * FROM kategori");
while ($k = mysqli_fetch_assoc($kat)) {
  $selected = ($k['id'] == $d['kategori_id']) ? "selected" : "";
  echo "<option value='$k[id]' $selected>$k[nama_kategori]</option>";
}
?>
</select>

Tipe:
<select name="tipe">
<option value="pemasukan" <?= $d['tipe']=="pemasukan"?"selected":"" ?>>Pemasukan</option>
<option value="pengeluaran" <?= $d['tipe']=="pengeluaran"?"selected":"" ?>>Pengeluaran</option>
</select>

Jumlah:
<input type="number" name="jumlah" value="<?= $d['jumlah'] ?>" required>

Keterangan:
<input type="text" name="keterangan" value="<?= $d['keterangan'] ?>" required>

Tanggal:
<input type="date" name="tanggal" value="<?= $d['tanggal'] ?>" required>

<button type="submit">Update</button>
</form>
</div>

</body>
</html>
