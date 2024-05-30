<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $username = $_SESSION['username'];

    $query = "SELECT password FROM user WHERE username = '$username'";
    $result = mysqli_query($is_connect, $query);
    $row = mysqli_fetch_assoc($result);

    // Periksa password lama dengan membandingkan string secara langsung
    if ($old_password === $row['password']) {
        // ubah pw hash
        // $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        // $update_query = "UPDATE user SET password = '$new_password_hash' WHERE username = '$username'";

        // update
        $update_query = "UPDATE user SET password = '$new_password' WHERE username = '$username'";

        if (mysqli_query($is_connect, $update_query)) {
            $_SESSION['alert'] = ['message' => 'Password berhasil diubah.', 'type' => 'success'];
        } else {
            $_SESSION['alert'] = ['message' => 'Gagal mengubah password.', 'type' => 'error'];
        }
    } else {
        $_SESSION['alert'] = ['message' => 'Password lama salah.', 'type' => 'error'];
    }
    header('Location: ../../pages/profile-siswa.php');
    exit;
}
?>