<?php
include 'connect.php';
// Menerima input ekstra dari form
$ekstra = isset($_POST['ekstra']) ? $_POST['ekstra'] : '';

// Query untuk mengambil data presensi berdasarkan ekstra
$sql = "SELECT user, ekstra, keterangan, waktu, nis FROM presensi WHERE ekstra = ?";
$stmt = $is_connect->prepare($sql);
$stmt->bind_param("s", $ekstra);
$stmt->execute();
$result = $stmt->get_result();

// Membuat header untuk file CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="laporan_presensi.csv"');

// Membuka file PHP output stream sebagai file CSV
$output = fopen('php://output', 'w');

// Menambahkan header kolom ke CSV
fputcsv($output, array('Nama', 'Ekstra', 'Keterangan', 'Waktu', 'Nis'));

// Menambahkan data ke CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

// Menutup stream file
fclose($output);
exit;
?>