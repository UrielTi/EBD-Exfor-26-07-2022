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
$spreadsheet = $reader->load("Entrega de dotacion.xlsx");

$nucleo = $_POST['nucleo'];
$fecha = $_POST['fecha'];

$contentRowDotacion = 3;

$consultaCliente = mysqli_query($conn,"SELECT CL.nombres,CL.cedula,CL.cargo,CLT.camisa,CLT.pantalon,CLT.botas,CLT.guayo FROM clientes AS CL INNER JOIN cliente_tallas AS CLT ON CL.id=CLT.id_empleado WHERE fecha_ingreso<'$fecha' AND CL.nucleo=$nucleo AND CL.estado=1");

while ($resultadoCliente = mysqli_fetch_array($consultaCliente)){

    $spreadsheet->setActiveSheetIndexByName('Entrega de dotacion');
    $spreadsheet->getActiveSheet()->insertNewRowBefore($contentRowDotacion+1,1);

    $spreadsheet->getActiveSheet()
        ->setCellValue('A'.$contentRowDotacion, $resultadoCliente['cedula'])
        ->setCellValue('B'.$contentRowDotacion, $resultadoCliente['nombres'])
        ->setCellValue('C'.$contentRowDotacion, $cargos[$resultadoCliente['cargo']])
        ->setCellValue('D'.$contentRowDotacion, $resultadoCliente['camisa'])
        ->setCellValue('E'.$contentRowDotacion, $resultadoCliente['pantalon'])
        ->setCellValue('F'.$contentRowDotacion, $resultadoCliente['botas'])
        ->setCellValue('G'.$contentRowDotacion, $resultadoCliente['guayo']);

    $contentRowDotacion++;

}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Entrega de dotacion.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>