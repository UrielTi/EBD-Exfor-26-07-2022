<?php
$boton = $_POST['boton'];
  
$respuesta = new stdClass();
if($boton == 'No'){
    $respuesta->oculto = "none";
}else{
    $respuesta->oculto = "block";
}
echo json_encode($respuesta);
?>