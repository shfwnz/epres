<?php
include '../config/connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($is_connect,$query);

if (mysqli_num_rows($result) > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header('location: ../../pages/dashboard.html');
} else {
    echo "<script>alert('Login Gagal, cek kredensialmu lagi!'); window.location.href='../../pages/';</script>";
}
?>
