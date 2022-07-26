<?php
//ELM E = Empleado, L = Labor, M = Maquina
$opcion = $_POST['opcion'];
  
$respuesta = new stdClass();
if($opcion == 'Labor'){
    $respuesta->ocultoEmpleado = "none";
    $respuesta->ocultoMaquina = "none";
    $respuesta->ocultoLabor = "block";
}elseif ($opcion == 'Maquina'){
    $respuesta->ocultoEmpleado = "none";
    $respuesta->ocultoMaquina = "block";
    $respuesta->ocultoLabor = "none";
}else{
    $respuesta->ocultoEmpleado = "block";
    $respuesta->ocultoMaquina = "none";
    $respuesta->ocultoLabor = "none";
}
echo json_encode($respuesta);
?>