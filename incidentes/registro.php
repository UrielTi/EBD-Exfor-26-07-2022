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
        $("#opciones").focusout(function() {
            $.ajax({
                url: '../include/mostrar/mostrarELM.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    opcion: $('#opciones').val()
                }
            }).done(function(respuesta) {
                $(".ocultoEmpleado").css("display",respuesta.ocultoEmpleado);
                $(".ocultoMaquina").css("display",respuesta.ocultoMaquina);
                $(".ocultoLabor").css("display",respuesta.ocultoLabor);
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
        function CalcularTotalHorasPersonas(){
            var personas_afectadas = document.getElementById('personas_afectadas').value,
                horas_afectados = document.getElementById('horas_afectados').value,
                personas_involucradas = document.getElementById('personas_involucradas').value,
                horas_involucrados = document.getElementById('horas_involucrados').value,
                resultado = 3725 * ((personas_afectadas * horas_afectados) + (personas_involucradas * horas_involucrados));
            document.getElementById('total').value=resultado;
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
            $maquina = mysqli_real_escape_string($conn, (strip_tags($_POST['maquina'], ENT_QUOTES)));
            $labor = mysqli_real_escape_string($conn, (strip_tags($_POST['labor'], ENT_QUOTES)));
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
        	$peligro = mysqli_real_escape_string($conn, (strip_tags($_POST['peligro'], ENT_QUOTES)));
        	$finca = mysqli_real_escape_string($conn, (strip_tags($_POST['finca'], ENT_QUOTES)));
        	$lugar = mysqli_real_escape_string($conn, (strip_tags($_POST['lugar'], ENT_QUOTES)));
            $descripcion = mysqli_real_escape_string($conn, (strip_tags($_POST['descripcion'], ENT_QUOTES)));
        	$evento = mysqli_real_escape_string($conn, (strip_tags($_POST['evento'], ENT_QUOTES)));
        	$mecanismo = mysqli_real_escape_string($conn, (strip_tags($_POST['mecanismo'], ENT_QUOTES)));
        	$agente_evento = mysqli_real_escape_string($conn, (strip_tags($_POST['agente_evento'], ENT_QUOTES)));
        	$categoria_daño = mysqli_real_escape_string($conn, (strip_tags($_POST['categoria_daño'], ENT_QUOTES)));
        	$daño_propiedad = mysqli_real_escape_string($conn, (strip_tags($_POST['daño_propiedad'], ENT_QUOTES)));
            $daño_ambiental = mysqli_real_escape_string($conn, (strip_tags($_POST['daño_ambiental'], ENT_QUOTES)));
            $daño_ocasionado = mysqli_real_escape_string($conn, (strip_tags($_POST['daño_ocasionado'], ENT_QUOTES)));
            $personas_afectadas = mysqli_real_escape_string($conn, (strip_tags($_POST['personas_afectadas'], ENT_QUOTES)));
            $horas_afectados = mysqli_real_escape_string($conn, (strip_tags($_POST['horas_afectados'], ENT_QUOTES)));
            $personas_involucradas = mysqli_real_escape_string($conn, (strip_tags($_POST['personas_involucradas'], ENT_QUOTES)));
            $horas_involucrados = mysqli_real_escape_string($conn, (strip_tags($_POST['horas_involucrados'], ENT_QUOTES)));
            $total = mysqli_real_escape_string($conn, (strip_tags($_POST['total'], ENT_QUOTES)));
        
            $insert = mysqli_query($conn, "INSERT INTO incidentes(id, maquina, labor, nombres, cedula, cargo, nucleo, proceso, supervisor, hora, dia, mes, año, fecha_evento, peligro, finca, lugar, descripcion, evento, mecanismo, agente_evento, categoria_daño, daño_propiedad, daño_ambiental, daño_ocasionado, personas_afectadas, horas_afectados, personas_involucradas, horas_involucrados, total)
                VALUES(NULL, '$maquina', '$labor', '$nombres', '$cedula', '$cargo', '$nucleo', '$proceso', '$supervisor','$hora','$dia', '$mes', '$año', '$fecha_evento', '$peligro', '$finca', '$lugar', '$descripcion', '$evento', '$mecanismo', '$agente_evento', '$categoria_daño', '$daño_propiedad', '$daño_ambiental','$daño_ocasionado','$personas_afectadas', '$horas_afectados','$personas_involucradas','$horas_involucrados','$total')") or die(mysqli_error($conn));
        	if ($insert) {
        		echo '<div class="alert alert-success alert-dismissable"><button type="button" class="btn-close" aria-label="Close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
        	} else {
        		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
        	}
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-person-plus-fill"></i> Ingresar un incidente </h4>
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
                    <label class="input-group-text w-25" for="opciones">Incidentes: </label>
                    <select name="opciones" id="opciones" class="form-select" required>
                        <option value="Empleado">Incidente por empleado</option>
                        <option value="Labor">Incidente por labor</option>
                        <option value="Maquina">Incidente por maquina</option>
                    </select>
                </div>
                <hr>
                <div class="ocultoEmpleado">
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-25" for="nombres">(*) Nombres: </span>
                        <input name="nombres" id="nombres" class="form-control" type="text" 
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
                        <input name="cedula" id="cedula" class="form-control" type="number" placeholder="Cédula"
                            readonly value="0">
                    </div>
                    <hr>

                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-25" for="cargo">Cargo: </label>
                        <input name="cargo" id="cargo" class="form-control" type="hidden"
                         readonly>
                        <input name="cargo1" id="cargo1" class="form-control" type="text" placeholder="Cargo del empleado"
                         readonly>
                    </div>
                    <hr>

                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-25" for="proceso">Proceso: </label>
                        <input name="proceso" id="proceso" class="form-control" type="hidden"
                            readonly>
                        <input name="proceso1" id="proceso1" class="form-control" type="text" placeholder="Proceso"
                            readonly>
                    </div>
                    <hr>

                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-25" for="nucleo">Núcleo: </label>
                        <input name="nucleo" id="nucleo" class="form-control" type="hidden"
                            readonly>
                        <input name="nucleo1" id="nucleo1" class="form-control" type="text" placeholder="Núcleo"
                            readonly>
                    </div>
                    <hr>
                </div>
            
                <div class="ocultoMaquina" style="display:none;">
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-25" for="maquina">Maquina: </span>
                        <input name="maquina" id="maquina" class="form-control" type="text" 
                            placeholder="Ingrese el nombre de la maquina" list="maquinaList">
                        <datalist id="maquinaList">
                            <?php
                                $query = $conn->query("SELECT * FROM sistemas");
                                while ($sistema = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $sistema['sistema'] . '"></option>';
                                }
                            ?>
                        </datalist>
                    </div>
                    <hr>
                </div>

                <div class="ocultoLabor" style="display:none;">
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-25" for="labor">Labor: </span>
                        <input name="labor" id="labor" class="form-control" type="text" 
                            placeholder="Ingrese el labor">
                    </div>
                    <hr>
                </div>

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
                        placeholder="Fecha" oninput="FechaDias()" required>
                </div>
                <hr>

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
                        <option value="5">Incidente</option>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="peligro">(*) Peligro Asociado: </label>
                    <select class="form-select" name="peligro" id="peligro" required>
                        <option selected>SELECCIONA EL PELIGRO ASOCIADO</option>
                        <?php
							$query = $conn->query("SELECT * FROM peligro_asociado ORDER BY peligro_aso ASC");
							while ($peligro = mysqli_fetch_array($query)) {
								echo '<option value="' . $peligro['id'] . '">' . $peligro['peligro_aso'] . '</option>';
							}
						?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="mecanismo">(*) MECANISMO: </span>
                    <input type="text" class="form-control" name="mecanismo" id="mecanismo" 
                        required placeholder="Ingresa el mecanismo">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="agente_evento">(*) Agente de evento: </label>
                    <input type="text" class="form-control" name="agente_evento" id="agente_evento" 
                        required placeholder="Ingrese el agente de evento">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="categoria_daño">(*) Categoria de daño: </label>
                    <select class="form-select" name="categoria_daño" id="categoria_daño" required>
                        <option value="">SELECCIONA LA CATEGORIA DE DAÑO</option>
                        <?php
                            $query = $conn->query("SELECT * FROM categoria_daño ORDER BY categoria ASC");
                            while ($daño = mysqli_fetch_array($query)) {
                            	echo '<option value="' . $daño['id'] . '">' . $daño['categoria'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="daño_propiedad">(*) ¿Generó daño a la propiedad?: </label>
                    <select class="form-select" name="daño_propiedad" id="daño_propiedad" required>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="daño_ambiental">(*) ¿Generó daño ambiental?: </label>
                    <select class="form-select" name="daño_ambiental" id="daño_ambiental" required>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="daño_ocasionado">(*) Daño ocasionado: </label>
                    <input type="text" class="form-control" name="daño_ocasionado" id="daño_ocasionado" 
                        required placeholder="Ingrese el daño ocasionado">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="personas_afectadas">(*) Numero de personas afectadas: </label>
                    <input type="number" class="form-control" name="personas_afectadas" id="personas_afectadas" 
                        required placeholder="Ingrese el numero de personas afectadas"
                        oninput="CalcularTotalHorasPersonas()">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="horas_afectados">(*) Horas perdidas de afectados: </label>
                    <input type="number" class="form-control" name="horas_afectados" id="horas_afectados" 
                        required placeholder="Ingrese las horas perdidas de los afectados"
                        oninput="CalcularTotalHorasPersonas()">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="personas_involucradas">(*) Numero de personas involucradas: </label>
                    <input type="number" class="form-control" name="personas_involucradas" id="personas_involucradas" 
                        required placeholder="Ingrese el numero de personas involucradas"
                        oninput="CalcularTotalHorasPersonas()">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="horas_involucrados">(*) Horas perdidas de involucrados: </label>
                    <input type="number" class="form-control" name="horas_involucrados" id="horas_involucrados" 
                        required placeholder="Ingrese las horas perdidas de los involucrados"
                        oninput="CalcularTotalHorasPersonas()">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="total">(*) Total: </label>
                    <input type="number" class="form-control" name="total" id="total" 
                        required placeholder="total" readonly>
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