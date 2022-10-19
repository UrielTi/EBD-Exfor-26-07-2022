<?php
include("../login/userRestrintion.php");
include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("head.php");
    include("../cond/todo.php"); ?>
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
            $query = mysqli_query($conn, "SELECT * FROM ausentismo WHERE id='$id_delete'");
            if (mysqli_num_rows($query) == 0) {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            } else {
                $delete = mysqli_query($conn, "DELETE FROM ausentismo WHERE id='$id_delete'");
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
                    Ausentismos</h4>
            </div>

            <div class="panel-body">
                <div class="justify-content-end">
                    <a href="registro.php" class="btn btn-sm btn-success"><i class="bi bi-plus-circle-fill"></i>
                        Registrar ausentismo</a>
                    <a href="../index.php" class="btn btn-sm btn-success"><i class="bi bi-person-fill"></i> Base
                        de datos</a>
                    <a href="../graficas/graficaAusentismo.php" class="btn btn-sm btn-success"><i class="bi bi-graph-up"></i> Ver
                        graficas</a>
                    <a class="btn btn-sm btn-success" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Alerta de dias <span class="badge bg-danger"><?php
                                                                        $sql = mysqli_query($conn, "SELECT nombres,cedula,cargo,nucleo, dx, diagnostico, sum(dias_ausentismo) as 'dias' FROM ausentismo GROUP BY nombres, cedula, cargo, nucleo, dx, diagnostico");
                                                                        $cont = 0;
                                                                        while ($rowCont = mysqli_fetch_assoc($sql)) {
                                                                            if ($rowCont['dias'] >= 30) {
                                                                                $cont++;
                                                                            }
                                                                        }
                                                                        echo $cont;
                                                                        ?></span>
                    </a>
                    <a class="btn btn-sm btn-success" href="../accidentes/index.php"><i class="bi bi-droplet-fill"></i> Accidentes</a>
                    <a class="btn btn-sm btn-success" href="../incidentes/index.php"><i class="bi bi-droplet-half"></i> Incidentes</a>
                    <a onclick="loadDataTarea('bi bi-book',' Tareas','ausentismo')" class="btn btn-sm btn-success" href="" data-bs-toggle="modal" data-bs-target="#mimodal">
                        <i class="bi bi-book-fill"></i> Tareas</a>
                </div><br>

                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="alert alert-danger" role="alert">
                            <center><strong>¡Hola! Aquí se encuentran los empleados que están cumpliendo mas de 30 días de incapacidad</strong></center>
                        </div>
                        <div class="table-responsive">
                            <table id="table1" class="table table-bordered border-success table-striped text-center">
                                <thead>
                                    <hr>
                                    <tr>
                                        <th class="w-25">Nombres</th>
                                        <th>Cédula</th>
                                        <th>Cargo</th>
                                        <th>Nucleo</th>
                                        <th>Codigo del diagnostico</th>
                                        <th>Diagnostico</th>
                                        <th>Dias totales</th>
                                    </tr>

                                </thead>
                                <tbody class="dias">
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT nombres,cedula,cargo,nucleo, dx, diagnostico, sum(dias_ausentismo) as 'dias' FROM ausentismo GROUP BY nombres, cedula, cargo, nucleo, dx, diagnostico");
                                    while ($row = mysqli_fetch_assoc($sql)) {
                                        if ($row['dias'] >= 30) {
                                            echo '
                                                    <tr>
                                                        <td>' . $row['nombres'] . '</td>
                                                        <td>' . $row['cedula'] . '</td>
                                                        <td>' . $cargos[$row["cargo"]] . '</td>
                                                        <td>' . $nucleosEmpleado[$row["nucleo"]] . '</td>
                                                        <td>' . $row['dx'] . '</td>
                                                        <td>' . $row["diagnostico"] . '</td>
                                                        <td>' . $row["dias"] . '</td>
                                                    </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="table-responsive">
                    <table id="table" class="table table-bordered border-success table-striped text-center">
                        <thead>
                            <hr>
                            <tr>
                                <th>ID</th>
                                <th class="w-25">Nombres</th>
                                <th>Cédula</th>
                                <th>Dias Incapacidad</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="Ausentismos">
                            <?php include_once 'ausentismo.php' ?>
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
                        $('#table1').DataTable({
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