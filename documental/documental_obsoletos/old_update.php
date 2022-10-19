<?php
include "../../include/conn/conn.php";
if (isset($_POST['update'])) {
    // Id del documento y id del documento obsoleto
    $id_documento = mysqli_real_escape_string($conn, (strip_tags($_POST['id_documento'], ENT_QUOTES)));
    $id = mysqli_real_escape_string($conn, (strip_tags($_POST['id'], ENT_QUOTES)));
    // Input que contienen los datos del codigo.
	$input_consecutivo = mysqli_real_escape_string($conn, (strip_tags($_POST['input_consecutivo'], ENT_QUOTES)));
	$input_proceso = mysqli_real_escape_string($conn, (strip_tags($_POST['input_proceso'], ENT_QUOTES)));
	$input_tipo = mysqli_real_escape_string($conn, (strip_tags($_POST['input_tipo'], ENT_QUOTES)));
	// Selects con datos en id
	$select_consecutivo = mysqli_real_escape_string($conn, (strip_tags($_POST['select_consecutivo'], ENT_QUOTES)));
	$select_tipo = mysqli_real_escape_string($conn, (strip_tags($_POST['select_tipo'], ENT_QUOTES)));
	$select_proceso = mysqli_real_escape_string($conn, (strip_tags($_POST['select_proceso'], ENT_QUOTES)));
	// Datos que componen el documento.
    $nombre    = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
    $sistema  = mysqli_real_escape_string($conn, (strip_tags($_POST['sistema'], ENT_QUOTES)));
    $codigo  = mysqli_real_escape_string($conn, (strip_tags($_POST['codigo'], ENT_QUOTES)));
    $version  = mysqli_real_escape_string($conn, (strip_tags($_POST['version'], ENT_QUOTES)));
    $origen   = mysqli_real_escape_string($conn, (strip_tags($_POST['origen'], ENT_QUOTES)));
    $aprobacion   = mysqli_real_escape_string($conn, (strip_tags($_POST['aprobacion'], ENT_QUOTES)));
    $u_fisica   = mysqli_real_escape_string($conn, (strip_tags($_POST['u_fisica'], ENT_QUOTES)));
    $u_digital   = mysqli_real_escape_string($conn, (strip_tags($_POST['u_digital'], ENT_QUOTES)));
    $estado   = mysqli_real_escape_string($conn, (strip_tags($_POST['estado'], ENT_QUOTES)));
    $revisado = mysqli_real_escape_string($conn, (strip_tags($_POST['revisado'], ENT_QUOTES)));
    $actualizado = mysqli_real_escape_string($conn, (strip_tags($_POST['actualizado'], ENT_QUOTES)));
    $vigente_desde = mysqli_real_escape_string($conn, (strip_tags($_POST['vigente_desde'], ENT_QUOTES)));
    $personaE   = mysqli_real_escape_string($conn, (strip_tags($_POST['personaE'], ENT_QUOTES)));
    $personaA   = mysqli_real_escape_string($conn, (strip_tags($_POST['personaA'], ENT_QUOTES)));
    // Variables tiempo de retencion del documento.
	$tiempoR1 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempoR1'], ENT_QUOTES)));
	$tiempoR2 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempoR2'], ENT_QUOTES)));
	// Documento.
    $archivo   = mysqli_real_escape_string($conn, (strip_tags($_FILES['archivo']['name'], ENT_QUOTES)));
    $documento_actual = mysqli_real_escape_string($conn, (strip_tags($_POST['documento_actual'], ENT_QUOTES)));

    // Adjuntar 0 a consecutivo
	$consecutivo = sprintf("%02d", $input_consecutivo);
	
	// Archivo php con datos de select.
	include '../editorCodigo.php';

	// Query datos que componen el codigo del documento.
	$selectQuery = mysqli_query($conn, "SELECT codigo, proceso, tipo, consecutivo FROM documentos_obsoletos WHERE id='$id' AND id_documento='$id_documento'") or die (mysqli_error($conn));
	$queryCodigo = mysqli_fetch_array($selectQuery);

	// Generar codigo.
	if ($input_proceso != '' || $input_tipo != '' || $consecutivo != '') {
		// Verificar si algunos campos que componen el codigo no se han diligenciado, entonces la variable tendra el valor de lo almacenado en bd.
		if ($input_proceso == '') {
			$queryProceso = $queryCodigo['proceso'];
			// PHP con comprobador.
			include '../comprobadores/compProceso.php';
			$proceso = $queryProceso;

		}
		if ($input_tipo == '') {
			$queryTipo = $queryCodigo['tipo'];
			// PHP con comprobador.
			include '../comprobadores/compTipo.php';
			$tipo = $queryTipo;
		}
		if ($consecutivo == '' || $input_consecutivo == '') {
			$consecutivo = $queryCodigo['consecutivo'];
		}
		$codigo = $input_proceso . '-' . $input_tipo . '-' . $consecutivo;
		$updateCodigo = mysqli_query($conn, "UPDATE documentos_obsoletos SET codigo='$codigo', proceso='$proceso', tipo='$tipo', consecutivo='$consecutivo' WHERE id='$id' AND id_documento='$id_documento'") or die(mysqli_error($conn));
	}

    $path = "../oldfiles/" . $archivo;
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    // comprobar archivo nuevo
    if ($archivo == '') {
        $archivo = $documento_actual;
        // Update - Actualizacion
        $update = mysqli_query($conn, "UPDATE documentos_obsoletos SET nombre='$nombre', sistema='$sistema', version='$version', origen='$origen', aprobacion='$aprobacion', u_fisica='$u_fisica', u_digital='$u_digital', estado='$estado', vigente_desde='$vigente_desde', actualizado='$actualizado', revisado='$revisado', personaE='$personaE', personaA='$personaA', tiempo_r1='$tiempoR1', tiempo_r2='$tiempoR2', archivo='$archivo' WHERE id='$id' AND id_documento='$id_documento'") or die(mysqli_error($conn));
    } else {
        unlink('../oldfiles/' . $documento_actual);
        if ($_FILES['archivo']['error'] > 0) {
            echo "<script>alert('Error inesperado al subir el archivo');  window.location = 'old_editar.php?id=$id'</script>";
        } else {
            $limite_kb = 500;
            if ($_FILES["archivo"]["size"] <= ($limite_kb * 1024)) {
                if ($extension == 'docx' || $extension == 'pptx' || $extension == 'xls' || $extension == 'xlsx' || $extension == 'pdf' || $extension == 'jpeg' || $extension == 'jpg' || $extension == 'png') {
                    $ruta = "../oldfiles/";
                    move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta . $archivo);
                     // Update - Actualizacion
                    $update = mysqli_query($conn, "UPDATE documentos_obsoletos SET nombre='$nombre', sistema='$sistema', version='$version', origen='$origen', aprobacion='$aprobacion', u_fisica='$u_fisica', u_digital='$u_digital', estado='$estado', vigente_desde='$vigente_desde', actualizado='$actualizado', revisado='$revisado', personaE='$personaE', personaA='$personaA', tiempo_r1='$tiempoR1', tiempo_r2='$tiempoR2', archivo='$archivo' WHERE id='$id' AND id_documento='$id_documento'") or die(mysqli_error($conn));
                } else {
                    echo "<script>alert('El documento pesa mas de 500MB o no es del tipo WORD, EXCEL, PDF, POWER POINT, JPEG, PNG'); window.location = 'registro.php'</script>";
                }
            }
        }
    }
    if ($update){
		echo "<script>alert('Se han actualizado los datos satisfactoriamente'); window.location = 'old_editar.php?id=$id'</script>";
	} else {
		echo "<script>alert('Error al actualizar datos'); window.location = 'old_editar.php?id=$id'</script>";
	}
}
