<?php
session_start();
include 'connect.php'; // Pastikan ini adalah path yang benar ke file koneksi Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengumpulkan semua pilihan ekstrakurikuler
    $ekstrakurikuler = isset($_POST['ekstrakurikuler']) ? $_POST['ekstrakurikuler'] : [];
    $ekstrakurikuler_string = implode(', ', $ekstrakurikuler);

    // Update data ke database
    $sql = "UPDATE user SET ekstraa = ? WHERE username = ?";
    $stmt = $is_connect->prepare($sql);
    if ($stmt === false) {
        echo "Prepare failed: (" . $is_connect->errno . ") " . $is_connect->error;
        exit;
    }

    $username = $_SESSION['username']; // Asumsi username ada di session sebagai identifier user
    $stmt->bind_param("ss", $ekstrakurikuler_string, $username);
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        exit;
    }

    // Mengonversi array ke string untuk disimpan dalam session
    $_SESSION['ekstraa'] = $ekstrakurikuler_string;

    // Redirect kembali ke halaman profil
    header('Location: ../../pages/profile-siswa.php');
    exit;
} else {
    echo "Invalid request.";
}
?>