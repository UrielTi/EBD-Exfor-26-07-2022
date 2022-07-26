<?php session_start(); include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <script>
    $(document).ready(function() {
        $("#elemento").focusout(function() {
            $.ajax({
                url: '../include/elementos/element.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    talla: $('#talla').val(),
                    nombres: $('#elemento').val()
                }
            }).done(function(respuesta) {
                $("#id_talla").val(respuesta.id_talla);
                $("#elemento").val(respuesta.nombres);
                $("#precio").val(respuesta.precio);
                $("#cantidadE").val(respuesta.stock);
            });
        });
    });
    </script>
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
    <!--/.content<script>
        function AlertaCantidad() {
            var cantidadElemento = document.getElementById("cantidadE").value,
                cantidadSolicitada = document.getElementById("cantidad").value,
                total = cantidadElemento - cantidadSolicitada;
            
            if(total < 0){
                alert("La cantidad solicitada: "+ cantidadSolicitada +" es mayor a la cantidad del producto: "+ cantidadElemento);
                document.getElementById("cantidad").value = 0;
            }else if (cantidadSolicitada < 0){
                alert("La cantidad solicitada: "+ cantidadSolicitada +" no puede ser menor");
                document.getElementById("cantidad").value = 0;
            }
        }
    </script>-->
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
					if (isset($_POST['input'])) {
						$nombre	= mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
						$cedula  = mysqli_real_escape_string($conn, (strip_tags($_POST['cedula'], ENT_QUOTES)));
                        $nucleo  = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
                        $proceso  = mysqli_real_escape_string($conn, (strip_tags($_POST['proceso'], ENT_QUOTES)));
                        $cargo  = mysqli_real_escape_string($conn, (strip_tags($_POST['cargo'], ENT_QUOTES)));
						$cantidad  = intval($_POST['cantidad']);
						$elemento  = mysqli_real_escape_string($conn, (strip_tags($_POST['elemento'], ENT_QUOTES)));
						$precio   = mysqli_real_escape_string($conn, (strip_tags($_POST['total'], ENT_QUOTES)));
                        //$fecha = date("Y/m/d");
                        $fecha = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha'], ENT_QUOTES)));
                        
                        //TALLAS
                        $talla	= mysqli_real_escape_string($conn, (strip_tags($_POST['talla'], ENT_QUOTES)));

                        $consulta = mysqli_query($conn,"SELECT * FROM epp WHERE nombre='$elemento'");
                        $result = mysqli_fetch_assoc($consulta);
                        $substract = $result['stock'] - $cantidad;
                        $id_elemento = $result['id'];

                        $consultaTalla = mysqli_query($conn,"SELECT cantidad FROM elemento_tallas WHERE id_elemento='$id_elemento' AND talla='$talla'");
                        $resultTalla = mysqli_fetch_assoc($consultaTalla);
                        $substractTalla = $resultTalla['cantidad'] - $cantidad;

                        if($result['stock'] < $cantidad){
                            echo "<script>alert('La cantidad solicitada es mayor a la cantidad del producto.'); window.location = 'registro.php'</script>";
                        }else{
                            $insert = mysqli_query($conn, "INSERT INTO entrega_epp(id, nombre, cedula, nucleo, proceso, cargo, cantidad, elemento, talla, precio, fecha)
								VALUES(NULL,'$nombre', '$cedula', '$nucleo', '$proceso', '$cargo', '$cantidad', '$elemento', '$talla', '$precio','$fecha')") or die(mysqli_error($conn));
                            if ($insert) {
                                $updateTalla = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$substractTalla' WHERE id_elemento='$id_elemento' AND talla='$talla'");
                                $update = mysqli_query($conn,"UPDATE epp SET stock='$substract' WHERE nombre='$elemento'") or die(mysqli_error($conn));
                                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
                            }
                        }
					}
					?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="bi bi-person-plus-fill"></i> Ingresar una entrega de elementos</h4>
                        </div>

                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php"
                            method="POST">

                            <div class="control-group">
                                <div class="controls">
                                    <a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i>
                                        Regresar</a>
                                </div>
                            </div>

                            <hr>

                            <p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>

                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" for="fecha">(*) Fecha: </span>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>
                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" for="nombres">(*) Nombre: </span>
                                <input type="text" style="text-transform:uppercase;" name="nombres" id="nombres"
                                    class="form-control" list="nombreList" placeholder="INGRESA EL NOMBRE DEL EMPLEADO" autocomplete="off" required>
                                <datalist id="nombreList">
                                    <?php
                                        $sql=mysqli_query($conn,"SELECT nombres,cedula FROM clientes");
                                        while($row=mysqli_fetch_assoc($sql)){
                                            echo '<option value="' . $row['nombres'] . '">' . $row['cedula'] . '</option>';
                                        }
                                    ?>
                                </datalist>
                            </div>
                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" for="cedula">(*) Cedula: </span>
                                <input name="cedula" id="cedula" class=" form-control" type="number"
                                    placeholder="CEDULA DEL EMPLEADO" required readonly>
                            </div>
                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" for="nucleo">(*) nucleo: </span>
                                <input name="nucleo" id="nucleo" class=" form-control" type="hidden"
                                    required readonly>
                                <input name="nucleo1" id="nucleo1" class=" form-control" type="text"
                                    placeholder="NUCLEO DEL EMPLEADO" readonly>
                            </div>
                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" for="proceso">(*) proceso: </span>
                                <input name="proceso" id="proceso" class=" form-control" type="hidden"
                                    required readonly>
                                <input name="proceso1" id="proceso1" class=" form-control" type="text"
                                    placeholder="PROCESO DEL EMPLEADO" readonly>
                            </div>
                            <hr>
                            
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" for="cargo">(*) cargo: </span>
                                <input name="cargo" id="cargo" class=" form-control" type="hidden"
                                    required readonly>
                                <input name="cargo1" id="cargo1" class=" form-control" type="text"
                                    placeholder="CARGO DEL EMPLEADO" readonly>
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
                                <input name="elemento" style="text-transform:uppercase;" id="elemento"
                                    class=" form-control" type="text" list="elementList"
                                    placeholder="INGRESA EL NOMBRE DEL ELEMENTO" required>
                                <datalist id="elementList">
                                    <?php
                                        $sql=mysqli_query($conn,"SELECT nombre FROM epp");
                                        while($row=mysqli_fetch_assoc($sql)){
                                            echo '<option value="' . $row['nombre'] . '"></option>';
                                        }
                                    ?>
                                </datalist>
                            </div>
                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" for="cantidad">(*) Cantidad del elemento: </span>
                                <input name="cantidadE" id="cantidadE"
                                    class=" form-control" type="number" readonly
                                    placeholder="INGRESA LA CANTIDAD DEL ELEMENTO" required>
                            </div>
                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" for="precio">(*) Precio: </span>
                                <input name="precio" id="precio" class=" form-control" type="number"
                                    placeholder="PRECIO DEL ELEMENTO" required readonly>
                            </div>
                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" for="cantidad">(*) Cantidad: </span>
                                <input name="cantidad" id="cantidad"
                                    class=" form-control" type="number" oninput="calculo()" onblur="AlertaCantidad()"
                                    placeholder="INGRESA LA CANTIDAD DEL ELEMENTO" required>
                            </div>
                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" for="total">(*) Precio total: </span>
                                <input name="total" id="total" class=" form-control" type="number"
                                    placeholder="PRECIO TOTAL DEL ELEMENTO" required onclick="calculo()" readonly>
                            </div>
                            <small><strong>Dale click en precio total para calcular el precio total del elemento</strong></small>
                            <hr>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="input" id="input"
                                        class="btn btn-sm btn-primary">Registrar</button>
                                    <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
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
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>