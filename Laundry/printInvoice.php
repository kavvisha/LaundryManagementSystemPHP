<?php
require_once '../inc/conn.php';
require('fpdf181/fpdf.php');
$jobIDde=$_GET['jobID'];///gets encoded jobID
$jobID=base64_decode($jobIDde);//decodes jobID
//$jobID=15;
class PDF extends FPDF
{
    
// Page header
function Header(){
    $this->SetFont('Arial','B',15);
    // Move to the right
  //  $this->Cell(80);
    // Title
    $this->Cell(0,0,'Laundry Job',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer(){
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$stmt=$conn->prepare("SELECT * FROM `laundryjob` where `jobID`='".$jobID."'");
$stmt->execute();
$data1=$stmt->fetch(PDO::FETCH_ASSOC);

//$pdf->cell;
$pdf->Cell(0,10,"Booking ID : ".$data1['bookID'],0,1);
$pdf->Cell(0,10,"Room Number \t: ".$data1['roomID'],0,1);
$pdf->Cell(0,10,"Job Number \t : ".$data1['jobID'],0,1);
$pdf->Cell(0,10,"Washed By \t : ".$data1['worker'],0,1);
$pdf->Cell(0,10,"Total weight of clothes\t : ".(($data1['weight'])/1000)."Kilograms",0,1);
$pdf->Cell(0,10,"Cost \t: Rs.".$data1['cost'],0,1);
$pdf->Cell(0,10,"Added on\t: ".$data1['dateAdded'],0,1);
$pdf->Cell(0,10,"Finished \t: ".$data1['finishedon'],0,1);


$stmt2=$conn->prepare("SELECT * FROM `laundryjobclothes` where `jobID`='".$jobID."'");
$stmt2->execute();
$pdf->Cell(0,10,"----------------------Details of Clothes----------------",0,1);
$pdf->Cell(0,10,"Clothes and Count",0,1);
$pdf->Cell(0,10,"--------------------------------------------------------",0,1);
while($data2=$stmt2->fetch(PDO::FETCH_ASSOC)){
        $fillrow=$data2['cloth']."\t --- \t".$data2['cCount'];
    $pdf->Cell(0,10,$fillrow,0,1);
    
}

$pdf->Output();
print($pdf); 
//header("Location:JobHistory.php");
?>