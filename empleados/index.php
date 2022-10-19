
<?php
include ("../login/userRestrintion.php");
include ("../include/conn/conn.php")
?>
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
        <div class="panel-heading">
            <p class="h3"><i class="bi bi-person-fill"></i> Base de Datos de Empleados EXFOR S.A.S</p>
        </div>
        <br>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <center><strong>¡Hola!</strong> Asegúrate de que la información que estas diligenciando esté
                actualizada hasta la fecha, en tal caso de que se requiera modificar la información en otro
                momento, puedes hacerlo al darle clic en el botón <i class="bi bi-pencil-fill"></i> o en el botón "Editar
                Información" en la visualización del empleado <i class="bi bi-search"></i> . <strong>¡Muchas
                    Gracias!</strong></center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        if (isset($_GET['action']) == 'delete') {
            $id_delete = intval($_GET['id']);
            $query = mysqli_query($conn, "SELECT * FROM clientes WHERE id='$id_delete'");
            if (mysqli_num_rows($query) == 0) {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            } else {
                $delete = mysqli_query($conn, "DELETE FROM clientes WHERE id='$id_delete'");
                if ($delete) {
                    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                }
            }
        }
        ?>
        <?php
        $sql_cantidadEmpleados = mysqli_query($conn, "SELECT
                                                    COUNT(IF(estado like 1 and nucleo like 1, estado, null)) as activoSantaRosa,
                                                    COUNT(IF(estado like 2 and nucleo like 1, estado, null)) as inactivoSantaRosa,
                                                    COUNT(IF(estado like 1 and nucleo like 2, estado, null)) as activoQuindio,
                                                    COUNT(IF(estado like 2 and nucleo like 2, estado, null)) as inactivoQuindio,
                                                    COUNT(IF(estado like 1 and nucleo like 3, estado, null)) as activoRiosucio,
                                                    COUNT(IF(estado like 2 and nucleo like 3, estado, null)) as inactivoRiosucio
                                                    FROM clientes;");
        if (mysqli_num_rows($sql_cantidadEmpleados) == 0) {
            echo '<div class="alert alert-danger alert-dismissable">&nbsp; Error 404 apartado no encontrado &nbsp;<a href="index.php"  class="btn btn-outline-danger" data-dismiss="alert" aria-hidden="true">Volver al menú principal &times;</a></div>';
        } else {
            $row_cant = mysqli_fetch_assoc($sql_cantidadEmpleados);
        }
        ?>

        <div class="panel panel-default">

            <div class="panel-body">
                <div class="d-inline-flex p-2 bd-highlight">
                    <a href="registro.php" class="btn btn-sm btn-success"> <i class="bi bi-person-plus-fill"></i>
                        Registrar nuevo empleado</a>&nbsp;
                    <a onclick="loadDataDotacion()" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#regDotacion"> <i class="bi bi-person-fill"></i>
                        Dotación</a>&nbsp;
                    <a href="../Ausentismo/index.php" class="btn btn-sm btn-success"> <i class="bi bi-heart-fill"></i>
                        Ausentismo</a>&nbsp;
                    <button class="btn btn-sm btn-success" data-bs-toggle="collapse" href="#collapseTotalEmpleados" role="button" aria-expanded="false" aria-controls="collapseTotalEmpleados">
                        Total de empleados <span class="badge rounded-pill bg-primary"><?php
                                                                                        $consulta = mysqli_query($conn, "SELECT COUNT(id) AS total FROM clientes");
                                                                                        $resultado = mysqli_fetch_array($consulta);
                                                                                        echo $resultado['total'];
                                                                                        ?></span>
                    </button>&nbsp;
                    <a class="btn btn-sm btn-success" data-bs-toggle="collapse" href="#collapseIncapacidades" role="button" aria-expanded="false" aria-controls="collapseIncapacidades">
                        Alerta incapacidades <span class="badge rounded-pill bg-danger"><?php
                                                                                        $sql = mysqli_query($conn, "SELECT nombres,cedula,cargo,nucleo, sum(dias_ausentismo) as 'dias' FROM ausentismo GROUP BY nombres, cedula, cargo, nucleo");
                                                                                        $cont = 0;
                                                                                        while ($rowCont = mysqli_fetch_assoc($sql)) {
                                                                                            if ($rowCont['dias'] >= 145 && $rowCont['dias'] <= 500) {
                                                                                                $cont++;
                                                                                            }
                                                                                        }
                                                                                        echo $cont;
                                                                                        ?></span>
                    </a>&nbsp;
                    <a onclick="loadDataTarea('bi bi-book',' Tareas','empleados')" class="btn btn-sm btn-success" href="" data-bs-toggle="modal" data-bs-target="#mimodal">
                        <i class="bi bi-book-fill"></i> Tareas</a>&nbsp;
                    <a href="excelCumpleaños.php" class="btn btn-sm btn-success">
                        <i class="bi bi-file-text-fill"></i> Cumpleaños</a>
                </div>
                <!-- total empleados -->
                <div class="collapse" id="collapseTotalEmpleados">
                    <div class="card card-body">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <center><strong>Recordatorio:</strong> Este es el total de empleados activos e inactivos de
                                EXFOR SAS en los diferentes núcleos, los datos son los que están actualmente en las bases de datos.
                                Tener en cuenta el registro del personal nuevo y a qué nucleo asignarlo.
                                <strong>¡Muchas Gracias!</strong>.
                            </center>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- tabla de cantidad empleados -->
                        <div class="table-responsive">
                            <table class="table table-bordered border-dark table-striped text-center">
                                <caption>Total de empleados, <?php
                                                                echo $row_cant['activoSantaRosa'] +
                                                                    $row_cant['activoRiosucio'] +
                                                                    $row_cant['activoQuindio']; ?>
                                    empleados activos y <?php
                                                        echo $row_cant['inactivoSantaRosa'] +
                                                            $row_cant['inactivoRiosucio'] +
                                                            $row_cant['inactivoQuindio']; ?>
                                    empleados inactivos actualmente.
                                </caption>
                                <thead>
                                    <tr class="table-primary border-dark">
                                        <!--   border-info -->
                                        <th scope="col">Estado</th>
                                        <th scope="col">Santa Rosa <span class="badge bg-primary">SR</span></th>
                                        <th scope="col">Riosucio <span class="badge bg-info">RS</span></th>
                                        <th scope="col">Quindío <span class="badge bg-success">QD</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Activos</th>
                                        <td><?php echo $row_cant['activoSantaRosa']; ?></td>
                                        <td><?php echo $row_cant['activoRiosucio']; ?></td>
                                        <td><?php echo $row_cant['activoQuindio']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">inactivos</th>
                                        <td><?php echo $row_cant['inactivoSantaRosa']; ?></td>
                                        <td><?php echo $row_cant['inactivoRiosucio']; ?></td>
                                        <td><?php echo $row_cant['inactivoQuindio']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Incapacidades -->
                <div class="collapse" id="collapseIncapacidades">
                    <div class="card card-body">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <center><strong>¡Hola! Aquí se encuentran los empleados que están cumpliendo entre
                                    145 y 180 días de incapacidad</strong></center>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="table-responsive">
                            <table id="table1" class="table table-bordered border-dark table-striped text-center">
                                <thead>
                                    <hr>
                                    <tr class="table-danger border-dark">
                                        <th>Apellidos y Nombres</th>
                                        <th>Cédula</th>
                                        <th>Cargo</th>
                                        <th>Núcleo</th>
                                        <th>Dias totales</th>
                                    </tr>
                                </thead>
                                <tbody class="Empleados">
                                    <?php
                                    $sql1 = mysqli_query($conn, "SELECT nombres,cedula,cargo,nucleo, sum(dias_ausentismo) as 'dias' FROM ausentismo GROUP BY nombres, cedula, cargo, nucleo");
                                    while ($row = mysqli_fetch_assoc($sql1)) {
                                        if ($row['dias'] >= 145 && $row['dias'] <= 500) {
                                            echo    '<tr>
                                                        <td>' . $row['nombres'] . '</td>
                                                        <td>' . $row['cedula'] . '</td>
                                                        <td>' . $cargos[$row["cargo"]] . '</td>
                                                        <td>' . $nucleosEmpleado[$row["nucleo"]] . '</td>
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
                    <table id="table" class="table table-bordered border-dark table-striped text-center">
                        <thead>
                            <hr>
                            <tr class="table-success border-dark">
                                <th style="width: 5%;";>Cédula</th>
                                <th style="width: 20%;">Apellidos y Nombres</th>
                                <th style="width: 10%;">Cargo</th>
                                <th style="width: 10%;">Eps</th>
                                <th style="width: 3%;">Núcleo</th>
                                <th style="width: 8%;">Fecha</th>
                                <th style="width: 3%;">Estado</th>
                                <th style="width: 15%;">Acciones</th>
                            </tr>

                        </thead>
                        <tbody class="Empleados">
                            <?php include_once 'empleados.php' ?>
                        </tbody>
                    </table>
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
    </div>
    <script>
        function loadDataDotacion() {
            $(".modal-body").load("entregaDotacion.php", function() {
                $("#regDotacion").modal({
                    show: true
                });
            });
        }
    </script>
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

</body>

<!-- Ordenar tabla por ascendente por la columna Apellidos y Nombres -->
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "order": [
                [1, "asc"]
            ],
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
                }
            }
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>

</html>