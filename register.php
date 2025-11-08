<?php
include 'koneksi.php';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password, nama_lengkap) VALUES ('$username', '$password', '$nama')";
    $result = mysqli_query($koneksi, $query);
    if($result){
        echo "<script>alert('Registrasi berhasil. Silakan login.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal. Silakan coba lagi.');</script>";
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
    <h2>Register</h2>
    <form method="POST">
        <table>
            <tr>
                <td><label for="nama">Masukkan Nama: </label></td>
                <td><input type="text" name="nama" placeholder="Nama Lengkap" required></td>
            </tr>
            <tr>
                <td><label for="username">Username: </label></td>
                <td><input type="text" name="username" placeholder="Username" required></td>
            </tr>
            <tr>
                <td><label for="password">Password: </label></td>
                <td><input type="password" name="password" placeholder="Password" required></td>
            </tr>
            <tr>
                <td>
                <button type="submit" name="login">Daftar</button>
                </td>
            </tr>
        </table>
    </form>
    <p>Sudah ada akun? <a href="login.php">Login disini</a></p>
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
</style>
</html>