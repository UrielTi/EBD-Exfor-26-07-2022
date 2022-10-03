<?php
if (isset($_POST['documento'])) {
    $id_empleado = intval($_GET['id']);

    $archivo   =  mysqli_real_escape_string($conn, (strip_tags($_FILES['documento']['name'], ENT_QUOTES)));
    $path = "files/" . $archivo;
    $extension = pathinfo($path, PATHINFO_EXTENSION);

    if (is_file($path)) {
        echo "<script>alert('El documento ya existe con ese nombre... Cambia el nombre del documento y vuelve a intentarlo'); window.location = 'registro.php?id=$id_empleado'</script>";
    } else {
        if ($_FILES['archivo']['error'] > 0) {
            echo "<script>alert('Error inesperado al subir el archivo'); window.location = 'registro.php?id=$id_empleado'</script>";
        } else {
            $limite_kb = 500;
            if ($_FILES["archivo"]["size"] <= ($limite_kb * 1024)) {
                if ($extension == 'pdf') {
                    $ruta = "files/";
                    move_uploaded_file($_FILES["documento"]["tmp_name"], $ruta . $archivo);
                    $updateEntrega = mysqli_query($conn, "UPDATE entrega_epp SET estado='1', documento='$archivo' WHERE id_empleado='$id_empleado' AND estado=0") or die(mysqli_error($conn));
                    echo '<div class="alert alert-success alert-dismissable"><center>&nbsp; Se ha subido correctamente el documento diligenciado &nbsp;<button type="button" class="btn btn-outline-success" data-dismiss="alert" aria-hidden="true">Cerrar Ventana &times;</button></center></div>';
                } else {
                    echo "<script>alert('El documento pesa mas de 500MB o no es del tipo PDF'); window.location = 'registro.php?id=$id_empleado'</script>";
                }
            }
        }
    }
}
