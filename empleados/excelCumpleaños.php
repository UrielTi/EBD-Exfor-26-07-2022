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
$spreadsheet = $reader->load("Cumpleaños.xlsx");

$contentRowCumpleaños = 2;

$consultaCumpleaños = mysqli_query($conn,"SELECT nombres, DATE_FORMAT(fecha_nacimiento, '%d-%m-%Y') as fecha FROM clientes WHERE MONTH(fecha_nacimiento) = (MONTH(CURDATE())+1) AND estado=1");

while ($resultadoCumpleaños = mysqli_fetch_array($consultaCumpleaños)){

    $spreadsheet->setActiveSheetIndexByName('Cumpleaños');
    $spreadsheet->getActiveSheet()->insertNewRowBefore($contentRowCumpleaños+1,1);

    $spreadsheet->getActiveSheet()
        ->setCellValue('A'.$contentRowCumpleaños, $resultadoCumpleaños['nombres'])
        ->setCellValue('B'.$contentRowCumpleaños, $resultadoCumpleaños['fecha']);

    $contentRowCumpleaños++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Cumpleaños.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>