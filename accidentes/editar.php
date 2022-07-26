<?php include "../include/conn/conn.php"; 
include("../cond/todo.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <?php include("head.php");?>
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
            <center><strong>¡Hola!</strong> Asegúrate que la información que estas diligenciando esté
                actualizada hasta la fecha, <strong>¡Muchas Gracias!</strong></center>
        </div>
        <hr>
        <?php
            $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM accidentes WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-pencil-square"></i> Editar la Información del
                    accidente</h4>
            </div>
            <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST">

                <div class="control-group">
                    <a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i>
                        Regresar</a>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="id">ID: </span>
                    <input name="id" id="id" class="form-control" type="text" required 
                    autocomplete="off" value="<?php echo $row['id'] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="nombres">Nombres: </span>
                    <input name="nombres" id="nombres" class="form-control" type="text" required 
                    autocomplete="off" value="<?php echo $row['nombres'] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="cedula">Cédula: </span>
                    <input name="cedula" id="cedula" class="form-control" type="number"  
                    required value="<?php echo $row['cedula'] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="cargo">Cargo: </label>
                    <input name="cargo" id="cargo" class="form-control" type="hidden"
                        required value="<?php echo $row['cargo'] ?>" readonly>
                    <input class="form-control" type="text"
                        required value="<?php echo $cargos[$row['cargo']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="proceso">Proceso: </label>
                    <input name="proceso" id="proceso" class="form-control" type="hidden"  required
                        readonly value="<?php echo $row['proceso'] ?>">
                    <input class="form-control" type="text"  required
                        readonly value="<?php echo $procesos[$row['proceso']] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="nucleo">Núcleo: </label>
                    <input name="nucleo" id="nucleo" class="form-control" type="hidden" required
                        readonly value="<?php echo $row['nucleo'] ?>">
                    <input class="form-control" type="text" required
                        readonly value="<?php echo $nucleos[$row['nucleo']] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="supervisor">Supervisor: </label>
                    <input class="form-control" type="hidden" id="supervisor" name="supervisor" 
                        value="<?php echo $row['supervisor'] ?>" readonly>
                    <input class="form-control" type="text"
                        value="<?php echo $supervisores[$row['supervisor']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="hora_evento">Hora del Evento: </label>
                    <input class="form-control" type="time" id="hora_evento" name="hora_evento" 
                        value="<?php echo $row['hora'] ?>" oninput="FranjaHoraria">
                    <input class="form-control" type="text" id="franja" name="franja" 
                        value="<?php echo ($row['hora'] >= '12:00')? 'PM' : 'AM'; ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="dia_evento">Dia del Evento: </label>
                    <select class="form-select" type="text" id="dia_evento" name="dia_evento">
                        <option value="<?php echo $row['dia'] ?>"><?php echo $dias_semana[$row['dia']] ?></option>
                        <?php
                            $query = $conn->query("SELECT * FROM dias");
                            while ($dia = mysqli_fetch_array($query)) {
                                echo ($dias_semana[$row['dia']] == $dia['dia']) ? '' : '<option value="' . $dia['id'] . '">' . $dia['dia'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="mes_evento">(*) Mes del Evento: </label>
                    <select class="form-select" name="mes_evento" id="mes_evento" required>
                        <option value="<?php echo $row['mes'] ?>"><?php echo $meses[$row['mes']] ?></option>
                        <?php
							$query = $conn->query("SELECT * FROM meses");
							while ($mes = mysqli_fetch_array($query)) {
								echo ($meses[$row['mes']] == $mes['mes']) ? '' : '<option value="' . $mes['id'] . '">' . $mes['mes'] . '</option>';
							}
						?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="año_evento">(*) Año del Evento: </label>
                    <input id="año_evento" name="año_evento" type="number" class="form-control" 
                    placeholder="Ingresa el año del evento" value="<?php echo $row['año'] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha_evento">Fecha evento: </span>
                    <input name="fecha_evento" id="fecha_evento" class="form-control" type="date"
                        required oninput="FechaDias()" value="<?php echo $row['fecha_evento'] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha_final">Fecha final: </span>
                    <input name="fecha_final" id="fecha_final" class="form-control" type="date"
                        required oninput="FechaDias()" value="<?php echo $row['fecha_final'] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="dias_incapacidad">Dias de incapacidad: </span>
                    <input name="dias_incapacidad" id="dias_incapacidad" class="form-control" type="number"
                        value="<?php echo $row['dias_incapacidad'] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="finca">Finca: </span>
                    <select name="finca" id="finca" class="form-select" type="text">
                        <option value="<?php echo $row['finca'] ?>"><?php echo $fincas[$row['finca']] ?></option>
                        <?php
                            $query = $conn->query("SELECT * FROM fincas");
                            while ($finca = mysqli_fetch_array($query)) {
                                echo ($fincas[$row['finca']] == $finca['finca']) ? '' : '<option value="' . $finca['id'] . '">' . $finca['finca'] . '</option>';
                            }
                        ?>
                    </select>
                    <span class="input-group-text w-25" for="lugar">Lugar: </span>
                    <select name="lugar" id="lugar" class="form-select" type="text">
                        <option value="<?php echo $row['lugar'] ?>"><?php echo $lugares[$row['lugar']] ?></option>
                        <?php
                            $query = $conn->query("SELECT * FROM lugar");
                            while ($lugar = mysqli_fetch_array($query)) {
                                echo ($lugares[$row['lugar']] == $lugar['lugar']) ? '' : '<option value="' . $lugar['id'] . '">' . $lugar['lugar'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="descripcion">Descripción: </span>
                    <textarea name="descripcion" id="descripcion" class="form-control" type="text" rows="3"
                        required placeholder="Descripcion"><?php echo $row['descripcion']; ?></textarea>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="evento">Tipo de Evento:</label>
                    <select name="evento" id="evento" class="form-select" type="text">
                        <option value="<?php echo $row['evento'] ?>"><?php echo $eventos_acc[$row['evento']] ?></option>
                        <?php
                            $query = $conn->query("SELECT * FROM evento_accidentes");
                            while ($evento = mysqli_fetch_array($query)) {
                                echo ($eventos_acc[$row['evento']] == $evento['evento'] || $evento['id'] == 5) ? '' : '<option value="' . $evento['id'] . '">' . $evento['evento'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="peligro">Peligro Asociado: </label>
                    <select class="form-select" type="text" id="peligro" name="peligro">
                        <option value="<?php echo $row['peligro'] ?>"><?php echo $peligros[$row['peligro']] ?></option>
                        <?php
                            $query = $conn->query("SELECT * FROM peligro_asociado");
                            while ($peligro = mysqli_fetch_array($query)) {
                                echo ($peligros[$row['peligro']] == $peligro['peligro_aso']) ? '' : '<option value="' . $peligro['id'] . '">' . $peligro['peligro_aso'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="mecanismo">MECANISMO: </span>
                    <select class="form-select" type="text" id="mecanismo" name="mecanismo">
                        <option value="<?php echo $row['mecanismo'] ?>"><?php echo $mecanismos[$row['mecanismo']] ?></option>
                        <?php
                            $query = $conn->query("SELECT * FROM mecanismo");
                            while ($mecanismo = mysqli_fetch_array($query)) {
                                echo ($mecanismos[$row['mecanismo']] == $mecanismo['mecanismo']) ? '' : '<option value="' . $mecanismo['id'] . '">' . $mecanismo['mecanismo'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="agente_lesion">Agente de lesion: </label>
                    <select class="form-select" type="text" id="agente_lesion" name="agente_lesion">
                        <option value="<?php echo $row['agente_lesion'] ?>"><?php echo $agente_lesion[$row['agente_lesion']] ?></option>
                        <?php
                            $query = $conn->query("SELECT * FROM agente_lesion ORDER BY lesion ASC");
                            while ($agentes_lesion = mysqli_fetch_array($query)) {
                                echo ($agente_lesion[$row['agente_lesion']] == $agentes_lesion['lesion']) ? '' : '<option value="' . $agentes_lesion['id'] . '">' . $agentes_lesion['lesion'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="tipo_lesion">Tipo de lesion: </label>
                    <select class="form-select" type="text" id="tipo_lesion" name="tipo_lesion">
                        <option value="<?php echo $row['tipo_lesion'] ?>"><?php echo $tipo_lesion[$row['tipo_lesion']] ?></option>
                        <?php
                            $query = $conn->query("SELECT * FROM tipo_lesion ORDER BY lesion ASC");
                            while ($tipos_lesion = mysqli_fetch_array($query)) {
                                echo ($tipo_lesion[$row['tipo_lesion']] == $tipos_lesion['lesion']) ? '' : '<option value="' . $tipos_lesion['id'] . '">' . $tipos_lesion['lesion'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="parte_afectada">Parte afectada: </label>
                    <select name="parte_afectada" id="parte_afectada" class="form-select" type="text">
                        <option value="<?php echo $row['parte_afectada'] ?>"><?php echo $parte_afectada[$row['parte_afectada']] ?></option>
                        <?php
                            $query = $conn->query("SELECT * FROM parte_afectada");
                            while ($partes_afectada = mysqli_fetch_array($query)) {
                                echo ($parte_afectada[$row['parte_afectada']] == $partes_afectada['parte']) ? '' : '<option value="' . $partes_afectada['id'] . '">' . $partes_afectada['parte'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <div class="controls">
                        <input type="submit" name="update" id="update" value="Actualizar"
                            class="btn btn-sm btn-primary">
                        <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
        <!--/.container-->

        <!--/.wrapper--><br>
        <div class="footer span-12">
            <div class="container">
                <center> <b class="copyright"><a href="#">EXFOR S.A.S</a> &copy; <?php echo date("Y")?> Servicios
                        Forestales
                    </b></center>
            </div>
        </div>

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>




</body>

</html>