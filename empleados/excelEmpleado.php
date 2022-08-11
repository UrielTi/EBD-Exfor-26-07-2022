<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use function PHPSTORM_META\type;

$tipoString = PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING;

include "../include/conn/conn.php";
include "../cond/todo.php";

$id = $_GET['id'];

//abrir o leer el documento
$reader = IOFactory::createReader("Xlsx");
$spreadsheet = $reader->load("Hoja de vida.xlsx");
$spreadsheet->setActiveSheetIndexByName('Hoja de vida');

//cliente
$consultaEmpleado = mysqli_query($conn, "SELECT * FROM clientes WHERE id=$id");
$resultadoEmpleado = mysqli_fetch_array($consultaEmpleado);

//condicionales de ayuda para el llenado del excel
$hijos = ($resultadoEmpleado['hijos'] == 0) ? 'NO' : 'SI';
$hijosCant = $resultadoEmpleado['hijos'];

//cliente tallas
$consultaTalla = mysqli_query($conn, "SELECT * FROM cliente_tallas WHERE id_empleado=$id");
$resultadoTalla = mysqli_fetch_array($consultaTalla);

//cliente vehiculo
$consultaVehiculo = mysqli_query($conn, "SELECT * FROM cliente_vehiculo WHERE id_empleado=$id");
$resultadoVehiculo = mysqli_fetch_array($consultaVehiculo);

//cliente laborales
$consultaLaboral = mysqli_query($conn, "SELECT * FROM cliente_laborales WHERE id_empleado=$id");
$cliente_laboral = array();
$celdas_laboral = array("A77","G77","Q77","D78","V78","I79","A83","G83","Q83","D84","V84","I85");
while ($resultadoLaboral = mysqli_fetch_array($consultaLaboral)) {
    $empresa = $resultadoLaboral['empresa'];
    $jefe = $resultadoLaboral['jefe'];
    $telefono = $resultadoLaboral['telefono'];
    $cargo = $resultadoLaboral['cargo'];
    $tiempo_exp = $resultadoLaboral['tiempo_exp'];
    $motivo = $resultadoLaboral['motivo'];
    array_push($cliente_laboral, ["$empresa", "$jefe", "$telefono", "$cargo", "$tiempo_exp", "$motivo"]);
}

//cliente contacto
$consultaContacto = mysqli_query($conn, "SELECT * FROM cliente_contacto WHERE id_empleado=$id");
$cliente_contacto = array();
$celdas_contacto = array(array("A91","L91","T91"),1 => array("A92","L92","T92"),2 => array("A93","L93","T93"));
$celdas_contacto_directo = array(array("A96","L96","T96"),1 => array("A97","L97","T97"));
while ($resultadoContacto = mysqli_fetch_assoc($consultaContacto)) {
    $nombre_contacto = $resultadoContacto['nombre_contacto'];
    $parentesco = $parentescos[$resultadoContacto['parentesco']];
    $contacto_directo = $resultadoContacto['contacto_directo'];
    $numero = $resultadoContacto['numero'];
    array_push($cliente_contacto, ["$nombre_contacto", "$parentesco", "$numero","$contacto_directo"]);
}

//cliente información académica
$consultaAcademico = mysqli_query($conn, "SELECT * FROM cliente_academico WHERE id_cliente=$id");
$resultadoAcademico = mysqli_fetch_array($consultaAcademico);

//cliente información cursos cortos
$consultaCursos = mysqli_query($conn, "SELECT * FROM cliente_cursos WHERE id_cliente=$id");
$cliente_cursos = array();
while ($resultadoCursos = mysqli_fetch_assoc($consultaCursos)) {
    $nombre_curso = $resultadoCursos['nombre_curso'];
    $duracion = $resultadoCursos['duracion'];
    $entidad = $resultadoCursos['entidad'];
    $tiempo = $resultadoCursos['tiempo'];
    $certificado = $resultadoCursos['certificado'];
    array_push($cliente_cursos, ["$nombre_curso", "$duracion", "$entidad", "$tiempo", 'certificado' => "$certificado"]);
}

