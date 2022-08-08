<?php session_start();
include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <script src="../entregaEPP/scripts/autocomplete.js" type="text/javascript"></script>
</head>

<body>
    <script>
        $(document).ready(function() {
            $("#nombres").focusout(function() {
                $.ajax({
                    url: '../include/empleados/empleado.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        nombres: $('#nombres').val()
                    }
                }).done(function(respuesta) {
                    $("#cedula").val(respuesta.cedula);
                    $("#proceso").val(respuesta.proceso);
                    $("#nucleo").val(respuesta.nucleo);
                    $("#cargo").val(respuesta.cargo);
                    $("#proceso1").val(respuesta.proceso1);
                    $("#nucleo1").val(respuesta.nucleo1);
                    $("#cargo1").val(respuesta.cargo1);
                });
            });
        });
    </script>
    <div class="container-fluid border border-success bg-light">
        <hr>
        <div class="alert alert-success" role="alert">
            <center><strong>Recuerda que:</strong> En este apartado podrás generar un registro de entrega de elementos de protección
                a un empleado, podrás editar o actualizar esta entrega dando click en el botón "<i class="bi bi-journal-medical"></i>"
                (Gestor de Entregas) en el historial de entregas de EPP <strong>¡Gracias!</strong></center>
        </div>
        <hr>
        <?php include "../entregaEPP/query-registro.php"; ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="h3"><i class="bi bi-journal-plus"></i>&nbsp; Sistema registro de entregas: EPP</p>
            </div>
            <br>

            <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">
                <div class="control-group">
                    <div class="controls">
                        <a href="index.php" class="btn btn-sm btn-success">&nbsp;<i class="bi bi-arrow-left"></i>
                            Volver a historial de entregas </a>
                    </div>
                </div>
                <hr>
                <!-- cuerpo de sistema de registro  -->
                <h2>
                    Registro de entregas
                    <small class="text-success">Elementos de Protección</small>
                </h2>
                <br>
                <span class="badge text-bg-success" style="font-size: 17px;" ;> Datos del empleado: </span>
                <br><br>
                <div class="container-fluid">
                    <div class="input-group">
                        <span class="input-group-text w-auto shadow-sm" for="nombre del empleado" style="background-color: #198754; color: #FFFFFF;" ;>Nombre del empleado:</span>
                        <input type="text" name="nombres" id="nombres" class="form-control rounded-end w-auto shadow-sm" list="nombreList" placeholder="o Cédula..." autocomplete="off" required style="margin-right: 10px;" ;>
                        <datalist id="nombreList">
                            <?php
                            $sql = mysqli_query($conn, "SELECT nombres,cedula FROM clientes");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '<option value="' . $row['nombres'] . '">' . $row['cedula'] . '</option>';
                            }
                            ?>
                        </datalist>
                        <span class="input-group-text rounded-start w-auto shadow-sm" for="fecha de registro" style="background-color: #198754; color: #FFFFFF;" ;>Fecha de registro:</span>
                        <input type="date" name="fecha-registro" id="fecha-registro" class="form-control w-auto shadow-sm" required>
                    </div>
                    <!-- Inputs con autocompletado -->
                    <input name="cedula" id="cedula" class=" form-control" type="number" placeholder="CEDULA DEL EMPLEADO" required readonly>

                    <input name="nucleo" id="nucleo" class=" form-control" type="text" required readonly>
                    <input name="nucleo1" id="nucleo1" class=" form-control" type="text" placeholder="NUCLEO DEL EMPLEADO" readonly>

                    <input name="proceso" id="proceso" class=" form-control" type="text" required readonly>
                    <input name="proceso1" id="proceso1" class=" form-control" type="text" placeholder="PROCESO DEL EMPLEADO" readonly>

                    <input name="cargo" id="cargo" class=" form-control" type="text" required readonly>
                    <input name="cargo1" id="cargo1" class=" form-control" type="text" placeholder="CARGO DEL EMPLEADO" readonly>
                </div>
                <br>
                <span class="badge text-bg-success" style="font-size: 17px;" ;> Elementos a entregar: </span>
                <br><br>
                <!-- Contenedor de mis elementos dinámicos -->
                <div class="container-fluid" id="element-dinamic"></div>
                <br>
                <datalist id="elementList">
                    <?php
                    $sql = mysqli_query($conn, "SELECT nombre FROM epp");
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '<option value="' . $row['nombre'] . '"></option>';
                    }
                    ?>
                </datalist>
            </form>
            <button class="btn btn-success mx-auto d-block" id="button-add-element"><i class="bi bi-plus-lg"></i></button>
            <script src="../entregaEPP/scripts/dinamic-inputs.js"></script>
        </div>

        <!-- <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha">(*) Fecha: </span>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="nombres">(*) Nombre: </span>
                    <input type="text" style="text-transform:uppercase;" name="nombres" id="nombres" class="form-control" list="nombreList" placeholder="INGRESA EL NOMBRE DEL EMPLEADO" autocomplete="off" required>
                    <datalist id="nombreList">
                        <?php
                        $sql = mysqli_query($conn, "SELECT nombres,cedula FROM clientes");
                        while ($row = mysqli_fetch_assoc($sql)) {
                            echo '<option value="' . $row['nombres'] . '">' . $row['cedula'] . '</option>';
                        }
                        ?>
                    </datalist>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="cedula">(*) Cedula: </span>
                    <input name="cedula" id="cedula" class=" form-control" type="number" placeholder="CEDULA DEL EMPLEADO" required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="nucleo">(*) nucleo: </span>
                    <input name="nucleo" id="nucleo" class=" form-control" type="hidden" required readonly>
                    <input name="nucleo1" id="nucleo1" class=" form-control" type="text" placeholder="NUCLEO DEL EMPLEADO" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="proceso">(*) proceso: </span>
                    <input name="proceso" id="proceso" class=" form-control" type="hidden" required readonly>
                    <input name="proceso1" id="proceso1" class=" form-control" type="text" placeholder="PROCESO DEL EMPLEADO" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="cargo">(*) cargo: </span>
                    <input name="cargo" id="cargo" class=" form-control" type="hidden" required readonly>
                    <input name="cargo1" id="cargo1" class=" form-control" type="text" placeholder="CARGO DEL EMPLEADO" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="talla">(*) Tallas: </span>
                    <input type="hidden" id="id_talla" name="id_talla">
                    <select name="talla" id="talla" class="form-select">
                        <option value="">ESCOGE LA TALLA</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="28">28</option>
                        <option value="30">30</option>
                        <option value="32">32</option>
                        <option value="34">34</option>
                        <option value="36">36</option>
                        <option value="38">38</option>
                        <option value="40">40</option>
                        <option value="42">42</option>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="elemento">(*) Elemento: </span>
                    <input name="elemento" style="text-transform:uppercase;" id="elemento" class=" form-control" type="text" list="elementList" placeholder="INGRESA EL NOMBRE DEL ELEMENTO" required>
                    <datalist id="elementList">
                        <?php
                        $sql = mysqli_query($conn, "SELECT nombre FROM epp");
                        while ($row = mysqli_fetch_assoc($sql)) {
                            echo '<option value="' . $row['nombre'] . '"></option>';
                        }
                        ?>
                    </datalist>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="cantidad">(*) Cantidad del elemento: </span>
                    <input name="cantidadE" id="cantidadE" class=" form-control" type="number" readonly placeholder="INGRESA LA CANTIDAD DEL ELEMENTO" required>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="precio">(*) Precio: </span>
                    <input name="precio" id="precio" class=" form-control" type="number" placeholder="PRECIO DEL ELEMENTO" required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="cantidad">(*) Cantidad: </span>
                    <input name="cantidad" id="cantidad" class=" form-control" type="number" oninput="calculo()" onblur="AlertaCantidad()" placeholder="INGRESA LA CANTIDAD DEL ELEMENTO" required>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="total">(*) Precio total: </span>
                    <input name="total" id="total" class=" form-control" type="number" placeholder="PRECIO TOTAL DEL ELEMENTO" required onclick="calculo()" readonly>
                </div>
                <small><strong>Dale click en precio total para calcular el precio total del elemento</strong></small>
                <hr>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                        <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div> -->
        <!--/.content-->
        <!--/.container-->
        <br>
        <script>
            function calculo() {
                try {
                    var cant = parseFloat(document.getElementById("cantidad").value) || 0,
                        price = parseFloat(document.getElementById("precio").value) || 0;
                    document.getElementById("total").value = cant * price;
                } catch (e) {}
            }
        </script>
        <!--/.wrapper-->
        <div class="card-footer">
            <div class="container">
                <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios
                        Forestales </b></center>
            </div>
        </div>
    </div>

</body>

</html>