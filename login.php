<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_assoc($result);

    if($user && password_verify($password, $user['password'])){
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        echo "<script>alert('Registrasi berhasil. Silakan login.'); window.location='home.php';</script>";
    } else {
        echo "<script>alert('Login gagal: Username atau password salah.');</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Login</h2>
    <form method="POST">
        <table>
            <tr>
                <td><label for="username">Username: </label></td>
                <td><input type="text" name="username" placeholder="Username" required></td>
            </tr>
            <tr>
                <td><label for="password"> Password: </label></td>
                <td><input type="password" name="password" placeholder="Password" required></td>
            </tr>
            <tr>
                <td>
                <button type="submit" name="login">Daftar</button>
                </td>
            </tr>
        </table>
    </form>
    <p>
        Belum ada akun? <a href="register.php">Daftar disini</a>
        </p>
    </div>
</body>
<style>
    body{
    font-family: Arial, sans-serif;
    background-image: url('bg.jpg');
    background-position: center;
    background-size: cover;
    margin: 0;
}
</html>