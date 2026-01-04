<?php
include "config/database.php";

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Cek apakah username sudah dipakai
$cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Username sudah ada, gunakan yang lain!'); window.location='register.php';</script>";
} else {
    // Simpan ke database
    $simpan = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
    if ($simpan) {
        echo "<script>alert('Registrasi Berhasil! Silakan Login'); window.location='login.php';</script>";
    }
}
?>