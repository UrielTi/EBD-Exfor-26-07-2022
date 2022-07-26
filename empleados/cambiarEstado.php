<?php
// Identificar por usuario correctamente y generaar cambio.
include "../include/conn/conn.php";
$id = $_GET['id'];
$sql_con = mysqli_query($conn, "SELECT id, estado FROM clientes WHERE id='$id'");
while ($cola = mysqli_fetch_assoc($sql_con)) {
    if (isset($_GET['cambio']) && $_GET['cambio'] == 'activo') {
        if ($cola['estado'] = 1) {
            $update_estado = mysqli_query($conn, "UPDATE clientes SET estado=2 WHERE id='" . $cola['id'] . "'");
        }
        $sql_fecha_salida = mysqli_query($conn, "SELECT fecha_salida FROM clientes WHERE id='" . $cola['id'] . "'");
        while ($salida = mysqli_fetch_assoc($sql_fecha_salida)) {
            if ($salida['fecha_salida'] == '0101-01-01') {
                $fecha = date('Y-m-d');
                $update_fecha = mysqli_query($conn, "UPDATE clientes SET fecha_salida='$fecha' WHERE id='" . $cola['id'] . "'");
            } else {
                echo "<script> window.location = 'index.php'</script>";
            }
        }
    } else if (isset($_GET['cambio']) && $_GET['cambio'] == 'inactivo') {
        if ($cola['estado'] = 2) {
            $update_estado = mysqli_query($conn, "UPDATE clientes SET estado=1 WHERE id='" . $cola['id'] . "'");
        }
    }
    if ($update_estado) {
        echo "<script> window.location = 'index.php'</script>";
    } else {
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="btn-close" aria-label="Close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, No se pudo cambiar estado</div>';
    } ?>
<?php }
?>