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
            $query = mysqli_query($conn, "SELECT * FROM epp WHERE id='$id_delete'");
            if (mysqli_num_rows($query) == 0) {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            } else {
                $sql = mysqli_query($conn, "SELECT * FROM epp WHERE id='$id_delete'");
                $row = mysqli_fetch_assoc($sql);
                $img_bd = $row['imagen'];
                unlink('files/' . $img_bd);

                $delete = mysqli_query($conn, "DELETE FROM epp WHERE id='$id_delete'");
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
                <p class="h3"><i class="bi bi-file-earmark-text-fill"></i> Sistema de inventario de elementos EXFOR S.A.S </p>
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
                <div class="d-flex align-items-start">
                    <a href="registro.php" class="btn btn-sm btn-success"> <i class="bi bi-bag-plus-fill"></i> Registrar nuevo
                        elemento</a>&nbsp;
                    <a onclick="loadData('bi bi-search','Visualización del elemento por agotarse','ElementSold','');" href="" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#mimodal"> <i class="bi bi-person-fill"></i>
                        Elementos por agotarse <span class="badge rounded-pill bg-danger"><?php
                                                                                            $sqlcont = mysqli_query($conn, "SELECT count(*)  AS totalAgotados FROM epp e WHERE stock <= 10;");
                                                                                            $conteo = mysqli_fetch_assoc($sqlcont);
                                                                                            echo $conteo['totalAgotados'];
                                                                                            ?></span></a>&nbsp;
                    <a onclick="loadData('bi bi-search','Visualización del elemento de alta rotación','elementRotation','');" href="" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#mimodal"> <i class="bi bi-heart-fill"></i>
                        Elementos de alta rotación</a>&nbsp;
                    <a href="../entregaEPP/index.php" class="btn btn-sm btn-success"> <i class="bi bi-person-plus-fill"></i> Nueva
                        entrega de epp</a>&nbsp;
                    <a onclick="loadDataTarea('bi bi-book',' Tareas','epp')" class="btn btn-sm btn-success" href="" data-bs-toggle="modal" data-bs-target="#mimodal">
                        <i class="bi bi-book-fill"></i> Tareas</a>&nbsp;
                    <form name="form2" id="form2" class="form-horizontal row-fluid" action="index.php" method="POST" enctype="multipart/form-data">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text w-25" id="inputGroup-sizing-sm"> Núcleo: </span>
                            <select class="form-select form-select-sm" id="select_nucleo" aria-label=".form-select-sm example">
                                <option selected> Selecciona núcleo </option>
                                <option value="1"> Ambos núcleos </option>
                                <option value="2"> Santa Rosa </option>
                                <option value="3"> Riosucio </option>
                            </select>
                            <input type="hidden" name="input_nucleo" id="input_nucleo">
                            <button type="submit" name="filtro_nucleo" id="filtro_nucleo" class="btn btn-primary btn-sm">Filtrar núcleo</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="table" class="table table-bordered border-dark table-striped text-center">
                    <thead>
                        <tr class="table-success border-success">
                            <th>Código</th>
                            <th class="col-md-1">Imagen</th>
                            <th class="w-25">Nombre</th>
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