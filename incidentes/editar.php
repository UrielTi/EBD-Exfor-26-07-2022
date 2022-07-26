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
            <center><strong>¡Hola!</strong> Asegúrate que la información que estas diligenciando esté
                actualizada hasta la fecha, <strong>¡Muchas Gracias!</strong></center>
        </div>
        <hr>
        <?php
            $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM incidentes WHERE id='$id'");
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

                <?php if ($row['labor'] == '' && $row['maquina'] == ''){ ?>

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
                <?php } elseif ($row['nombres'] == '' && $row['labor'] == ''){ ?>

                    <div class="ocultoMaquina">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-25" for="maquina">Maquina: </span>
                            <input name="maquina" id="maquina" class="form-control" type="text" 
                                placeholder="Ingrese el nombre de la maquina" list="maquinaList"
                                value="<?php echo $row['maquina'] ?>">
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
                <?php } else { ?>
                    <div class="ocultoLabor">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-25" for="labor">Labor: </span>
                            <input name="labor" id="labor" class="form-control" type="text" 
                                placeholder="Ingrese el labor" value="<?php echo $row['labor'] ?>">
                        </div>
                        <hr>
                    </div>
                <?php } ?>

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
                        value="<?php echo ($row['hora'] >= '12:00')? 'PM' : 'AM'; ?>">
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
                    <span class="input-group-text w-25" for="finca">Finca: </span>
                    <select name="finca" id="finca" class="form-select" type="text">
                        <option value="<?php echo $row['finca'] ?>"><?php echo $fincas[$row['finca']] ?></option>
                        <?php
                            $query = $conn->query("SELECT * FROM fincas");
                            while ($finca = mysqli_fetch_array($query)) {
                                echo ($row['finca'] == $finca['id']) ? '' : '<option value="' . $finca['id'] . '">' . $finca['finca'] . '</option>';
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
                    <span class="input-group-text w-25" for="mecanismo">(*) MECANISMO: </span>
                    <input type="text" class="form-control" name="mecanismo" id="mecanismo" 
                        required value="<?php echo $row['mecanismo'] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="agente_evento">(*) Agente de evento: </label>
                    <input type="text" class="form-control" name="agente_evento" id="agente_evento" 
                        required value="<?php echo $row['agente_evento'] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="categoria_daño">(*) Categoria de daño: </label>
                    <select class="form-select" name="categoria_daño" id="categoria_daño" required>
                        <option value="<?php echo $row['categoria_daño'] ?>"><?php echo $cat_daño[$row['categoria_daño']] ?></option>
                        <?php
                            $query = $conn->query("SELECT * FROM categoria_daño ORDER BY categoria ASC");
                            while ($daño = mysqli_fetch_array($query)) {
                            	echo ($daño['id'] == $row['categoria_daño'])? '':'<option value="' . $daño['id'] . '">' . $daño['categoria'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="daño_propiedad">(*) ¿Generó daño a la propiedad?: </label>
                    <select class="form-select" name="daño_propiedad" id="daño_propiedad" required>
                        <? if ($row['daño_propiedad'] == 'Si'){
                            echo '<option value="Si">Si</option>
                                <option value="No">No</option>';
                        }else{
                            echo '<option value="No">No</option>
                                <option value="Si">Si</option>';
                        } ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="daño_ambiental">(*) ¿Generó daño ambiental?: </label>
                    <select class="form-select" name="daño_ambiental" id="daño_ambiental" required>
                    <? if ($row['daño_ambiental'] == 'Si'){
                            echo '<option value="Si">Si</option>
                                <option value="No">No</option>';
                        }else{
                            echo '<option value="No">No</option>
                                <option value="Si">Si</option>';
                        } ?>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="daño_ocasionado">(*) Daño ocasionado: </label>
                    <input type="text" class="form-control" name="daño_ocasionado" id="daño_ocasionado" 
                        required value="<?php echo $row['daño_ocasionado'] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="personas_afectadas">(*) Numero de personas afectadas: </label>
                    <input type="number" class="form-control" name="personas_afectadas" id="personas_afectadas" 
                        required value="<?php echo $row['personas_afectadas'] ?>"
                        oninput="CalcularTotalHorasPersonas()">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="horas_afectados">(*) Horas perdidas de afectados: </label>
                    <input type="number" class="form-control" name="horas_afectados" id="horas_afectados" 
                        required value="<?php echo $row['horas_afectados'] ?>"
                        oninput="CalcularTotalHorasPersonas()">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="personas_involucradas">(*) Numero de personas involucradas: </label>
                    <input type="number" class="form-control" name="personas_involucradas" id="personas_involucradas" 
                        required value="<?php echo $row['personas_involucradas'] ?>"
                        oninput="CalcularTotalHorasPersonas()">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="horas_involucrados">(*) Horas perdidas de involucrados: </label>
                    <input type="number" class="form-control" name="horas_involucrados" id="horas_involucrados" 
                        required value="<?php echo $row['horas_involucrados'] ?>"
                        oninput="CalcularTotalHorasPersonas()">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="total">(*) Total: </label>
                    <input type="number" class="form-control" name="total" id="total" 
                        required value="<?php echo $row['total'] ?>" readonly>
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