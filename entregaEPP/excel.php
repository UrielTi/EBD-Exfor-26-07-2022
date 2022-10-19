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
$spreadsheet = $reader->load("entregaepp.xlsx");

function LlenarExcel($hoja, $idTodo, $rows, $conn, $cargos){
    $consultaTodo = mysqli_query($conn,"SELECT * FROM entrega_epp WHERE id='$idTodo'");
    $resultadoTodo = mysqli_fetch_array($consultaTodo);
    $hoja->getActiveSheet()
        ->setCellValue('A'.$rows, $resultadoTodo['fecha'])
        ->setCellValue('B'.$rows, $resultadoTodo['nombre'])
        ->setCellValue('C'.$rows, $resultadoTodo['cedula'])
        ->setCellValue('D'.$rows, $cargos[$resultadoTodo['cargo']])
        ->setCellValue('E'.$rows, $resultadoTodo['elemento'])
        ->setCellValue('F'.$rows, $resultadoTodo['cantidad'])
        ->setCellValue('G'.$rows, $resultadoTodo['precio']);
}

$contentRowEntregaEpp = 3;

$consultaEntregaEpp = mysqli_query($conn,"SELECT id FROM entrega_epp");

while ($resultadoEntregaEpp = mysqli_fetch_array($consultaEntregaEpp)){

    $spreadsheet->setActiveSheetIndexByName('EntregaEpp');
    $spreadsheet->getActiveSheet()->insertNewRowBefore($contentRowEntregaEpp+1,1);
    LlenarExcel($spreadsheet, $resultadoEntregaEpp['id'], $contentRowEntregaEpp, $conn, $cargos);

    $contentRowEntregaEpp++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="entregaepp.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>