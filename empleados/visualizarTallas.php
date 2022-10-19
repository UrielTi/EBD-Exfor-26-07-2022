<?php 
	include "../include/conn/conn.php";
	include "../cond/todo.php";
?>
                    
        <div class="alert alert-success" role="alert">
            <center><strong>Nota:</strong> Si la información que ves aquí es errónea, puedes modificarla
            usando el botón de <strong>"<i class="bi bi-pencil-square"></i> Editar
            Información"</strong>.</center>
        </div>
        <hr>
        <?php
        $cedula = mysqli_real_escape_string($conn,(strip_tags($_GET['id'], ENT_QUOTES)));
        $sql = mysqli_query($conn, "SELECT * FROM cliente_tallas WHERE cedula='$cedula'");
        if (mysqli_num_rows($sql) == 0) {
        	header("Location: index.php");
        } else {
        	$row = mysqli_fetch_assoc($sql);
        }
        ?>      
        <div class="panel panel-default">
            <form name="form1" id="form1" class="form-horizontal row-fluid" action="visualizarTallas.php" method="GET">
                <div class="control-group">
                    <div class="controls">
                        <a href="editarTallas.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i
                            class="bi bi-pencil-square"></i> Editar Información</a>
                    </div>
                </div>
                <hr>
                <p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>

                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="nombres">(*) nombre: </span>
                    <input name="nombres" id="nombres" class="form-control" type="text" required
                    value="<?php echo $row['nombres'] ?>" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="cedula">(*) cedula: </span>
                    <input name="cedula" id="cedula" class="form-control" type="text" required
                    readonly value="<?php echo $row['cedula'] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="cargo">(*) cargo: </span>
                    <input name="cargo" id="cargo" class="form-control" type="text" required
                    readonly value="<?php echo $cargos[$row['cargo']] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="nucleo">(*) Nucleo: </span>
                    <input name="nucleo" id="nucleo" class="form-control" type="text" required
                    readonly value="<?php echo $nucleos[$row['nucleo']] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="proceso">(*) Proceso: </span>
                    <input name="proceso" id="proceso" class="form-control" type="text" required
                    readonly value="<?php echo $procesos[$row['proceso']] ?>">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="camisa">(*)Talla camisa:</span>
                    <input name="camisa" id="camisa" required class="form-control" type="text" 
                        value="<?php echo $row['camisa'] ?>" readonly>
                    <span class="input-group-text w-25" for="pantalon">(*)Talla pantalon:</span>
                    <input name="pantalon" id="pantalon" required class="form-control" type="text" 
                        value="<?php echo $row['pantalon'] ?>" readonly>
                </div>
				<hr>

				<div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="botas">(*)Talla botas:</span>
                    <input name="botas" id="botas" required class="form-control" type="text" 
                        value="<?php echo $row['botas'] ?>" readonly>
                    <span class="input-group-text w-25" for="guayo">(*)Talla guayo:</span>
					<input name="guayo" id="guayo" required class="form-control" type="text" 
						value="<?php echo $row['guayo'] ?>" readonly>
                </div>
                <hr>

                <div class="control-group">
                    <div class="controls">
                        <a href="editarTallas.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i
                            class="bi bi-pencil-square"></i> Editar Información</a>
                    </div>
                </div>
                <hr>

            </form>
        </div>