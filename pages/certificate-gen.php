<?php
include("../conn.php");
session_start();
$exam_id = $_GET['id'];
$exmneId = $_SESSION['examineeSession']['exmne_id'];

$selCertif = $conn->query("SELECT * FROM exam_res_feedback erf inner join exam_tbl et ON erf.exam_id = et.ex_id inner join tbl_users tu on erf.exmne_id = tu.id WHERE erf.exam_id = $exam_id and erf.exmne_id='$exmneId' and grade = 1 order by rec_time")->fetch(PDO::FETCH_ASSOC);
require('../assets/fpdf184/fpdf.php');

//$name = text to be added, $x= x cordinate, $y = y coordinate, $a = alignment , $f= Font Name, $t = Bold / Italic, $s = Font Size, $r = Red, $g = Green Font color, $b = Blue Font Color
function AddText($pdf, $text, $x, $y, $a, $f, $t, $s, $r, $g, $b)
{
    $pdf->SetFont($f, $t, $s);
    $pdf->SetXY($x, $y);
    $pdf->SetTextColor($r, $g, $b);
    $pdf->Cell(0, 10, $text, 0, 0, $a);
}

//Create A 4 Landscape page
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetCreator('Haneef Puttur');
// Add background image for PDF
$pdf->Image('./certificate2.jpg', 0, 0, 0);

//Add a Name to the certificate
AddText($pdf, "LICENSE", 10, 50, 'C', 'courier', 'B', 72, 232, 186, 35);

AddText($pdf, ucwords($selCertif['last_name'] . ' ' . $selCertif['first_name']), 0, 125, 'C', 'helvetica', 'B', 30, 3, 84, 156);
AddText($pdf, ucwords($selCertif['ex_title']), 0, 165, 'C', 'helvetica', 'B', 20, 0, 0, 0);
AddText($pdf, ucwords('Jane Doe'), 140, 170, 'C', 'helvetica', 'B', 15, 0, 0, 0);
AddText($pdf, ucwords('Managing Director'), 140, 179, 'C', 'helvetica', 'I', 14, 0, 0, 0);

$pdf->Output();