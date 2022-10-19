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
$spreadsheet = $reader->load("Hoja de vida.xlsx");
$spreadsheet->setActiveSheetIndexByName('Hoja de vida');

//Consult Empleado
$consultaEmpleado = mysqli_query($conn, "SELECT * FROM clientes WHERE id=$id") or die(mysqli_error($conn));
$resultadoEmpleado = mysqli_fetch_array($consultaEmpleado);

$enfermedad = $resultadoEmpleado['enfermedad'] == '1' ? 'NO' : 'SI';

//Consult Talla Empleado
$consultaTalla = mysqli_query($conn, "SELECT * FROM cliente_tallas WHERE id_empleado=$id") or die(mysqli_error($conn));
$resultadoTalla = mysqli_fetch_array($consultaTalla);

//Consult Empleado Vehiculo
$consultaVehiculo = mysqli_query($conn, "SELECT * FROM cliente_vehiculo WHERE id_empleado=$id") or die(mysqli_error($conn));
$resultadoVehiculo = mysqli_fetch_array($consultaVehiculo);

//Consult Info Laboral Empleado
$consultaLaboral = mysqli_query($conn, "SELECT * FROM cliente_laborales WHERE id_empleado=$id") or die(mysqli_error($conn));
$cliente_laboral = array();
while ($resultadoLaboral = mysqli_fetch_array($consultaLaboral)) {
    $empresa = $resultadoLaboral['empresa'];
    $jefe = $resultadoLaboral['jefe'];
    $telefono = $resultadoLaboral['telefono'];
    $cargo = $resultadoLaboral['cargo'];
    $tiempo_exp = $resultadoLaboral['tiempo_exp'];
    $motivo = $resultadoLaboral['motivo'];
    array_push($cliente_laboral, ["$empresa", "$jefe", "$telefono", "$cargo", "$tiempo_exp", "$motivo"]);
}

//Contactos empleados
$consultaContacto = mysqli_query($conn, "SELECT * FROM cliente_contacto WHERE id_empleado=$id AND parentesco != 1") or die(mysqli_error($conn));
$cliente_contacto = array();
while ($resultadoContacto = mysqli_fetch_assoc($consultaContacto)) {
    $contactoDirecto = $resultadoContacto['contacto_directo'];
    $nombre_contacto = $resultadoContacto['nombre_contacto'];
    $parentesco = $parentescos[$resultadoContacto['parentesco']];
    $numero = $resultadoContacto['numero'];
    $contactoDirecto = $resultadoContacto['contacto_directo'];
    array_push($cliente_contacto, ["$nombre_contacto", "$parentesco", "$numero", "$contactoDirecto"]);
}

// Consult InfoAcademica
$selectInfoAcademic = mysqli_query($conn, "SELECT * FROM cliente_academico WHERE id_cliente=$id") or die(mysqli_error($conn));


// Consult Cursos Cortos
$selectCursos = mysqli_query($conn, "SELECT * FROM cliente_cursos WHERE id_cliente=$id") or die(mysqli_error($conn));
$cursosArray = array();
while ($queryCursos = mysqli_fetch_array($selectCursos)) {
    $nombreCurso = $queryCursos['nombre_curso'];
    $duracionCurso = $queryCursos['duracion'];
    $entidadCurso = $queryCursos['entidad'];
    $añoCurso = $queryCursos['tiempo'];
    $certificado = $queryCursos['certificado'];
    array_push($cursosArray, ["$nombreCurso", "$duracionCurso", "$entidadCurso", "$añoCurso", "$certificado"]);
}

//condicionales de ayuda para el llenado del excel
$hijos = ($resultadoEmpleado['hijos'] == 0) ? 'NO' : 'SI';
$vehiculo = $resultadoVehiculo['vehiculo'] == 'NINGUNO' ? ["Z43", "X"] : ["W43", "X"]; //z43 correponde a no y w43 a si

