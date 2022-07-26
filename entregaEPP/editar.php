<?php include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<head>
		<?php include("head.php"); ?>
	</head>

<body>
	<?php include("../include/navegacion/nav.php"); ?>

	<div class="container-fluid border border-success bg-light">
					<hr>
					<div class="alert alert-success" role="alert">
						<center><strong>¡Hola!</strong> Asegúrate que la información que estas diligenciando esté actualizada hasta la fecha, <strong>¡Muchas Gracias!</strong></center>
					</div>
					<hr>
					<?php
					$id = intval($_GET['id']);
					$sql = mysqli_query($conn, "SELECT * FROM documental WHERE id='$id'");
					if (mysqli_num_rows($sql) == 0) {
					} else {
						$row = mysqli_fetch_assoc($sql);
						$nombres = $row['elemento'];
						$consulta = mysqli_query($conn,"SELECT nombre, precio FROM EPP WHERE nombre = '$nombres'");
						$result = mysqli_fetch_assoc($consulta);
					}
					?>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="bi bi-pencil-square"></i> Editar la Información de la entrega de epp</h4>
						</div>
						<form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" 
							method="POST" enctype="multipart/form-data">

							<div class="input-group shadow-sm">
									<a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i> Regresar</a>
							</div>

							<hr>

							<p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>

							<hr>

							<div class="input-group shadow-sm">
								<span class="input-group-text w-25" for="id">ID: </span>
								<input class="form-control" type="number" name="id" id="id" 
									value="<?php echo $row['id']; ?>" readonly="readonly">
							</div>
							<hr>

							<div class="input-group shadow-sm">
								<span class="input-group-text w-25" for="nombre">(*) Nombre: </span>
								<input class="form-control" type="text" name="nombre" id="nombre" 
									value="<?php echo $row['nombre']; ?>" readonly>
							</div>
							<hr>

							

							<div class="input-group shadow-sm">
								<span class="input-group-text w-25" for="cedula">(*) Cedula: </span>
								<input class="form-control" type="number" name="cedula" id="cedula" 
									value="<?php echo $row['cedula']; ?>" readonly>
							</div>
							<hr>

							<div class="input-group shadow-sm">
								<label class="input-group-text w-25" for="cantidad">(*) Cantidad: </label>
								<input name="cantidad" id="cantidad" value="<?php echo $row['cantidad']; ?>" 
									class="form-control span8 tip" type="number" required oninput="calculo()" readonly>
							</div>
							<hr>

							<div class="input-group shadow-sm">
								<label class="input-group-text w-25" for="elemento">(*) Elemento: </label>
								<input name="elemento" id="elemento" value="<?php echo $row['elemento']; ?>" 
									class="form-control span8 tip" type="text" required readonly>
							</div>
							<hr>

							<div class="input-group shadow-sm">
								<label class="input-group-text w-25" for="precio">(*) Precio: </label>
								<input name="precio" id="precio" class="form-control span8 tip" 
									value="<?php echo $result['precio'];?>" type="number" required readonly>
							</div>
							<hr>

							<div class="input-group shadow-sm">
                                <span class="input-group-text w-25" for="total">(*) Precio total: </span>
                                <input name="total" id="total" class=" form-control" type="number"
                                    placeholder="PRECIO TOTAL DEL ELEMENTO" required readonly
									value="<?php echo $row['precio']; ?>">
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

		<script>
            function multiplicar(valor){
                const precio = document.getElementById('precio').value;
                let valor = parseInt(valor);
                total = document.getElementById('precio').innerHTML;
                total = parseInt(valor) * parseInt(precio);
                document.getElementById('precio').innerHTML=total;
            }
			function calculo() {
				try {
					var TS = parseFloat(document.getElementById("tallaS").value) || 0,
						TM = parseFloat(document.getElementById("tallaM").value) || 0,
						TL = parseFloat(document.getElementById("tallaL").value) || 0,
						TXL = parseFloat(document.getElementById("tallaXL").value) || 0,
						T28 = parseFloat(document.getElementById("talla28").value) || 0,
						T30 = parseFloat(document.getElementById("talla30").value) || 0,
						T32 = parseFloat(document.getElementById("talla32").value) || 0,
						T34 = parseFloat(document.getElementById("talla34").value) || 0,
						T36 = parseFloat(document.getElementById("talla36").value) || 0,
						T38 = parseFloat(document.getElementById("talla38").value) || 0,
						T40 = parseFloat(document.getElementById("talla40").value) || 0,
						T42 = parseFloat(document.getElementById("talla42").value) || 0;
					document.getElementById("cantidad").value = TS+TM+TL+TXL+T28+T30+T32+T34+T36+T38+T40+T42;
					
					var cant = parseFloat(document.getElementById("cantidad").value) || 0,
						price = parseFloat(document.getElementById("precio").value) || 0;
					document.getElementById("total").value = cant * price;
				} catch (e) {}
			}
        </script>

		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>




</body>

</html>