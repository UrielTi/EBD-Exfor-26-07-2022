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
            if(isset($_GET['action']) == 'delete'){
				$id_delete = intval($_GET['id']);
				$query = mysqli_query($conn, "SELECT * FROM dotacion WHERE id='$id_delete'");
				if(mysqli_num_rows($query) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($conn, "DELETE FROM dotacion WHERE id='$id_delete'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
			?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-person-fill"></i> Base de datos dotacion EXFOR
                    S.A.S</h4>
            </div>

            <div class="panel-body">
                <div class="justify-content-end">
                    <a href="registro.php" class="btn btn-sm btn-success"> <i class="bi bi-person-plus-fill"></i> Registrar
                        dotacion</a>
                    <a class="btn btn-sm btn-success" href="excel.php"><i class="bi bi-file-earmark-arrow-down-fill"></i> Descargar excel</a>
                    <a onclick="loadDataTarea('bi bi-book',' Tareas','dotacion')" class="btn btn-sm btn-success" href="" data-bs-toggle="modal" data-bs-target="#viewDataDota"><i class="bi bi-book-fill"></i> Tareas</a>
                </div><br>

                <div class="table-responsive">
                    <small><strong>NOTA: La fecha año/01/01 es una fecha por defecto, esto indica que no se ha entregado dotacion.</strong></small>
                    <table id="table" class="table table-bordered border-success table-striped text-center">
                        <thead>
                            <hr>
                            <tr>
                                <th>ID</th>
                                <th class="w-25">Nombres</th>
                                <th>Cédula</th>
                                <th>Cargo</th>
                                <th>Primera entrega</th>
                                <th>Segunda entrega</th>
                                <th>Tercera entrega</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>
                        <tbody class="Empleados">
                            <?php include_once 'dotacion.php' ?>
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
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
        
        </script>
</body>

</html>