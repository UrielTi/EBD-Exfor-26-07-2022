<?php session_start(); include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
	include("head.php");
	?>
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
                $("#cargo").val(respuesta.cargo);
                $("#cargo1").val(respuesta.cargo1);
                $("#proceso").val(respuesta.proceso);
                $("#proceso1").val(respuesta.proceso1);
                $("#nucleo").val(respuesta.nucleo);
                $("#nucleo1").val(respuesta.nucleo1);
                $("#eps").val(respuesta.eps);
                $("#eps1").val(respuesta.eps1);
            });
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $("#dx").focusout(function() {
            $.ajax({
                url: '../include/diagnostico/dx.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    dx: $('#dx').val()
                }
            }).done(function(respuesta) {
                $("#dx").val(respuesta.dx);
                $("#diagnostico").val(respuesta.diagnostico);
            });
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $("#evento").focusout(function() {
            $.ajax({
                url: '../include/mostrar/mostrarDX.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    evento: $('#evento').val()
                }
            }).done(function(respuesta) {
                $(".oculto").css("display",respuesta.oculto);
            });
        });
    });
    </script>
    <script>
        function FechaDias(){
            var fecha_inicio = moment(document.getElementById('fecha_inicio').value),
                fecha_final = moment(document.getElementById('fecha_final').value),
                total = fecha_final.diff(fecha_inicio, 'days');
            document.getElementById('dias_ausentismo').value=total;
        }
    </script>
</head>

