<?php 
	include "../include/conn/conn.php";
    include("../cond/todo.php");
?>
                    
					<div class="alert alert-success" role="alert">
                        <center><strong>Nota:</strong> Si la información que ves aquí es errónea, puedes modificarla
                            usando el botón de <strong>"<i class="bi bi-pencil-square"></i> Editar
                                Información"</strong>.</center>
                    </div>
                    <hr>
                    <?php
					$id = intval($_GET['id']);
					$sql = mysqli_query($conn, "SELECT * FROM dotacion WHERE id='$id'");
					if (mysqli_num_rows($sql) == 0) {
						header("Location: index.php");
					} else {
						$row = mysqli_fetch_assoc($sql);
					}
					?>
					
                    <div class="panel panel-default">
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="visualizar.php"
                            method="GET">

                            <div class="input-group shadow-sm">
                                <div class="controls">
                                    <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i
                                            class="bi bi-pencil-square"></i> Editar Información</a>
                                </div>
                            </div>
                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" id="id">ID: </span>
                                <input class="form-control" type="text" name="id" id="id"
                                    value="<?php echo $row['id']; ?>" readonly="readonly">
                            </div>
                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" id="id">Nombres: </span>
                                <input class="form-control" type="text" name="nombres" id="nombres"
                                    value="<?php echo $row['nombre']; ?>" readonly="readonly">
                            </div>
                            <hr>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-25" id="cedula">Cédula: </span>
                                <input class="form-control" type="number" name="cedula" id="cedula" value="<?php echo $row['cedula']; ?>" readonly="readonly">
                            </div>
                            <hr>

                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-25" for="nucleo">Núcleo: </label>
                        <input name="nucleo" id="nucleo" value="<?php echo $nucleos[$row['nucleo']] ?>" 
						class="form-control" type="text" readonly="readonly" />
                    </div>
                    <hr>

                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-25" for="cargo">Cargo: </label>
                        <input name="cargo" id="cargo" value="<?php echo $cargos[$row['cargo']] ?>" class="form-control" type="text" readonly="readonly" />
                    </div>
                    <hr>
					<div class="input-group shadow-sm">
						<span class="input-group-text" for="camisa">(*)Talla camisa:</span>
						<input name="camisa" id="camisa" readonly required class="form-control" type="text" 
							value="<?php echo $row['camisa'] ?>">
						<span class="input-group-text" for="pantalon">(*)Talla pantalon:</span>
						<input name="pantalon" id="pantalon" readonly required class="form-control" type="text"
							value="<?php echo $row['pantalon'] ?>">
					</div>
					<hr>
					<div class="input-group shadow-sm">
						<span class="input-group-text" for="botas">(*)Talla botas:</span>
						<input name="botas" id="botas" readonly required class="form-control" type="text" 
							value="<?php echo $row['botas'] ?>">
						<span class="input-group-text" for="guayo">(*)Talla guayo:</span>
						<input name="guayo" id="guayo" readonly required class="form-control" type="text" 
							value="<?php echo $row['guayo'] ?>">
					</div>
					<hr>

					<div class="input-group shadow-sm">
						<span class="input-group-text" for="fecha1">(*)Primera entrega:</span>
						<input name="fecha1" id="fecha1" class="form-control" readonly type="date" value="<?php echo $row['fecha1'] ?>">
					</div>
					<hr>

					<div class="input-group shadow-sm">
						<span class="input-group-text" for="fecha2">(*)Segunda entrega:</span>
						<input name="fecha2" id="fecha2" class="form-control" readonly type="date" value="<?php echo $row['fecha2'] ?>">
					</div>
					<hr>

					<div class="input-group shadow-sm">
						<span class="input-group-text" for="fecha3">(*)Tercera entrega:</span>
						<input name="fecha3" id="fecha3" class="form-control" readonly type="date" value="<?php echo $row['fecha3'] ?>">
					</div>
					<hr>

                    <div class="control-group">
                        <div class="controls">
							<a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i
                                class="bi bi-pencil-square"></i> Editar Información</a>
                        </div>
                    </div>
                    <hr>
                    </form>
    </div>