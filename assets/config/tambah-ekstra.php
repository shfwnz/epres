<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $namaEkstra = $_POST['namaEkstra'];
    $hariId = $_POST['hari']; // ID hari dari dropdown

    // Koneksi database
    include 'connect.php'; // Sesuaikan path

    // Menambahkan data ke tabel ekstra
    $queryEkstra = "INSERT INTO ekstra (nama_ekstra) VALUES (?)";
    $stmtEkstra = $is_connect->prepare($queryEkstra);
    $stmtEkstra->bind_param("s", $namaEkstra);
    $stmtEkstra->execute();
    $ekstraId = $stmtEkstra->insert_id;
    $stmtEkstra->close();

    // Menambahkan data ke tabel jadwal
    $queryJadwal = "INSERT INTO jadwal (hari_id, ekstra_id) VALUES (?, ?)";
    $stmtJadwal = $is_connect->prepare($queryJadwal);
    $stmtJadwal->bind_param("ii", $hariId, $ekstraId);
    $stmtJadwal->execute();
    if ($stmtJadwal->affected_rows > 0) {
        exit("Jadwal berhasil ditambahkan.");
    } else {
        exit("Gagal menambahkan jadwal.");
    }
    $stmtJadwal->close();

    $is_connect->close();
}
?>