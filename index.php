<?php
// POIN 1: session_start() WAJIB berada di baris paling atas, sebelum kode apapun!
session_start(); 

include "config/database.php";

// Cek apakah user sudah login, jika belum arahkan ke login.php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?pesan=belum_login");
    exit;
}

$user_id = $_SESSION['user_id']; 

// Menampilkan ID untuk pengecekan (pindahkan ke sini setelah session_start)
// echo "ID User Anda adalah: " . $user_id; 

// POIN 2 & 3: Hitung saldo HANYA milik user yang sedang login
$masuk = mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM transaksi WHERE tipe='pemasukan' AND user_id = '$user_id'");
$keluar = mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM transaksi WHERE tipe='pengeluaran' AND user_id = '$user_id'");

$totalMasuk = mysqli_fetch_assoc($masuk)['total'] ?? 0;
$totalKeluar = mysqli_fetch_assoc($keluar)['total'] ?? 0;

$saldo = $totalMasuk - $totalKeluar;

// Ambil data tabel HANYA milik user yang login
$data = mysqli_query($conn, "
    SELECT transaksi.*, kategori.nama_kategori 
    FROM transaksi JOIN kategori 
    ON transaksi.kategori_id = kategori.id
    WHERE transaksi.user_id = '$user_id'
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>SIMAKU</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body { overflow-x: hidden; }
        .user-info { margin-bottom: 10px; font-weight: bold; color: #555; }
    </style>
</head>
<body style="overflow-x: hidden;">

<div class="avatar">🚀</div>
<div class="avatar">🐷</div>
<div class="avatar">📊</div>
<div class="avatar">💰</div>
<div class="avatar">👽</div>
<div class="avatar">🌻</div>
<div class="avatar">🍬</div>
<div class="avatar">💗</div>
<div class="avatar">💫</div>
<div class="avatar">🥰</div>
<div class="avatar">❤️</div>
<div class="avatar">🤡</div>
<div class="avatar">🐾</div>
<div class="avatar">🎅</div>
<div class="avatar">🎃</div>
<div class="avatar">🎶</div>



<div class="container">
    <h2>SIMAKU</h2>
    
    <div class="user-info">
        Halo, <?= $_SESSION['username']; ?>! (ID: <?= $user_id; ?>)
    </div>

    <?php if (isset($_GET['status']) && $_GET['status'] == "sukses") { ?>
        <p style="color:green; font-weight: bold;">Transaksi berhasil disimpan ✨</p>
    <?php } ?>

    <h3>Saldo: Rp <?= number_format($saldo) ?></h3>

    <div style="display: flex; justify-content: space-between; align-items: center;">
        <a href="tambah.php" class="btn-tambah">+ Tambah Transaksi</a>
        <a href="logout.php" style="color: red; text-decoration: none; font-weight: bold;">Keluar Akun ⬅️</a>
    </div>

    <table border="1" cellpadding="6" width="100%" style="margin-top: 20px; border-collapse: collapse;">
        <tr>
            <th>Aksi</th>
            <th>Kategori</th>
            <th>Tipe</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
            <td><?= $row['nama_kategori'] ?></td>
            <td><?= $row['tipe'] ?></td>
            <td><?= number_format($row['jumlah']) ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td><?= $row['tanggal'] ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<script>
// (Script animasi avatar Anda tetap sama)
const avatars = document.querySelectorAll(".avatar");
function moveRandom() {
    avatars.forEach(avatar => {
        const x = Math.random() * (window.innerWidth - 60);
        const y = Math.random() * (window.innerHeight - 60);
        avatar.style.position = "fixed";
        avatar.style.left = "0px";
        avatar.style.top = "0px";
        avatar.style.transform = `translate(${x}px, ${y}px)`;
    });
}
setInterval(moveRandom, 4000);
moveRandom();
</script>

</body>
</html>