//Edad del empleado
$fecha_nacimiento = new DateTime($resultadoEmpleado['fecha_nacimiento']);
$fecha_ingreso = new DateTime($resultadoEmpleado['fecha_ingreso']);
$edad = $fecha_ingreso->diff($fecha_nacimiento);
$edad = $edad->y; //La y significa los años en la diferencia de fechas

//Añade en array si tiene un conyugue
$conyugue = array();
for ($a = 0; $a < count($cliente_contacto); $a++) {
    if ($cliente_contacto[$a][1] == 'CONYUGUE') {
        $nombre_contacto1 = $cliente_contacto[$a][0];
        $numero1 = $cliente_contacto[$a][2];
        array_push($conyugue, "$nombre_contacto1", "$numero1");
    } else array_push($conyugue, "", "");
}

//Información personal
agregarEnCelda($spreadsheet, 'A6', $cargos[$resultadoEmpleado['cargo']]);
agregarEnCelda($spreadsheet, 'L6', $nucleos[$resultadoEmpleado['nucleo']]);
agregarEnCelda($spreadsheet, 'I10', $resultadoEmpleado['primer_apellido']. " ".$resultadoEmpleado['segundo_apellido']." ".$resultadoEmpleado['nombres']);
agregarEnCelda($spreadsheet, 'D12', $resultadoEmpleado['cedula']);
agregarEnCelda($spreadsheet, 'L12', $resultadoEmpleado['exp_ced']);
agregarEnCelda($spreadsheet, 'X12', $resultadoEmpleado['fecha_expedicion']);
agregarEnCelda($spreadsheet, 'J14', $resultadoEmpleado['fecha_nacimiento']);
agregarEnCelda($spreadsheet, 'V14', $edad);
agregarEnCelda($spreadsheet, 'I16', $rhs[$resultadoEmpleado['rh']][0]);
agregarEnCelda($spreadsheet, 'P16', $rhs[$resultadoEmpleado['rh']][1]);
agregarEnCelda($spreadsheet, 'T16', $razas[$resultadoEmpleado['raza']]);
agregarEnCelda($spreadsheet, 'I18', $resultadoEmpleado['acargo']);
agregarEnCelda($spreadsheet, 'O18', $resultadoEmpleado['estrato']);
agregarEnCelda($spreadsheet, 'W18', $tipos_vivienda[$resultadoEmpleado['tip_vivi']]);
agregarEnCelda($spreadsheet, 'E20', $resultadoEmpleado['direccion']);

//Información Telefonica
if (strlen($resultadoEmpleado['telefono']) < 10){
    agregarEnCelda($spreadsheet, 'G22', str_replace(" ","",$resultadoEmpleado['telefono']));
}else{
    agregarEnCelda($spreadsheet, 'Q22', str_replace(" ","",$resultadoEmpleado['telefono']));
}

agregarEnCelda($spreadsheet, 'J24', $resultadoEmpleado['email']);
agregarEnCelda($spreadsheet, 'D26', $hijos);
agregarEnCelda($spreadsheet, 'J26', $hijosCant);
agregarEnCelda($spreadsheet, 'S26', $estados_civiles[$resultadoEmpleado['civil']]);
agregarEnCelda($spreadsheet, 'J28', $conyugue[0]);
agregarEnCelda($spreadsheet, 'J28', $conyugue[0]);
agregarEnCelda($spreadsheet, 'K30', $conyugue[1]);

//Información tallas para dotación
agregarEnCelda($spreadsheet, 'D34', $resultadoTalla['camisa']);
agregarEnCelda($spreadsheet, 'J34', $resultadoTalla['pantalon']);
agregarEnCelda($spreadsheet, 'O34', $resultadoTalla['guayo']);
agregarEnCelda($spreadsheet, 'T34', $resultadoTalla['botas']);
agregarEnCelda($spreadsheet, 'T34', $resultadoTalla['botas']);

