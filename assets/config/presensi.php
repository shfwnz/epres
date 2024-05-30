<?php
session_start();
include 'connect.php';

date_default_timezone_set('Asia/Jakarta');
// Data yang akan disimpan
$user = $_SESSION['fullname']; // Pastikan Anda sudah menyimpan user_id di session saat login
$ekstra = $_POST['id_ekstra']; // Mengambil ID ekstrakurikuler dari form
$keterangan = 'Hadir'; // Contoh keterangan
$waktu = date('Y-m-d H:i:s'); // Mengambil waktu saat ini sesuai timezone
$nis = $_SESSION['nis'];
// Query untuk insert data
$sql = "INSERT INTO presensi (user, ekstra, keterangan, waktu, nis) VALUES (?, ?, ?, ?, ?)";

// Prepare statement
$stmt = $is_connect->prepare($sql);

// Pastikan tipe data sesuai dengan yang diharapkan di database
$stmt->bind_param("sssss", $user, $ekstra, $keterangan, $waktu, $nis);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../../pages/dashboard-siswa.php?status=success");
} else {
    header("Location: ../../pages/dashboard-siswa.php?status=error");
}

// Close statement
$stmt->close();

// Close connection
$is_connect->close();
?>