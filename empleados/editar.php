<?php
if (!session_id()) session_start();
include "../include/conn/conn.php";
include "../cond/todo.php";
if (!isset($_SESSION['email'])) {
	echo "<script>window.location = '../login/login.php'</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<?php include("head.php"); ?>
</head>

<body>

	<div class="container-fluid border border-success bg-light">
		<hr>
		<div class="alert alert-success" role="alert">
			<center><strong>¡Hola!</strong> Asegúrate de que la información que se esté diligenciando se encuentre actualizada a la fecha. <strong>¡Muchas Gracias!</strong></center>
		</div>
		<hr>
		<?php
		$id = intval($_GET['id']);
		$sql = mysqli_query($conn, "SELECT * FROM clientes WHERE id='$id'");
		if (mysqli_num_rows($sql) == 0) {
			echo "<script>window.location = 'index.php'</script>";
		} else {
			$row = mysqli_fetch_assoc($sql);
		} ?>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><i class="bi bi-pencil-square"></i> Editar la Información del empleado</h4>
			</div>
			<form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST">

				<div class="input-group shadow-sm-autp">
					<a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i> Regresar</a>
				</div>
				<hr>
				<p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>
				<hr>

				<!-- Datos personales -->
				<center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_datos" role="button" aria-expanded="false" aria-controls="ref_datos">
						<i class="bi bi-arrow-down"></i> DATOS PERSONALES
					</a></center>
				<div class="collapse show" id="ref_datos">
					<div class="card card-body">
						<h5>Datos personales del empleado:</h5>
						<!-- ID del usuario desde la base de datos -->
						<input class="form-control" type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>" readonly="readonly">

						<div class="input-group shadow-sm">
							<span class="input-group-text w-auto" id="nombres">(*) Nombres: </span>
							<input class="form-control" onkeyup="mayus(this);" type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>">
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" id="nombres">(*) Primer Apellido: </span>
								<input class="form-control" onkeyup="mayus(this);" type="text" name="primer_apellido" id="primer_apellido" value="<?php echo $row['primer_apellido']; ?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" id="nombres"> Segundo Apellido: </span>
								<input class="form-control" onkeyup="mayus(this);" type="text" name="segundo_apellido" id="segundo_apellido" value="<?php echo $row['segundo_apellido']; ?>">
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" id="cedula">(*) Cédula: </span>
								<input class="form-control" onkeyup="mayus(this);" type="number" name="cedula" id="cedula" value="<?php echo $row['cedula']; ?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" id="exp_ced">(*) Lugar de Expedición: </span>
								<input class="form-control" onkeyup="mayus(this);" type="text" name="exp_ced" id="exp_ced" value="<?php echo $row['exp_ced']; ?>">
							</div>
						</div>
						<br>

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" id="fecha_expedicion">(*) Fecha de Expedición: </span>
								<input class="form-control" type="date" name="fecha_expedicion" id="fecha_expedicion" value="<?php echo $row['fecha_expedicion']; ?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" id="fecha_expedicion">(*) Fecha de Nacimiento: </span>
								<input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>">
							</div>
						</div>
						<br>

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="civil">(*) Estado Civil: </label>
								<select class="form-select" name="civil" id="civil" required>
									<option value="1" <?php if ($row['civil'] == 1) {
															echo "selected";
														} ?>>SOLTERO</option>
									<option value="2" <?php if ($row['civil'] == 2) {
															echo "selected";
														} ?>>CASADO</option>
									<option value="3" <?php if ($row['civil'] == 3) {
															echo "selected";
														} ?>>UNION LIBRE</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="genero">(*) Género: </label>
								<select class="form-select" name="genero" id="genero" required>
									<option value="1" <?php if ($row['genero'] == 1) {
															echo "selected";
														} ?>>MASCULINO</option>
									<option value="2" <?php if ($row['genero'] == 2) {
															echo "selected";
														} ?>>FEMENINO</option>
									<option value="3" <?php if ($row['genero'] == 3) {
															echo "selected";
														} ?>>OTRO</option>
								</select>
							</div>
						</div>
						<br>

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="raza">(*) Raza: </label>
								<select class="form-select" name="raza" id="raza" required>
									<option value="1" <?php if ($row['raza'] == 1) {
															echo "selected";
														} ?>>MESTIZO</option>
									<option value="2" <?php if ($row['raza'] == 2) {
															echo "selected";
														} ?>>MULATO</option>
									<option value="3" <?php if ($row['raza'] == 3) {
															echo "selected";
														} ?>>ZAMBO</option>
									<option value="4" <?php if ($row['raza'] == 4) {
															echo "selected";
														} ?>>AFROAMERICANO</option>
									<option value="5" <?php if ($row['raza'] == 5) {
															echo "selected";
														} ?>>BLANCO</option>
									<option value="6" <?php if ($row['raza'] == 6) {
															echo "selected";
														} ?>>INDÍGENA</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="rh">(*) RH Sanguíneo: </label>
								<select class="form-select" name="rh" id="rh" required>
									<option value="1" <?php if ($row['rh'] == 1) {
															echo "selected";
														} ?>>A+</option>
									<option value="2" <?php if ($row['rh'] == 2) {
															echo "selected";
														} ?>>A-</option>
									<option value="3" <?php if ($row['rh'] == 3) {
															echo "selected";
														} ?>>B+</option>
									<option value="4" <?php if ($row['rh'] == 4) {
															echo "selected";
														} ?>>B-</option>
									<option value="5" <?php if ($row['rh'] == 5) {
															echo "selected";
														} ?>>AB+</option>
									<option value="6" <?php if ($row['rh'] == 6) {
															echo "selected";
														} ?>>AB-</option>
									<option value="7" <?php if ($row['rh'] == 7) {
															echo "selected";
														} ?>>O+</option>
									<option value="8" <?php if ($row['rh'] == 8) {
															echo "selected";
														} ?>>O-</option>
								</select>
							</div>
						</div>
						<br>

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" id="hijos">(*) Número de Hijos: </span>
								<input name="hijos" id="hijos" value="<?php echo $row['hijos']; ?>" class=" form-control" type="number" required>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" id="acargo">(*) Personas a Cargo: </span>
								<input name="acargo" id="acargo" value="<?php echo $row['acargo']; ?>" class=" form-control" type="number" required>
							</div>
						</div>
						<br>

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" id="telefono">(*) Número de Celular: </span>
								<input name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>" class=" form-control span8 tip" type="tel" required>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" id="email">Correo electrónico: </span>
								<input name="email" id="email" value="<?php echo $row['email']; ?>" class=" form-control span8 tip" type="email">
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" id="direccion">(*) Dirección: </label>
								<input name="direccion" onkeyup="mayus(this);" id="direccion" value="<?php echo $row['direccion']; ?>" class=" form-control span8 tip" type="text" required>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" id="estrato">(*) Estrato socio-económico: </label>
								<input name="estrato" id="estrato" value="<?php echo $row['estrato']; ?>" class=" form-control span8 tip" type="number" required>
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="tip_vivi">(*) Tipo de Vivienda: </label>
								<select class="form-select" name="tip_vivi" id="tip_vivi" required>
									<option value="1" <?php if ($row['tip_vivi'] == 1) {
															echo "selected";
														} ?>>PROPIA</option>
									<option value="2" <?php if ($row['tip_vivi'] == 2) {
															echo "selected";
														} ?>>FAMILIAR</option>
									<option value="3" <?php if ($row['tip_vivi'] == 3) {
															echo "selected";
														} ?>>ALQUILADA</option>
									<option value="4" <?php if ($row['tip_vivi'] == 4) {
															echo "selected";
														} ?>>POR DEFINIR</option>
								</select>
							</div>&nbsp;
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
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="cargo">(*) Cargo: </label>
								<select class="form-select" name="cargo" id="cargo" required>
									<option value="1" <?php if ($row['cargo'] == 1) {
															echo "selected";
														} ?>>DESPACHADOR</option>
									<option value="2" <?php if ($row['cargo'] == 2) {
															echo "selected";
														} ?>>MONITOR</option>
									<option value="3" <?php if ($row['cargo'] == 3) {
															echo "selected";
														} ?>>SUPERVISOR DE APROVECHAMIENTO</option>
									<option value="4" <?php if ($row['cargo'] == 4) {
															echo "selected";
														} ?>>INSPECTOR DE EQUIPOS</option>
									<option value="5" <?php if ($row['cargo'] == 5) {
															echo "selected";
														} ?>>JEFE DE LINEA</option>
									<option value="6" <?php if ($row['cargo'] == 6) {
															echo "selected";
														} ?>>MOTOSIERRISTA</option>
									<option value="7" <?php if ($row['cargo'] == 7) {
															echo "selected";
														} ?>>ESTROBADOR</option>
									<option value="8" <?php if ($row['cargo'] == 8) {
															echo "selected";
														} ?>>DESCORTEZADOR</option>
									<option value="9" <?php if ($row['cargo'] == 9) {
															echo "selected";
														} ?>>ARRIERO</option>
									<option value="10" <?php if ($row['cargo'] == 10) {
															echo "selected";
														} ?>>GUADAÑADOR</option>
									<option value="11" <?php if ($row['cargo'] == 11) {
															echo "selected";
														} ?>>CAMINERO</option>
									<option value="12" <?php if ($row['cargo'] == 12) {
															echo "selected";
														} ?>>APRENDIZ SENA</option>
									<option value="13" <?php if ($row['cargo'] == 13) {
															echo "selected";
														} ?>>SILVICULTOR</option>
									<option value="14" <?php if ($row['cargo'] == 14) {
															echo "selected";
														} ?>>MECÁNICO</option>
									<option value="15" <?php if ($row['cargo'] == 15) {
															echo "selected";
														} ?>>COORDINADOR OPERATIVO</option>
									<option value="16" <?php if ($row['cargo'] == 16) {
															echo "selected";
														} ?>>COORDINADOR SSTAV</option>
									<option value="17" <?php if ($row['cargo'] == 17) {
															echo "selected";
														} ?>>GERENTE</option>
									<option value="18" <?php if ($row['cargo'] == 18) {
															echo "selected";
														} ?>>ASISTENTE ADMINISTRATIVO</option>
									<option value="19" <?php if ($row['cargo'] == 19) {
															echo "selected";
														} ?>>GESTOR FINANCIERO</option>
									<option value="20" <?php if ($row['cargo'] == 20) {
															echo "selected";
														} ?>>GESTOR DE SISTEMAS DE INFORMACIÓN</option>
									<option value="21" <?php if ($row['cargo'] == 21) {
															echo "selected";
														} ?>>AUXILIAR SSTAV</option>
									<option value="22" <?php if ($row['cargo'] == 22) {
															echo "selected";
														} ?>>SUPERVISOR DE SILVICULTURA</option>
									<option value="23" <?php if ($row['cargo'] == 23) {
															echo "selected";
														} ?>>SUPERVISOR DE VIAS</option>
									<option value="24" <?php if ($row['cargo'] == 24) {
															echo "selected";
														} ?>>GESTOR ADMINISTRATIVO</option>
									<option value="25" <?php if ($row['cargo'] == 25) {
															echo "selected";
														} ?>>GESTOR DEL RIESGO</option>
									<option value="26" <?php if ($row['cargo'] == 26) {
															echo "selected";
														} ?>>COORDINADOR AMBIENTAL</option>
									<option value="27" <?php if ($row['cargo'] == 27) {
															echo "selected";
														} ?>>SUPERNUMERARIO</option>
									<option value="28" <?php if ($row['cargo'] == 28) {
															echo "selected";
														} ?>>APRENDIZ UNIVERSITARIO</option>
									<option value="29" <?php if ($row['cargo'] == 29) {
															echo "selected";
														} ?>>AUXILIAR ASERRIO</option>
									<option value="30" <?php if ($row['cargo'] == 30) {
															echo "selected";
														} ?>>MEDIDOR</option>
									<option value="31" <?php if ($row['cargo'] == 31) {
															echo "selected";
														} ?>>OPERADOR ASERRIO</option>
									<option value="32" <?php if ($row['cargo'] == 32) {
															echo "selected";
														} ?>>OPERADOR DE EVACUACIÓN Y CARGUE</option>
									<option value="33" <?php if ($row['cargo'] == 33) {
															echo "selected";
														} ?>>OPERADOR DE EXTRACCIÓN</option>
									<option value="34" <?php if ($row['cargo'] == 34) {
															echo "selected";
														} ?>>OPERADOR MAQUINARIA</option>
									<option value="35" <?php if ($row['cargo'] == 35) {
															echo "selected";
														} ?>>COORDINADOR RECURSOS HUMANOS</option>
									<option value="36" <?php if ($row['cargo'] == 36) {
															echo "selected";
														} ?>>COORDINADOR OPERATIVO</option>
									<option value="37" <?php if ($row['cargo'] == 37) {
															echo "selected";
														} ?>>RECIBIDOR DE VIAS</option>
									<option value="38" <?php if ($row['cargo'] == 38) {
															echo "selected";
														} ?>>MAMPOSTERO</option>
									<option value="39" <?php if ($row['cargo'] == 39) {
															echo "selected";
														} ?>>AUXILIAR DE MAMPOSTERÍA</option>
									<option value="40" <?php if ($row['cargo'] == 40) {
															echo "selected";
														} ?>>INVESTIGADOR</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="proceso">(*) Proceso: </label>
								<select class="form-select" name="proceso" id="proceso" required>
									<option value="1" <?php if ($row['proceso'] == 1) {
															echo "selected";
														} ?>>DIRECCIONAMIENTO ESTRATÉGICO</option>
									<option value="2" <?php if ($row['proceso'] == 2) {
															echo "selected";
														} ?>>SILVICULTURA</option>
									<option value="3" <?php if ($row['proceso'] == 3) {
															echo "selected";
														} ?>>APROVECHAMIENTO</option>
									<option value="4" <?php if ($row['proceso'] == 4) {
															echo "selected";
														} ?>>ADMINISTRATIVO</option>
									<option value="5" <?php if ($row['proceso'] == 5) {
															echo "selected";
														} ?>>APROVECHAMIENTO</option>
									<option value="6" <?php if ($row['proceso'] == 6) {
															echo "selected";
														} ?>>FINANCIERO</option>
									<option value="7" <?php if ($row['proceso'] == 7) {
															echo "selected";
														} ?>>GESTIÓN DEL RIESGO</option>
									<option value="8" <?php if ($row['proceso'] == 8) {
															echo "selected";
														} ?>>GESTIÓN DE LA INFORMACIÓN</option>
									<option value="9" <?php if ($row['proceso'] == 9) {
															echo "selected";
														} ?>>SOCIAL</option>
									<option value="10" <?php if ($row['proceso'] == 10) {
															echo "selected";
														} ?>>VIAS</option>
									<option value="11" <?php if ($row['proceso'] == 11) {
															echo "selected";
														} ?>>INVENTARIO FORESTAL</option>
									<option value="12" <?php if ($row['proceso'] == 12) {
															echo "selected";
														} ?>>OPERATIVO</option>
								</select>
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="estado">(*) Estado: </label>
								<select class="form-select" name="estado" id="estado" required>
									<option value="1" <?php if ($row['estado'] == 1) {
															echo "selected";
														} ?>>ACTIVO</option>
									<option value="2" <?php if ($row['estado'] == 2) {
															echo "selected";
														} ?>>INACTIVO</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" id="fecha_ingreso">(*) Fecha de Ingreso: </label>
								<input name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $row['fecha_ingreso']; ?>" class="form-control span8 tip" type="date" required>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" id="fecha_salida">(*) Fecha de Salida: </label>
								<input name="fecha_salida" id="fecha_salida" value="<?php echo $row["fecha_salida"]; ?>" class="form-control span8 tip" type="date">
							</div>
						</div>
						<center>
							<hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_datos" role="button" aria-expanded="true" aria-controls="ref_datos">
								<i class="bi bi-arrow-up"></i> Cerrar Segmento
							</a>
						</center>
					</div>
				</div>
				<hr>

				<!-- Información de tallas para dotación -->
				<?php $consultaTalla = mysqli_query($conn, "SELECT * FROM cliente_tallas WHERE id_empleado=$id");
				$rowTalla = mysqli_fetch_array($consultaTalla); ?>
				<center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_tallas" role="button" aria-expanded="false" aria-controls="ref_tallas">
						<i class="bi bi-arrow-down"></i> INFORMACIÓN DE TALLAS DE DOTACIÓN
					</a></center>
				<div class="collapse show" id="ref_tallas">
					<div class="card card-body">
						<h5>Datos de las tallas de ropa y calzado:</h5>
						<div class="input-group shadow-sm">
							<span class="input-group-text w-auto" for="camisa">(*) Talla camisa:</span>
							<input name="camisa" onkeyup="mayus(this);" id="camisa" class="form-control" type="text" placeholder="Talla de camisa" value="<?php echo $rowTalla['camisa']; ?>">
							<span class="input-group-text w-auto" for="pantalon">(*) Talla pantalón:</span>
							<input name="pantalon" onkeyup="mayus(this);" id="pantalon" class="form-control" type="text" placeholder="Talla de pantalón" value="<?php echo $rowTalla['pantalon']; ?>">
						</div>
						<br>

						<div class="input-group shadow-sm">
							<span class="input-group-text w-auto" for="botas">(*) Talla botas:</span>
							<input name="botas" id="botas" class="form-control" type="text" placeholder="Talla de botas" value="<?php echo $rowTalla['botas']; ?>">
							<span class="input-group-text w-auto" for="guayo">(*) Talla guayo:</span>
							<input name="guayo" id="guayo" class="form-control" type="text" placeholder="Talla de guayo" value="<?php echo $rowTalla['guayo']; ?>">
						</div>
						<center>
							<hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_tallas" role="button" aria-expanded="true" aria-controls="ref_tallas">
								<i class="bi bi-arrow-up"></i> Cerrar Segmento
							</a>
						</center>
					</div>
				</div>
				<hr>

				<!-- Información de seguridad social -->
				<center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_seguridad" role="button" aria-expanded="false" aria-controls="ref_seguridad">
						<i class="bi bi-arrow-down"></i> INFORMACIÓN DE SEGURIDAD SOCIAL
					</a></center>
				<div class="collapse show" id="ref_seguridad">
					<div class="card card-body">

						<h5>Datos de la seguridad social:</h5>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="arl">ARL: </label>
								<input name="arl" id="arl" value="<?php echo $row['arl'] ?>" class="form-control" type="text" readonly="readonly" />
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="eps">(*) EPS: </label>
								<select class="form-select" name="eps" id="eps" required>
									<option value="<?php echo $row['eps'] ?>"><?php echo $epss[$row['eps']] ?></option>
									<?php
									$query = $conn->query("SELECT * FROM eps");
									while ($eps = mysqli_fetch_array($query)) {
										echo ($row['eps'] == $eps['id']) ? '' : '<option value="' . $eps['id'] . '">' . $eps['eps'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<br>

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="pensiones">(*) Fondo de Pensiones: </label>
								<select class="form-select" name="pensiones" id="pensiones" required>
									<option value="1" <?php if ($row['pensiones'] == 1) {
															echo "selected";
														} ?>>PROTECCIÓN S.A.</option>
									<option value="2" <?php if ($row['pensiones'] == 2) {
															echo "selected";
														} ?>>PORVENIR S.A.</option>
									<option value="3" <?php if ($row['pensiones'] == 3) {
															echo "selected";
														} ?>>COLPENSIONES</option>
									<option value="4" <?php if ($row['pensiones'] == 4) {
															echo "selected";
														} ?>>OLD MUTUAL</option>
									<option value="5" <?php if ($row['pensiones'] == 5) {
															echo "selected";
														} ?>>NINGUNA AFP</option>
									<option value="5" <?php if ($row['pensiones'] == 6) {
															echo "selected";
														} ?>>COLFONDOS</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="caja">(*) Caja de Compensación: </label>
								<select class="form-select" name="caja" id="caja" required>
									<option value="1" <?php if ($row['caja'] == 1) {
															echo "selected";
														} ?>>COMFAMILIAR RISARALDA</option>
									<option value="2" <?php if ($row['caja'] == 2) {
															echo "selected";
														} ?>>COMFACALDAS</option>
									<option value="3" <?php if ($row['caja'] == 3) {
															echo "selected";
														} ?>>COMFENALCO QUINDIO</option>
									<option value="4" <?php if ($row['caja'] == 4) {
															echo "selected";
														} ?>>COMFENALCO VALLE</option>
									<option value="5" <?php if ($row['caja'] == 5) {
															echo "selected";
														} ?>>NINGUNA CAJA</option>
								</select>
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="servicio_funerario">Servicio funerario: </span>
								<input type="text" onkeyup="mayus(this);" name="servicio_funerario" id="servicio_funerario" class="form-control" placeholder="INGRESA EL SERVICIO FUNERARIO" value="<?php echo $row['servicio_funerario'] ?>">
							</div>&nbsp;
							<hr>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="enfermedad"> Enfermedad o tratamiento médico: </label>
								<select class="form-select" name="enfermedad" id="enfermedad" required>
									<option value="1" <?php if ($row['enfermedad'] == 1) {
															echo "selected";
														} ?>>NO</option>
									<option value="2" <?php if ($row['enfermedad'] == 2) {
															echo "selected";
														} ?>>SI</option>
								</select>
							</div>
						</div>
						<center>
							<hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_seguridad" role="button" aria-expanded="true" aria-controls="ref_seguridad">
								<i class="bi bi-arrow-up"></i> Cerrar Segmento
							</a>
						</center>
					</div>
				</div>
				<hr>

				<!-- Información académica -->
				<center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_academica" role="button" aria-expanded="false" aria-controls="ref_academica">
						<i class="bi bi-arrow-down"></i> INFORMACIÓN ACADÉMICA
					</a></center>
				<?php
				$id = intval($_GET['id']);
				$sql_cliente_academico = mysqli_query($conn, "SELECT * FROM cliente_academico WHERE id_cliente='$id'");
				if (mysqli_num_rows($sql_cliente_academico) == 0) {
					echo "<script>window.location = 'index.php'</script>";
				} else {
					$row_curso = mysqli_fetch_assoc($sql_cliente_academico);
				}
				?>
				<div class="collapse show" id="ref_academica">
					<div class="card card-body">
						<h5>Datos de estudio:</h5>
						<input type="hidden" id="id_academico" name="id_academico" value="<?php echo $row_curso['id'] ?>">

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="curso">(*) Nivel Educativo: </label>
								<select class="form-select" name="curso" id="curso" required>
									<option value="1" <?php if ($row_curso['curso'] == 1) {
															echo "selected";
														} ?>>NINGUNO</option>
									<option value="2" <?php if ($row_curso['curso'] == 2) {
															echo "selected";
														} ?>>BÁSICA PRIMARIA</option>
									<option value="3" <?php if ($row_curso['curso'] == 3) {
															echo "selected";
														} ?>>SECUNDARIA</option>
									<option value="4" <?php if ($row_curso['curso'] == 4) {
															echo "selected";
														} ?>>TÉCNICO</option>
									<option value="5" <?php if ($row_curso['curso'] == 5) {
															echo "selected";
														} ?>>TECNÓLOGO</option>
									<option value="6" <?php if ($row_curso['curso'] == 6) {
															echo "selected";
														} ?>>PREGRADO/PROFESIONAL</option>
									<option value="7" <?php if ($row_curso['curso'] == 7) {
															echo "selected";
														} ?>>POSTGRADO</option>
									<option value="8" <?php if ($row_curso['curso'] == 8) {
															echo "selected";
														} ?>>MAGISTER</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="completado">(*) Completado: </label>
								<select class="form-select" name="completado" id="completado" required>
									<option value="" <?php if ($row_curso['completado'] == '') {
															echo "selected";
														} ?>>SELECCIONA</option>
									<option value="1" <?php if ($row_curso['completado'] == 1) {
															echo "selected";
														} ?>>SI</option>
									<option value="0" <?php if ($row_curso['completado'] == 0) {
															echo "selected";
														} ?>>NO</option>
								</select>
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="semestre"> Años/Semestres completados: </label>
								<input type="number" name="semestre" id="semestre" class="form-control" placeholder="INGRESA AÑOS O SEMESTRES COMPLETADOS" value="<?php echo $row_curso['semestre'] ?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="titulo"> Nombre de titulo obtenido: </label>
								<input type="text" onkeyup="mayus(this);" name="titulo" id="titulo" class="form-control" placeholder="INGRESA NOMBRE DE TITULO OBTENIDO" value="<?php echo $row_curso['titulo'] ?>">
							</div>
						</div>
						<center>
							<hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_academica" role="button" aria-expanded="true" aria-controls="ref_academica">
								<i class="bi bi-arrow-up"></i> Cerrar Segmento
							</a>
						</center>

					</div>
				</div>
				<hr>
				<!-- Información cursos corto duración -->
				<center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_cursos" role="button" aria-expanded="false" aria-controls="ref_cursos">
						<i class="bi bi-arrow-down"></i> CURSOS DE CORTA DURACIÓN
					</a></center>
				<div class="collapse show" id="ref_cursos">
					<div class="card card-body">
						<h5>Datos de los cursos realizados:</h5>
						<!-- Curso corto 1 -->
						<center><a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#curso1" role="button" aria-expanded="false" aria-controls="curso1">
								<i class="bi bi-arrow-down"></i> Curso corto #1
							</a></center>
						<div class="collapse show" id="curso1">
							<div class="card card-body">
								<?php $consultaCursosCortos = mysqli_query($conn, "SELECT * FROM cliente_cursos WHERE id_cliente=$id");
								$cliente_cursos_cortos = array();
								while ($resultadoCursosCortos = mysqli_fetch_array($consultaCursosCortos)) {
									$nombre_curso = $resultadoCursosCortos['nombre_curso'];
									$duracion = $resultadoCursosCortos['duracion'];
									$entidad = $resultadoCursosCortos['entidad'];
									$tiempo = $resultadoCursosCortos['tiempo'];
									$certificado = $resultadoCursosCortos['certificado'];
									$id_curso = $resultadoCursosCortos['id'];
									array_push($cliente_cursos_cortos, ["$nombre_curso", "$duracion", "$entidad", "$tiempo", "$certificado", "$id_curso"]);
								}
								?>
								<div class="input-group shadow-sm">
									<input type="hidden" id="id_curso1" name="id_curso1" value="<?php if (isset($cliente_cursos_cortos[0][5])) {
																									echo $cliente_cursos_cortos[0][5];
																								} ?>">
									<label class="input-group-text w-auto" for="nombre_curso1"> Nombre del curso: </label>
									<input type="text" onkeyup="mayus(this);" name="nombre_curso1" id="nombre_curso1" value="<?php if (isset($cliente_cursos_cortos[0][0])) {
																																	echo $cliente_cursos_cortos[0][0];
																																} ?>" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
								</div>
								<br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto" for="entidad_curso1"> Entidad: </label>
									<input type="text" onkeyup="mayus(this);" name="entidad_curso1" id="entidad_curso1" value="<?php if (isset($cliente_cursos_cortos[0][2])) {
																																	echo $cliente_cursos_cortos[0][2];
																																} ?>" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
								</div>
								<br>
								<div class="d-flex">
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="duracion_curso1"> Duración del curso: </label>
										<input type="text" onkeyup="mayus(this);" name="duracion_curso1" id="duracion_curso1" value="<?php if (isset($cliente_cursos_cortos[0][1])) {
																																			echo $cliente_cursos_cortos[0][1];
																																		} ?>" class="form-control" placeholder="INGRESA DURACION DEL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="tiempo_curso1"> Año del curso: </label>
										<input type="text" maxlength="4" name="tiempo_curso1" id="tiempo_curso1" value="<?php if (isset($cliente_cursos_cortos[0][3])) {
																															echo $cliente_cursos_cortos[0][3];
																														} ?>" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="certificado_curso1"> Titulo certificado: </label>
										<select class="form-select" name="certificado_curso1" id="certificado_curso1">
											<option value="" <?php if (isset($cliente_cursos_cortos[0][4]) == '0' || '') {
																	echo "selected";
																} ?>>SELECCIONA</option>
											<option value="1" <?php if (isset($cliente_cursos_cortos[0][4]) == '1') {
																	echo "selected";
																} ?>>NO</option>
											<option value="2" <?php if (isset($cliente_cursos_cortos[0][4]) == '2') {
																	echo "selected";
																} ?>>SI</option>
										</select>
									</div>
								</div>

								<center>
									<br><a class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="collapse" href="#curso1" role="button" aria-expanded="true" aria-controls="curso1">
										<i class="bi bi-arrow-up"></i> Cerrar
									</a>
								</center>
							</div>
						</div>
						<hr>
						<!-- Curso corto 2 -->
						<center><a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#curso2" role="button" aria-expanded="false" aria-controls="curso2">
								<i class="bi bi-arrow-down"></i> Curso corto #2
							</a></center>
						<div class="collapse show" id="curso2">
							<div class="card card-body">
								<div class="input-group shadow-sm">
									<input type="hidden" id="id_curso2" name="id_curso2" value="<?php if (isset($cliente_cursos_cortos[1][5])) {
																									echo $cliente_cursos_cortos[1][5];
																								} ?>">
									<label class="input-group-text w-auto" for="nombre_curso2"> Nombre del curso: </label>
									<input type="text" onkeyup="mayus(this);" name="nombre_curso2" id="nombre_curso2" value="<?php if (isset($cliente_cursos_cortos[1][0])) {
																																	echo $cliente_cursos_cortos[1][0];
																																} ?>" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
								</div>
								<br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto" for="entidad_curso2"> Entidad: </label>
									<input type="text" onkeyup="mayus(this);" name="entidad_curso2" id="entidad_curso2" value="<?php if (isset($cliente_cursos_cortos[1][2])) {
																																	echo $cliente_cursos_cortos[1][2];
																																} ?>" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
								</div>

								<br>
								<div class="d-flex">
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="duracion_curso2"> Duración del curso: </label>
										<input type="text" onkeyup="mayus(this);" name="duracion_curso2" id="duracion_curso2" value="<?php if (isset($cliente_cursos_cortos[1][1])) {
																																			echo $cliente_cursos_cortos[1][1];
																																		} ?>" class="form-control" placeholder="INGRESA DURACIÓN DEL CURSO">
									</div>&nbsp;
									<hr>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="tiempo_curso2"> Año del curso: </label>
										<input type="text" maxlength="4" name="tiempo_curso2" id="tiempo_curso2" value="<?php if (isset($cliente_cursos_cortos[1][3])) {
																															echo $cliente_cursos_cortos[1][3];
																														} ?>" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
									</div>&nbsp;
									<hr>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="certificado_curso2"> Titulo certificado: </label>
										<select class="form-select" name="certificado_curso2" id="certificado_curso2">
											<option value="" <?php if (isset($cliente_cursos_cortos[1][4]) == '0' || '') {
																	echo "selected";
																} ?>>SELECCIONA</option>
											<option value="1" <?php if (isset($cliente_cursos_cortos[1][4]) == '1') {
																	echo "selected";
																} ?>>NO</option>
											<option value="2" <?php if (isset($cliente_cursos_cortos[1][4]) == '2') {
																	echo "selected";
																} ?>>SI</option>
										</select>
									</div>
								</div>
								<center>
									<br><a class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="collapse" href="#curso2" role="button" aria-expanded="true" aria-controls="curso2">
										<i class="bi bi-arrow-up"></i> Cerrar
									</a>
								</center>
							</div>
						</div>
						<hr>
						<!-- Curso corto 3 -->
						<center><a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#curso3" role="button" aria-expanded="false" aria-controls="curso3">
								<i class="bi bi-arrow-down"></i> Curso corto #3
							</a></center>
						<div class="collapse show" id="curso3">
							<div class="card card-body">
								<div class="input-group shadow-sm">
									<input type="hidden" id="id_curso3" name="id_curso3" value="<?php if (isset($cliente_cursos_cortos[2][5])) {
																									echo $cliente_cursos_cortos[2][5];
																								} ?>">
									<label class="input-group-text w-auto" for="nombre_curso3"> Nombre del curso: </label>
									<input type="text" onkeyup="mayus(this);" name="nombre_curso3" id="nombre_curso3" value="<?php if (isset($cliente_cursos_cortos[2][0])) {
																																	echo $cliente_cursos_cortos[2][0];
																																} ?>" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
								</div>
								<br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto" for="entidad_curso3"> Entidad: </label>
									<input type="text" onkeyup="mayus(this);" name="entidad_curso3" id="entidad_curso3" value="<?php if (isset($cliente_cursos_cortos[2][2])) {
																																	echo $cliente_cursos_cortos[2][2];
																																} ?>" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
								</div>
								<br>
								<div class="d-flex">
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="duracion_curso3"> Duración del curso: </label>
										<input type="text" onkeyup="mayus(this);" name="duracion_curso3" id="duracion_curso3" value="<?php if (isset($cliente_cursos_cortos[2][1])) {
																																			echo $cliente_cursos_cortos[2][1];
																																		} ?>" class="form-control" placeholder="INGRESA DURACION DEL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="tiempo_curso3"> Año del curso: </label>
										<input type="text" maxlength="4" name="tiempo_curso3" id="tiempo_curso3" value="<?php if (isset($cliente_cursos_cortos[2][3])) {
																															echo $cliente_cursos_cortos[2][3];
																														} ?>" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="certificado_curso3"> Titulo certificado: </label>
										<select class="form-select" name="certificado_curso3" id="certificado_curso3">
											<option value="" <?php if (isset($cliente_cursos_cortos[2][4]) == '0' || '') {
																	echo "selected";
																} ?>>SELECCIONA</option>
											<option value="1" <?php if (isset($cliente_cursos_cortos[2][4]) == '1') {
																	echo "selected";
																} ?>>NO</option>
											<option value="2" <?php if (isset($cliente_cursos_cortos[2][4]) == '2') {
																	echo "selected";
																} ?>>SI</option>
										</select>
									</div>
								</div>
								<center>
									<br><a class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="collapse" href="#curso3" role="button" aria-expanded="true" aria-controls="curso3">
										<i class="bi bi-arrow-up"></i> Cerrar
									</a>
								</center>
							</div>
						</div>
						<hr>
						<!-- Curso corto 4 -->
						<center><a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#curso4" role="button" aria-expanded="false" aria-controls="curso4">
								<i class="bi bi-arrow-down"></i> Curso corto #4
							</a></center>
						<div class="collapse show" id="curso4">
							<div class="card card-body">
								<div class="input-group shadow-sm">
									<input type="hidden" id="id_curso4" name="id_curso4" value="<?php if (isset($cliente_cursos_cortos[3][5])) {
																									echo $cliente_cursos_cortos[3][5];
																								} ?>">
									<label class="input-group-text w-auto" for="nombre_curso4"> Nombre del curso: </label>
									<input type="text" onkeyup="mayus(this);" name="nombre_curso4" id="nombre_curso4" value="<?php if (isset($cliente_cursos_cortos[3][0])) {
																																	echo $cliente_cursos_cortos[3][0];
																																} ?>" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
								</div>
								<br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto" for="entidad_curso4"> Entidad: </label>
									<input type="text" onkeyup="mayus(this);" name="entidad_curso4" id="entidad_curso4" value="<?php if (isset($cliente_cursos_cortos[3][2])) {
																																	echo $cliente_cursos_cortos[3][2];
																																} ?>" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
								</div>
								<br>
								<div class="d-flex">
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="duracion_curso4"> Duración del curso: </label>
										<input type="text" onkeyup="mayus(this);" name="duracion_curso4" id="duracion_curso4" value="<?php if (isset($cliente_cursos_cortos[3][1])) {
																																			echo $cliente_cursos_cortos[3][1];
																																		} ?>" class="form-control" placeholder="INGRESA DURACION DEL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="tiempo_curso4"> Año del curso: </label>
										<input type="text" maxlength="4" name="tiempo_curso4" id="tiempo_curso4" value="<?php if (isset($cliente_cursos_cortos[3][3])) {
																															echo $cliente_cursos_cortos[3][3];
																														} ?>" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="certificado_curso4"> Titulo certificado: </label>
										<select class="form-select" name="certificado_curso4" id="certificado_curso4">
											<option value="" <?php if (isset($cliente_cursos_cortos[3][4]) == '0' || '') {
																	echo "selected";
																} ?>>SELECCIONA</option>
											<option value="1" <?php if (isset($cliente_cursos_cortos[3][4]) == '1') {
																	echo "selected";
																} ?>>NO</option>
											<option value="2" <?php if (isset($cliente_cursos_cortos[3][4]) == '2') {
																	echo "selected";
																} ?>>SI</option>
										</select>
									</div>
								</div>
								<center>
									<br><a class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="collapse" href="#curso4" role="button" aria-expanded="true" aria-controls="curso4">
										<i class="bi bi-arrow-up"></i> Cerrar
									</a>
								</center>
							</div>
						</div>
						<center>
							<hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_cursos" role="button" aria-expanded="true" aria-controls="#ref_cursos">
								<i class="bi bi-arrow-up"></i> Cerrar Segmento
							</a>
						</center>
					</div>
				</div>
				<hr>

				<!-- VEHÍCULO -->
				<?php $consultaVehiculo = mysqli_query($conn, "SELECT * FROM cliente_vehiculo WHERE id_empleado=$id");
				$rowVehiculo = mysqli_fetch_array($consultaVehiculo); ?>
				<center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_vehiculo" role="button" aria-expanded="false" aria-controls="ref_vehiculo">
						<i class="bi bi-arrow-down"></i> VEHÍCULO
					</a></center>
				<div class="collapse show" id="ref_vehiculo">
					<div class="card card-body">
						<h5>Datos del vehículo:</h5>
						<div class="input-group shadow-sm">
							<label class="input-group-text w-25" for="vehiculo">(*) Vehículo: </label>
							<select class="form-select" name="vehiculo" id="vehiculo">
								<option value="NINGUNO" <?php if ($rowVehiculo['vehiculo'] == 'NINGUNO') {
															echo "selected";
														} ?>>NINGUNO</option>
								<option value="MOTO" <?php if ($rowVehiculo['vehiculo'] == 'MOTO') {
															echo "selected";
														} ?>>MOTO</option>
								<option value="CARRO" <?php if ($rowVehiculo['vehiculo'] == 'CARRO') {
															echo "selected";
														} ?>>CARRO</option>
							</select>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="ven_soat">Vencimiento del soat: </span>
								<input type="date" name="ven_soat" id="ven_soat" class="form-control" value="<?php echo $rowVehiculo['ven_soat'] ?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="ven_tecnomecanica">Vencimiento de la tecno-mecánica: </span>
								<input type="date" name="ven_tecnomecanica" id="ven_tecnomecanica" class="form-control" value="<?php echo $rowVehiculo['ven_tecnomecanica'] ?>">
							</div>
						</div>
						<center>
							<hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_vehiculo"" role=" button" aria-expanded="true" aria-controls="ref_vehiculo">
								<i class="bi bi-arrow-up"></i> Cerrar Segmento
							</a>
						</center>
					</div>
				</div>
				<hr>

				<!-- REFERENCIAS LABORALES -->
				<center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_laborales" role="button" aria-expanded="false" aria-controls="ref_laborales">
						<i class="bi bi-arrow-down"></i> REFERENCIAS LABORALES
					</a></center>
				<div class="collapse show" id="ref_laborales">
					<?php $consultaLaboral = mysqli_query($conn, "SELECT * FROM cliente_laborales WHERE id_empleado=$id");
					$cliente_laboral = array();
					while ($resultadoLaboral = mysqli_fetch_array($consultaLaboral)) {
						$empresa = $resultadoLaboral['empresa'];
						$jefe = $resultadoLaboral['jefe'];
						$telefono = $resultadoLaboral['telefono'];
						$cargo = $resultadoLaboral['cargo'];
						$tiempo_exp = $resultadoLaboral['tiempo_exp'];
						$motivo = $resultadoLaboral['motivo'];
						$id_laboral = $resultadoLaboral['id'];
						array_push($cliente_laboral, ["$empresa", "$jefe", "$telefono", "$cargo", "$tiempo_exp", "$motivo", "$id_laboral"]);
					} ?>

					<!-- Referencia laboral 1 -->
					<div class="card card-body">
						<h5>Datos primera referencia laboral:</h5>
						<div class="input-group shadow-sm">
							<span class="input-group-text w-25" for="empresa">(*) Empresa: </span>
							<input type="hidden" id="id_laboral" name="id_laboral" value="<?php if (isset($cliente_laboral[0][6])) {
																								echo $cliente_laboral[0][6];
																							} ?>">
							<input name="empresa" onkeyup="mayus(this);" id="empresa" class=" form-control" type="text" placeholder="INGRESA LA EMPRESA" value="<?php if (isset($cliente_laboral[0][0])) {
																																									echo $cliente_laboral[0][0];
																																								} ?>">
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="jefe">Jefe inmediato: </span>
								<input type="text" onkeyup="mayus(this);" name="jefe" id="jefe" class="form-control" placeholder="INGRESA EL NOMBRE DEL JEFE INMEDIATO" value="<?php if (isset($cliente_laboral[0][1])) {
																																													echo $cliente_laboral[0][1];
																																												} ?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="telefonoE">Teléfono de contacto: </span>
								<input type="number" name="telefonoE" id="telefonoE" class="form-control" placeholder="INGRESE EL NUMERO DE TELEFONO DEL CONTACTO" value="<?php if (isset($cliente_laboral[0][2])) {
																																												echo $cliente_laboral[0][2];
																																											} ?>">
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="cargoE">Cargo que desempeñó: </label>
								<input type="text" onkeyup="mayus(this);" name="cargoE" id="cargoE" class="form-control" placeholder="CARGO DEL EMPLEADO EN ESA EMPRESA" value="<?php if (isset($cliente_laboral[0][3])) {
																																													echo $cliente_laboral[0][3];
																																												} ?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="tiempo_exp">Tiempo de experiencia: </span>
								<input type="number" name="tiempo_exp" id="tiempo_exp" class="form-control" placeholder="INGRESE EL TIEMPO DE EXPERIENCIA EN NUMERO DE MESES" value="<?php if (isset($cliente_laboral[0][4])) {
																																															echo $cliente_laboral[0][4];
																																														} ?>">
								<input type="text" class="form-control w-25" readonly value="MESES">
							</div>
						</div>
						<br>
						<div class="input-group shadow-sm">
							<label class="input-group-text w-25" for="motivo">(*) Motivo de retiro: </label>
							<textarea type="text" onkeyup="mayus(this);" name="motivo" id="motivo" class="form-control" placeholder="MOTIVO DEL RETIRO"><?php if (isset($cliente_laboral[0][5])) {
																																							echo $cliente_laboral[0][5];
																																						} ?></textarea>
						</div>
						<br>
						<hr>

						<!-- Referencia laboral 2 -->
						<h5>Datos segunda referencia laboral:</h5>
						<div class="input-group shadow-sm">
							<span class="input-group-text w-auto" for="empresa2">(*) Empresa: </span>
							<input type="hidden" id="id_laboral2" name="id_laboral2" value="<?php echo $cliente_laboral[1][6] ?>">
							<input name="empresa2" onkeyup="mayus(this);" id="empresa2" class=" form-control" type="text" placeholder="INGRESA LA EMPRESA" value="<?php if (isset($cliente_laboral[1][0])) {
																																										echo $cliente_laboral[1][0];
																																									} ?>">
						</div>
						<hr>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-25" for="jefe2">Jefe inmediato: </span>
								<input type="text" onkeyup="mayus(this);" name="jefe2" id="jefe2" class="form-control" placeholder="INGRESA EL NOMBRE DEL JEFE INMEDIATO" value="<?php if (isset($cliente_laboral[1][1])) {
																																														echo $cliente_laboral[1][1];
																																													} ?>">
							</div>&nbsp;
							<hr>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="telefonoE2">Teléfono del contacto: </span>
								<input type="number" name="telefonoE2" id="telefonoE2" class="form-control" placeholder="INGRESE EL NUMERO DE TELEFONO DEL CONTACTO" value="<?php if (isset($cliente_laboral[1][2])) {
																																												echo $cliente_laboral[1][2];
																																											} ?>">
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="cargoE2">Cargo que desempeñó: </label>
								<input type="text" style="text-transform:uppercase;" name="cargoE2" id="cargoE2" class="form-control" placeholder="CARGO DEL EMPLEADO EN ESA EMPRESA" value="<?php if (isset($cliente_laboral[1][3])) {
																																																	echo $cliente_laboral[1][3];
																																																} ?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="tiempo_exp2">Tiempo de experiencia: </span>
								<input type="number" name="tiempo_exp2" id="tiempo_exp2" class="form-control" placeholder="INGRESE EL TIEMPO DE EXPERIENCIA EN NUMERO DE MESES" value="<?php if (isset($cliente_laboral[1][4])) {
																																															echo $cliente_laboral[1][4];
																																														} ?>">
								<input type="text" class="form-control w-25" readonly value="MESES">
							</div>
						</div>
						<br>

						<div class="input-group shadow-sm">
							<label class="input-group-text w-25" for="motivo2">(*) Motivo de retiro: </label>
							<textarea type="text" name="motivo2" id="motivo2" class="form-control" placeholder="MOTIVO DEL RETIRO"><?php if (isset($cliente_laboral[1][5])) {
																																		echo $cliente_laboral[1][5];
																																	} ?></textarea>
						</div>
						<center>
							<hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_laborales" role="button" aria-expanded="true" aria-controls="ref_laborales">
								<i class="bi bi-arrow-up"></i> Cerrar Segmento
							</a>
						</center>
					</div>
				</div>
				<hr>

				<!-- REFERENCIAS PERSONALES -->
				<center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_personales" role="button" aria-expanded="false" aria-controls="ref_personales">
						<i class="bi bi-arrow-down"></i> REFERENCIAS PERSONALES
				</center></a>
				<div class="collapse show" id="ref_personales">
					<div class="card card-body">
						<?php $consultaContacto = mysqli_query($conn, "SELECT * FROM cliente_contacto WHERE id_empleado=$id");
						$cliente_contacto = array();
						while ($resultadoContacto = mysqli_fetch_array($consultaContacto)) {
							$nombre_contacto = $resultadoContacto['nombre_contacto'];
							$parentesco = $parentescos[$resultadoContacto['parentesco']];
							$numero = $resultadoContacto['numero'];
							$parentesco_id = $resultadoContacto['parentesco'];
							$id_contacto = $resultadoContacto['id'];
							$contacto_directo = $resultadoContacto['contacto_directo'];
							array_push($cliente_contacto, ["$nombre_contacto", "$parentesco", "$numero", "$parentesco_id", "$id_contacto", "$contacto_directo"]);
						} ?>

						<!-- Referencia personal # 1 -->
						<h5>Datos primera referencia personal:</h5>
						<div class="input-group shadow-sm">
							<label class="input-group-text w-auto" for="nombre_contacto">(*) Nombres completos del contacto: </label>
							<input type="hidden" id="id_contacto" name="id_contacto" value="<?php echo $cliente_contacto[0][4] ?>">
							<input type="text" onkeyup="mayus(this);" name="nombre_contacto" id="nombre_contacto" class="form-control" placeholder="INGRESE EL NOMBRE DEL CONTACTO" value="<?php if (isset($cliente_contacto[0][0])) {
																																																echo $cliente_contacto[0][0];
																																															} ?>">
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="parentesco">(*) Parentesco: </label>
								<select class="form-select" name="parentesco" id="parentesco">
									<option value="<?php if (isset($cliente_contacto[0][3])) {
														echo $cliente_contacto[0][3];
													} ?>"><?php if (isset($cliente_contacto[0][1])) {
																echo $cliente_contacto[0][1];
															} ?></option>
									<?php
									$query = $conn->query("SELECT * FROM parentesco");
									while ($parentesco = mysqli_fetch_array($query)) {
										echo ($cliente_contacto[0][3] == $parentesco['id']) ? '' : '<option value="' . $parentesco['id'] . '">' . $parentesco['parentesco'] . '</option>';
									}
									?>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="numero">(*) Número de celular: </label>
								<input type="number" name="numero" id="numero" class="form-control" placeholder="Ingrese el numero del celular" value="<?php if (isset($cliente_contacto[0][2])) {
																																							echo $cliente_contacto[0][2];
																																						} ?>">
							</div>&nbsp;
							<br>
							<label class="input-group-text w-auto" for="contacto_directo1"> Es contacto directo: </label>
							<div class="d-flex flex-row">&nbsp;
								<!-- si -->
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="contacto_directo1" id="contacto_directo1" value="1" <?php if (isset($cliente_contacto[0][5])) {
																																				if ($cliente_contacto[0][5] == 1) {
																																					echo 'checked';
																																				}
																																			}

																																			?>>
									<label class="form-check-label" for="contacto_directo1">
										SI </label>
								</div>
								<!-- final si -->
								<!-- no -->
								<div class="form-check form-check-inline">
									<label class="form-check-label " for="contacto_directo1">
										NO </label>
									<input class="form-check-input" type="radio" name="contacto_directo1" id="contacto_directo1" value="0" <?php if (isset($cliente_contacto[0][5])) {
																																				if ($cliente_contacto[0][5] == 0) {
																																					echo 'checked';
																																				}
																																			} else {
																																				echo 'checked';
																																			}
																																			?>>
								</div>
								<!-- final no -->
							</div>
						</div>
						<br>
						<hr>

						<!-- Referencia personal 2 -->
						<h5>Datos segunda referencia personal:</h5>
						<div class="input-group shadow-sm">
							<label class="input-group-text w-auto" for="nombre_contacto2">(*) Nombres completos del contacto: </label>
							<input type="hidden" id="id_contacto2" name="id_contacto2" value="<?php echo $cliente_contacto[1][4] ?>">
							<input type="text" onkeyup="mayus(this);" name="nombre_contacto2" id="nombre_contacto2" class="form-control" placeholder="INGRESE EL NOMBRE DEL CONTACTO" value="<?php if (isset($cliente_contacto[1][0])) {
																																																	echo $cliente_contacto[1][0];
																																																} ?>">
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="parentesco2">(*) Parentesco: </label>
								<select class="form-select" name="parentesco2" id="parentesco2">
									<option value="<?php if (isset($cliente_contacto[1][3])) {
														echo $cliente_contacto[1][3];
													} ?>"><?php if (isset($cliente_contacto[1][1])) {
																echo $cliente_contacto[1][1];
															} ?></option>
									<?php
									$query = $conn->query("SELECT * FROM parentesco");
									while ($parentesco = mysqli_fetch_array($query)) {
										echo ($cliente_contacto[1][3] == $parentesco['id']) ? '' : '<option value="' . $parentesco['id'] . '">' . $parentesco['parentesco'] . '</option>';
									}
									?>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="numero2">(*) Número de celular: </label>
								<input type="number" name="numero2" id="numero2" class="form-control" placeholder="Ingrese el numero del celular" value="<?php if (isset($cliente_contacto[1][2])) {
																																								echo $cliente_contacto[1][2];
																																							} ?>">
							</div>&nbsp;
							<br>
							<label class="input-group-text w-auto" for="contacto_directo2"> Es contacto directo: </label>
							<div class="d-flex flex-row">&nbsp;
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="contacto_directo2" id="contacto_directo2" value="1" <?php if (isset($cliente_contacto[1][5])) {
																																				if ($cliente_contacto[1][5] == 1) {
																																					echo 'checked';
																																				}
																																			}

																																			?>>
									<label class="form-check-label" for="contacto_directo2">
										SI </label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="contacto_directo2" id="contacto_directo2" value="0" <?php if (isset($cliente_contacto[1][5])) {
																																				if ($cliente_contacto[1][5] == 0) {
																																					echo 'checked';
																																				}
																																			} else {
																																				echo 'checked';
																																			}
																																			?>>
									<label class="form-check-label" for="contacto_directo2">
										NO </label>
								</div>
							</div>
						</div>
						<br>
						<hr>

						<!-- Referencia personal 3 -->
						<h5>Datos tercera referencia personal:</h5>
						<div class="input-group shadow-sm">
							<label class="input-group-text w-auto" for="nombre_contacto3">(*) Nombres completos del contacto: </label>
							<input type="hidden" id="id_contacto3" name="id_contacto3" value="<?php echo $cliente_contacto[2][4] ?>">
							<input type="text" onkeyup="mayus(this);" name="nombre_contacto3" id="nombre_contacto3" class="form-control" placeholder="INGRESE EL NOMBRE DEL CONTACTO" value="<?php if (isset($cliente_contacto[2][0])) {
																																																	echo $cliente_contacto[2][0];
																																																} ?>">
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="parentesco3">(*) Parentesco: </label>
								<select class="form-select" name="parentesco3" id="parentesco3">
									<option selected value="<?php if (isset($cliente_contacto[2][3])) {
																echo $cliente_contacto[2][3];
															} ?>"><?php if (isset($cliente_contacto[2][1])) {
																		echo $cliente_contacto[2][1];
																	} ?></option>
									<?php
									$query = $conn->query("SELECT * FROM parentesco");
									while ($parentesco = mysqli_fetch_array($query)) {

										echo ($cliente_contacto[2][3] == $parentesco['id']) ? '' : '<option value="' . $parentesco['id'] . '">' . $parentesco['parentesco'] . '</option>';
									} ?>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="numero3">(*) Número de celular: </label>
								<input type="number" name="numero3" id="numero3" class="form-control" placeholder="Ingrese el numero del celular" value="<?php if (isset($cliente_contacto[2][2])) {
																																								echo $cliente_contacto[2][2];
																																							} ?>">
							</div>&nbsp;
							<br>
							<label class="input-group-text w-auto" for="contacto_directo3"> Es contacto directo: </label>
							<div class="d-flex flex-row">&nbsp;
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="contacto_directo3" id="contacto_directo3" value="1" <?php if (isset($cliente_contacto[2][5])) {
																																				if ($cliente_contacto[2][5] == 1) {
																																					echo 'checked';
																																				}
																																			} ?>>
									<label class="form-check-label" for="contacto_directo3">
										SI </label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="contacto_directo3" id="contacto_directo3" value="0" <?php
																																			if (isset($cliente_contacto[2][5])) {
																																				if ($cliente_contacto[2][5] == 0) {
																																					echo 'checked';
																																				}
																																			} else {
																																				echo 'checked';
																																			} ?> <label class="form-check-label" for="contacto_directo3">
									NO </label>
								</div>
							</div>
						</div>
						<br>
						<center>
							<hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_personales" role="button" aria-expanded="true" aria-controls="ref_personales">
								<i class="bi bi-arrow-up"></i> Cerrar Segmento
							</a>
						</center>
					</div>
				</div>
				<hr>
				<div class="card card-body">
					<div class="control-group">
						<center>
							<h6>Para guardar los cambios realizados, dar clic en el siguiente botón de Actualizar o de lo contrario en el botón de Cancelar para salir:</h6>
						</center>
						<div class="controls">
							<center><input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-success" />
								<a href="index.php" class="btn btn-sm btn-secondary btn-block"><i class="bi bi-x-circle"></i> Cancelar</a>
							</center>
						</div>
					</div>
				</div>
				<hr>
		</div>
		</form>
	</div>
	<br>
	<div class="card-footer">
		<div class="container">
			<center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios Forestales </b></center>
		</div>
	</div>

</body>
<script>
	function mayus(e) {
		e.value = e.value.toUpperCase();
	}
</script>

</html>