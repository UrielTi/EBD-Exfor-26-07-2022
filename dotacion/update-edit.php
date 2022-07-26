<?php
include "../include/conn/conn.php";
if(isset($_POST['update'])){
				$id			= intval($_POST['id']);
				$nombre = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
                $cedula = mysqli_real_escape_string($conn, (strip_tags($_POST['cedula'], ENT_QUOTES)));
                $cargo = mysqli_real_escape_string($conn, (strip_tags($_POST['cargo'], ENT_QUOTES)));
                $nucleo = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
                $camisa = mysqli_real_escape_string($conn, (strip_tags($_POST['camisa'], ENT_QUOTES)));
                $pantalon = mysqli_real_escape_string($conn, (strip_tags($_POST['pantalon'], ENT_QUOTES)));
                $botas = mysqli_real_escape_string($conn, (strip_tags($_POST['botas'], ENT_QUOTES)));
                $guayo = mysqli_real_escape_string($conn, (strip_tags($_POST['guayo'], ENT_QUOTES)));
                $fecha1 = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha1'], ENT_QUOTES)));
                $fecha2 = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha2'], ENT_QUOTES)));
                $fecha3 = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha3'], ENT_QUOTES)));
               
				
				$update = mysqli_query($conn, "UPDATE dotacion SET nombre='$nombre', cedula='$cedula', cargo='$cargo', nucleo='$nucleo', camisa='$camisa', pantalon='$pantalon', botas='$botas', guayo='$guayo', fecha1='$fecha1', fecha2='$fecha2', fecha3='$fecha3' WHERE id='$id'") or die(mysqli_error($conn));
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
?>
