<?php include "config/database.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi - SIMAKU</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body { overflow-x: hidden; }
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

<div class="container">
    <h2>Tambah Transaksi</h2>

    <?php if (isset($_GET['status']) && $_GET['status'] == "gagal") { ?>
        <p style="color:red; font-weight: bold;">Semua data wajib diisi! ⚠️</p>
    <?php } ?>

    <form method="POST" action="simpan.php" class="form-grid">
        <div class="input-group">
            <label>Kategori</label>
            <select name="kategori" required>
                <?php
                $data = mysqli_query($conn, "SELECT * FROM kategori");
                while ($d = mysqli_fetch_assoc($data)) {
                    echo "<option value='{$d['id']}'>{$d['nama_kategori']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="input-group">
            <label>Tipe</label>
            <select name="tipe" required>
                <option value="pemasukan">Pemasukan</option>
                <option value="pengeluaran">Pengeluaran</option>
            </select>
        </div>

        <div class="input-group">
            <label>Jumlah (Rp)</label>
            <input type="number" name="jumlah" placeholder="Contoh: 50000" required>
        </div>

        <div class="input-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" placeholder="Beli nasi padang" required>
        </div>

        <div class="input-group full-width">
            <label>Tanggal</label>
            <input type="date" name="tanggal" required>
        </div>

        <div class="action-buttons">
            <button type="submit" class="btn-simpan">Simpan Transaksi ✨</button>
            <a href="index.php" class="btn-batal">Batal</a>
        </div>
    </form>
</div>

<script>
const avatars = document.querySelectorAll(".avatar");

function moveRandom() {
    avatars.forEach(avatar => {
        // Menghitung posisi acak berdasarkan lebar dan tinggi jendela browser
        const x = Math.random() * (window.innerWidth - 60);
        const y = Math.random() * (window.innerHeight - 60);

        // Menggerakkan avatar ke koordinat baru
        // Karena kita pakai transition di CSS, dia akan terlihat "jalan" bukan "teleportasi"
        avatar.style.transform = `translate(${x}px, ${y}px)`;
    });
}

// Menjalankan fungsi setiap 4 detik agar animasi tidak berhenti (jalan terus)
setInterval(moveRandom, 4000);

// Menjalankan pertama kali saat halaman dibuka
moveRandom();
</script>

</body>
</html>