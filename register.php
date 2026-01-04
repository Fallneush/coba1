<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar SIMAKU</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>body { background: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }</style>
</head>
<body>
<div class="container" style="max-width: 400px;">
    <h2 style="text-align: center;">Daftar Akun Baru</h2>
    <form method="POST" action="proses_register.php">
        <div class="input-group full-width">
            <label>Username</label>
            <input type="text" name="username" placeholder="Buat username" required>
        </div>
        <div class="input-group full-width">
            <label>Password</label>
            <input type="password" name="password" placeholder="Buat password" required>
        </div>
        <button type="submit" class="btn-simpan" style="width: 100%; margin-top: 10px;">Daftar & Login ✨</button>
        <p style="text-align: center; margin-top: 15px;">Sudah punya akun? <a href="login.php">Login</a></p>
    </form>
</div>
</body>
</html>