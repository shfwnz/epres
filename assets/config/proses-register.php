<?php
session_start();
include 'connect.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; // Pastikan melakukan hashing password sebelum menyimpan ke database
$fullname = $_POST['fullname'];
$nis = $_POST['nis'];
$kelas = $_POST['kelas'];
$gender = $_POST['gender'];
$ekstraa = $_POST['ekstraa'];
$user_tipe = 'siswa'; // Nilai langsung untuk user_tipe

// SQL query untuk menyimpan data
$query = "INSERT INTO user (username, email, password, fullname, nis, kelas, gender, ekstraa, user_tipe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Siapkan prepared statement untuk keamanan
$stmt = $is_connect->prepare($query);
$stmt->bind_param("sssssssss", $username, $email, $password, $fullname, $nis, $kelas, $gender, $ekstraa, $user_tipe);

// Eksekusi query
if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

// Tutup statement dan koneksi
$stmt->close();
$is_connect->close();
?>