<?php session_start();
include("../include/conn/conn.php");
include("../cond/todo.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("head.php"); ?>
</head>

<body>
    <?php include("../include/navegacion/nav.php"); ?>
    <div class="container-fluid border border-success bg-light">

        <hr>
        <!-- Delete, devolver elementos -->
        <?php include('returnItem.php'); ?>
        <!-- Insert que captura la informacion digitada y genera el registro y calculos de la entrega -->
        <?php include('insert.php'); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="h3"><i class="bi bi-journal-plus"></i>&nbsp; Sistema gestor de entregas <small class="text-success">Elementos de Protección</small></p>
            </div>

            <div class="panel-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <center><strong>¡Hola!</strong> Bienvenido al nuevo apartado de gestión de entregas de EPP,
                        debes tener en cuenta que los elementos registrados se descontarán de el <strong>sistema de inventario</strong> automáticamente, así que es importante alimentar y actualizar constantemente ambos apartados. <strong>¡Muchas Gracias!</strong></center>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <a href="index.php" class="btn btn-sm btn-success">&nbsp;<i class="bi bi-arrow-left"></i>
                            Ir al historial de entregas </a>
                    </div>
                </div>
                <hr>
                <!-- cuerpo de sistema de registro  -->
                <span class="badge text-bg-success" style="font-size: 17px; margin-left: 13px;"> Datos del empleado: </span>
                <br><br>
                <div class="container-fluid">

                    <?php

                    include('postid.php');

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
                            <span class="input-group-text w-auto shadow-sm" for="Datos empleado" style="background-color: #198754; color: #FFFFFF;">Cédula del empleado:</span>
                            <input type="text" name="cedula" id="cedula" value="<?php $echo = (isset($cedula) != NULL) ? $cedula : '';
                                                                                echo $echo; ?>" list="empleadosList" class="input-group-text rounded-end shadow-sm" placeholder="o Nombre..." autocomplete="off" style="width: 20%; background-color: white;" required>
                            <datalist id="empleadosList">
                                <?php
                                $sql = mysqli_query($conn, "SELECT nombres, primer_apellido, segundo_apellido, cedula FROM clientes ORDER BY nombres") or die(mysqli_error($conn));
                                while (($row = mysqli_fetch_array($sql)) != NULL) {
                                    echo '<option value="' . $row['cedula'] . '">' . $row['nombres'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido'] . '</option>';
                                }
                                ?>
                            </datalist>
                            <button type="submit" name="postid" id="postid" value="Buscar Entregas..." class="btn btn-primary rounded" style="margin-left: 10px;"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Nombre del empleado:</span>
                        <input name="nombres" id="nombres" value="<?php $echo = (isset($nombres) != NULL) ? $nombres : '';
                                                                    echo $echo; ?>" class="form-control w-25 shadow-sm rounded-end" type="text" style="margin-right: 10px;" readonly>
                        <span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Cargo:</span>
                        <input name="cargo" id="cargo" value="<?php $echo = (isset($cargo) != NULL) ? $cargo : '';
                                                                echo $echo; ?>" class="form-control w-auto shadow-sm" type="text" readonly>
                    </div>
                    <br>

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
                <hr>
                <span class="badge text-bg-success" style="font-size: 17px;"> Elementos a entregar: </span>
                <br><br>

                <form name="form1" id="form1" action="registro.php?id=<?php echo $id_empleado; ?>" method="POST">
                    <input type="hidden" id="id_elemento" name="id_elemento">
                    <div class="input-group">
                        <span class="input-group-text w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF; width: 5%;" ;>Elemento:</span>
                        <input type="text" id="codigoElement" name="codigoElement" class="form-control rounded-end shadow-sm" list="elementList" placeholder="Buscar..." style="margin-right: 10px; width: 5%;">
                        <input type="number" id="stockElement" name="stockElement" class="form-control rounded-pill shadow-sm" placeholder="stock" style="border-color: #198754; color: #198754; margin-right: 10px; width: 4%; text-align: center;" readonly>
                        <datalist id="elementList">
                            <?php
                            $sql = mysqli_query($conn, "SELECT nombre, codigo FROM epp ORDER BY nombre") or die(mysqli_error($conn));
                            while (($row = mysqli_fetch_array($sql)) != NULL) {
                                echo '<option value="' . $row['codigo'] . '"> ' . $row['nombre'] . '</option>';
                            }
                            ?>
                        </datalist>

                        <span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF; width: 5%;">Talla:</span>
                        <select id="tallaElement" name="tallaElement" class="form-select rounded-end shadow-sm" style="margin-right: 10px; width: 5%;">
                            <option value="" selected>SELECCIONA</option>
                        </select>
                        <input type="number" id="cantTalla" name="cantTalla" class="form-control rounded-pill shadow-sm" placeholder="cant" style="border-color: #198754; color: #198754; margin-right: 10px; width: 4%; text-align: center;" readonly>
                        <span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF; width: 5%;">Cantidad:</span>
                        <input type="number" name="cantidadElement" id="cantidadElement" min="1" class="form-control rounded-end shadow-sm" placeholder="Digita Cantidad" autocomplete="off" style="margin-right: 10px; width: 5%;">

                        <span class="input-group-text rounded-start w-auto shadow-sm" for="fecha de registro" style="background-color: #198754; color: #FFFFFF; width: 5%;">Fecha de registro:</span>
                        <input type="date" name="fechaRegistro" id="fechaRegistro" class="form-control shadow-sm" style="width: 5%;">
                    </div>
                    <br>

                    <div class="control-group">
                        <center>
                            <h6>Registrar Entrega</h6>
                        </center>
                        <div class="controls">
                            <center><button type="submit" name="insert" id="insert" class="btn btn-success rounded"><i class="bi bi-plus-lg"></i></button></center>
                        </div>
                    </div>
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
                            <th>Devolver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once('entregaTable.php'); ?>
                    </tbody>
                </table>
            </div>
            <br>
            <!--/.wrapper-->
            <div class="card-footer">
                <div class="container">
                    <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios Forestales </b></center>
                </div>
            </div>
        </div>
    </div>
</body>

</html>