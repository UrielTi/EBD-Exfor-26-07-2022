<?php
$nombres = $_GET['term'];
include ("../conn/conn.php");
  
$consulta = "SELECT nombre FROM epp WHERE nombre LIKE '%$nombres%'";
  
$result = $conn->query($consulta);
  
if($result->num_rows > 0){
    while($fila = $result->fetch_array()){
        $nombress[] = $fila['nombre'];
    }
echo json_encode($nombress);
}
?>