if ($vehiculo[0] == "W43" && ($resultadoVehiculo['vehiculo'] == 'MOTO' || $resultadoVehiculo['vehiculo'] == 'CARRO')) {
    $tipoVehiculo = $resultadoVehiculo['vehiculo'] == 'MOTO' ? ["D45", "X"] : ["J45", "X"];

    $tecnoMec =  $resultadoVehiculo['ven_tecnomecanica'] ? $resultadoVehiculo['ven_tecnomecanica'] : '';
    $venSoat = $resultadoVehiculo['ven_soat'] ? $resultadoVehiculo['ven_soat'] : '';
    $s = $tecnoMec == '' && $venSoat == '' ? '' : ' - ';
} else {
    $tipoVehiculo = ["Z43", ""];
}
$spreadsheet->getActiveSheet()
    ->setCellValue($vehiculo[0], $vehiculo[1]) //Me coge la lista de la variable vehiculo por ejemplo $vehiculo[0] = "Z43" y $vehiculo[1] = "NO"
    ->setCellValue($tipoVehiculo[0], $tipoVehiculo[1])
    ->setCellValue('T45', $venSoat . $s . $tecnoMec);

$fecha_nacimiento = new DateTime($resultadoEmpleado['fecha_nacimiento']);
$fecha_ingreso = new DateTime($resultadoEmpleado['fecha_ingreso']);
$edad = $fecha_ingreso->diff($fecha_nacimiento);
$edad = $edad->y; //La y significa los años en la diferencia de fechas



$conyugue = array();
for ($a = 0; $a <= count($cliente_contacto); $a++) { // Comprobar el valor que si es 1 (selecciona) que no me lo imprima. igual el "-" en el coso de vehiculo.
    $spreadsheet->getActiveSheet()
        ->setCellValue('A91', $cliente_contacto[0][0])
        ->setCellValue('L91', $cliente_contacto[0][1])
        ->setCellValue('T91', $cliente_contacto[0][2]);
    $spreadsheet->getActiveSheet()
        ->setCellValue('A92', $cliente_contacto[1][0])
        ->setCellValue('L92', $cliente_contacto[1][1])
        ->setCellValue('T92', $cliente_contacto[1][2]);
    $spreadsheet->getActiveSheet()
        ->setCellValue('A93', $cliente_contacto[2][0])
        ->setCellValue('L93', $cliente_contacto[2][1])
        ->setCellValue('T93', $cliente_contacto[2][2]);

    if ($cliente_contacto[$a][1] == 'CONYUGUE') {
        $nombre_contacto1 = $cliente_contacto[$a][0];
        $numero1 = $cliente_contacto[$a][2];
        array_push($conyugue, "$nombre_contacto1", "$numero1");
    }
}

$spreadsheet->getActiveSheet()

    ->setCellValue('A6', $cargos[$resultadoEmpleado['cargo']])
    ->setCellValue('L6', $nucleos[$resultadoEmpleado['nucleo']])
    ->setCellValue('U6', $resultadoEmpleado['no_contrato'])
    ->setCellValue('I10', $resultadoEmpleado['nombres'] . ' ' . $resultadoEmpleado['primer_apellido'] . ' ' . $resultadoEmpleado['segundo_apellido'])
    ->setCellValue('D12', $resultadoEmpleado['cedula'])
    ->setCellValue('L12', $resultadoEmpleado['exp_ced'])
    ->setCellValue('X12', $resultadoEmpleado['fecha_expedicion'])
    ->setCellValue('J14', $resultadoEmpleado['fecha_nacimiento'])
    ->setCellValue('V14', $edad)
    ->setCellValue('I16', $rhs[$resultadoEmpleado['rh']][0])
    ->setCellValue('P16', $rhs[$resultadoEmpleado['rh']][1])
    ->setCellValue('T16', $razas[$resultadoEmpleado['raza']])
    ->setCellValue('I18', $resultadoEmpleado['acargo'])
    ->setCellValue('O18', $resultadoEmpleado['estrato'])
    ->setCellValue('W18', $tipos_vivienda[$resultadoEmpleado['tip_vivi']])
    ->setCellValue('E20', $resultadoEmpleado['direccion'])

    //->setCellValue('G22', $resultadoEmpleado['']) numero telefonico (no celular).
    ->setCellValue('Q22', $resultadoEmpleado['telefono'])
    ->setCellValue('J24', $resultadoEmpleado['email'])
    ->setCellValue('D26', $hijos)
    ->setCellValue('J26', $resultadoEmpleado['hijos'])
    ->setCellValue('S26', $estados_civiles[$resultadoEmpleado['civil']])

    // Conyugue del empleado
    ->setCellValue('J28', $conyugue[0])
    ->setCellValue('K30', $conyugue[1])

    ->setCellValue('D34', $resultadoTalla['camisa'])
    ->setCellValue('J34', $resultadoTalla['pantalon'])
    ->setCellValue('O34', $resultadoTalla['guayo'])
    ->setCellValue('T34', $resultadoTalla['botas'])
    ->setCellValue('C38', $epss[$resultadoEmpleado['eps']])
    ->setCellValue('M38', $pensiones[$resultadoEmpleado['pensiones']])
    ->setCellValue('W38', $resultadoEmpleado['arl'])
    ->setCellValue('C39', $cajas[$resultadoEmpleado['caja']])
    ->setCellValue('S39', $resultadoEmpleado['serv_funerario'])
    ->setCellValue('T42', $enfermedad)
    ->setCellValue('D108', $resultadoEmpleado['nombres'] .  ' ' . $resultadoEmpleado['primer_apellido'] . ' ' . $resultadoEmpleado['segundo_apellido'])
    ->setCellValue('C109', $resultadoEmpleado['cedula'])
    ->setCellValue('O107', $resultadoEmpleado['fecha_ingreso']);

