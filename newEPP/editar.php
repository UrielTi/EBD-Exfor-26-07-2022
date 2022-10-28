<?php include '../include/conn/conn.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>

	<head>
		<?php include("head.php"); ?>
	</head>

<body>
	<?php include("../include/navegacion/nav.php"); ?>

	<div class="container-fluid border border-success bg-light">
		<hr>
		<div class="alert alert-success" role="alert">
			<center><strong>¡Hola!</strong> Asegúrate que la información que estas diligenciando esté actualizada hasta
				la fecha, <strong>¡Muchas Gracias!</strong></center>
		</div>
		<hr>
		<?php
		$id = intval($_GET['id']);
		$sql = mysqli_query($conn, "SELECT * FROM epp WHERE id='$id'");
		if (mysqli_num_rows($sql) == 0) {
			echo '<div class="alert alert-danger alert-dismissable">&nbsp; Error 404 apartado no encontrado &nbsp;<a href="index.php"  class="btn btn-outline-danger" data-dismiss="alert" aria-hidden="true">Volver al menú principal &times;</a></div>';
		} else {
			// Array con info
			$row = mysqli_fetch_assoc($sql);
			// Datos para generar los readonly
			$consultaEppTipoTalla = mysqli_query($conn, "SELECT tipo_talla FROM epp WHERE id=$id");
			$row_epp_talla = mysqli_fetch_assoc($consultaEppTipoTalla);
			// Function que generar los Datos para el list
			function ElementoTallas($conn, $id_elemento, $talla)
			{
				$consultaEppTallas = mysqli_query($conn, "SELECT * FROM elemento_tallas WHERE id_elemento='$id_elemento' AND talla='$talla'");
				while (mysqli_num_rows($consultaEppTallas) > 0) {
					$rowEppTallas = mysqli_fetch_assoc($consultaEppTallas);
					return array($rowEppTallas['cantidad'], $rowEppTallas['precio'], $rowEppTallas['id']);
				}
			}
			list($cantidadU, $precioU, $id_tallaU) = ElementoTallas($conn, $id, 'U');
			list($cantidadS, $precioS, $id_tallaS) = ElementoTallas($conn, $id, 'S');
			list($cantidadM, $precioM, $id_tallaM) = ElementoTallas($conn, $id, 'M');
			list($cantidadL, $precioL, $id_tallaL) = ElementoTallas($conn, $id, 'L');
			list($cantidadXL, $precioXL, $id_tallaXL) = ElementoTallas($conn, $id, 'XL');
			list($cantidadXXL, $precioXXL, $id_tallaXXL) = ElementoTallas($conn, $id, 'XXL');
			list($cantidad28, $precio28, $id_talla28) = ElementoTallas($conn, $id, '28');
			list($cantidad29, $precio29, $id_talla29) = ElementoTallas($conn, $id, '29');
			list($cantidad30, $precio30, $id_talla30) = ElementoTallas($conn, $id, '30');
			list($cantidad31, $precio31, $id_talla31) = ElementoTallas($conn, $id, '31');
			list($cantidad32, $precio32, $id_talla32) = ElementoTallas($conn, $id, '32');
			list($cantidad33, $precio33, $id_talla33) = ElementoTallas($conn, $id, '33');
			list($cantidad34, $precio34, $id_talla34) = ElementoTallas($conn, $id, '34');
			list($cantidad35, $precio35, $id_talla35) = ElementoTallas($conn, $id, '35');
			list($cantidad36, $precio36, $id_talla36) = ElementoTallas($conn, $id, '36');
			list($cantidad37, $precio37, $id_talla37) = ElementoTallas($conn, $id, '37');
			list($cantidad38, $precio38, $id_talla38) = ElementoTallas($conn, $id, '38');
			list($cantidad39, $precio39, $id_talla39) = ElementoTallas($conn, $id, '39');
			list($cantidad40, $precio40, $id_talla40) = ElementoTallas($conn, $id, '40');
			list($cantidad41, $precio41, $id_talla41) = ElementoTallas($conn, $id, '41');
			list($cantidad42, $precio42, $id_talla42) = ElementoTallas($conn, $id, '42');
			list($cantidad43, $precio43, $id_talla43) = ElementoTallas($conn, $id, '43');
		}
		?>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><i class="bi bi-pencil-square"></i> Editar la Información del Elemento de
					Protección Personal</h4>
			</div>
			<form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" enctype="multipart/form-data">
				<div class="input-group shadow-sm-auto">
					<a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i> Regresar</a>
				</div>
				<hr>
				<span class="badge text-bg-success" style="font-size: 17px; margin-left: 13px;"> Datos del Elemento: </span>
				<br><br>
				<div class="custom-input-file d-grid gap-2 d-md-block col-6 mx-auto shadow">
					<img src="data:image/webp;base64,<?php echo base64_encode($row['imagen']); ?>" class="img-thumbnail" alt="...">
					<input type="file" id="fichero-tarifas" name="img" class="input-file" value="" required>
					<i class="bi bi-camera-fill"></i> Imágen del elemento <i class="bi bi-paperclip"></i>
				</div>
				<br>
				<div class="container-fluid">

					<input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">

					<div class="input-group shadow-sm">
						<span class="input-group-text" style="background-color: #198754; color: white; border-width: 1px; border-color: #198754;"> Código: </span>
						<input class="form-control" style="border-color: #198754; border-width: 1px; max-width: 30%;" type="text" name="codigo" id="codigo" value="<?php echo $row['codigo']; ?>" readonly>
					</div>
					<br>

					<div class="input-group">
						<input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>" class="form-control rounded-end shadow-sm" style="margin-right: 10px; border-color: #198754; border-width: 1px;" onkeyup="mayus(this);" required>
						<input type="hidden" name="nucleo" value="<?php echo $_SESSION['nucleo']; ?>">
						<input name="proveedor" id="proveedor" onkeyup="mayus(this);" value="<?php echo $row['proveedor']; ?>" class="form-control rounded-start shadow-sm" style="border-color: #198754; border-width: 1px;" type="text" placeholder="PROVEEDOR" required>
					</div>
					<br>
					<div class="input-group">
						<select class="form-select rounded-end shadow-sm" style="margin-right: 10px; border-color: #198754; border-width: 1px;" aria-label="Default select example" id="rotacion" name="rotacion" required>
							<option value=""> Rotación </option>
							<option value="0" <?php if ($row['rotacion'] == 0) {
													echo "selected";
												} ?>>Baja</option>
							<option value="1" <?php if ($row['rotacion'] == 1) {
													echo "selected";
												} ?>>Alta</option>
						</select>
						<select id="my_selector2" name="tipo_talla" class="form-select rounded-start shadow-sm" style="border-color: #198754; border-width: 1px;" aria-label="Default select example" required>
							<option value="1">Tipo de Talla</option>
							<option value="2" <?php $tipo = $row_epp_talla['tipo_talla'] == 2 ? 'selected' : '';
												echo $tipo; ?>> Única </option>
							<option value="3" <?php $tipo = $row_epp_talla['tipo_talla'] == 3 ? 'selected' : '';
												echo $tipo; ?>> Múltiple </option>
						</select>
					</div>
					<br>
					<!-- Tallas (única o multiples) -->
					<?php include('../newEPP/tabla_tallas.php') ?>
					<hr>

					<span class="badge" style="font-size: 17px; margin-left: 13px; background-color: #0d6efdff;"> Total del elemento: </span>
					<br><br>
					<div class="container-fluid">
						<div class="input-group">
							<div class="input-group">
								<span class="input-group-text shadow-sm" style="background-color: #0d6efdff; color: white; border-color: #0d6efdff; border-width: 1px;" id="addon-wrapping"> Cantidad: </span>
								<input name="cantidad" id="cantidad" value="<?php echo $row['stock'] ?>" class="form-control rounded-end shadow-sm" style="margin-right: 10px; border-color: #0d6efdff; border-width: 1px;" type="number" readonly>
								<span class="input-group-text shadow-sm rounded-start" style="background-color: #0d6efdff; color: white; border-color: #0d6efdff; border-width: 1px;" id="addon-wrapping"> Precio: </span>
								<input name="precio" id="precio" value="<?php echo $row['precio'] ?>" class="form-control shadow-sm" style="border-color: #0d6efdff; border-width: 1px;" type="number" readonly>
							</div>
						</div>
						<br>
					</div>
				</div>
				<br>

				<div class="controls">
					<center><button type="submit" name="update" id="update" class="btn btn-success"><i class="bi bi-bag-plus-fill"></i></i> Guardar </button>
						<a href="index.php" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
					</center>
				</div>
				<br>
			</form>
		</div>
		<br>
		<div class="card-footer">
			<div class="container">
				<center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios
						Forestales </b></center>
			</div>
		</div>
</body>

</html>