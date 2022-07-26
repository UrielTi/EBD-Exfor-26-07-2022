<?php include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<head>
		<?php include("head.php"); ?>
	</head>

<body>
	<?php include("../include/navegacion/nav.php");
	include("../cond/todo.php");?>

	<div class="container-fluid border border-success bg-light">
					<hr>
					<div class="alert alert-success" role="alert">
						<center><strong>¡Hola!</strong> Asegúrate que la información que estas diligenciando esté actualizada hasta la fecha, <strong>¡Muchas Gracias!</strong></center>
					</div>
					<hr>
					<?php
					$id = intval($_GET['id']);
					$sql = mysqli_query($conn, "SELECT * FROM dotacion WHERE id='$id'");
					if (mysqli_num_rows($sql) == 0) {
					} else {
						$row = mysqli_fetch_assoc($sql);
					}
					?>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="bi bi-pencil-square"></i> Editar la Información de la dotacion</h4>
						</div>
						<form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST">

							<div class="input-group shadow-sm">
									<a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i> Regresar</a>
							</div>

							<hr>

							<p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>

							<hr>

							<div class="input-group shadow-sm">
								<span class="input-group-text w-25" id="id">ID: </span>
								<input class="form-control" type="text" name="id" id="id" 
								value="<?php echo $row['id']; ?>" readonly="readonly">
							</div>
							<hr>

							<div class="input-group shadow-sm">
								<span class="input-group-text w-25" id="nombres">(*) Nombres: </span>
								<input class="form-control" type="text" name="nombres" id="nombres" 
								value="<?php echo $row['nombre']; ?>" readonly>
							</div>
							<hr>

							<div class="input-group shadow-sm">
								<span class="input-group-text w-25" id="cedula">(*) Cédula: </span>
								<input class="form-control" type="number" name="cedula" id="cedula" 
								value="<?php echo $row['cedula']; ?>" readonly>
							</div>
							<hr>

							<div class="input-group shadow-sm">
								<label class="input-group-text w-25" for="nucleo">(*) Núcleo: </label>
								<input class="form-control" type="hidden" name="nucleo" id="nucleo" 
								value="<?php echo $row['nucleo']; ?>" readonly>
								<input class="form-control" type="text"
								value="<?php echo $nucleos[$row['nucleo']] ?>" readonly>
							</div>
							<hr>

							<div class="input-group shadow-sm">
								<label class="input-group-text w-25" for="cargo">(*) Cargo: </label>
								<input class="form-control" type="hidden" name="cargo" id="cargo" 
								value="<?php echo $row['cargo']; ?>" readonly>
								<input class="form-control" type="text"
								value="<?php echo $cargos[$row['cargo']] ?>" readonly>
							</div>
							<hr>

							<div class="input-group shadow-sm">
								<span class="input-group-text w-25" for="camisa">(*)Talla camisa:</span>
								<input name="camisa" id="camisa" required class="form-control" type="text" 
									value="<?php echo $row['camisa'] ?>">
								<span class="input-group-text w-25" for="pantalon">(*)Talla pantalon:</span>
								<input name="pantalon" id="pantalon" required class="form-control" type="text" 
									value="<?php echo $row['pantalon'] ?>">
							</div>
							<hr>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-25" for="botas">(*)Talla botas:</span>
								<input name="botas" id="botas" required class="form-control" type="text" 
									value="<?php echo $row['botas'] ?>">
								<span class="input-group-text w-25" for="guayo">(*)Talla guayo:</span>
								<input name="guayo" id="guayo" required class="form-control" 
									type="text" value="<?php echo $row['guayo'] ?>">
							</div>
							<hr>

							<div class="input-group shadow-sm">
								<span class="input-group-text w-25" for="fecha1">(*)Primera entrega:</span>
								<input name="fecha1" id="fecha1" class="form-control" type="date" value="<?php echo $row['fecha1'] ?>">
								<span class="input-group-text" for="fecha2">(*)Segunda entrega:</span>
								<input name="fecha2" id="fecha2" class="form-control" type="date" value="<?php echo $row['fecha2'] ?>">
								<span class="input-group-text" for="fecha3">(*)Tercera entrega:</span>
								<input name="fecha3" id="fecha3" class="form-control" type="date" value="<?php echo $row['fecha3'] ?>">
							</div>
							<hr>

							<div class="input-group shadow-sm">
								<div class="controls">
									<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary" />
									<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
								</div>
							</div>
						</form>
		</div>
		<!--/.container-->

		<!--/.wrapper--><br>
		<div class="card-footer">
			<div class="container">
				<center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios Forestales </b></center>
			</div>
		</div>

		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>




</body>

</html>