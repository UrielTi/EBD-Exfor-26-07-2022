<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

include "../include/conn/conn.php";
include "../cond/todo.php";

$id = $_GET['id'];

//abrir o leer el documento
$reader = IOFactory::createReader("Xlsx");
$spreadsheet = $reader->load("EEPP.xlsx");
$spreadsheet->setActiveSheetIndexByName('eepp');

//Consult Entregas al empleado que esten pendientes
//condicionales de ayuda
$consultEmpleado = mysqli_query($conn, "SELECT cedula, primer_apellido, segundo_apellido, nombres FROM clientes WHERE id='$id'") or die(mysqli_error($conn));
$rEm = mysqli_fetch_assoc($consultEmpleado);
$nombres = $rEm['nombres'] . ' ' . $rEm['primer_apellido'] . ' ' . $rEm['segundo_apellido'];
$spreadsheet->getActiveSheet()
    ->setCellValue('C5', $nombres)
    ->setCellValue('H5', $rEm['cedula']);

$celdas = array("8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28");

$consultEntregas = mysqli_query($conn, "SELECT * FROM entrega_epp WHERE id_empleado='$id' AND estado = 0 ORDER BY fecha ASC limit 21") or die(mysqli_error($conn));
$dtE = array();
while ($rE = mysqli_fetch_assoc($consultEntregas)) {
    $elemento = $rE['elemento'];
    $cantidad = $rE['cantidad'];
    $talla = $rE['talla'];
    $fecha = $rE['fecha'];
    array_push($dtE, ["$elemento", "$cantidad" , "$talla", "$fecha"]);
}
$count = count($dtE);

for ($i = 0; $i <= $count; $i++) {
    $spreadsheet->getActiveSheet()
        ->setCellValue('A'.$celdas[$i], $dtE[$i][0])
        ->setCellValue('F'.$celdas[$i], $dtE[$i][1]) // Ver si hacer mas arreglos o ver si poder iterar con los datos que se tienen[].
        ->setCellValue('G'.$celdas[$i], $dtE[$i][2])
        ->setCellValue('I'.$celdas[$i], $dtE[$i][3]);
}
// Output
$filename = "EEPP-" . $nombres . "EXFOR S.A.S" . ".xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
