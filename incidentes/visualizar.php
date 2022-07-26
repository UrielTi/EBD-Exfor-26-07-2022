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
			$sql = mysqli_query($conn, "SELECT * FROM incidentes WHERE id='$id'");
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

                <?php } elseif ($row['nombres'] == '' && $row['labor'] == ''){ ?>

                    <div class="ocultoMaquina">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-25" for="maquina">Maquina: </span>
                            <input name="maquina" id="maquina" class="form-control" type="text" 
                                placeholder="Ingrese el nombre de la maquina" list="maquinaList"
                                value="<?php echo $row['maquina'] ?>" readonly>
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
                            <input name="labor" id="labor" class="form-control" type="text" readonly
                                placeholder="Ingrese el labor" value="<?php echo $row['labor'] ?>">
                        </div>
                        <hr>
                    </div>

                <?php } ?>

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
                        value="<?php echo $row['mecanismo'] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="agente_evento">(*) Agente de evento: </label>
                    <input type="text" class="form-control" name="agente_evento" id="agente_evento" 
                        required value="<?php echo $row['agente_evento'] ?>" readonly>
                </div>
                <hr>
                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="categoria_daño">(*) Categoria de daño: </label>
                    <select class="form-select" name="categoria_daño" id="categoria_daño" required disabled>
                        <option value="<?php echo $row['categoria_daño'] ?>"><?php echo $cat_daño[$row['categoria_daño']] ?></option>
                    </select>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="daño_propiedad">(*) ¿Generó daño a la propiedad?: </label>
                    <input type="text" class="form-control" name="daño_propiedad" id="daño_propiedad" readonly
                        value="<?php echo $row['daño_propiedad'] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="daño_ambiental">(*) ¿Generó daño ambiental?: </label>
                    <input type="text" class="form-control" name="daño_ambiental" id="daño_ambiental" readonly
                        value="<?php echo $row['daño_ambiental'] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="daño_ocasionado">(*) Daño ocasionado: </label>
                    <input type="text" class="form-control" name="daño_ocasionado" id="daño_ocasionado" 
                        required value="<?php echo $row['daño_ocasionado'] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="personas_afectadas">(*) Numero de personas afectadas: </label>
                    <input type="number" class="form-control" name="personas_afectadas" id="personas_afectadas" 
                        required value="<?php echo $row['personas_afectadas'] ?>"
                        readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="horas_afectados">(*) Horas perdidas de afectados: </label>
                    <input type="number" class="form-control" name="horas_afectados" id="horas_afectados" 
                        required value="<?php echo $row['horas_afectados'] ?>"
                        readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="personas_involucradas">(*) Numero de personas involucradas: </label>
                    <input type="number" class="form-control" name="personas_involucradas" id="personas_involucradas" 
                        required value="<?php echo $row['personas_involucradas'] ?>"
                        readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="horas_involucrados">(*) Horas perdidas de involucrados: </label>
                    <input type="number" class="form-control" name="horas_involucrados" id="horas_involucrados" 
                        required value="<?php echo $row['horas_involucrados'] ?>"
                        readonly>
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
                        <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i
                                class="bi bi-pencil-square"></i> Editar Información</a>
                    </div>
                </div>
                <hr>
            </form>
        </div>