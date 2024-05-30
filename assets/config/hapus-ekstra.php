<?php
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ekstraId = $_POST['ekstraId'];

    // Dapatkan nama ekstra
    $queryGetNama = "SELECT nama_ekstra FROM ekstra WHERE id = ?";
    $stmtGetNama = $is_connect->prepare($queryGetNama);
    $stmtGetNama->bind_param("i", $ekstraId);
    $stmtGetNama->execute();
    $stmtGetNama->bind_result($namaEkstra);
    $stmtGetNama->fetch();
    $stmtGetNama->close();

    // Hapus semua jadwal yang ada ekstranya
    $queryDeleteJadwal = "DELETE FROM jadwal WHERE ekstra_id = ?";
    $stmtDeleteJadwal = $is_connect->prepare($queryDeleteJadwal);
    $stmtDeleteJadwal->bind_param("i", $ekstraId);
    $stmtDeleteJadwal->execute();
    $stmtDeleteJadwal->close();

    // Hapus ekstra
    $queryDeleteEkstra = "DELETE FROM ekstra WHERE id = ?";
    $stmtDeleteEkstra = $is_connect->prepare($queryDeleteEkstra);
    $stmtDeleteEkstra->bind_param("i", $ekstraId);
    $stmtDeleteEkstra->execute();

    // Hapus ekstra dari kolom ekstraa di tabel user jika namanya sama
    $queryDeleteUserEkstra = "UPDATE user SET ekstraa = 'Tidak ada ekstra yang diikuti' WHERE ekstraa = ?";
    $stmtDeleteUserEkstra = $is_connect->prepare($queryDeleteUserEkstra);
    $stmtDeleteUserEkstra->bind_param("s", $namaEkstra);
    $stmtDeleteUserEkstra->execute();
    $stmtDeleteUserEkstra->close();

    if ($stmtDeleteEkstra->affected_rows > 0) {
        echo "Ekstra berhasil dihapus.";
    } else {
        echo "Gagal menghapus ekstra.";
    }
    $stmtDeleteEkstra->close();
    $is_connect->close();
}
?>