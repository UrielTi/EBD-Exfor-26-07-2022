﻿<?php
include('../login/userRestrintion.php');
include('../include/conn/conn.php');
include('../cond/todo.php');
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
            $query = mysqli_query($conn, "SELECT id, imagen FROM epp WHERE id='$id_delete'");
            $rQ = mysqli_fetch_assoc($query);

            if (mysqli_num_rows($query) == 0) {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            } else {
                $delete = mysqli_query($conn, "DELETE FROM epp WHERE id='$id_delete'");
                $delete2 = mysqli_query($conn, "DELETE FROM elemento_tallas WHERE id_elemento='$id_delete'");

                if ($delete || $delete2) {
                    unlink("./webp/" . $rQ['imagen']);
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><center> Se ha eliminado correctamente el registro del elemento </center><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><center> No se pudo eliminar el registro del elemento </center><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
            }
        }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="h3"><i class="bi bi-bag-check-fill"></i> Sistema de inventario de elementos EXFOR S.A.S </p>
            </div>
            <br>

            <div class="panel-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <center><strong>¡Hola!</strong> Asegúrate de que la información que estas diligenciando esté
                        actualizada hasta la fecha, en cualquier caso si necesitas modificar algún dato en otro
                        momento puedes hacerlo con el botón <i class="bi bi-pencil-fill"></i> o en "Editar
                        Información" en la visualización del elemento <i class="bi bi-search"></i> , <strong>¡Muchas
                            Gracias!</strong></center>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="d-grid gap-2 d-md-block">
                    <a href="registro.php" class="btn btn-sm btn-success"> <i class="bi bi-bag-plus-fill"></i> Registrar nuevo elemento</a>
                    <a onclick="loadData('bi bi-search','Visualización del elemento por agotarse','ElementSold','');" href="" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#mimodal"> <i class="bi bi-person-fill"></i>
                        Elementos por agotarse <span class="badge rounded-pill bg-danger"><?php
                                                                                            $sqlcont = mysqli_query($conn, "SELECT count(*)  AS totalAgotados FROM epp e WHERE stock <= 10;");
                                                                                            $conteo = mysqli_fetch_assoc($sqlcont);
                                                                                            echo $conteo['totalAgotados'];
                                                                                            ?></span></a>
                    <a onclick="loadData('bi bi-search','Visualización del elemento de alta rotación','elementRotation','');" href="" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#mimodal"> <i class="bi bi-heart-fill"></i> Elementos de alta rotación</a>
                    <a href="../entregaEPP/index.php" class="btn btn-sm btn-success"> <i class="bi bi-person-plus-fill"></i> Nueva entrega de epp</a>
                    <a onclick="loadDataTarea('bi bi-book',' Tareas','epp')" class="btn btn-sm btn-success" href="" data-bs-toggle="modal" data-bs-target="#mimodal"><i class="bi bi-book-fill"></i> Tareas</a>
                </div>
                <?php
                if ($_SESSION['tipo'] == 'gerente' || $_SESSION['tipo'] == 'sistemas' || $_SESSION['tipo'] == 'gestor_riesgo') {
                    include('filtradoDeNucleo.php');
                }
                ?>
            </div>
            <hr>
            <div class="table-responsive-sm">
                <table id="table" class="table table-bordered border-dark table-striped text-center">
                    <thead>
                        <tr class="table-success border-success">
                            <th>Código</th>
                            <th class="col-md-1">Imagen</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Núcleo</th>
                            <th>Proveedor</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="Empleados">
                        <?php include_once 'epp.php' ?>
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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "order": [
                    [2, "asc"]
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
        });
    </script>
</body>

</html>