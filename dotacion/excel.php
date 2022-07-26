<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

include "../include/conn/conn.php";
include "../cond/todo.php";

//abrir o leer el documento
$reader = IOFactory::createReader("Xlsx");
$spreadsheet = $reader->load("dotacion.xlsx");

$contentRowDotacion = 3;

$consultaDotacion = mysqli_query($conn,"SELECT * FROM dotacion");

while ($resultadoDotacion = mysqli_fetch_array($consultaDotacion)){

    $spreadsheet->setActiveSheetIndexByName('Dotacion');
    $spreadsheet->getActiveSheet()->insertNewRowBefore($contentRowDotacion+1,1);

    $spreadsheet->getActiveSheet()
        ->setCellValue('A'.$contentRowDotacion, $resultadoDotacion['nombre'])
        ->setCellValue('B'.$contentRowDotacion, $resultadoDotacion['cedula'])
        ->setCellValue('C'.$contentRowDotacion, $cargos[$resultadoDotacion['cargo']])
        ->setCellValue('D'.$contentRowDotacion, $nucleos[$resultadoDotacion['nucleo']])
        ->setCellValue('E'.$contentRowDotacion, $resultadoDotacion['camisa'])
        ->setCellValue('F'.$contentRowDotacion, $resultadoDotacion['pantalon'])
        ->setCellValue('G'.$contentRowDotacion, $resultadoDotacion['botas'])
        ->setCellValue('H'.$contentRowDotacion, $resultadoDotacion['guayo']);

    $contentRowDotacion++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="dotacion.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>