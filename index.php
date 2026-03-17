<?php
session_start();

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['login'])){
        $nikname = $_POST['nikname'];
        $password = $_POST['password'];

        if($nikname == "admin" && $password == "123"){
            $_SESSION['user'] = $nikname;
            header("Location: dashboard.php");
            exit();
        }else{
            $message = "Login gagal! Nikname atau Password salah.";
        }
    }

    if(isset($_POST['register'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $message = "Registrasi berhasil! (Simulasi tanpa database)";
    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Smart PPSU Jakarta</title>
<link rel="stylesheet" href="login.css">
</head>

<body>

<div class="background"></div>

<div class="auth-container">
<div class="auth-card">

<h1>SMART PPSU</h1>
<p class="tagline">Autentikasi Petugas PPSU Jakarta</p>

<!-- LOGIN -->
<form method="POST">

<div class="input-group">
<input type="text" name="nikname" required>
<label>Nikname</label>
</div>

<div class="input-group">
<input type="password" name="password" required>
<label>Password</label>
</div>

<button type="submit" name="login">Masuk</button>

</form>

<p class="switch">
Belum punya akun?
<span onclick="showRegister()">Daftar</span>
</p>

<!-- REGISTER -->
<form id="registerForm" class="hidden" method="POST">

<div class="input-group">
<input type="email" name="email" required>
<label>Email</label>
</div>

<div class="input-group">
<input type="password" name="password" required>
<label>Password</label>
</div>

<button type="submit" name="register">Daftar akun</button>

</form>

<p class="switch hidden" id="backLogin">
Sudah punya akun?
<span onclick="showLogin()">Login</span>
</p>

<p style="color:red;"><?php echo $message; ?></p>

</div>
</div>

<script src="login.js"></script>
</body>
</html>