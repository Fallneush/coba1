<?php
// 1. Session harus di baris paling atas
session_start(); 

include "config/database.php";

// 2. Cek apakah ada orang yang login, jika tidak ada kirim ke login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// 3. Validasi apakah data dari form kosong atau tidak
if (
    empty($_POST['kategori']) ||
    empty($_POST['tipe']) ||
    empty($_POST['jumlah']) ||
    empty($_POST['keterangan']) ||
    empty($_POST['tanggal'])
) {
    header("Location: tambah.php?status=gagal");
    exit;
}

// 4. Ambil data dari FORM dan dari SESSION
$user_id    = $_SESSION['user_id']; // Mengambil ID pengguna yang login
$kategori   = $_POST['kategori'];
$tipe       = $_POST['tipe'];
$jumlah     = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];
$tanggal    = $_POST['tanggal'];

// 5. Query INSERT yang sudah lengkap dengan user_id
$query = "INSERT INTO transaksi (user_id, kategori_id, tipe, jumlah, keterangan, tanggal) 
          VALUES ('$user_id', '$kategori', '$tipe', '$jumlah', '$keterangan', '$tanggal')";

// 6. Jalankan query
if (mysqli_query($conn, $query)) {
    header("Location: index.php?status=sukses");
} else {
    echo "Error: " . mysqli_error($conn);
}

// --- Bagian Poin 3 di simpan.php ---

$user_id = $_SESSION['user_id']; // Mengambil ID orang yang sedang login

// Di sinilah Poin 3 diletakkan (menambah user_id ke dalam perintah simpan)
$query = "INSERT INTO transaksi (user_id, kategori_id, tipe, jumlah, keterangan, tanggal) 
          VALUES ('$user_id', '$kategori', '$tipe', '$jumlah', '$keterangan', '$tanggal')";
          
?>