//Información de seguridad social
agregarEnCelda($spreadsheet, 'C38', $epss[$resultadoEmpleado['eps']]);
agregarEnCelda($spreadsheet, 'M38', $pensiones[$resultadoEmpleado['pensiones']]);
agregarEnCelda($spreadsheet, 'W38', $resultadoEmpleado['arl']);
agregarEnCelda($spreadsheet, 'C39', $cajas[$resultadoEmpleado['caja']]);
agregarEnCelda($spreadsheet, 'S39', $resultadoEmpleado['servicio_funerario']);
//Condicional si el empleado tiene tratamiento medico    
if ($resultadoEmpleado['enfermedad'] == 1){
    agregarEnCelda($spreadsheet, 'A42', 'NO');
}else {
    agregarEnCelda($spreadsheet, 'A42', 'SI');
}

//Cliente vehículo - información del vehiculo
switch ($resultadoVehiculo['vehiculo']){
    case 'MOTO':
        agregarEnCelda($spreadsheet, 'W43', 'X'); agregarEnCelda($spreadsheet, 'D45', 'X');
        break;
    case 'CARRO':
        agregarEnCelda($spreadsheet, 'W43', 'X'); agregarEnCelda($spreadsheet, 'J45', 'X');
        break;
    case 'NINGUNO':
        agregarEnCelda($spreadsheet, 'Z43', 'X');
        break;
}

// Inserta valores de soat y tecnomecanica si tiene
if ($resultadoVehiculo['vehiculo'] == 'MOTO' || $resultadoVehiculo['vehiculo'] == 'CARRO') {
    //$tipoVehiculo = ($resultadoVehiculo['vehiculo'] == 'MOTO') ? ["D45", "MOTO"] : ["J45", "CARRO"];
    if ($resultadoVehiculo['ven_soat'] != '0101-01-01' || $resultadoVehiculo['ven_tecnomecanica'] != '0101-01-01'){
        agregarEnCelda($spreadsheet, 'T45', $resultadoVehiculo['ven_soat'] . " - " . $resultadoVehiculo['ven_tecnomecanica']); 
    }
} 

//Información de niveles de escolaridad
switch ($resultadoAcademico['curso']) {
    case 1:
        //Consultar si no cuenta con ninguno de los niveles de escolaridad
        break;
    case 2:
        $resultadoAcademico['completado'] == 1 ? agregarEnCelda($spreadsheet, 'H52', 'X') : agregarEnCelda($spreadsheet, 'I52', 'X');
        agregarEnCelda($spreadsheet, 'L52', $resultadoAcademico['semestre']);
        agregarEnCelda($spreadsheet, 'R52', $resultadoAcademico['titulo']);   
        break;
    case 3:
        $resultadoAcademico['completado'] == 1 ? agregarEnCelda($spreadsheet, 'H54', 'X') : agregarEnCelda($spreadsheet, 'I54', 'X');
        agregarEnCelda($spreadsheet, 'L54', $resultadoAcademico['semestre']);
        agregarEnCelda($spreadsheet, 'R54', $resultadoAcademico['titulo']);
        break;
    case 4:
        $resultadoAcademico['completado'] == 1 ? agregarEnCelda($spreadsheet, 'H56', 'X') : agregarEnCelda($spreadsheet, 'I56', 'X');
        agregarEnCelda($spreadsheet, 'L56', $resultadoAcademico['semestre']);
        agregarEnCelda($spreadsheet, 'R56', $resultadoAcademico['titulo']);
        break;
    case 5:
        $resultadoAcademico['completado'] == 1 ? agregarEnCelda($spreadsheet, 'H58', 'X') : agregarEnCelda($spreadsheet, 'I58', 'X');
        agregarEnCelda($spreadsheet, 'L58', $resultadoAcademico['semestre']);
        agregarEnCelda($spreadsheet, 'R58', $resultadoAcademico['titulo']);
        break;
    case 6:
        $resultadoAcademico['completado'] == 1 ? agregarEnCelda($spreadsheet, 'H60', 'X') : agregarEnCelda($spreadsheet, 'I60', 'X');
        agregarEnCelda($spreadsheet, 'L60', $resultadoAcademico['semestre']);
        agregarEnCelda($spreadsheet, 'R60', $resultadoAcademico['titulo']);
        break;
    case 7:
        $resultadoAcademico['completado'] == 1 ? agregarEnCelda($spreadsheet, 'H62', 'X') : agregarEnCelda($spreadsheet, 'I62', 'X');
        agregarEnCelda($spreadsheet, 'L62', $resultadoAcademico['semestre']);
        agregarEnCelda($spreadsheet, 'R62', $resultadoAcademico['titulo']);
        break;
    case 8:
        $resultadoAcademico['completado'] == 1 ? agregarEnCelda($spreadsheet, 'H64', 'X') : agregarEnCelda($spreadsheet, 'I64', 'X');
        agregarEnCelda($spreadsheet, 'L64', $resultadoAcademico['semestre']);
        agregarEnCelda($spreadsheet, 'R64', $resultadoAcademico['titulo']);
    break;
}

