<?php
require('../fpdf/fpdf.php');

include 'connect.php';
$ekstra = isset($_POST['ekstra']) ? $_POST['ekstra'] : '';

$sql = "SELECT user, ekstra, keterangan, waktu, nis FROM presensi WHERE ekstra = ?";
$stmt = $is_connect->prepare($sql);
$stmt->bind_param("s", $ekstra);
$stmt->execute();
$result = $stmt->get_result();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

$pdf->Cell(40,8,'Nama', 1);
$pdf->Cell(40,8,'Ekstra', 1);
$pdf->Cell(40,8,'Keterangan', 1);
$pdf->Cell(60,8,'Waktu', 1);
$pdf->Cell(100,8,'Nis', 1);
$pdf->Ln();

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(40,8,$row['user'], 1);
    $pdf->Cell(40,8,$row['ekstra'], 1);
    $pdf->Cell(40,8,$row['keterangan'], 1);
    $pdf->Cell(60,8,$row['waktu'], 1);
    $pdf->Cell(100,8,$row['nis'], 1);
    $pdf->Ln();
}

$pdf->Output('D', 'laporan_presensi.pdf');

exit;
?>