<body>
    <?php include("../include/navegacion/nav.php"); ?>

    <div class="container-fluid border border-success bg-light">
        <hr>
        <div class="alert alert-success" role="alert">
            <center><strong>¡Hola!</strong> Asegúrate que la información que estas diligenciando esté actualizada hasta
                la fecha, en cualquier caso si necesitas modificar algún dato en otro momento puedes hacerlo con el
                botón <i class="bi bi-pencil-fill"></i> o en "Editar Información" en la visualización del empleado <i
                    class="bi bi-search"></i> , <strong>¡Muchas Gracias!</strong></center>
        </div>
        <hr>
        <?php
            if (isset($_POST['input'])) {
            	$nombres = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
            	$cedula = mysqli_real_escape_string($conn, (strip_tags($_POST['cedula'], ENT_QUOTES)));
            	$cargo = mysqli_real_escape_string($conn, (strip_tags($_POST['cargo'], ENT_QUOTES)));
            	$proceso = mysqli_real_escape_string($conn, (strip_tags($_POST['proceso'], ENT_QUOTES)));
            	$nucleo = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
            	$eps = mysqli_real_escape_string($conn, (strip_tags($_POST['eps'], ENT_QUOTES)));
                $mes_evento = mysqli_real_escape_string($conn, (strip_tags($_POST['mes_evento'], ENT_QUOTES)));
            	$fecha_inicio = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_inicio'], ENT_QUOTES)));
            	$fecha_final = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_final'], ENT_QUOTES)));
            	$dias_ausentismo = mysqli_real_escape_string($conn, (strip_tags($_POST['dias_ausentismo'], ENT_QUOTES)));
            	$prorroga = mysqli_real_escape_string($conn, (strip_tags($_POST['prorroga'], ENT_QUOTES)));
            	$dx = mysqli_real_escape_string($conn, (strip_tags($_POST['dx'], ENT_QUOTES)));
            	$diagnostico = mysqli_real_escape_string($conn, (strip_tags($_POST['diagnostico'], ENT_QUOTES)));
            	$descripcion = mysqli_real_escape_string($conn, (strip_tags($_POST['descripcion'], ENT_QUOTES)));
            	$evento = mysqli_real_escape_string($conn, (strip_tags($_POST['evento'], ENT_QUOTES)));
            	$peligro_aso = mysqli_real_escape_string($conn, (strip_tags($_POST['peligro_aso'], ENT_QUOTES)));
            	$sve = mysqli_real_escape_string($conn, (strip_tags($_POST['sve'], ENT_QUOTES)));
            	$estado = mysqli_real_escape_string($conn, (strip_tags($_POST['estado'], ENT_QUOTES)));
                $estado_inc = mysqli_real_escape_string($conn, (strip_tags($_POST['estado_inc'], ENT_QUOTES)));

            	$insert = mysqli_query($conn, "INSERT INTO ausentismo(id, nombres, cedula, cargo, nucleo, proceso, eps, mes_evento, fecha_inicio, fecha_final, dias_ausentismo, prorroga, dx, diagnostico, descripcion, evento, peligro_aso, sve, estado, estado_incapacidad)
            VALUES(NULL, '$nombres', '$cedula', '$cargo', '$nucleo', '$proceso', '$eps','$mes_evento', '$fecha_inicio', '$fecha_final', '$dias_ausentismo', '$prorroga', '$dx', '$diagnostico', '$descripcion', '$evento', '$peligro_aso', '$sve', '$estado', '$estado_inc')") or die(mysqli_error($conn));
            	if ($insert) {
            		echo '<div class="alert alert-success alert-dismissable"><button type="button" class="btn-close" aria-label="Close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
            	} else {
            		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
            	}
            }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-person-plus-fill"></i> Ingresar una Incapacidad </h4>
            </div>

            <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">

                <div class="control-group">
                    <div class="controls">
                        <a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i> Regresar</a>
                    </div>
                </div>

                <hr>

                <p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>

                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="nombres">(*) Nombres: </span>
                    <input name="nombres" id="nombres" class="form-control" type="text" required 
                        autocomplete="off" list="nombre" placeholder="Ingrese el nombre del empleado">
                    <datalist id="nombre">
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
                    <span class="input-group-text w-25" for="cedula">Cédula: </span>
                    <input name="cedula" id="cedula" class="form-control" type="number" placeholder="Cédula" required
                        readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="cargo">Cargo: </label>
                    <input name="cargo" id="cargo" class="form-control" type="hidden"
                        required readonly>
                    <input name="cargo1" id="cargo1" class="form-control" type="text" placeholder="Cargo del empleado"
                        required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="proceso">Proceso: </label>
                    <input name="proceso" id="proceso" class="form-control" type="hidden" required
                        readonly>
                    <input name="proceso1" id="proceso1" class="form-control" type="text" placeholder="Proceso" required
                        readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="nucleo">Núcleo: </label>
                    <input name="nucleo" id="nucleo" class="form-control" type="hidden" required
                        readonly>
                    <input name="nucleo1" id="nucleo1" class="form-control" type="text" placeholder="Núcleo" required
                        readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="eps">EPS: </label>
                    <input name="eps" id="eps" class="form-control" type="hidden" required
                        readonly>
                    <input name="eps1" id="eps1" class="form-control" type="text" placeholder="EPS del Empleado" required
                        readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="mes_evento">(*) Mes del Evento: </label>
                    <select class="form-select" name="mes_evento" id="mes_evento" required>
                        <option value="">SELECCIONA EL MES</option>
                        <?php
									$query = $conn->query("SELECT * FROM meses");
									while ($mes = mysqli_fetch_array($query)) {
										echo '<option value="' . $mes['id'] . '">' . $mes['mes'] . '</option>';
									}
									?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha_inicio">(*) Fecha de Inicio: </span>
                    <input name="fecha_inicio" id="fecha_inicio" class="form-control" type="date"
                        placeholder="Fecha de Inicio" oninput="FechaDias()" required>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha_final">(*) Fecha Final: </span>
                    <input name="fecha_final" id="fecha_final" placeholder="Fecha Final" type="date"
                        class="form-control" oninput="FechaDias()" required>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="dias_ausentismo">(*) Dias de ausentismo: </span>
                    <input name="dias_ausentismo" id="dias_ausentismo" class="form-control" type="number"
                        placeholder="Días ausentismo" readonly>
                </div>
                <hr>
                
                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="evento">(*) Tipo de Evento: </label>
                    <select class="form-select" name="evento" id="evento" required>
                        <option selected>SELECCIONA EL EVENTO</option>
                        <?php
                            $query = $conn->query("SELECT * FROM tipo_evento");
                            while ($evento = mysqli_fetch_array($query)) {
                            	echo '<option value="' . $evento['id'] . '">' . $evento['evento'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="prorroga">(*) ¿Es Prorroga?: </label>
                    <select class="form-select" name="prorroga" id="prorroga" required>
                        <option selected>SELECCIONA LA OPCIÓN</option>
                        <?php
									$query = $conn->query("SELECT * FROM prorroga");
									while ($prorroga = mysqli_fetch_array($query)) {
										echo '<option value="' . $prorroga['id'] . '">' . $prorroga['esprorroga'] . '</option>';
									}
									?>
                    </select>
                </div>
                <hr>
                
                <div class="oculto">
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-25" for="dx">(*) Diagnostico (DX): </span>
                        <input name="dx" id="dx" class="form-control" value="*" type="text"
                            placeholder="DX" list="listaDX" autocomplete="off">
                        <datalist id="listaDX">
                            <?php
                                $query = $conn->query("SELECT * FROM dx");
                                while ($dx = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $dx['id'] . '">' . $dx['diagnostico'] . '</option>';
                                }
                            ?>
                        </datalist>
                        <textarea name="diagnostico" id="diagnostico" class="form-control" type="text"
                            placeholder="Diagnóstico" rows="1" required readonly>*</textarea>
                    </div>
                    <hr>
                </div>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="descripcion">(*) Descripción: </span>
                    <textarea name="descripcion" id="descripcion" class="form-control" type="text" rows="3"
                        required placeholder="Ingrese la descripcion">*</textarea>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="peligro_aso">(*) Peligro Asociado: </label>
                    <select class="form-select" name="peligro_aso" id="peligro_aso" required>
                        <option selected>SELECCIONA EL PELIGRO ASOCIADO</option>
                        <?php
									$query = $conn->query("SELECT * FROM peligro_asociado");
									while ($peligro = mysqli_fetch_array($query)) {
										echo '<option value="' . $peligro['id'] . '">' . $peligro['peligro_aso'] . '</option>';
									}
									?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="sve">(*) SVE/PROGRAMA: </span>
                    <select class="form-select" name="sve" id="sve" required>
                        <option selected>SELECCIONA EL SVE/PROGRAMA</option>
                        <?php
                                    $query = $conn->query("SELECT * FROM sve");
                                    while ($sve = mysqli_fetch_array($query)) {
                                        echo '<option value="'.$sve['id'].'">'.$sve['sve'].'</option>';
                                    }
                                    ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="estado">(*) Estado: </label>
                    <select class="form-select" name="estado" id="estado" required>
                        <option value="">SELECCIONA EL ESTADO</option>
                        <?php
									$query = $conn->query("SELECT * FROM estados");
									while ($estados = mysqli_fetch_array($query)) {
										echo '<option value="' . $estados['id'] . '">' . $estados['estado'] . '</option>';
									}
									?>
                    </select>
                </div>
                <hr>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                        <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
                <hr>


            </form>
        </div>
        <!--/.container-->

        <!--/.wrapper--><br>
        <div class="card-footer">
            <div class="container">
                <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios
                        Forestales </b></center>
            </div>
        </div>
</body>

</html>