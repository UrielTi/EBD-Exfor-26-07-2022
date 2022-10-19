<?php
include("../login/userRestrintion.php");
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
        <hr>
        <?php
        if (isset($_GET['action']) == 'delete') {
            $id_delete = intval($_GET['id']);
            $query = mysqli_query($conn, "SELECT * FROM documentos WHERE id='$id_delete'");
            if (mysqli_num_rows($query) == 0) {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            } else {
                $sql = mysqli_query($conn, "SELECT * FROM documentos WHERE id='$id_delete'");
                $row = mysqli_fetch_assoc($sql);
                $archivo_bd = $row['archivo'];
                unlink('files/' . $archivo_bd);

                $delete = mysqli_query($conn, "DELETE FROM documentos WHERE id='$id_delete'");
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
                <p class="h3"><i class="bi bi-file-earmark-text-fill"></i> Listado Maestro de Documentos EXFOR S.A.S</p>
            </div>
            <br>
            <div class="panel-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <center><strong>¡Hola!</strong> Asegúrate que la información que estas diligenciando esté
                        actualizada hasta la fecha y el archivo se encuentre sin errores, en cualquier caso si
                        necesitas modificar o actualizar la información del documento, puedes hacerlo
                        con el botón <i class="bi bi-pencil-fill"></i> o en "Editar
                        Información" en la "Visualización información" <i class="bi bi-search"></i>.</center>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <center><strong>Recordatorio: </strong>Si desea modificar algún FORMATO del Listado Maestro
                        comuníquese directamente con nuestro Gestor de Riesgo, si quieres saber más da click en
                        el botón "<i class="bi bi-info-lg"></i> Control de documentos",
                        <strong>¡Muchas Gracias!</strong>.
                    </center>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="d-inline-flex p-2 bd-highlight">
                    <button type="button" onclick="loadPage('../documental/registro.php')" class="btn btn-success btn-sm" <?php $echo = $_SESSION['tipo'] == 'sst' || $_SESSION['tipo'] == 'sena' ? 'disabled' : '';
                                                                                                                            echo $echo; ?> aria-label="Close"><i class="bi bi-file-earmark-plus-fill"></i>
                        Cargar documento</button>&nbsp;
                    <a onclick="loadDataDocumental('bi bi-file-zip-fill','PROCEDIMIENTO CONTROL DE DOCUMENTOS','control_procedimiento','v8')" class="btn btn-success btn-sm" href="" data-bs-toggle="modal" data-bs-target="#viewDocumental"><i class="bi bi-info-lg"></i>
                        Control de documentos</a>&nbsp;
                    <a onclick="loadDataTarea('bi bi-book',' Tareas','documental')" class="btn btn-success btn-sm" href="" data-bs-toggle="modal" data-bs-target="#viewDocumental">
                        <i class="bbi bi-book-fill"></i>
                        Tareas</a>
                </div>
                <br>
                <div class="table-responsive">
                    <table id="table" class="table table-bordered border-success table-striped text-center">
                        <thead>
                            <hr>
                            <tr>
                                <th>Código</th>
                                <th>Versión</th>
                                <th class="w-25">Nombre del documento</th>
                                <th>Tipo</th>
                                <th>Origen</th>
                                <th>Actualizado</th>
                                <th>Revisado</th>
                                <!-- <th>Obsoleto</th> -->
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="Empleados">
                            <?php include_once 'documental.php' ?>
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
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>
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
                        }
                    }
                })
            });
            $('.dataTables_length').addClass('bs-select');
        </script>
</body>

</html>