//Información cursos cortos
$celdas_cursos = array(array('A69','L69', 'P69', 'T69'), 1 =>array('A70','L70', 'P70', 'T70'), 2 =>array('A71','L71', 'P71', 'T71'), 3 =>array('A72','L72', 'P72', 'T72')); 
for ($i = 0; $i < count($cliente_cursos); $i++) {
    if (isset($cliente_cursos[$i]['certificado'])){
        if ($cliente_cursos[$i]['certificado'] == 1){ //Si tiene certificado
            agregarEnCelda($spreadsheet, 'W69', 'X');
        } elseif ($cliente_cursos[$i]['certificado'] == 0){ //No tiene certificado
            agregarEnCelda($spreadsheet, 'Y69', 'X');
        }
    }
    for ($j = 0; $j < count($cliente_cursos[0])-1; $j++) {
        agregarEnCelda($spreadsheet, $celdas_cursos[$i][$j], $cliente_cursos[$i][$j]);
    }
}

//Firma y fecha de ingreso
agregarEnCelda($spreadsheet, 'D108', $resultadoEmpleado['nombres']." ".$resultadoEmpleado['primer_apellido']." ".$resultadoEmpleado['segundo_apellido']);
agregarEnCelda($spreadsheet, 'C109', $resultadoEmpleado['cedula']);
agregarEnCelda($spreadsheet, 'O107', $resultadoEmpleado['fecha_ingreso']);
//Condicional para llenado de no_contrato
if ($resultadoEmpleado['no_contrato'] != '0'){
    agregarEnCelda($spreadsheet, 'U6', $resultadoEmpleado['no_contrato']);
}else{
    agregarEnCelda($spreadsheet, 'U6', '');
}

//Analizar los valores de cliente_laboral no sean nulas y registrando datos
$cells = 0;
for ($i = 0; $i < count($cliente_laboral); $i++) {
    for ($b = 0; $b < 6; $b++) {
        if ($cliente_laboral[$i][$b] != null){
            $spreadsheet->getActiveSheet()
            ->setCellValue($celdas_laboral[$cells], $cliente_laboral[$i][$b]);
            $cells += 1;
        } else break;
    }
}

// Analizar los valores de cliente_contacto y contacto_directo no sean nulas y registrando datos
//Llenado de contacto
for ($a = 0; $a < count($cliente_contacto); $a++){
    for ($b = 0; $b < count($celdas_contacto); $b++){
        agregarEnCelda($spreadsheet, $celdas_contacto[$a][$b], $cliente_contacto[$a][$b]);
        if ($cliente_contacto[$a][3] == '1' && $a < 2){
            agregarEnCelda($spreadsheet, $celdas_contacto_directo[$a][$b], $cliente_contacto[$a][$b]);
        }
    }
}

//Función para agregar valores a la hoja de excel
function agregarEnCelda($spreadsheet, $celda, $valor){
    if (isset($valor)){
        $spreadsheet->getActiveSheet()
        ->setCellValue($celda, $valor);
    }
}

//Guardar documento
$nombre_documento = "HV - ". $resultadoEmpleado['nombres']. " ".$resultadoEmpleado['primer_apellido'] ." "."EXFOR S.A.S";

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.$nombre_documento.'".xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;