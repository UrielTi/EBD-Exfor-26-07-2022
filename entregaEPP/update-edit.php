<?php
include "../include/conn/conn.php";
if(isset($_POST['update'])){
				$id			= intval($_POST['id']);
				$nombre	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				$cedula  	= mysqli_real_escape_string($conn,(strip_tags($_POST['cedula'], ENT_QUOTES)));
				$cantidad  = mysqli_real_escape_string($conn,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$elemento  = mysqli_real_escape_string($conn,(strip_tags($_POST['elemento'], ENT_QUOTES)));
				$precio  = mysqli_real_escape_string($conn,(strip_tags($_POST['precio'], ENT_QUOTES)));

				$update = mysqli_query($conn, "UPDATE entrega_epp SET nombre='$nombre', cedula='$cedula', cantidad='$cantidad', elemento='$elemento', precio='$precio' WHERE id='$id'") or die(mysqli_error($conn));
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
