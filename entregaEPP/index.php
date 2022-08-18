<?php
session_start();
include "../include/conn/conn.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("head.php"); ?>
</head>

<body>
    <?php include("../include/navegacion/nav.php"); ?>

    <div class="container-fluid border border-success bg-light">
        <?php
        if (isset($_GET['action']) == 'delete') {
            $id_delete = intval($_GET['id']);
            $query = mysqli_query($conn, "SELECT * FROM entrega_epp WHERE id='$id_delete'");
            if (mysqli_num_rows($query) == 0) {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            } else {
                $sql = mysqli_query($conn, "SELECT * FROM entrega_epp WHERE id='$id_delete'");

                $delete = mysqli_query($conn, "DELETE FROM entrega_epp WHERE id='$id_delete'");
                if ($delete) {
                    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                }
            }
        }
        ?>
        <hr>
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="h3"><i class="bi bi-journal-text"></i>&nbsp; Entregas de EPP EXFOR S.A.S</p>
            </div>
            <br>

            <div class="panel-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <center><strong>¡Hola!</strong> Asegúrate que la información que estas diligenciando esté
                        actualizada hasta la fecha, en cualquier caso si necesitas modificar algún dato en otro
                        momento puedes hacerlo con el botón <i class="bi bi-pencil-fill"></i> o en "Editar
                        Información" en la visualización del empleado <i class="bi bi-search"></i> , <strong>¡Muchas
                            Gracias!</strong></center>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="d-flex align-items-center">
                    <a href="registro.php" class="btn btn-sm btn-success"><i class="bi bi-journal-plus"></i> Generar Entrega</a>&nbsp;

                    <a href="../graficas/graficaEntregaEpp.php" class="btn btn-sm btn-success"> <i class="bi bi-person-plus-fill"></i> Ver
                        Grafica de Entregas de elemento</a>&nbsp;

                    <form name="form2" id="form2" class="form-horizontal row-fluid" action="index.php" method="POST" enctype="multipart/form-data">
                        <button type="submit" name="load_pendientes" id="load_pendientes" class="btn btn-sm btn-success"><i class="bi bi-shield-exclamation"></i> Mostrar Pendientes </button>&nbsp;
                    </form>

                    <a onclick="loadDataTarea('bi bi-book',' Tareas','entregaEpp')" class="btn btn-sm btn-success" href="" data-bs-toggle="modal" data-bs-target="#mimodal">
                        <i class="bi bi-book-fill"></i> Tareas</a>&nbsp;
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="table" class="table table-bordered border-dark table-striped text-center table-hover">
                        <thead>
                            <tr class="table-success border-dark">
                                <th>Empleado</th>
                                <th>Cédula</th>
                                <th>Fecha de Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include_once 'tabla-entrega-epp.php' ?>
                        </tbody>
                    </table>
                    <div class="modal fade" id="mimodal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="titulo" class="panel-title"></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="bi bi-arrow-left"></i> Regresar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                $('#table').DataTable();
            });
        </script>
</body>

</html>