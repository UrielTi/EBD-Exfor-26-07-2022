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
			$row = mysqli_fetch_assoc($sql);
		}
		?>
		<!-- TALLAS CON SU PRECIO -->
		<script>
			<?php
			function ElementoTallas($conn, $id_elemento, $talla)
			{
				$consultaEppTallas = mysqli_query($conn, "SELECT * FROM elemento_tallas WHERE id_elemento=$id_elemento AND talla='$talla'");
				$rowEppTallas = mysqli_fetch_assoc($consultaEppTallas);
				return array($rowEppTallas['cantidad'], $rowEppTallas['precio_unitario'], $rowEppTallas['id']);
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
			?>
		</script>
		<?php
		$consultaEppTipoTalla = mysqli_query($conn, "SELECT tipo_talla FROM epp WHERE id=$id");
		$row_epp_talla = mysqli_fetch_assoc($consultaEppTipoTalla);
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
				<p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>
				<hr>
				<center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_datos_epp" role="button" aria-expanded="false" aria-controls="ref_datos_epp">
						<i class="bi bi-arrow-down"></i> INFORMACIÓN DEL ELEMENTO
					</a></center>
				<div class="collapse show" id="ref_datos_epp">
					<div class="card card-body">
						<div class="d-flex">
							<div class="card" style="width: 28rem;">
								<div class="d-flex justify-content-center">
									<img width="65%" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" class="card-img-top">
								</div>
								<div class="card-body">
									<center>
										<h5>Imagen o fotografía del elemento:</h5>
									</center>
									<br>
									<div class="mb-3">
										<span class="input-group-text w-auto" for="img">(*) Imagen: </span>
										<input class="form-control" type="file" name="img" id="img" value="<?php echo base64_encode(stripslashes($row['imagen'])); ?>">
									</div>
								</div>
							</div>&nbsp;
							<br>
							<div class="container">
								<input class="form-control" type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
								<div class="input-group shadow-sm">
									<span class="input-group-text w-auto" for="codigo">Código: </span>
									<input class="form-control" type="text" name="codigo" id="codigo" value="<?php echo $row['codigo']; ?>" readonly="readonly">
								</div>
								<br>
								<div class="input-group shadow-sm">
									<span class="input-group-text w-auto" for="nombre">(*) Nombre: </span>
									<input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>">
								</div><br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto">(*) Tipo de talla: </label>
									<select id="my_selector2" name="tipo_talla" class="form-select" aria-label="Default select example">

										<option value="2" <?php $tipo = $row_epp_talla['tipo_talla'] == 2 ? 'selected' : '';
															echo $tipo; ?>>TALLA ÚNICA</option>
										<option value="3" <?php $tipo = $row_epp_talla['tipo_talla'] == 3 ? 'selected' : '';
															echo $tipo; ?>>TALLA EN LETRAS Y NÚMEROS</option>
									</select>
								</div>
								<br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto" for="nucleo">(*) Núcleo: </label>
									<select class="form-select" name="nucleo" id="nucleo" required>
										<option value="1" <?php if ($row['nucleo'] == 1) {
																echo "selected";
															} ?>>SANTA ROSA DE CABAL</option>
										<option value="2" <?php if ($row['nucleo'] == 2) {
																echo "selected";
															} ?>>QUINDIO</option>
										<option value="3" <?php if ($row['nucleo'] == 3) {
																echo "selected";
															} ?>>RIOSUCIO</option>
									</select>
								</div>
								<br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto" for="proveedor">(*) Proveedor: </label>
									<input name="proveedor" id="proveedor" value="<?php echo $row['proveedor']; ?>" class="form-control span8 tip" type="text" required>
								</div>
								<br>
								<div class="input-group shadow-sm">
									<span class="input-group-text w-auto" for="cantidad"> Cantidad total: </span>
									<input class="form-control" type="number" name="cantidad" id="cantidad" value="<?php echo $row['stock'] ?>" readonly>
									<span class="input-group-text w-50"> unidad(es)</span>
								</div>
								<br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto" for="precio"> Precio total: </label>
									<span class="input-group-text w-auto">$</span>
									<input name="precio" id="precio" class="form-control" type="number" value="<?php echo $row['precio'] ?>" readonly>
									<span class="input-group-text w-50"> pesos</span>
								</div>
								<br>
								<div class="input-group shadow-sm">
									<span class="input-group-text w-auto" for="rotacion">(*) Es un elemento de alta
										rotación:</span>
									<select class="form-select" name="rotacion" id="rotacion" required>
										<option value="0" <?php if ($row['rotacion'] == 0) {
																echo "selected";
															} ?>>NO</option>
										<option value="1" <?php if ($row['rotacion'] == 1) {
																echo "selected";
															} ?>>SI</option>
									</select>
								</div>

							</div>
						</div>
						<br>
						<center>
							<p>
								<a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#talla_unica" role="button" aria-expanded="false" aria-controls="talla_unica">TALLA ÚNICA</a>
								<button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#talla_letras" aria-expanded="false" aria-controls="talla_letras">TALLA EN LETRAS</button>
								<button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#talla_numeros" aria-expanded="false" aria-controls="talla_numeros">TALLA EN NÚMEROS</button>
								<button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="talla_unica talla_letras talla_numeros">MOSTRAR/OCULTAR TODO</button>
							</p>
						</center>
						<!-- talla unica -->
						<div class="collapse multi-collapse" id="talla_unica" <?php $collapse = $row_epp_talla['tipo_talla'] == 2 ? 'class="accordion-collapse collapse show"' : 'class="accordion-collapse collapse"';
																				echo $collapse; ?> aria-labelledby="panelsStayOpen-headingOne">
							<div class="card card-body">
								<h6>Registrar elementos con talla única:</h6>
								<h7>
									<small class="text-muted">Diligenciar precios sin puntos ni comas.</small>
								</h7><br>
								<div class="card-header">
									Talla Única
								</div>
								<ul class="list-group list-group-flush">
									<input type="hidden" id="idU" name="idU" value="<?php echo $id_tallaU ?>">
									<input name="tallaU" id="tallaU" class="form-control" type="number" min="0" value="<?php $valueTU = $cantidadU == '0' ? '' : $cantidadU;
																														echo $valueTU; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 2 ? '' : 'readOnly';
																																															echo $read; ?>>
									<input name="precioU" id="precioU" class="form-control" type="number" min="0" value="<?php $valuePU = $precioU == '0' ? '' : $precioU;
																															echo $valuePU; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 2 ? '' : 'readOnly';
																																															echo $read; ?>>
								</ul>
							</div>
						</div>

						<!-- talla en letras -->
						<div class="col">
							<div class="collapse multi-collapse" id="talla_letras" <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="accordion-collapse collapse show"' : 'class="accordion-collapse collapse"';
																					echo $collapse; ?> aria-labelledby="panelsStayOpen-headingTwo">
								<div class="card card-body">
									<h6>Registrar elementos con talla en letras:</h6>
									<h7>
										<small class="text-muted">Diligenciar precios sin puntos ni comas.</small>
									</h7><br>

									<div class="card-group">
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla S
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="idS" name="idS" value="<?php echo $id_tallaS ?>">
												<input name="tallaS" id="tallaS" class="form-control" type="number" min="0" value="<?php $valueTS = $cantidadS == '0' ? '' : $cantidadS;
																																	echo $valueTS; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
												<input name="precioS" id="precioS" class="form-control" type="number" min="0" value="<?php $valuePS = $precioS == '0' ? '' : $precioS;
																																		echo $valuePS; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla M
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="idM" name="idM" value="<?php echo $id_tallaM ?>">
												<input name="tallaM" id="tallaM" class="form-control" type="number" min="0" value="<?php $valueTM = $cantidadM == '0' ? '' : $cantidadM;
																																	echo $valueTM; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
												<input name="precioM" id="precioM" class="form-control" type="number" min="0" value="<?php $valuePM = $precioM == '0' ? '' : $precioM;
																																		echo $valuePM; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla L
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="idL" name="idL" value="<?php echo $id_tallaL ?>">
												<input name="tallaL" id="tallaL" class="form-control" type="number" min="0" value="<?php $valueTL = $cantidadL == '0' ? '' : $cantidadL;
																																	echo $valueTL; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
												<input name="precioL" id="precioL" class="form-control" type="number" min="0" value="<?php $valuePL = $precioL == '0' ? '' : $precioL;
																																		echo $valuePL; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla XL
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="idXL" name="idXL" value="<?php echo $id_tallaXL ?>">
												<input name="tallaXL" id="tallaXL" class="form-control" type="number" min="0" value="<?php $valueTXL = $cantidadXL == '0' ? '' : $cantidadXL;
																																		echo $valueTXL; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precioXL" id="precioXL" class="form-control" type="number" min="0" value="<?php $valuePXL = $precioXL == '0' ? '' : $precioXL;
																																		echo $valuePXL; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla XXL
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="idXXL" name="idXXL" value="<?php echo $id_tallaXXL ?>">
												<input name="tallaXXL" id="tallaXXL" class="form-control" type="number" min="0" value="<?php $valueTXXL = $cantidadXXL == '0' ? '' : $cantidadXXL;
																																		echo $valueTXXL; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precioXXL" id="precioXXL" class="form-control" type="number" min="0" value="<?php $valuePXXL = $precioXXL == '0' ? '' : $precioXXL;
																																			echo $valuePXXL; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																				echo $read; ?>>
											</ul>

										</div>
									</div><br>

								</div>
							</div>
						</div>



						<!-- talla en números -->
						<div class="col">
							<div class="collapse multi-collapse" id="talla_numeros" <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="accordion-collapse collapse show"' : 'class="accordion-collapse collapse"';
																					echo $collapse; ?> aria-labelledby="panelsStayOpen-headingThree">
								<div class="card card-body">

									<h6>Registrar elementos con talla en números:</h6>
									<h7>
										<small class="text-muted">Diligenciar precios sin puntos ni comas.</small>
									</h7><br>
									<div class="card-group">
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 28
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id28" name="id28" value="<?php echo $id_talla28 ?>">
												<input name="talla28" id="talla28" class="form-control" type="number" min="0" value="<?php $value28 = $cantidad28 == '0' ? '' : $cantidad28;
																																		echo $valueT28; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio28" id="precio28" class="form-control" type="number" min="0" value="<?php $valueP28 = $precio28 == '0' ? '' : $precio28;
																																		echo $valueP28; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 29
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id29" name="id29" value="<?php echo $id_talla29 ?>">
												<input name="talla29" id="talla29" class="form-control" type="number" min="0" value="<?php $valueT29 = $cantidad29 == '0' ? '' : $cantidad29;
																																		echo $valueT29; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio29" id="precio29" class="form-control" type="number" min="0" value="<?php $valueP29 = $precio29 == '0' ? '' : $precio29;
																																		echo $valueP29; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 30
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id30" name="id30" value="<?php echo $id_talla30 ?>">
												<input name="talla30" id="talla30" class="form-control" type="number" min="0" value="<?php $valueT30 = $cantidad30 == '0' ? '' : $cantidad30;
																																		echo $valueT30; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio30" id="precio30" class="form-control" type="number" min="0" value="<?php $valueP30 = $precio30 == '0' ? '' : $precio30;
																																		echo $valueP30; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 31
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id31" name="id31" value="<?php echo $id_talla31 ?>">
												<input name="talla31" id="talla31" class="form-control" type="number" min="0" value="<?php $valueT31 = $cantidad31 == '0' ? '' : $cantidad31;
																																		echo $valueT31; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio31" id="precio31" class="form-control" type="number" min="0" value="<?php $valueP31 = $precio31 == '0' ? '' : $precio31;
																																		echo $valueP31; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>
									</div>
									<br>
									<div class="card-group">
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 32
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id32" name="id32" value="<?php echo $id_talla32 ?>">
												<input name="talla32" id="talla32" class="form-control" type="number" min="0" value="<?php $valueT32 = $cantidad32 == '0' ? '' : $cantidad32;
																																		echo $valueT32; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio32" id="precio32" class="form-control" type="number" min="0" value="<?php $valueP32 = $precio32 == '0' ? '' : $precio32;
																																		echo $valueP32; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 33
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id33" name="id33" value="<?php echo $id_talla33 ?>">
												<input name="talla33" id="talla33" class="form-control" type="number" min="0" value="<?php $valueT33 = $cantidad33 == '0' ? '' : $cantidad33;
																																		echo $valueT33; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio33" id="precio33" class="form-control" type="number" min="0" value="<?php $valueP33 = $precio33 == '0' ? '' : $precio33;
																																		echo $valueP33; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 34
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id34" name="id34" value="<?php echo $id_talla34 ?>">
												<input name="talla34" id="talla34" class="form-control" type="number" min="0" value="<?php $valueT34 = $cantidad34 == '0' ? '' : $cantidad34;
																																		echo $valueT34; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio34" id="precio34" class="form-control" type="number" min="0" value="<?php $valueP34 = $precio34 == '0' ? '' : $precio34;
																																		echo $valueP34; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 35
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id35" name="id35" value="<?php echo $id_talla35 ?>">
												<input name="talla35" id="talla35" class="form-control" type="number" min="0" value="<?php $valueT35 = $cantidad35 == '0' ? '' : $cantidad35;
																																		echo $valueT35; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio35" id="precio35" class="form-control" type="number" min="0" value="<?php $valueP35 = $precio35 == '0' ? '' : $precio35;
																																		echo $valueP35; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>
									</div>
									<br>
									<div class="card-group">
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 36
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id36" name="id36" value="<?php echo $id_talla36 ?>">
												<input name="talla36" id="talla36" class="form-control" type="number" min="0" value="<?php $valueT36 = $cantidad36 == '0' ? '' : $cantidad36;
																																		echo $valueT36; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio36" id="precio36" class="form-control" type="number" min="0" value="<?php $valueP36 = $precio36 == '0' ? '' : $precio36;
																																		echo $valueP36; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 37
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id37" name="id37" value="<?php echo $id_talla37 ?>">
												<input name="talla37" id="talla37" class="form-control" type="number" min="0" value="<?php $valueT37 = $cantidad37 == '0' ? '' : $cantidad37;
																																		echo $valueT37; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio37" id="precio37" class="form-control" type="number" min="0" value="<?php $valueP37 = $precio37 == '0' ? '' : $precio37;
																																		echo $valueP37; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 38
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id38" name="id38" value="<?php echo $id_talla38 ?>">
												<input name="talla38" id="talla38" class="form-control" type="number" min="0" value="<?php $valueT38 = $cantidad38 == '0' ? '' : $cantidad38;
																																		echo $valueT38; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio38" id="precio38" class="form-control" type="number" min="0" value="<?php $valueP38 = $precio38 == '0' ? '' : $precio38;
																																		echo $valueP38; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 39
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id39" name="id39" value="<?php echo $id_talla39 ?>">
												<input name="talla39" id="talla39" class="form-control" type="number" min="0" value="<?php $valueT39 = $cantidad39 == '0' ? '' : $cantidad39;
																																		echo $valueT39; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio39" id="precio39" class="form-control" type="number" min="0" value="<?php $valueP39 = $precio39 == '0' ? '' : $precio39;
																																		echo $valueP39; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>
									</div>
									<br>
									<div class="card-group">
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 40
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id40" name="id40" value="<?php echo $id_talla40 ?>">
												<input name="talla40" id="talla40" class="form-control" type="number" min="0" value="<?php $valueT40 = $cantidad40 == '0' ? '' : $cantidad40;
																																		echo $valueT40; ?>" value="<?php echo $cantidad40 ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																											echo $read; ?>>
												<input name="precio40" id="precio40" class="form-control" type="number" min="0" value="<?php $valueP40 = $precio40 == '0' ? '' : $precio40;
																																		echo $valueP40; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 41
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id41" name="id41" value="<?php echo $id_talla41 ?>">
												<input name="talla41" id="talla41" class="form-control" type="number" min="0" value="<?php $valueT41 = $cantidad41 == '0' ? '' : $cantidad41;
																																		echo $valueT41; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio41" id="precio41" class="form-control" type="number" min="0" value="<?php $valueP41 = $precio41 == '0' ? '' : $precio41;
																																		echo $valueP41; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 42
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id42" name="id42" value="<?php echo $id_talla42 ?>">
												<input name="talla42" id="talla42" class="form-control" type="number" min="0" value="<?php $valueT42 = $cantidad42 == '0' ? '' : $cantidad42;
																																		echo $valueT42; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio42" id="precio42" class="form-control" type="number" min="0" value="<?php $valueP42 = $precio42 == '0' ? '' : $precio42;
																																		echo $valueP42; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>&nbsp;
										<div class="card" style="width: 18rem;">
											<div class="card-header">
												Talla 43
											</div>
											<ul class="list-group list-group-flush">
												<input type="hidden" id="id43" name="id43" value="<?php echo $id_talla43 ?>">
												<input name="talla43" id="talla43" class="form-control" type="number" min="0" value="<?php $valueT43 = $cantidad43 == '0' ? '' : $cantidad43;
																																		echo $valueT43; ?>" oninput="CantTotal();" placeholder="CANTIDAD" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																			echo $read; ?>>
												<input name="precio43" id="precio43" class="form-control" type="number" min="0" value="<?php $valueP43 = $precio43 == '0' ? '' : $precio43;
																																		echo $valueP43; ?>" oninput="PrecTotal();" placeholder="PRECIO" <?php $read = $row_epp_talla['tipo_talla'] == 3 ? '' : 'readOnly';
																																																		echo $read; ?>>
											</ul>
										</div>
										<br>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>

				<div class="card card-body">
					<center>
						<h6>Para guardar la información del elemento, dar clic en el siguiente botón de
							Actualizar o de lo contrario en el botón de Cancelar:</h6>

						<div class="controls">
							<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-success" />
							<a href="index.php" class="btn btn-secondary btn btn-block">Cancelar</a>
					</center>
				</div>

			</form>
		</div>
		<br>
		<div class="card-footer">
			<div class="container">
				<center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios
						Forestales </b></center>
			</div>
		</div>

		<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
<script src="js/calculos.js"></script>

</html>