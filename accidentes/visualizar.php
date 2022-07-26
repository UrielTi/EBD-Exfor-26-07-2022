<?php include "../include/conn/conn.php"; 
    include "../cond/todo.php"; ?>
        <div class="alert alert-success" role="alert">
            <center><strong>Nota:</strong> Si la información que ves aquí es errónea, puedes modificarla
                usando el botón de <strong>"<i class="bi bi-pencil-square"></i> Editar
                    Información"</strong>.</center>
        </div>
        <hr>
        <?php
            $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM accidentes WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
                header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>

        <div class="panel panel-default">

            <form name="form1" id="form1" class="form-horizontal row-fluid" action="visualizar.php" method="GET">

                <div class="input-group shadow-sm">
                    <div class="controls">
                        <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i
                                class="bi bi-pencil-square"></i> Editar Información</a>
                    </div>
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
                    <input name="cargo" id="cargo" class="form-control" type="text"
                        required value="<?php echo $cargos[$row['cargo']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="proceso">Proceso: </label>
                    <input name="proceso" id="proceso" class="form-control" type="text"  required
                        readonly value="<?php echo $procesos[$row['proceso']] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="nucleo">Núcleo: </label>
                    <input name="nucleo" id="nucleo" class="form-control" type="text" required
                        readonly value="<?php echo $nucleos[$row['nucleo']] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="supervisor">Supervisor: </label>
                    <input class="form-control" type="text" id="supervisor" name="supervisor" 
                        value="<?php echo $supervisores[$row['supervisor']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="hora_evento">Hora del Evento: </label>
                    <input class="form-control" type="text" id="hora_evento" name="hora_evento" 
                        value="<?php echo $row['hora']; echo ' '; 
                            if ($row['hora'] >= '12:00'){echo 'PM';}else{echo 'AM';} ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="dia_evento">Dia del Evento: </label>
                    <input class="form-control" type="text" id="dia_evento" name="dia_evento" 
                        value="<?php echo $dias_semana[$row['dia']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="mes_evento">Mes del Evento: </label>
                    <input class="form-control" type="text" id="mes_evento" name="mes_evento" 
                        value="<?php echo $meses[$row['mes']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="año_evento">año del Evento: </label>
                    <input class="form-control" type="text" id="año_evento" name="año_evento" 
                        value="<?php echo $row['año'] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha_evento">Fecha evento: </span>
                    <input name="fecha_evento" id="fecha_evento" class="form-control" type="date"
                        required value="<?php echo $row['fecha_evento'] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha_inicio">Fecha inicial: </span>
                    <input name="fecha_inicio" id="fecha_inicio" class="form-control" type="date"
                        required value="<?php echo $row['fecha_inicio'] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha_final">Fecha final: </span>
                    <input name="fecha_final" id="fecha_final" class="form-control" type="date"
                        required value="<?php echo $row['fecha_final'] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="dias_incapacidad">Dias de incapacidad: </span>
                    <input name="dias_incapacidad" id="dias_incapacidad" class="form-control" type="number"
                        value="<?php echo $row['dias_incapacidad'] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="finca">Finca: </span>
                    <input name="finca" id="finca" class="form-control" type="text"
                        value="<?php echo $fincas[$row['finca']] ?>" readonly>
                    <span class="input-group-text w-25" for="lugar">Lugar: </span>
                    <input name="finca" id="finca" class="form-control" type="text"
                        value="<?php echo $lugares[$row['lugar']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="descripcion">Descripción: </span>
                    <textarea name="descripcion" id="descripcion" class="form-control" type="text" rows="3"
                        required placeholder="Descripcion" readonly><?php echo $row['descripcion']; ?></textarea>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="evento">Tipo de Evento:</label>
                    <input name="evento" id="evento" class="form-control" type="text"
                        value="<?php echo $eventos_acc[$row['evento']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="peligro_aso">Peligro Asociado: </label>
                    <input class="form-control" type="text" id="peligro_aso" name="peligro_aso" 
                        value="<?php echo $peligros[$row['peligro']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="mecanismo">MECANISMO: </span>
                    <input class="form-control" type="text" id="mecanismo" name="mecanismo" 
                        value="<?php echo $mecanismos[$row['mecanismo']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="agente_lesion">Agente de lesion: </label>
                    <input class="form-control" type="text" id="agente_lesion" name="agente_lesion" 
                        value="<?php echo $agente_lesion[$row['agente_lesion']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="tipo_lesion">Tipo de lesion: </label>
                    <input class="form-control" type="text" id="tipo_lesion" name="tipo_lesion" 
                        value="<?php echo $tipo_lesion[$row['tipo_lesion']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="parte_afectada">Parte afectada: </label>
                    <input name="finca" id="finca" class="form-control" type="text"
                        value="<?php echo $parte_afectada[$row['parte_afectada']] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <div class="controls">
                        <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i
                                class="bi bi-pencil-square"></i> Editar Información</a>
                    </div>
                </div>
                <hr>
            </form>
        </div>