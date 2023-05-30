<?php
require('fpdf.php');

class PDF extends FPDF
{

    
function Header()
{
    $this->SetFont('Arial','',20);
    $this->Cell(0,0, $this->Image('rcl.png',11,11,30),0);
    $this->Ln(20);
    $this->Cell(120);
    $this->SetFillColor(52,166,43);
    $this->Cell(100,10,'Registros',1,0,'C',True);
    $this->Cell(80);
    $this->Cell(40,10,date('d/m/Y'),0,1,'L');
    $this->Ln(20);
}
function Footer()
{
    
    $this->SetY(-15);
   
    $this->SetFont('Arial','I',8);
    
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
require 'conexion.php';
$consulta = "SELECT * FROM Alumnos";
$resultado= mysqli_query($conn, $consulta);

$pdf = new PDF();
$pdf->AddPage('LANDSCAPE', 'LEGAL');




$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(52,166,43);
$pdf->SetTextColor(240, 255, 240); 
$pdf->Cell(1);
$pdf->Cell(45,10,'NOMBRE',1,0,'C',true);
$pdf->Cell(25,10,'INSTITUCION',1,0,'C',true); 
$pdf->Cell(31,10,'TIPO SERVICIO',1,0,'C',true);
$pdf->Cell(20,10,'HORAS',1,0,'C',true);
$pdf->Cell(31,10,'FECHA',1,0,'C',true);
$pdf->Cell(25,10,'AREA',1,0,'C',true);
$pdf->Cell(78,10,'DIRECCION',1,0,'C',true);  
$pdf->Cell(18,10,'NUM. CEL.',1,0,'C',true);
$pdf->Cell(45,10,'CORREO',1,0,'C',true); 
$pdf->Cell(18,10,'NUM EMERG.',1,1,'C',true);
$pdf->SetFillColor(229, 229, 229);
$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(3, 3, 3); 

while($row = $resultado->fetch_assoc()){
$pdf->Cell(1);
$pdf->Cell(45, 10, $row['Nombre'],1, 0,'A', 0 );
$pdf->Cell(25, 10, $row['Institucion'],1, 0,'A', 0 );
$pdf->Cell(31, 10, $row['TipoServ'],1, 0,'A', 0 );
$pdf->Cell(20, 10, $row['Horas'],1, 0,'A', 0 );
$pdf->Cell(31, 10, $row['Fecha'],1, 0,'A', 0 );
$pdf->Cell(25, 10, $row['Area'],1, 0,'A', 0 ); 
$pdf->Cell(78, 10, $row['Direccion'],1, 0,'A', 0 );
$pdf->Cell(18, 10, $row['NumCel'],1, 0,'A', 0 ); 
$pdf->Cell(45, 10, $row['Correo'],1, 0,'A', 0 );
$pdf->Cell(18, 10, $row['NumEmerg'],1, 1,'C', 0 );
}

$pdf->Output();
?>