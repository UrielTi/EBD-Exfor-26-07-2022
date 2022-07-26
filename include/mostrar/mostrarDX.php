<?php
$evento = $_POST['evento'];
  
$respuesta = new stdClass();
if($evento == 5 || $evento == 6 || $evento == 7 || $evento == 8){
    $respuesta->oculto = "none";
}else{
    $respuesta->oculto = "block";
}
echo json_encode($respuesta);
?>