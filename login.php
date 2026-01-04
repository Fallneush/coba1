<?php
session_start();
// Jika user sudah login, arahkan langsung ke index.php agar tidak login dua kali
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - SIMAKU</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body { overflow: hidden; }
        .login-box {
            max-width: 400px;
            margin: 100px auto;
        }
        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9em;
        }
        .register-link a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="avatar">🚀</div>
<div class="avatar">💰</div>
<div class="avatar">📊</div>
<div class="avatar">🍬</div>

<div class="container login-box">
    <h2>Login SIMAKU</h2>

    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") { ?>
        <p style="color: #e74c3c; font-weight: bold; text-align: center;">
            Username atau Password salah! ❌
        </p>
    <?php } ?>

    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "belum_login") { ?>
        <p style="color: #f39c12; font-weight: bold; text-align: center;">
            Silakan login terlebih dahulu! ⚠️
        </p>
    <?php } ?>

    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "berhasil_daftar") { ?>
        <p style="color: #2ecc71; font-weight: bold; text-align: center;">
            Pendaftaran berhasil! Silakan login. ✅
        </p>
    <?php } ?>

    <form method="POST" action="proses_login.php">
        <div class="input-group full-width">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>
        </div>

        <div class="input-group full-width">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <div class="action-buttons">
            <button type="submit" class="btn-simpan" style="width: 100%;">Masuk Sekarang ✨</button>
        </div>

        <div class="register-link">
            Belum punya akun? <a href="register.php">Daftar di sini</a>
        </div>
    </form>
</div>

<script>
    // Skrip animasi avatar melayang agar sama dengan index.php
    const avatars = document.querySelectorAll(".avatar");
    function moveRandom() {
        avatars.forEach(avatar => {
            const x = Math.random() * (window.innerWidth - 60);
            const y = Math.random() * (window.innerHeight - 60);
            avatar.style.position = "fixed";
            avatar.style.transition = "4s ease-in-out"; // Agar gerakan halus
            avatar.style.transform = `translate(${x}px, ${y}px)`;
        });
    }
    setInterval(moveRandom, 4000);
    moveRandom();
</script>

</body>
</html>