// Información academica
while (($queryInfoAcademic = mysqli_fetch_array($selectInfoAcademic)) != NULL) {
    $nombreTitulo = $queryInfoAcademic['titulo'];
    switch ($queryInfoAcademic['curso']) {
        case 2:
            $checkComplete = $queryInfoAcademic['completado'] == '1' ? 'H52' : 'I52';
            $spreadsheet->getActiveSheet()
                ->setCellValue($checkComplete, 'X')
                ->setCellValue('L52', $queryInfoAcademic['semestre'])
                ->setCellValue('R52', $nombreTitulo);

            break;
        case 3:
            $checkComplete = $queryInfoAcademic['completado'] == '1' ? 'H54' : 'I54';
            $spreadsheet->getActiveSheet()
                ->setCellValue($checkComplete, 'X')
                ->setCellValue('L54', $queryInfoAcademic['semestre'])
                ->setCellValue('R54', $nombreTitulo);
            break;
        case 5:
            $checkComplete = $queryInfoAcademic['completado'] == '1' ? 'H56' : 'I56';
            $spreadsheet->getActiveSheet()
                ->setCellValue($checkComplete, 'X')
                ->setCellValue('L56', $queryInfoAcademic['semestre'])
                ->setCellValue('R56', $nombreTitulo);
            break;
        case 6:
            $checkComplete = $queryInfoAcademic['completado'] == '1' ? 'H58' : 'I58';
            $spreadsheet->getActiveSheet()
                ->setCellValue($checkComplete, 'X')
                ->setCellValue('L58', $queryInfoAcademic['semestre'])
                ->setCellValue('R58', $nombreTitulo);
            break;
        case 7:
            $checkComplete = $queryInfoAcademic['completado'] == '1' ? 'H60' : 'I60';
            $spreadsheet->getActiveSheet()
                ->setCellValue($checkComplete, 'X')
                ->setCellValue('L60', $queryInfoAcademic['semestre'])
                ->setCellValue('R60', $nombreTitulo);
            break;
        case 8:
            $checkComplete = $queryInfoAcademic['completado'] == '1' ? 'H62' : 'I62';
            $spreadsheet->getActiveSheet()
                ->setCellValue($checkComplete, 'X')
                ->setCellValue('L62', $queryInfoAcademic['semestre'])
                ->setCellValue('R62', $nombreTitulo);
            break;
        case 9:
            $checkComplete = $queryInfoAcademic['completado'] == '1' ? 'H64' : 'I64';
            $spreadsheet->getActiveSheet()
                ->setCellValue($checkComplete, 'X')
                ->setCellValue('L64', $queryInfoAcademic['semestre'])
                ->setCellValue('R64', $nombreTitulo);
            break;
    }
}

// Informacion laboral del empleado
for ($i = 0; $i <= count($cliente_laboral); $i++) {
    $spreadsheet->getActiveSheet()
        ->setCellValue('A77', $cliente_laboral[0][0])
        ->setCellValue('G77', $cliente_laboral[0][1])
        ->setCellValue('Q77', $cliente_laboral[0][2])
        ->setCellValue('D78', $cliente_laboral[0][3])
        ->setCellValue('V78', $cliente_laboral[0][4])
        ->setCellValue('I79', $cliente_laboral[0][5]);
    $spreadsheet->getActiveSheet()
        ->setCellValue('A83', $cliente_laboral[1][0])
        ->setCellValue('G83', $cliente_laboral[1][1])
        ->setCellValue('Q83', $cliente_laboral[1][2])
        ->setCellValue('D84', $cliente_laboral[1][3])
        ->setCellValue('V84', $cliente_laboral[1][4])
        ->setCellValue('I85', $cliente_laboral[1][5]);
}

