<?php
// 1. Mulai session untuk menyimpan data login
session_start();

// 2. Hubungkan ke database
include "config/database.php";

// 3. Ambil data dari form login.php
// mysqli_real_escape_string berfungsi menyaring karakter berbahaya
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// 4. Cari user di tabel 'users' berdasarkan username dan password
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$query = mysqli_query($conn, $sql);

// 5. Cek apakah query berhasil dan data ditemukan
if ($query) {
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        // Jika data ditemukan, ambil data user tersebut
        $data = mysqli_fetch_assoc($query);
        
        // Simpan data ke dalam SESSION agar bisa digunakan di halaman index.php
        $_SESSION['user_id']  = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['status']   = "login";
        
        // Arahkan ke halaman utama
        header("Location: index.php");
        exit;
    } else {
        // Jika data tidak ditemukan, kembali ke login dengan pesan gagal
        header("Location: login.php?pesan=gagal");
        exit;
    }
} else {
    // Jika terjadi error pada database (misal tabel belum dibuat)
    die("Error Database: " . mysqli_error($conn));
}
?>