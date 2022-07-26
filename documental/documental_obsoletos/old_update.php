<?php
include "../../include/conn/conn.php";
if (isset($_POST['update'])) {
    $id_documento = mysqli_real_escape_string($conn, (strip_tags($_POST['id_documento'], ENT_QUOTES)));
    $id = intval($_POST['id']);
    $nombre    = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
    $sistema  = mysqli_real_escape_string($conn, (strip_tags($_POST['sistema'], ENT_QUOTES)));
    $codigo  = mysqli_real_escape_string($conn, (strip_tags($_POST['codigo'], ENT_QUOTES)));
    $version  = mysqli_real_escape_string($conn, (strip_tags($_POST['version'], ENT_QUOTES)));
    $origen   = mysqli_real_escape_string($conn, (strip_tags($_POST['origen'], ENT_QUOTES)));
    $tipo   = mysqli_real_escape_string($conn, (strip_tags($_POST['tipo'], ENT_QUOTES)));
    $aprobacion   = mysqli_real_escape_string($conn, (strip_tags($_POST['aprobacion'], ENT_QUOTES)));
    $u_fisica   = mysqli_real_escape_string($conn, (strip_tags($_POST['u_fisica'], ENT_QUOTES)));
    $u_digital   = mysqli_real_escape_string($conn, (strip_tags($_POST['u_digital'], ENT_QUOTES)));
    $proceso   = mysqli_real_escape_string($conn, (strip_tags($_POST['proceso'], ENT_QUOTES)));
    $estado   = mysqli_real_escape_string($conn, (strip_tags($_POST['estado'], ENT_QUOTES)));
    $revisado = mysqli_real_escape_string($conn, (strip_tags($_POST['revisado'], ENT_QUOTES)));
    $actualizado = mysqli_real_escape_string($conn, (strip_tags($_POST['actualizado'], ENT_QUOTES)));
    $vigente_desde = mysqli_real_escape_string($conn, (strip_tags($_POST['vigente_desde'], ENT_QUOTES)));
    $personaE   = mysqli_real_escape_string($conn, (strip_tags($_POST['personaE'], ENT_QUOTES)));
    $personaA   = mysqli_real_escape_string($conn, (strip_tags($_POST['personaA'], ENT_QUOTES)));
    $archivo   = mysqli_real_escape_string($conn, (strip_tags($_FILES['archivo']['name'], ENT_QUOTES)));
    $documento_actual = mysqli_real_escape_string($conn, (strip_tags($_POST['documento_actual'], ENT_QUOTES)));

    $path = "../oldfiles/" . $archivo;
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    // comprobar archivo nuevo
    if ($archivo == '') {
        $archivo = $documento_actual;
        // Update - Actualizacion
        $update = mysqli_query($conn, "UPDATE documentos_obsoletos SET nombre='$nombre', sistema='$sistema', codigo='$codigo', version='$version', origen='$origen', tipo='$tipo', aprobacion='$aprobacion', u_fisica='$u_fisica', u_digital='$u_digital', proceso='$proceso', estado='$estado', vigente_desde='$vigente_desde', actualizado='$actualizado', revisado='$revisado', personaE='$personaE', personaA='$personaA', archivo='$archivo' WHERE id='$id'") or die(mysqli_error($conn));
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
                    $update = mysqli_query($conn, "UPDATE documentos_obsoletos SET nombre='$nombre', sistema='$sistema', codigo='$codigo', version='$version', origen='$origen', tipo='$tipo', aprobacion='$aprobacion', u_fisica='$u_fisica', u_digital='$u_digital', proceso='$proceso', estado='$estado', vigente_desde='$vigente_desde', actualizado='$actualizado', revisado='$revisado', personaE='$personaE', personaA='$personaA', archivo='$archivo' WHERE id='$id'") or die(mysqli_error($conn));
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
