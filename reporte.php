<?php
require 'vendor/autoload.php';
require 'conexion.php';

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};

$sql = "SELECT IdAlumnos, Nombre, Institucion, TipoServ, Horas, Fecha, Area, Direccion, NumCel, Correo, NumEmerg FROM Alumnos";
$resultado = $conn->query($sql);

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Alumnos");

$hojaActiva->setCellValue('A1', 'IdAlumnos');
$hojaActiva->setCellValue('B1', 'Nombre');
$hojaActiva->setCellValue('C1', 'Institucion');
$hojaActiva->setCellValue('D1', 'TipoServ');
$hojaActiva->setCellValue('E1', 'Horas');
$hojaActiva->setCellValue('F1', 'Fecha');
$hojaActiva->setCellValue('G1', 'Area');
$hojaActiva->setCellValue('H1', 'Direccion');
$hojaActiva->setCellValue('I1', 'NumCel');
$hojaActiva->setCellValue('J1', 'Correo');
$hojaActiva->setCellValue('K1', 'NumEmerg');

$fila = 2;

while($rows = $resultado->fetch_assoc()){
    $hojaActiva->setCellValue('A'.$fila, $rows['IdAlumnos']);
    $hojaActiva->setCellValue('B'.$fila, $rows['Nombre']);
    $hojaActiva->setCellValue('C'.$fila, $rows['Institucion']);
    $hojaActiva->setCellValue('D'.$fila, $rows['TipoServ']);
    $hojaActiva->setCellValue('E'.$fila, $rows['Horas']);
    $hojaActiva->setCellValue('F'.$fila, $rows['Fecha']);
    $hojaActiva->setCellValue('G'.$fila, $rows['Area']);
    $hojaActiva->setCellValue('H'.$fila, $rows['Direccion']);
    $hojaActiva->setCellValue('I'.$fila, $rows['NumCel']);
    $hojaActiva->setCellValue('J'.$fila, $rows['Correo']);
    $hojaActiva->setCellValue('K'.$fila, $rows['NumEmerg']);
    $fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="PRESTADORES DE SERVICIO.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');

exit;
//$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, "Xlsx");
//$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($excel);