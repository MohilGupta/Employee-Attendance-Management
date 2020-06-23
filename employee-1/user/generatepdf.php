<?php
include("../includes/handlers/config.php");
?>
<?php
session_start();
$emailUser = $_SESSION['userLoggedIn'];
$organisationId=$_SESSION['organisationId'];
?>
<?php 

$query_employee=mysqli_query($con,"SELECT * FROM employee_details WHERE organisation='$organisationId' AND email='$emailUser'");
$result_employee=mysqli_fetch_array($query_employee);
$employee_name=$result_employee['name'];
$employee_id=$result_employee['eid'];


?>
<?php
include("fpdf/fpdf.php");

class PDF extends FPDF
{

function Header()
{
    
    $this->SetFont('Arial','B',13);
    
    $this->Cell(67);
    
    $this->Cell(60,10,"Employee's Attendance",1,0,'C');
    
    $this->Ln(20);
}


function Footer()
{
    
    $this->SetY(-15);
    
    $this->SetFont('Arial','I',8);
    
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$display_heading = array('eid'=>'Employee ID', 'name'=> 'Name','date'=> 'Date','attendance'=> 'Attendance');

$result = mysqli_query($con, "SELECT eid, name, date, attendance FROM attendance_taken WHERE organisation='$organisationId' AND eid='$employee_id'") or die("database error:". mysqli_error($con));
$header = mysqli_query($con, "SHOW columns FROM attendance_taken WHERE field != 'id' and field != 'organisation'");

$pdf = new PDF();

$pdf->AddPage();

$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',16);
foreach($header as $heading) {
$pdf->Cell(48,10,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->SetFont('Arial','',10);
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(48,10,$column,1);
}
$pdf->Output();
?>