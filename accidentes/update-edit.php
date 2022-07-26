<?php
include "../include/conn/conn.php";
if(isset($_POST['update'])){
	$id			= intval($_POST['id']);
	$nombres	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombres'], ENT_QUOTES)));
	$cedula	= mysqli_real_escape_string($conn,(strip_tags($_POST['cedula'], ENT_QUOTES)));
	$cargo	= mysqli_real_escape_string($conn,(strip_tags($_POST['cargo'], ENT_QUOTES)));
	$proceso	= mysqli_real_escape_string($conn,(strip_tags($_POST['proceso'], ENT_QUOTES)));
	$nucleo	= mysqli_real_escape_string($conn,(strip_tags($_POST['nucleo'], ENT_QUOTES)));
	$supervisor	= mysqli_real_escape_string($conn,(strip_tags($_POST['supervisor'], ENT_QUOTES)));
	$hora = mysqli_real_escape_string($conn, (strip_tags($_POST['hora_evento'], ENT_QUOTES)));
    $dia = mysqli_real_escape_string($conn, (strip_tags($_POST['dia_evento'], ENT_QUOTES)));
	$mes = mysqli_real_escape_string($conn, (strip_tags($_POST['mes_evento'], ENT_QUOTES)));
	$año = mysqli_real_escape_string($conn, (strip_tags($_POST['año_evento'], ENT_QUOTES)));
	$fecha_evento	= mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_evento'], ENT_QUOTES)));
	$fecha_inicio	= mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_inicio'], ENT_QUOTES)));
	$fecha_final	= mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_final'], ENT_QUOTES)));
	$dias_incapacidad	= mysqli_real_escape_string($conn,(strip_tags($_POST['dias_incapacidad'], ENT_QUOTES)));
	$peligro	= mysqli_real_escape_string($conn,(strip_tags($_POST['peligro'], ENT_QUOTES)));
	$finca	= mysqli_real_escape_string($conn,(strip_tags($_POST['finca'], ENT_QUOTES)));
	$lugar	= mysqli_real_escape_string($conn,(strip_tags($_POST['lugar'], ENT_QUOTES)));
	$evento	= mysqli_real_escape_string($conn,(strip_tags($_POST['evento'], ENT_QUOTES)));
	$mecanismo	= mysqli_real_escape_string($conn,(strip_tags($_POST['mecanismo'], ENT_QUOTES)));
	$agente_lesion	= mysqli_real_escape_string($conn,(strip_tags($_POST['agente_lesion'], ENT_QUOTES)));
	$tipo_lesion	= mysqli_real_escape_string($conn,(strip_tags($_POST['tipo_lesion'], ENT_QUOTES)));
	$parte_afectada	= mysqli_real_escape_string($conn,(strip_tags($_POST['parte_afectada'], ENT_QUOTES)));
	$descripcion	= mysqli_real_escape_string($conn,(strip_tags($_POST['descripcion'], ENT_QUOTES)));

	$update = mysqli_query($conn, "UPDATE accidentes SET nombres='$nombres', cedula='$cedula',cargo='$cargo',proceso='$proceso',nucleo='$nucleo',supervisor='$supervisor',hora='$hora',dia='$dia',mes='$mes',año='$año',fecha_evento='$fecha_evento',fecha_inicio='$fecha_inicio',fecha_final='$fecha_final',dias_incapacidad='$dias_incapacidad',peligro='$peligro',finca='$finca',lugar='$lugar',evento='$evento',mecanismo='$mecanismo',agente_lesion='$agente_lesion',tipo_lesion='$tipo_lesion',parte_afectada='$parte_afectada',descripcion='$descripcion' WHERE id='$id'") or die(mysqli_error());
	if($update){
		echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
	}else{
		echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
	}
}
  ?>