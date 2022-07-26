<?php include "../include/conn/conn.php";
include("../cond/todo.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <?php include("head.php");?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
    <script>
        $(function() {
            $("#dx").autocomplete({
                source: "../include/diagnostico/dx.php",
                minLength: 2,
                select: function(event, ui) {
                    event.preventDefault();
                    $('#dx').val(ui.item.value);
                    $('#diagnostico').val(ui.item.diagnostico);
                }
            });
        });
        </script>
        <script>
        $(document).ready(function() {
            $("#evento").focusout(function() {
                $.ajax({
                    url: '../include/mostrar/mostrar.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        evento: $('#evento').val()
                    }
                }).done(function(respuesta) {
                    $("#diagnosticoOculto").css("visibility",respuesta.diagnostico);
                    $("#descripcionOculta").css("visibility",respuesta.descripcion);
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
            <center><strong>¡Hola!</strong> Asegúrate que la información que estas diligenciando esté
                actualizada hasta la fecha, <strong>¡Muchas Gracias!</strong></center>
        </div>
        <hr>
        <?php
            $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM ausentismo WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
        <script>
        $(document).ready(function() {
            $("#evento").focusout(function() {
                $.ajax({
                    url: '../include/mostrar/mostrar.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        evento: $('#evento').val()
                    }
                }).done(function(respuesta) {
                    $("#diagnosticoOculto").css("visibility",respuesta.diagnostico);
                    $("#descripcionOculta").css("visibility",respuesta.descripcion);
                });
            });
        });
        </script>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-pencil-square"></i> Editar la Información del
                    ausentismo</h4>
            </div>
            <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST">

                <div class="control-group">
                    <a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i>
                        Regresar</a>
                </div>
                <hr>

                <input class="form-control" type="hidden" name="id" id="id"
                        value="<?php echo $row['id']; ?>" required readonly>

                <div class="input-group shadow-sm">
                    <label for="mes_evento" class="input-group-text w-25">(*) Mes del Evento:</label>
                    <input class="form-control" type="hidden" name="mes_evento" id="mes_evento" required 
                        value="<?php echo $row['mes_evento'] ?>" readonly>
                    <input class="form-control" type="text" required 
                        value="<?php echo $meses[$row['mes_evento']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" id="nombres">(*) Nombres: </span>
                    <input class="form-control" type="text" name="nombres" id="nombres"
                        value="<?php echo $row['nombres']; ?>" required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" id="cedula">(*) Cédula: </span>
                    <input class="form-control" type="number" name="cedula" id="cedula"
                        value="<?php echo $row['cedula']; ?>" required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="cargo">(*) Cargo: </span>
                    <input class="form-control" name="cargo" id="cargo" type="hidden" 
                        value="<?php echo $row['cargo'] ?>" required readonly>
                    <input class="form-control"
                        value="<?php echo $cargos[$row['cargo']] ?>" required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="proceso">(*) Proceso: </span>
                    <input class="form-control" name="proceso" id="proceso" type="hidden" 
                        value="<?php echo $row['proceso']; ?>" required readonly>
                    <input class="form-control" 
                        value="<?php echo $procesos[$row['proceso']]; ?>" required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="nucleo">(*) Núcleo: </span>
                    <input class="form-control" name="nucleo" id="nucleo" type="hidden" 
                        value="<?php echo $row['nucleo']; ?>" required readonly>
                    <input class="form-control" 
                        value="<?php echo $nucleos[$row['nucleo']]; ?>" required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="eps">(*) EPS: </span>
                    <input class="form-control" name="eps" id="eps" type="hidden"
                        value="<?php echo $row['eps']; ?>" required readonly>
                    <input class="form-control"
                        value="<?php echo $epss[$row['eps']]; ?>" required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha_inicio">(*) Fecha de Inicio: </span>
                    <input name="fecha_inicio" value="<?php echo $row['fecha_inicio']; ?>" id="fecha_inicio"
                        class=" form-control" oninput="FechaDias()" type="date" required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha_final">(*) Fecha Final: </span>
                    <input name="fecha_final" value="<?php echo $row['fecha_final']; ?>" id="fecha_final" type="date"
                        class="form-control" oninput="FechaDias()" required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="dias_ausentismo">(*) Dias de ausentismo:
                    </span>
                    <input name="dias_ausentismo" value="<?php echo $row['dias_ausentismo']; ?>" id="dias_ausentismo"
                        class=" form-control" type="number" required readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="prorroga">(*) ¿Es Prorroga?: </label>
                    <select class="form-select" name="prorroga" id="prorroga" required>
                        <option value="1" <?php if ($row['prorroga'] == 1) {
															echo "selected";
														} ?>>SI</option>
                        <option value="2" <?php if ($row['prorroga'] == 2) {
															echo "selected";
														} ?>>NO</option>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="evento">(*) Tipo de Evento: </label>
                    <select class="form-select" name="evento" id="evento" required>
                        <option value="1" <?php if ($row['evento'] == 1) {
                        	echo "selected";
                        } ?>>ACCIDENTE DE TRABAJO</option>
                        <option value="2" <?php if ($row['evento'] == 2) {
                        	echo "selected";
                        } ?>>ACCIDENTE DE TRÁNSITO</option>
                        <option value="3" <?php if ($row['evento'] == 3) {
                        	echo "selected";
                        } ?>>ACCIDENTE LABORAL</option>
                        <option value="4" <?php if ($row['evento'] == 4) {
                        	echo "selected";
                        } ?>>ENFERMEDAD GENERAL</option>
                        <option value="5" <?php if ($row['evento'] == 5) {
                        	echo "selected";
                        } ?>>LICENCIA</option>
                        <option value="6" <?php if ($row['evento'] == 6) {
                        	echo "selected";
                        } ?>>CALAMIDAD DOMESTICA</option>
                        <option value="7" <?php if ($row['evento'] == 7) {
                        	echo "selected";
                        } ?>>INJUSTIFICADA</option>
                        <option value="8" <?php if ($row['evento'] == 8) {
                        	echo "selected";
                        } ?>>PERMISO LABORAL</option>
                    </select>
                </div>
                <hr>
                
                <div class="input-group shadow-sm" id="diagnosticoOculto">
                    <span class="input-group-text w-25" for="dx">(*) Diagnostico (DX):</span>
                    <input name="dx" id="dx" class="form-control" type="text" value="<?php echo $row['dx'] ?>" placeholder="DX" autocomplete="off">
                    <textarea name="diagnostico" id="diagnostico" class="form-control" type="text"
                        placeholder="Diagnóstico" rows="1" required readonly><?php echo $row['diagnostico'] ?></textarea>
                </div>
                <hr>

                <div class="input-group shadow-sm" id="descripcionOculta">
                    <span class="input-group-text w-25" for="descripcion">(*) Descripción: </span>
                    <textarea name="descripcion" value="<?php echo $row['descripcion']; ?>" id="descripcion"
                        class="form-control" type="text" rows="3" required><?php echo $row['descripcion'] ?></textarea>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="peligro_aso">(*) Peligro Asociado: </label>
                    <select class="form-select" name="peligro_aso" id="peligro_aso" required>
                        <option value="1" <?php if ($row['peligro_aso'] == 1) {
                            	echo "selected";
                            } ?>>BIOLÓGICO</option>
                        <option value="2" <?php if ($row['peligro_aso'] == 2) {
                            	echo "selected";
                            } ?>>BIOMECÁNICO</option>
                        <option value="3" <?php if ($row['peligro_aso'] == 3) {
                            	echo "selected";
                            } ?>>CONDICIONES DE SEGURIDAD</option>
                        <option value="4" <?php if ($row['peligro_aso'] == 4) {
                            	echo "selected";
                            } ?>>FÍSICO</option>
                        <option value="5" <?php if ($row['peligro_aso'] == 5) {
                            	echo "selected";
                            } ?>>QUÍMICO</option>
                        <option value="6" <?php if ($row['peligro_aso'] == 6) {
                            	echo "selected";
                            } ?>>PSICOLABORAL</option>
                        <option value="7" <?php if ($row['peligro_aso'] == 7) {
                            	echo "selected";
                            } ?>>LOCATIVO</option>
                        <option value="8" <?php if ($row['peligro_aso'] == 8) {
                            	echo "selected";
                            } ?>>MECÁNICO</option>
                        <option value="9" <?php if ($row['peligro_aso'] == 9) {
                            	echo "selected";
                            } ?>>TRÁNSITO</option>
                        <option value="10" <?php if ($row['peligro_aso'] == 10) {
                            	echo "selected";
                            } ?>>PÚBLICO</option>
                        <option value="11" <?php if ($row['peligro_aso'] == 11) {
                            	echo "selected";
                            } ?>>FENÓMENOS NATURALES</option>
                        <option value="13" <?php if ($row['peligro_aso'] == 13) {
                            	echo "selected";
                            } ?>>ILUMINACION</option>
                        <option value="14" <?php if ($row['peligro_aso'] == 14) {
                            	echo "selected";
                            } ?>>VIBRACION</option>
                        <option value="15" <?php if ($row['peligro_aso'] == 15) {
                            	echo "selected";
                            } ?>>TEMPERATURAS EXTREMAS</option>
                        <option value="16" <?php if ($row['peligro_aso'] == 16) {
                            	echo "selected";
                            } ?>>PRESION ATMOSFERICA</option>
                        <option value="17" <?php if ($row['peligro_aso'] == 17) {
                            	echo "selected";
                            } ?>>RADIACIONES IONIZANTES</option>
                        <option value="18" <?php if ($row['peligro_aso'] == 18) {
                            	echo "selected";
                            } ?>>RADIACIONES NO IONIZANTES</option>
                        <option value="19" <?php if ($row['peligro_aso'] == 19) {
                            	echo "selected";
                            } ?>>RUIDO</option>
                        <option value="20" <?php if ($row['peligro_aso'] == 20) {
                            	echo "selected";
                            } ?>>ELECTRICO</option>
                        <option value="21" <?php if ($row['peligro_aso'] == 21) {
                            	echo "selected";
                            } ?>>TECNOLOGICO</option>
                        <option value="22" <?php if ($row['peligro_aso'] == 22) {
                            	echo "selected";
                            } ?>>TRABAJO EN ALTURAS</option>
                        <option value="23" <?php if ($row['peligro_aso'] == 23) {
                            	echo "selected";
                            } ?>>ESPACIOS CONFINADOS</option>           
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="sve">(*) SVE/Programa: </span>
                    <select class="form-select" name="sve" id="sve" required>
                        <option value="1" <?php if ($row['sve'] == 1) {
                            	echo "selected";
                            } ?>>HIPOACUSIA NEUROSENCONRIAL BILATERAL</option>
                        <option value="2" <?php if ($row['sve'] == 2) {
                            	echo "selected";
                            } ?>>DESORDENES MUSCULOESQUELETICOS</option>
                        <option value="3" <?php if ($row['sve'] == 3) {
                            	echo "selected";
                            } ?>>SEGURIDAD INDUSTRIAL</option>
                        <option value="4" <?php if ($row['sve'] == 4) {
                            	echo "selected";
                            } ?>>HIGIENE INDUSTRIAL</option>
                        <option value="5" <?php if ($row['sve'] == 5) {
                            	echo "selected";
                            } ?>>RIESGO MECÁNICO</option>
                        <option value="6" <?php if ($row['sve'] == 6) {
                            	echo "selected";
                            } ?>>RIESGO QUÍMICO</option>
                        <option value="7" <?php if ($row['sve'] == 7) {
                            	echo "selected";
                            } ?>>FÍSICO</option>
                        <option value="8" <?php if ($row['sve'] == 8) {
                            	echo "selected";
                            } ?>>OSTEOMUSCULAR</option>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="estado">(*) Estado: </label>
                    <select class="form-select" name="estado" id="estado" required>
                        <option value="1" <?php if ($row['estado'] == 1) {
                        echo "selected";
                    }?>>RADICADA</option>
                        <option value="2" <?php if ($row['estado'] == 2) {
                        echo "selected";
                    }?>>PENDIENTE POR RADICAR</option>
                        <option value="3" <?php if ($row['estado'] == 3) {
                        echo "selected";
                    }?>>APROBADA</option>
                        <option value="4" <?php if ($row['estado'] == 4) {
                        echo "selected";
                    }?>>LIQUIDADA</option>
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