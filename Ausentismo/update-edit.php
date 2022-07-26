<?php
include "../include/conn/conn.php";
if(isset($_POST['update'])){
	$id			= intval($_POST['id']);
	$mes_evento	= mysqli_real_escape_string($conn,(strip_tags($_POST['mes_evento'], ENT_QUOTES)));
	$nombres	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombres'], ENT_QUOTES)));
	$cedula	= mysqli_real_escape_string($conn,(strip_tags($_POST['cedula'], ENT_QUOTES)));
	$cargo	= mysqli_real_escape_string($conn,(strip_tags($_POST['cargo'], ENT_QUOTES)));
	$proceso	= mysqli_real_escape_string($conn,(strip_tags($_POST['proceso'], ENT_QUOTES)));
	$nucleo	= mysqli_real_escape_string($conn,(strip_tags($_POST['nucleo'], ENT_QUOTES)));
	$eps	= mysqli_real_escape_string($conn,(strip_tags($_POST['eps'], ENT_QUOTES)));
	$fecha_inicio	= mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_inicio'], ENT_QUOTES)));
	$fecha_final	= mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_final'], ENT_QUOTES)));
	$dias_ausentismo	= mysqli_real_escape_string($conn,(strip_tags($_POST['dias_ausentismo'], ENT_QUOTES)));
	$prorroga	= mysqli_real_escape_string($conn,(strip_tags($_POST['prorroga'], ENT_QUOTES)));
	$dx	= mysqli_real_escape_string($conn,(strip_tags($_POST['dx'], ENT_QUOTES)));
	$diagnostico	= mysqli_real_escape_string($conn,(strip_tags($_POST['diagnostico'], ENT_QUOTES)));
	$descripcion	= mysqli_real_escape_string($conn,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
	$evento	= mysqli_real_escape_string($conn,(strip_tags($_POST['evento'], ENT_QUOTES)));
	$peligro_aso	= mysqli_real_escape_string($conn,(strip_tags($_POST['peligro_aso'], ENT_QUOTES)));
	$sve	= mysqli_real_escape_string($conn,(strip_tags($_POST['sve'], ENT_QUOTES)));
	$estado	= mysqli_real_escape_string($conn,(strip_tags($_POST['estado'], ENT_QUOTES)));
               
	$update = mysqli_query($conn, "UPDATE ausentismo SET mes_evento='$mes_evento', nombres='$nombres', cedula='$cedula',cargo='$cargo',proceso='$proceso',nucleo='$nucleo',eps='$eps',fecha_inicio='$fecha_inicio',fecha_final='$fecha_final',dias_ausentismo='$dias_ausentismo',prorroga='$prorroga',dx='$dx',diagnostico='$diagnostico',descripcion='$descripcion',evento='$evento',peligro_aso='$peligro_aso',sve='$sve',estado='$estado' WHERE id='$id'") or die(mysqli_error());
	if($update){
		echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
	}else{
		echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
	}
}
?>