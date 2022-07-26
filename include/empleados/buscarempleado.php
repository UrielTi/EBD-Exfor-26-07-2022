<?php
$nombres = $_GET['term'];
include ("../conn/conn.php");
  
$consulta = "SELECT nombres FROM clientes WHERE nombres LIKE '%$nombres%'";
  
$result = $conn->query($consulta);
  
if($result->num_rows > 0){
    while($fila = $result->fetch_array()){
        $nombress[] = $fila['nombres'];
    }
echo json_encode($nombress);
}
?>