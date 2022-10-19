<?php
if (isset($_POST['postid'])) {
    $cedula =  mysqli_real_escape_string($conn, (strip_tags($_POST['cedula'], ENT_QUOTES)));
    $consultaId = mysqli_query($conn, "SELECT id FROM clientes WHERE cedula = '$cedula'") or die(mysqli_error($conn));
    
    if (($resultId = mysqli_fetch_assoc($consultaId))!= NULL) {
        $id = $resultId['id'];
        echo "<script>window.location = 'registro.php?id=$id'</script>";

    } else {
        echo "<script>alert('No se ha encontrado al empleado'); window.location = 'registro.php'</script>";
    }
}
?>