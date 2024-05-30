<?php
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$sql = "SELECT p.*, u.nis AS username FROM presensi p JOIN user u ON p.user_id = u.id";
$result = $is_connect->query($sql);

if ($result === false) {
    // Output error message if query failed
    echo "Error: " . $is_connect->error;
    exit; // Stop further execution if there is an SQL error
}

while($row = $result->fetch_assoc()) {
    echo "User: " . $row["username"] . " - NIS: " . $row["nis"] . "<br>";
}

$is_connect->close();
?>