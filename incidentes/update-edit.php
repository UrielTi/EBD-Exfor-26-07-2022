<?php
include "../include/conn/conn.php";
if(isset($_POST['update'])){
	$id			= intval($_POST['id']);
	$maquina	= mysqli_real_escape_string($conn,(strip_tags($_POST['maquina'], ENT_QUOTES)));
	$labor	= mysqli_real_escape_string($conn,(strip_tags($_POST['labor'], ENT_QUOTES)));
	$nombres	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombres'], ENT_QUOTES)));
	$cedula	= intval($_POST['cedula']);
	$cargo	= mysqli_real_escape_string($conn,(strip_tags($_POST['cargo'], ENT_QUOTES)));
	$proceso	= mysqli_real_escape_string($conn,(strip_tags($_POST['proceso'], ENT_QUOTES)));
	$nucleo	= mysqli_real_escape_string($conn,(strip_tags($_POST['nucleo'], ENT_QUOTES)));
	$supervisor	= mysqli_real_escape_string($conn,(strip_tags($_POST['supervisor'], ENT_QUOTES)));
	$hora = mysqli_real_escape_string($conn, (strip_tags($_POST['hora_evento'], ENT_QUOTES)));
    $dia = mysqli_real_escape_string($conn, (strip_tags($_POST['dia_evento'], ENT_QUOTES)));
	$mes = mysqli_real_escape_string($conn, (strip_tags($_POST['mes_evento'], ENT_QUOTES)));
	$año = mysqli_real_escape_string($conn, (strip_tags($_POST['año_evento'], ENT_QUOTES)));
	$fecha_evento	= mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_evento'], ENT_QUOTES)));
	$peligro	= mysqli_real_escape_string($conn,(strip_tags($_POST['peligro'], ENT_QUOTES)));
	$finca	= mysqli_real_escape_string($conn,(strip_tags($_POST['finca'], ENT_QUOTES)));
	$lugar	= mysqli_real_escape_string($conn,(strip_tags($_POST['lugar'], ENT_QUOTES)));
	$descripcion	= mysqli_real_escape_string($conn,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
	$evento	= mysqli_real_escape_string($conn,(strip_tags($_POST['evento'], ENT_QUOTES)));
	$mecanismo	= mysqli_real_escape_string($conn,(strip_tags($_POST['mecanismo'], ENT_QUOTES)));
	$agente_evento = mysqli_real_escape_string($conn, (strip_tags($_POST['agente_evento'], ENT_QUOTES)));
	$categoria_daño = mysqli_real_escape_string($conn, (strip_tags($_POST['categoria_daño'], ENT_QUOTES)));
	$daño_propiedad = mysqli_real_escape_string($conn, (strip_tags($_POST['daño_propiedad'], ENT_QUOTES)));
	$daño_ambiental = mysqli_real_escape_string($conn, (strip_tags($_POST['daño_ambiental'], ENT_QUOTES)));
	$daño_ocasionado = mysqli_real_escape_string($conn, (strip_tags($_POST['daño_ocasionado'], ENT_QUOTES)));
	$personas_afectadas = mysqli_real_escape_string($conn, (strip_tags($_POST['personas_afectadas'], ENT_QUOTES)));
	$horas_afectados = mysqli_real_escape_string($conn, (strip_tags($_POST['horas_afectados'], ENT_QUOTES)));
	$personas_involucradas = mysqli_real_escape_string($conn, (strip_tags($_POST['personas_involucradas'], ENT_QUOTES)));
	$horas_involucrados = mysqli_real_escape_string($conn, (strip_tags($_POST['horas_involucrados'], ENT_QUOTES)));
	$total = mysqli_real_escape_string($conn, (strip_tags($_POST['total'], ENT_QUOTES)));

	$update = mysqli_query($conn, "UPDATE incidentes SET maquina='$maquina', labor='$labor', nombres='$nombres', cedula='$cedula',cargo='$cargo',proceso='$proceso',nucleo='$nucleo',supervisor='$supervisor',hora='$hora',dia='$dia',mes='$mes',año='$año',fecha_evento='$fecha_evento',peligro='$peligro',finca='$finca',lugar='$lugar',evento='$evento',mecanismo='$mecanismo',descripcion='$descripcion',agente_evento='$agente_evento',categoria_daño='$categoria_daño',daño_propiedad='$daño_propiedad',daño_ambiental='$daño_ambiental',daño_ocasionado='$daño_ocasionado',personas_afectadas='$personas_afectadas',horas_afectados='$horas_afectados',personas_involucradas='$personas_involucradas',horas_involucrados='$horas_involucrados',total='$total' WHERE id='$id'") or die(mysqli_error($conn));
	if($update){
		echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
	}else{
		echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
	}
}
  ?>