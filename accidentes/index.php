<?php include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("head.php"); ?>
</head>

<body>
    <?php include("../include/navegacion/nav.php"); ?>

    <div class="container-fluid border border-success bg-light">
        <hr>
        <div class="alert alert-success" role="alert">
            <center><strong>¡Hola!</strong> Asegúrate que la información que estas diligenciando esté
                actualizada hasta la fecha, en cualquier caso si necesitas modificar algún dato en otro
                momento puedes hacerlo con el botón <i class="bi bi-pencil-fill"></i> o en "Editar
                Información" en la visualización del empleado <i class="bi bi-search"></i> , <strong>¡Muchas
                    Gracias!</strong></center>
        </div>
        <hr>
        <?php
            if (isset($_GET['action']) == 'delete') {
                $id_delete = intval($_GET['id']);
                $query = mysqli_query($conn, "SELECT * FROM accidentes WHERE id='$id_delete'");
                if (mysqli_num_rows($query) == 0) {
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
                } else {
                    $delete = mysqli_query($conn, "DELETE FROM accidentes WHERE id='$id_delete'");
                    if ($delete) {
                        echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                    }
                }
            }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-heart-fill"></i> Base de datos
                    Accidentes</h4>
            </div>

            <div class="panel-body">
                <div class="justify-content-end">
                    <a href="registro.php" class="btn btn-sm btn-success"><i class="bi bi-plus-circle-fill"></i>
                        Registrar accidentes</a>
                    <a href="../index.php" class="btn btn-sm btn-success"><i class="bi bi-person-fill"></i> Base
                        de datos</a>
                    <a href="../graficas/graficaAccidentes.php" class="btn btn-sm btn-success"><i class="bi bi-graph-up"></i> Ver
                        graficas</a>
                    <a class="btn btn-sm btn-success" href="../Ausentismo/index.php"><i class="bi bi-calendar2-week-fill"></i> Ausentismo</a>
                    <a class="btn btn-sm btn-success" href="../incidentes/index.php"><i class="bi bi-droplet-half"></i> Incidentes</a>
                    <a onclick="loadDataTarea('bi bi-book',' Tareas','accidentes')" class="btn btn-sm btn-success" href="" data-bs-toggle="modal" data-bs-target="#mimodal">
                        <i class="bi bi-book-fill"></i> Tareas</a>
                </div><br>

                <div class="table-responsive">
                    <table id="table" class="table table-bordered border-success table-striped text-center">
                        <thead>
                            <hr>
                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Cédula</th>
                                <th>Evento</th>
                                <th>Lugar</th>
                                <th>Parte afectada</th>
                                <th>Dias de incapacidad</th>
                                <th>Fecha evento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="Ausentismos">
                            <?php include_once 'accidentes.php' ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy;
                                Servicios Forestales </b></center>
                    </div>
                </div>
                <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js">
                </script>
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
                <script>
                $(document).ready(function() {
                    $('#table').DataTable({
                        "language": {
                            "sProcessing": "Procesando...",
                            "sLengthMenu": "Mostrar _MENU_ registros",
                            "sZeroRecords": "No se encontraron resultados",
                            "sEmptyTable": "Ningún dato disponible en esta tabla",
                            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix": "",
                            "sSearch": "Buscar:",
                            "sUrl": "",
                            "sInfoThousands": ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst": "Primero",
                                "sLast": "Último",
                                "sNext": "Siguiente",
                                "sPrevious": "Anterior"
                            },

                        }
                    });
                });
                </script>

</body>

</html>