<?php session_start(); include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
	include("head.php");
	?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
            });
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $("#botonIncapacidad").focusout(function() {
            $.ajax({
                url: '../include/mostrar/mostrarFechas.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    boton: $('#botonIncapacidad').val()
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
            document.getElementById('dias_incapacidad').value=total;
        }
        function FranjaHoraria(){
            var franja = document.getElementById("hora_evento").value;
            if(franja >= '12:00'){
                document.getElementById("franja").value = "PM";
            }else{
                document.getElementById("franja").value = "AM";
            }
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
        	$supervisor = mysqli_real_escape_string($conn, (strip_tags($_POST['supervisor'], ENT_QUOTES)));
            $hora = mysqli_real_escape_string($conn, (strip_tags($_POST['hora_evento'], ENT_QUOTES)));
            $dia = mysqli_real_escape_string($conn, (strip_tags($_POST['dia_evento'], ENT_QUOTES)));
            $mes = mysqli_real_escape_string($conn, (strip_tags($_POST['mes_evento'], ENT_QUOTES)));
            $año = mysqli_real_escape_string($conn, (strip_tags($_POST['año_evento'], ENT_QUOTES)));
            $fecha_evento = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_evento'], ENT_QUOTES)));
        	$fecha_inicio = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_inicio'], ENT_QUOTES)));
            $fecha_final = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_final'], ENT_QUOTES)));
        	$dias_incapacidad = mysqli_real_escape_string($conn, (strip_tags($_POST['dias_incapacidad'], ENT_QUOTES)));
        	$peligro = mysqli_real_escape_string($conn, (strip_tags($_POST['peligro'], ENT_QUOTES)));
        	$finca = mysqli_real_escape_string($conn, (strip_tags($_POST['finca'], ENT_QUOTES)));
        	$lugar = mysqli_real_escape_string($conn, (strip_tags($_POST['lugar'], ENT_QUOTES)));
        	$evento = mysqli_real_escape_string($conn, (strip_tags($_POST['evento'], ENT_QUOTES)));
        	$mecanismo = mysqli_real_escape_string($conn, (strip_tags($_POST['mecanismo'], ENT_QUOTES)));
        	$agente_lesion = mysqli_real_escape_string($conn, (strip_tags($_POST['agente_lesion'], ENT_QUOTES)));
        	$tipo_lesion = mysqli_real_escape_string($conn, (strip_tags($_POST['tipo_lesion'], ENT_QUOTES)));
        	$parte_afectada = mysqli_real_escape_string($conn, (strip_tags($_POST['parte_afectada'], ENT_QUOTES)));
            $descripcion = mysqli_real_escape_string($conn, (strip_tags($_POST['descripcion'], ENT_QUOTES)));

            if ($fecha_inicio == ''){
                $fecha_inicio = '1970-01-01';
            }
            if ($fecha_final == ''){
                $fecha_final = '1970-01-01';
            }
        
            $insert = mysqli_query($conn, "INSERT INTO accidentes(id, nombres, cedula, cargo, nucleo, proceso, supervisor, hora, dia, mes, año, fecha_evento, fecha_inicio, fecha_final, dias_incapacidad, peligro, finca, lugar, evento, mecanismo, agente_lesion, tipo_lesion, parte_afectada, descripcion)
                VALUES(NULL, '$nombres', '$cedula', '$cargo', '$nucleo', '$proceso', '$supervisor','$hora','$dia', '$mes', '$año', '$fecha_evento', '$fecha_inicio', '$fecha_final', '$dias_incapacidad', '$peligro', '$finca', '$lugar', '$evento', '$mecanismo', '$agente_lesion', '$tipo_lesion', '$parte_afectada', '$descripcion')") or die(mysqli_error($conn));
        	if ($insert) {
        		echo '<div class="alert alert-success alert-dismissable"><button type="button" class="btn-close" aria-label="Close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
        	} else {
        		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
        	}
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-person-plus-fill"></i> Ingresar un accidente </h4>
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
                    autocomplete="off" list="nombre" placeholder="Nombres del empleado">
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
                    <label class="input-group-text w-25" for="supervisor">Supervisor: </label>
                    <select class="form-select" name="supervisor" id="supervisor" required>
                        <option selected>SELECCIONA EL SUPERVISOR</option>
                        <?php
							$query = $conn->query("SELECT * FROM supervisores");
						    while ($supervisor = mysqli_fetch_array($query)) {
								echo '<option value="' . $supervisor['id'] . '">' . $supervisor['nombre'] . '</option>';
							}
						?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="hora_evento">(*) Hora del Evento: </label>
                    <input id="hora_evento" name="hora_evento" type="time" class="form-control" 
                    placeholder="Ingresa la hora del evento" oninput="FranjaHoraria()">
                    <input id="franja" name="franja" type="text" class="form-control" 
                        placeholder="AM / PM" disabled>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="dia_evento">(*) Dia del Evento: </label>
                    <select class="form-select" name="dia_evento" id="dia_evento" required>
                        <option value="">SELECCIONA EL DIA</option>
                        <?php
							$query = $conn->query("SELECT * FROM dias");
							while ($dia = mysqli_fetch_array($query)) {
								echo '<option value="' . $dia['id'] . '">' . $dia['dia'] . '</option>';
							}
						?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="mes_evento">(*) Mes del Evento: </label>
                    <select class="form-select" name="mes_evento" id="mes_evento" required>
                        <option value="">SELECCIONA EL MES</option>
                        <?php
							$query = $conn->query("SELECT * FROM meses");
							while ($meses = mysqli_fetch_array($query)) {
								echo '<option value="' . $meses['id'] . '">' . $meses['mes'] . '</option>';
							}
						?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="año_evento">(*) Año del Evento: </label>
                    <input id="año_evento" name="año_evento" type="number" class="form-control" 
                    placeholder="Ingresa el año del evento">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha_evento">(*) Fecha evento: </span>
                    <input name="fecha_evento" id="fecha_evento" class="form-control" type="date"
                        required>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="botonIncapacidad">(*) ¿Tiene incapacidad?: </span>
                    <select name="botonIncapacidad" id="botonIncapacidad" class="form-select"
                        required>
                        <option value="Si">SI</option>
                        <option value="No">NO</option>
                    </select>
                </div>
                <hr>

                <div class="oculto">
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-25" for="fecha_inicio">(*) Fecha inicio: </span>
                        <input name="fecha_inicio" id="fecha_inicio" class="form-control" type="date"
                            placeholder="Fecha" oninput="FechaDias()">
                    </div>
                    <hr>

                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-25" for="fecha_final">(*) Fecha final: </span>
                        <input name="fecha_final" id="fecha_final" class="form-control" type="date"
                            placeholder="Fecha" oninput="FechaDias()">
                    </div>
                    <hr>

                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-25" for="dias_incapacidad">(*) Dias de incapacidad: </span>
                        <input name="dias_incapacidad" id="dias_incapacidad" class="form-control" type="number"
                            placeholder="Días de incapacidad" value="0" readonly>
                    </div>
                    <hr>
                </div>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="finca">(*) Finca: </span>
                    <select class="form-select" name="finca" id="finca" required>
                        <option selected>SELECCIONA LA FINCA</option>
                        <?php
							$query = $conn->query("SELECT * FROM fincas");
						    while ($finca = mysqli_fetch_array($query)) {
								echo '<option value="' . $finca['id'] . '">' . $finca['finca'] . '</option>';
							}
						?>
                    </select>
                    <span class="input-group-text w-25" for="lugar">(*) Lugar: </span>
                    <select class="form-select" name="lugar" id="lugar" required>
                        <option selected>SELECCIONA EL LUGAR</option>
                        <?php
							$query = $conn->query("SELECT * FROM lugar");
						    while ($lugar = mysqli_fetch_array($query)) {
								echo '<option value="' . $lugar['id'] . '">' . $lugar['lugar'] . '</option>';
							}
						?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="descripcion">(*) Descripción: </span>
                    <textarea name="descripcion" id="descripcion" class="form-control" type="text" rows="3"
                        required placeholder="Descripcion"></textarea>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="evento">(*) Tipo de Evento:</label>
                    <select class="form-select" name="evento" id="evento" required>
                        <option selected>SELECCIONA EL EVENTO</option>
                        <?php
							$query = $conn->query("SELECT * FROM evento_accidentes");
							while ($evento = mysqli_fetch_array($query)) {
								echo ($evento['evento'] == 'Incidente') ? '' :'<option value="' . $evento['id'] . '">' . $evento['evento'] . '</option>';
							}
						?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="peligro">(*) Peligro Asociado: </label>
                    <select class="form-select" name="peligro" id="peligro" required>
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
                    <span class="input-group-text w-25" for="mecanismo">(*) MECANISMO: </span>
                    <select class="form-select" name="mecanismo" id="mecanismo" required>
                        <option selected>SELECCIONA EL MECANISMO</option>
                        <?php
                            $query = $conn->query("SELECT * FROM mecanismo");
                            while ($mecanismo = mysqli_fetch_array($query)) {
                                echo '<option value="'.$mecanismo['id'].'">'.$mecanismo['mecanismo'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="agente_lesion">(*) Agente de lesion: </label>
                    <select class="form-select" name="agente_lesion" id="agente_lesion" required>
                        <option value="">SELECCIONA EL AGENTE DE LESION</option>
                        <?php
							$query = $conn->query("SELECT * FROM agente_lesion ORDER BY lesion ASC");
							while ($lesion = mysqli_fetch_array($query)) {
								echo '<option value="' . $lesion['id'] . '">' . $lesion['lesion'] . '</option>';
							}
						?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="tipo_lesion">(*) Tipo de lesion: </label>
                    <select class="form-select" name="tipo_lesion" id="tipo_lesion" required>
                        <option value="">SELECCIONA EL TIPO DE LESION</option>
                        <?php
                            $query = $conn->query("SELECT * FROM tipo_lesion ORDER BY lesion ASC");
                            while ($tipo = mysqli_fetch_array($query)) {
                            	echo '<option value="' . $tipo['id'] . '">' . $tipo['lesion'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="parte_afectada">(*) Parte afectada: </label>
                    <select class="form-select" name="parte_afectada" id="parte_afectada" required>
                        <option value="">SELECCIONA EL PARTE AFECTADA</option>
                        <?php
                            $query = $conn->query("SELECT * FROM parte_afectada");
                            while ($parte = mysqli_fetch_array($query)) {
                            	echo '<option value="' . $parte['id'] . '">' . $parte['parte'] . '</option>';
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