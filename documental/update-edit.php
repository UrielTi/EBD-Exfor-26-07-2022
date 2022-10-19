<?php
include "../include/conn/conn.php";
if (isset($_POST['update'])) {
	// Id del documento
	$id = intval($_POST['id']);
	// Input que contienen los datos del codigo.
	$input_consecutivo = mysqli_real_escape_string($conn, (strip_tags($_POST['input_consecutivo'], ENT_QUOTES)));
	$input_proceso = mysqli_real_escape_string($conn, (strip_tags($_POST['input_proceso'], ENT_QUOTES)));
	$input_tipo = mysqli_real_escape_string($conn, (strip_tags($_POST['input_tipo'], ENT_QUOTES)));
	// Selects con datos en id
	$select_consecutivo = mysqli_real_escape_string($conn, (strip_tags($_POST['select_consecutivo'], ENT_QUOTES)));
	$select_tipo = mysqli_real_escape_string($conn, (strip_tags($_POST['select_tipo'], ENT_QUOTES)));
	$select_proceso = mysqli_real_escape_string($conn, (strip_tags($_POST['select_proceso'], ENT_QUOTES)));
	// Datos que componen el documento.
	$nombre = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
	$sistema = mysqli_real_escape_string($conn, (strip_tags($_POST['sistema'], ENT_QUOTES)));
	$version = mysqli_real_escape_string($conn, (strip_tags($_POST['version'], ENT_QUOTES)));
	$origen = mysqli_real_escape_string($conn, (strip_tags($_POST['origen'], ENT_QUOTES)));
	$aprobacion = mysqli_real_escape_string($conn, (strip_tags($_POST['aprobacion'], ENT_QUOTES)));
	$u_fisica = mysqli_real_escape_string($conn, (strip_tags($_POST['u_fisica'], ENT_QUOTES)));
	$u_digital = mysqli_real_escape_string($conn, (strip_tags($_POST['u_digital'], ENT_QUOTES)));
	$estado = mysqli_real_escape_string($conn, (strip_tags($_POST['estado'], ENT_QUOTES)));
	$revisado = mysqli_real_escape_string($conn, (strip_tags($_POST['revisado'], ENT_QUOTES)));
	$actualizado = mysqli_real_escape_string($conn, (strip_tags($_POST['actualizado'], ENT_QUOTES)));
	$vigente_desde = mysqli_real_escape_string($conn, (strip_tags($_POST['vigente_desde'], ENT_QUOTES)));
	$personaE = mysqli_real_escape_string($conn, (strip_tags($_POST['personaE'], ENT_QUOTES)));
	$personaA = mysqli_real_escape_string($conn, (strip_tags($_POST['personaA'], ENT_QUOTES)));
	// Variables tiempo de retencion del documento.
	$tiempoR1 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempoR1'], ENT_QUOTES)));
	$tiempoR2 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempoR2'], ENT_QUOTES)));
	// Documento.
	$archivo = mysqli_real_escape_string($conn, (strip_tags($_FILES['archivo']['name'], ENT_QUOTES)));
	$documento_actual = mysqli_real_escape_string($conn, (strip_tags($_POST['documento_actual'], ENT_QUOTES)));
	$codigo = mysqli_real_escape_string($conn, (strip_tags($_POST['codigo'], ENT_QUOTES)));

	// Adjuntar 0 a consecutivo
	$consecutivo = sprintf("%02d", $input_consecutivo);

	// Archivo php con datos de select.
	include 'editorCodigo.php';

	// Query datos que componen el codigo del documento.
	$selectQuery = mysqli_query($conn, "SELECT codigo, proceso, tipo, consecutivo FROM documentos WHERE id='$id'") or die (mysqli_error($conn));
	$queryCodigo = mysqli_fetch_array($selectQuery);

	// Generar codigo.
	if ($input_proceso != '' || $input_tipo != '' || $consecutivo != '') {
		// Verificar si algunos campos que componen el codigo no se han diligenciado, entonces la variable tendra el valor de lo almacenado en bd.
		if ($input_proceso == '') {
			$queryProceso = $queryCodigo['proceso'];
			// PHP con comprobador.
			include './comprobadores/compProceso.php';
			$proceso = $queryProceso;

		}
		if ($input_tipo == '') {
			$queryTipo = $queryCodigo['tipo'];
			// PHP con comprobador.
			include './comprobadores/compTipo.php';
			$tipo = $queryTipo;
		}
		if ($consecutivo == '' || $input_consecutivo == '') {
			$consecutivo = $queryCodigo['consecutivo'];
		}
		$codigo = $input_proceso . '-' . $input_tipo . '-' . $consecutivo;
		$updateCodigo = mysqli_query($conn, "UPDATE documentos SET codigo='$codigo', proceso='$proceso', tipo='$tipo', consecutivo='$consecutivo' WHERE id='$id'") or die(mysqli_error($conn));
	}

	$path = "files/" . $archivo;
	$extension = pathinfo($path, PATHINFO_EXTENSION);

	// Verificar value del input files, mover archivo a carpeta versiones antiguas si se actualiza el archivo.
	if ($archivo == '') {
		$archivo = $documento_actual;
		// Comprobacion de select del codigo, ContenidoSelect != Guardado en BD => UPDATE.
		// Update - Actualizacion
		$update = mysqli_query($conn, "UPDATE documentos SET nombre='$nombre', sistema='$sistema', version='$version', origen='$origen', aprobacion='$aprobacion', u_fisica='$u_fisica', u_digital='$u_digital', estado='$estado', vigente_desde='$vigente_desde', actualizado='$actualizado', revisado='$revisado', personaE='$personaE', personaA='$personaA', archivo='$archivo', tiempo_r1='$tiempoR1', tiempo_r2='$tiempoR2' WHERE id='$id'") or die(mysqli_error($conn));
	} else {
		$currentLocation = 'files/' . $documento_actual;
		$newLocation = 'oldfiles/' . $documento_actual;
		$moved = rename($currentLocation, $newLocation);
		// Verificar que no haya error y realizar la subida del nuevo documento.
		if ($_FILES['archivo']['error'] > 0) {
			echo "<script>alert('Error inesperado al subir el archivo'); window.location = 'index.php'</script>";
		} else {
			$limite_kb = 500;
			if ($_FILES["archivo"]["size"] <= ($limite_kb * 1024)) {
				if ($extension == 'docx' || $extension == 'pptx' || $extension == 'xls' || $extension == 'xlsx' || $extension == 'pdf' || $extension == 'jpeg' || $extension == 'jpg' || $extension == 'png') {
					$ruta = "files/";
					move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta . $archivo);
					// select query de datos - Nuevo Documento Antiguo
					$select_documentos = mysqli_query($conn, "SELECT * FROM documentos WHERE id='$id'");
					$query = mysqli_fetch_assoc($select_documentos);
					$old_id_documento = $query['id'];
					$old_sistema = $query['sistema'];
					$old_aprobacion = $query['aprobacion'];
					$old_codigo = $query['codigo'];
					$old_nombre = $query['nombre'];
					$old_u_fisica = $query['u_fisica'];
					$old_u_digital = $query['u_digital'];
					$old_version = $query['version'];
					$old_proceso = $query['proceso'];
					$old_consecutivo = $query['consecutivo'];
					$old_tipo = $query['tipo'];
					$old_estado = $query['estado'];
					$old_origen = $query['origen'];
					$old_actualizado = $query['actualizado'];
					$old_revisado = $query['revisado'];
					$old_vigente_desde = $query['vigente_desde'];
					$old_personaE = $query['personaE'];
					$old_personaA = $query['personaA'];
					$old_tiempoR1 = $query['tiempo_r1'];
					$old_tiempoR2 = $query['tiempo_r2'];
					$old_archivo = $query['archivo'];
					// Insert del documento ahora obsoleto en la base de datos de documentos_obsoletos.
					$insert_new_old = mysqli_query($conn, "INSERT INTO documentos_obsoletos (id, id_documento, sistema, aprobacion, codigo, nombre, u_fisica, u_digital, version, proceso, consecutivo, tipo, estado, origen, actualizado, revisado, vigente_desde, personaE, personaA, tiempo_r1, tiempo_r2, archivo)
						VALUES(NULL, '$old_id_documento', '$old_sistema', '$old_aprobacion', '$old_codigo', '$old_nombre', '$old_u_fisica', '$old_u_digital', '$old_version', '$old_proceso', '$old_consecutivo', '$old_tipo', '$old_estado', '$old_origen', '$old_actualizado', '$old_revisado', '$old_vigente_desde', '$old_personaE', '$old_personaA', '$old_tiempoR1', '$old_tiempoR2', '$old_archivo')") or die(mysqli_error($conn));
					// Update - Actualizacion
					$update = mysqli_query($conn, "UPDATE documentos SET nombre='$nombre', sistema='$sistema', codigo='$codigo', version='$version', origen='$origen', tipo='$select_tipo', aprobacion='$aprobacion', u_fisica='$u_fisica', u_digital='$u_digital', proceso='$select_proceso', consecutivo='$consecutivo', estado='$estado', vigente_desde='$vigente_desde', actualizado='$actualizado', revisado='$revisado', personaE='$personaE', personaA='$personaA', archivo='$archivo', tiempo_r1='$tiempoR1', tiempo_r2='$tiempoR2' WHERE id='$id'") or die(mysqli_error($conn));
				} else {
					echo "<script>alert('El documento pesa mas de 500MB o no es del tipo WORD, EXCEL, PDF, POWER POINT, JPEG, PNG'); window.location = 'registro.php'</script>";
				}
			}
		}
	}
	if ($update) {
		echo "<script>alert('Se han actualizado los datos satisfactoriamente'); window.location = 'editar.php?id=$id'</script>";
	} else {
		echo "<script>alert('Error al actualiar datos'); window.location = 'editar.php?id=$id'</script>";
	}
}