// Informacion de cursos cortos del empleado
$cellCheck1 = $cursosArray[0][4] == 2 ? 'W69' : 'Y69';
$check1 = $cursosArray[0][4] == 1 || $cursosArray[0][4] == 2 ? 'X' : '';
$cellCheck2 = $cursosArray[1][4] == 2 ? 'W70' : 'Y70';
$check2 = $cursosArray[1][4] == 1 || $cursosArray[1][4] == 2 ? 'X' : '';
$cellCheck3 = $cursosArray[2][4] == 2 ? 'W71' : 'Y71';
$check3 = $cursosArray[2][4] == 1 || $cursosArray[2][4] == 2 ? 'X' : '';
$cellCheck4 = $cursosArray[3][4] == 2 ? 'W72' : 'Y72';
$check4 = $cursosArray[3][4] == 1 || $cursosArray[3][4] == 2 ? 'X' : '';

for ($i = 0; $i <= count($cursosArray); $i++) {
    $spreadsheet->getActiveSheet()
        ->setCellValue('A69', $cursosArray[0][0])
        ->setCellValue('L69', $cursosArray[0][1])
        ->setCellValue('P69', $cursosArray[0][2])
        ->setCellValue('T69', $cursosArray[0][3])
        ->setCellValue($cellCheck1, $check1);
    $spreadsheet->getActiveSheet()
        ->setCellValue('A70', $cursosArray[1][0])
        ->setCellValue('L70', $cursosArray[1][1])
        ->setCellValue('P70', $cursosArray[1][2])
        ->setCellValue('T70', $cursosArray[1][3])
        ->setCellValue($cellCheck2, $check2);
    $spreadsheet->getActiveSheet()
        ->setCellValue('A71', $cursosArray[2][0])
        ->setCellValue('L71', $cursosArray[2][1])
        ->setCellValue('P71', $cursosArray[2][2])
        ->setCellValue('T71', $cursosArray[2][3])
        ->setCellValue($cellCheck3, $check3);
    $spreadsheet->getActiveSheet()
        ->setCellValue('A72', $cursosArray[3][0])
        ->setCellValue('L72', $cursosArray[3][1])
        ->setCellValue('P72', $cursosArray[3][2])
        ->setCellValue('T72', $cursosArray[3][3])
        ->setCellValue($cellCheck4, $check4);
}

// Contactos directos
$selectContactDirect = mysqli_query($conn, "SELECT nombre_contacto, parentesco, numero FROM cliente_contacto WHERE id_empleado=$id and contacto_directo=1 ORDER BY id DESC LIMIT 2") or die (mysqli_error($conn));
$contactDirectArray = array();
while (($queryContactDirect = mysqli_fetch_array($selectContactDirect)) != NULL) {
    $nombreContacto = $queryContactDirect['nombre_contacto'];
    $parentescoContacto = $parentescos[$queryContactDirect['parentesco']];
    $numeroContacto = $queryContactDirect['numero'];
    array_push($contactDirectArray, ["$nombreContacto", "$parentescoContacto", "$numeroContacto"]);

    for ($i = 0; $i < count($contactDirectArray); $i++) {
        $spreadsheet->getActiveSheet()
            ->setCellValue('A96', $contactDirectArray[0][0])
            ->setCellValue('L96', $contactDirectArray[0][1])
            ->setCellValue('T96', $contactDirectArray[0][2]);
        $spreadsheet->getActiveSheet()
            ->setCellValue('A97', $contactDirectArray[1][0])
            ->setCellValue('L97', $contactDirectArray[1][1])
            ->setCellValue('T97', $contactDirectArray[1][2]);
    }
}

// Output
$filename = "HV-" . " " . $resultadoEmpleado['nombres'] . " " . $resultadoEmpleado['primer_apellido'] . " " . $resultadoEmpleado['segundo_apellido'] . " " ."EXFOR S.A.S" . ".xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
