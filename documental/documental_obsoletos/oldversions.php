<?php
session_start();
include "../../include/conn/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <?php include("headOld.php"); ?>
    </head>

<body>

    <div class="container-fluid border border-success bg-light">
        <hr>
        <div class="alert alert-success" role="alert">
            <center><strong>¡Hola!</strong> En este apartado se almacenan las versiones obsoletas de un documento, asegurate de mantener actualizado dichas versiones <strong>¡Muchas Gracias!</strong></center>
        </div>
        <?php
        $id = intval($_GET['id']);
        $sql_actual = mysqli_query($conn, "SELECT * FROM documentos WHERE id='$id'");
        if (mysqli_num_rows($sql_actual) == 0) {
            echo '<div class="alert alert-danger alert-dismissable">&nbsp; Error 404 apartado no encontrado &nbsp;<a href="index.php"  class="btn btn-outline-danger" data-dismiss="alert" aria-hidden="true">Volver al menú principal &times;</a></div>';
        } else {
            $row_actual = mysqli_fetch_assoc($sql_actual);
            $banner = $row_actual['nombre'];
            $v = (int)$row_actual['version'];
        }

        if (isset($_GET['action']) == 'delete') {
            $id_delete = intval($_GET['id']);
            $query = mysqli_query($conn, "SELECT * FROM documentos_obsoletos WHERE id='$id_delete'");
            if (mysqli_num_rows($query) == 0) {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            } else {
                $sql_delete = mysqli_query($conn, "SELECT * FROM documentos_obsoletos WHERE id='$id_delete'");
                $row_delete = mysqli_fetch_assoc($sql_delete);
                $id_documento = $row_delete['id_documento'];
                $archivo_bd = $row_delete['archivo'];
                unlink('oldfiles/' . $archivo_bd);

                $delete = mysqli_query($conn, "DELETE FROM documentos_obsoletos WHERE id='$id_delete'");
                if ($delete) {
                    echo "<script>alert('Se ha eliminado el documento antiguo'); window.location = 'oldversions.php?id=$id_documento'</script>";
                } else {
                    echo "<script>alert('NO se ha podido eliminar el documento antiguo'); window.location = 'oldversions.php?id=$id_documento'</script>";
                }
            }
        }
        ?>
        <hr>
        <div class="input-group shadow-sm">
            <a href="../index.php" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Regresar al Documental</a>
        </div>
        <div class="panel panel-default p-3 mb-2 bg-light text-dark">
            <div class="panel-heading">
                <p class="h3"><i class="bi bi-clipboard2-fill"></i> Versiones obsoletas del documento: <small class="text-success"><?php echo $banner; ?> V<?php echo $v; ?></small></p>
            </div>
            <br>
            <div class="card border-success mb-3 content-center" style="width: 100%;">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h5 class="card-title text-success">Documento Vigente</h5>
                    </div>
                    <div class="d-flex justify-content-center">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-success"> Nombre:</li>
                            <li class="list-group-item list-group-item-secondary"><?php echo $row_actual['nombre']; ?></li>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-success">Código:</li>
                            <li class="list-group-item list-group-item-secondary"><?php echo $row_actual['codigo']; ?></li>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-success">Versión:</li>
                            <li class="list-group-item list-group-item-secondary"><?php echo $row_actual['version']; ?></li>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-success">Vigente desde:</li>
                            <li class="list-group-item list-group-item-secondary"><?php echo $row_actual['vigente_desde'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-start">
                <a onclick="loadId('oldregistro.php?id=','<?php echo $id; ?>')" class="btn btn-success btn-sm"> <i class="bi bi-clipboard2-plus-fill"></i>
                    Registrar versión obsoleta</a>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="table" class="table table-bordered border-success table-striped text-center">
                <thead>
                    <tr>
                        <th>Versión</th>
                        <th>Codigo</th>
                        <th class="w-25">Nombre del documento</th>
                        <th>Tipo</th>
                        <th>Origen</th>
                        <th>Actualizado</th>
                        <th>Revisado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="Empleados">
                    <?php include_once 'old_documental.php' ?>
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <div class="card-footer">
        <div class="container">
            <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy;
                    Servicios Forestales </b></center>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable({});
        });
    </script>
</body>

</html>