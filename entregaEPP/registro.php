<?php session_start();
include "../include/conn/conn.php";
include("../cond/todo.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("./head.php"); ?>

    <script>
        $(document).ready(function() {
            $("#codigoElement").on('change', function() {
                $.ajax({
                    url: 'autocompleteElement.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        codigo: $('#codigoElement').val()
                    }
                }).done(function(element) {
                    $("#stockElement").val(element.stock);
                    $("<option value='" + element.talla + "'>" + element.talla + "</option>").appendTo("#tallaElement");
                });
            });
        });
        $(document).ready(function() {
            $('#table').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se han cargado entregas a este empleado o no existe",
                    "sEmptyTable": "No se han cargado entregas a este empleado",
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
</head>

<body>
    <div class="container-fluid border border-success bg-light">
        <hr>
        <div class="alert alert-success" role="alert">
            <center><strong>Recuerda que:</strong> En este apartado podrás generar un registro de entrega de elementos de protección
                a un empleado, podrás editar o actualizar esta entrega dando click en el botón "<i class="bi bi-journal-medical"></i>"
                (Gestor de Entregas) en el historial de entregas de EPP <strong>¡Gracias!</strong></center>
        </div>
        <hr>
        <!-- include "../entregaEPP/query-registro.php";  -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="h3"><i class="bi bi-journal-plus"></i>&nbsp; Sistema gestor de entregas: EPP</p>
            </div>
            <br>


            <div class="control-group">
                <div class="controls">
                    <a href="index.php" class="btn btn-sm btn-success">&nbsp;<i class="bi bi-arrow-left"></i>
                        Volver a historial de entregas </a>
                </div>
            </div>
            <hr>
            <!-- cuerpo de sistema de registro  -->
            <h2>
                Gestor de entregas
                <small class="text-success">Elementos de Protección</small>
            </h2>
            <br>
            <span class="badge text-bg-success" style="font-size: 17px;" ;> Datos del empleado: </span>
            <br><br>
            <div class="container-fluid">

                <?php

                include_once 'postid.php';

                $id_empleado = intval($_GET['id']);

                if (isset($id_empleado) != NULL) {

                    $consultaEmpleado = mysqli_query($conn, "SELECT cedula, primer_apellido, segundo_apellido, nombres, nucleo, cargo, proceso FROM clientes WHERE id = '$id_empleado' ") or die(mysqli_error($conn));
                    if (mysqli_num_rows($consultaEmpleado) > 0) {
                        $resultEmpleado = mysqli_fetch_assoc($consultaEmpleado);
                        $cedula = $resultEmpleado['cedula'];
                        $nombreCompleto = $resultEmpleado['nombres'] . " " . $resultEmpleado['primer_apellido'] . " " . $resultEmpleado['segundo_apellido'];
                        $nombres = $nombreCompleto;
                        $nucleo = $nucleos[$resultEmpleado['nucleo']];
                        $cargo = $cargos[$resultEmpleado['cargo']];
                        $proceso = $procesos[$resultEmpleado['proceso']];
                    }
                }
                ?>

                <form name="form2" id="form2" action="registro.php" method="POST">
                    <div class="input-group">
                        <span class="input-group-text w-auto shadow-sm" for="Datos empleado" style="background-color: #198754; color: #FFFFFF;" ;>Cédula del empleado:</span>
                        <input type="text" name="cedula" id="cedula" value="<?php $echo = (isset($cedula) != NULL) ? $cedula : '';
                                                                            echo $echo; ?>" list="empleadosList" class="form-control rounded-end w-auto shadow-sm" placeholder="o Nombre..." autocomplete="off" required>
                        <datalist id="empleadosList">
                            <?php
                            $sql = mysqli_query($conn, "SELECT nombres, primer_apellido, segundo_apellido, cedula FROM clientes ORDER BY nombres") or die(mysqli_error($conn));
                            while (($row = mysqli_fetch_array($sql)) != NULL) {
                                echo '<option value="' . $row['cedula'] . '">' . $row['nombres'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido'] . '</option>';
                            }
                            ?>
                        </datalist>
                        <button type="submit" name="postid" id="postid" value="Buscar Entregas..." class="btn btn-primary rounded"><i class="bi bi-search"></i></button>
                    </div>
                </form>
                <br>

                <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">
                    <div class="input-group">
                        <span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Nombre del empleado:</span>
                        <input name="nombres" id="nombres" value="<?php $echo = (isset($nombres) != NULL) ? $nombres : '';
                                                                    echo $echo; ?>" class="form-control w-25 shadow-sm rounded-end" type="text" style="margin-right: 10px;" readonly>
                        <span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Cargo:</span>
                        <input name="cargo" id="cargo" value="<?php $echo = (isset($cargo) != NULL) ? $cargo : '';
                                                                echo $echo; ?>" class="form-control w-auto shadow-sm" type="text" readonly>
                    </div>
                    <br>

                    <input type="text" id="id-empleado" value="<?php $echo = (isset($id_empleado) != NULL) ? $id_empleado : '';
                                                                echo $echo; ?>" name="id-empleado">

                    <!-- Inputs con autocompletado -->
                    <div class="input-group">
                        <span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Núcleo:</span>
                        <input name="nucleo" id="nucleo" value="<?php $echo = (isset($nucleo) != NULL) ? $nucleo : '';
                                                                echo $echo; ?>" class="form-control w-auto shadow-sm rounded-end" type="text" style="margin-right: 10px;" readonly>

                        <span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Proceso:</span>
                        <input name="proceso" id="proceso" value="<?php $echo = (isset($proceso) != NULL) ? $proceso : '';
                                                                    echo $echo; ?>" class="form-control w-auto shadow-sm rounded-end" type="text" readonly>
                    </div>
            </div>
            <br>
            <span class="badge text-bg-success" style="font-size: 17px;" ;> Elementos a entregar: </span>
            <br><br>
            <!-- Contenedor de mis elementos dinámicos -->

            <div class="input-group">
                <span class="input-group-text w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Elemento:</span>
                <input type="text" id="codigoElement" name="codigoElement" class="form-control rounded-end w-auto shadow-sm" list="elementList" placeholder="Buscar..." style="margin-right: 10px;">
                <input type="text" id="stockElement" class="form-control rounded-pill shadow-sm" placeholder="stock" style="border-color: #198754; color: #198754; margin-right: 10px; width: 5%; text-align: center;" readonly>
                <datalist id="elementList">
                    <?php
                    $sql = mysqli_query($conn, "SELECT nombre, codigo FROM epp ORDER BY nombre") or die(mysqli_error($conn));
                    while (($row = mysqli_fetch_array($sql)) != NULL) {
                        echo '<option value="' . $row['codigo'] . '"> ' . $row['nombre'] . '</option>';
                    }
                    ?>
                </datalist>

                <span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Talla:</span>
                <select id="tallaElement" name="tallaElement" class="form-select rounded-end w-auto shadow-sm" style="margin-right: 10px;"></select>
                <span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Cantidad:</span>
                <input type="text" name="cantidadElement" class="form-control rounded-end w-auto shadow-sm" list="cantList" placeholder="Digita Cantidad" autocomplete="off" style="margin-right: 10px;">

                <span class="input-group-text rounded-start w-auto shadow-sm" for="fecha de registro" style="background-color: #198754; color: #FFFFFF;" ;>Fecha de registro:</span>
                <input type="date" name="fechaRegistro" id="fechaRegistro" class="form-control w-auto shadow-sm">
            </div>
            <br>
            </form>
        </div>
        <div class="table-responsive">
            <table id="table" class="table table-bordered border-dark table-striped text-center">
                <thead>
                    <tr class="table-success border-dark">
                        <th>Elemento</th>
                        <th>Cantidad</th>
                        <th>Talla</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include_once 'entregaTable.php' ?>
                </tbody>
            </table>
        </div>
        <br>
        <!-- <script>
            function calculo() {
                try {
                    var cant = parseFloat(document.getElementById("cantidad").value) || 0,
                        price = parseFloat(document.getElementById("precio").value) || 0;
                    document.getElementById("total").value = cant * price;
                } catch (e) {}
            }
        </scrip> -->
        <!--/.wrapper-->
        <div class="card-footer">
            <div class="container">
                <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios Forestales </b></center>
            </div>
        </div>
    </div>
</body>

</html>