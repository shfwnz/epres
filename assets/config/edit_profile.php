<?php
session_start();
include 'connect.php'; // Make sure this file sets up a mysqli connection and assigns it to $is_connect

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $fullname = $_POST['fullname'] ?? '';
    $kelas = $_POST['kelas'] ?? '';
    $email = $_POST['email'] ?? '';
    $username = $_SESSION['username']; // Misalkan username sebagai identifier user

    // Query update data
    $sql = "UPDATE user SET fullname = ?, kelas = ?, email = ? WHERE username = ?";
    $stmt = $is_connect->prepare($sql);

    if ($stmt === false) {
        // Proper error handling for mysqli
        echo "Prepare failed: (" . $is_connect->errno . ") " . $is_connect->error;
        exit;
    }

    // Bind parameters and execute query
    $stmt->bind_param("ssss", $fullname, $kelas, $email, $username);
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        exit;
    }

    // Update session
    $_SESSION['fullname'] = $fullname;
    $_SESSION['kelas'] = $kelas;
    $_SESSION['email'] = $email;

    // Redirect kembali ke halaman profil
    if ($_SESSION['user_tipe'] == 'admin') {
        header('Location: ../../pages/profile-admin.php');
    } else {
        header('Location: ../../pages/profile-siswa.php');
    }
    exit;
}
?>