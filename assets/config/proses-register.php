<?php
include '../config/connect.php';

$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$nis = $_POST['nis'];

$query_check_username = "SELECT * FROM user WHERE username='$username'";
$result_check_username = mysqli_query($is_connect, $query_check_username);

if (mysqli_num_rows($result_check_username) > 0) {
    echo "<script>alert('Username sudah terdaftar! Silakan gunakan username lain.'); window.location.href='../../../pages/';</script>";
    exit();
}

$query_register = "INSERT INTO user (nama, username, password, nis, kelas) VALUES ('$nama', '$username', '$password', '$nis', '$kelas')";
$result_register = mysqli_query($is_connect, $query_register);

if ($result_register) {
    echo "<script>alert('Registrasi berhasil!, Silakan login.'); window.location.href='../../pages/';</script>";    
} else {
    echo "<script>alert('Registrasi gagal! Silakan coba lagi.'); window.location.href='../../pages/';</script>";
}
?>
