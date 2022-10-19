<?php
include ("../login/userRestrintion.php");
include "../include/conn/conn.php";
include "../cond/todo.php";
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
		<?php include('update-edit.php'); ?>
		<?php
		$id = intval($_GET['id']);
		$sql = mysqli_query($conn, "SELECT * FROM clientes WHERE id='$id'");
		if (mysqli_num_rows($sql) == 0) {
			echo "<script>window.location = 'index.php'</script>";
		} else {
			$row = mysqli_fetch_assoc($sql);
		} ?>
		<hr>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><i class="bi bi-pencil-square"></i> Editar la Información del empleado</h4>
			</div>
			<form name="form1" id="form1" class="form-horizontal row-fluid" action="editar.php?id=<?php echo $id; ?>" method="POST">

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
							<span class="input-group-text w-auto">(*) Nombres: </span>
							<input class="form-control" onkeyup="mayus(this);" type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" required>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto">(*) Primer Apellido: </span>
								<input class="form-control" onkeyup="mayus(this);" type="text" name="primer_apellido" id="primer_apellido" value="<?php echo $row['primer_apellido']; ?>" required>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto"> Segundo Apellido: </span>
								<input class="form-control" onkeyup="mayus(this);" type="text" name="segundo_apellido" id="segundo_apellido" value="<?php $echo = (isset($row['segundo_apellido']) != NULL) ? $row['segundo_apellido'] : ''; echo $echo; ?>">
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto">(*) Cédula: </span>
								<input class="form-control" onkeyup="mayus(this);" type="number" name="cedula" id="cedula" value="<?php echo $row['cedula']; ?>" required>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto">(*) Lugar de Expedición: </span>
								<input class="form-control" onkeyup="mayus(this);" type="text" name="exp_ced" id="exp_ced" value="<?php echo $row['exp_ced']; ?>" required>
							</div>
						</div>
						<br>

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto">(*) Fecha de Expedición: </span>
								<input class="form-control" type="date" name="fecha_expedicion" id="fecha_expedicion" value="<?php echo $row['fecha_expedicion']; ?>" required>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto">(*) Fecha de Nacimiento: </span>
								<input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>
							</div>
						</div>
						<br>

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="civil">(*) Estado Civil: </label>
								<select class="form-select" name="civil" id="civil" required>
									<option value="1" <?php $echo = $row['civil'] == '1' ? 'selected' : ''; echo $echo;?>>SOLTERO</option>
									<option value="2" <?php $echo = $row['civil'] == '2' ? 'selected' : ''; echo $echo;?>>CASADO</option>
									<option value="3" <?php $echo = $row['civil'] == '3' ? 'selected' : ''; echo $echo;?>>UNION LIBRE</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="genero">(*) Género: </label>
								<select class="form-select" name="genero" id="genero" required>
									<option value="1" <?php $echo = $row['genero'] == '1' ? 'selected' : ''; echo $echo;?>>MASCULINO</option>
									<option value="2" <?php $echo = $row['genero'] == '2' ? 'selected' : ''; echo $echo;?>>FEMENINO</option>
									<option value="3" <?php $echo = $row['genero'] == '3' ? 'selected' : ''; echo $echo;?>>OTRO</option>
								</select>
							</div>
						</div>
						<br>

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="raza">(*) Raza: </label>
								<select class="form-select" name="raza" id="raza" required>
									<option value="1" <?php $echo = $row['raza'] == '1' ? 'selected' : ''; echo $echo;?>>MESTIZO</option>
									<option value="2" <?php $echo = $row['raza'] == '2' ? 'selected' : ''; echo $echo;?>>MULATO</option>
									<option value="3" <?php $echo = $row['raza'] == '3' ? 'selected' : ''; echo $echo;?>>ZAMBO</option>
									<option value="4" <?php $echo = $row['raza'] == '4' ? 'selected' : ''; echo $echo;?>>AFROAMERICANO</option>
									<option value="5" <?php $echo = $row['raza'] == '5' ? 'selected' : ''; echo $echo;?>>BLANCO</option>
									<option value="6" <?php $echo = $row['raza'] == '6' ? 'selected' : ''; echo $echo;?>>INDÍGENA</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="rh">(*) RH Sanguíneo: </label>
								<select class="form-select" name="rh" id="rh" required>
									<option value="1" <?php $echo = $row['rh'] == '1' ? 'selected' : ''; echo $echo;?>>A+</option>
									<option value="2" <?php $echo = $row['rh'] == '2' ? 'selected' : ''; echo $echo;?>>A-</option>
									<option value="3" <?php $echo = $row['rh'] == '3' ? 'selected' : ''; echo $echo;?>>B+</option>
									<option value="4" <?php $echo = $row['rh'] == '4' ? 'selected' : ''; echo $echo;?>>B-</option>
									<option value="5" <?php $echo = $row['rh'] == '5' ? 'selected' : ''; echo $echo;?>>AB+</option>
									<option value="6" <?php $echo = $row['rh'] == '6' ? 'selected' : ''; echo $echo;?>>AB-</option>
									<option value="7" <?php $echo = $row['rh'] == '7' ? 'selected' : ''; echo $echo;?>>O+</option>
									<option value="8" <?php $echo = $row['rh'] == '8' ? 'selected' : ''; echo $echo;?>>O-</option>
								</select>
							</div>
						</div>
						<br>

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto">(*) Número de Hijos: </span>
								<input name="hijos" id="hijos" value="<?php echo $row['hijos']; ?>" class=" form-control" type="number" required>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto">(*) Personas a Cargo: </span>
								<input name="acargo" id="acargo" value="<?php echo $row['acargo']; ?>" class=" form-control" type="number" required>
							</div>
						</div>
						<br>

						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto">(*) Número de Celular: </span>
								<input name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>" class=" form-control span8 tip" type="tel" required>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto"> Correo electrónico: </span>
								<input name="email" id="email" value="<?php $echo = (isset($row['email']) != NULL) ? $row['email'] : ''; echo $echo;?>" class="form-control span8 tip" type="email">
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" id="direccion">(*) Dirección: </label>
								<input type="text" name="direccion" onkeyup="mayus(this);" id="direccion" value="<?php $echo = (isset($row['direccion']) != NULL) ? $row['direccion'] : ''; echo $echo;?>" class="form-control span8 tip">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" id="estrato">(*) Estrato socio-económico: </label>
								<input class=" form-control span8 tip" type="number" name="estrato" id="estrato" value="<?php $echo = (isset($row['estrato']) != NULL) ? $row['estrato'] : ''; echo $echo;?>">
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="tip_vivi">(*) Tipo de Vivienda: </label>
								<select class="form-select" name="tip_vivi" id="tip_vivi" required>
									<option value="1" <?php $echo = $row['tip_vivi'] == '1' ? 'selected' : ''; echo $echo;?>>PROPIA</option>
									<option value="2" <?php $echo = $row['tip_vivi'] == '2' ? 'selected' : ''; echo $echo;?>>FAMILIAR</option>
									<option value="3" <?php $echo = $row['tip_vivi'] == '3' ? 'selected' : ''; echo $echo;?>>ALQUILADA</option>
									<option value="4" <?php $echo = $row['tip_vivi'] == '4' ? 'selected' : ''; echo $echo;?>>POR DEFINIR</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="nucleo">(*) Núcleo: </label>
								<select class="form-select" name="nucleo" id="nucleo" required>
									<option value="1" <?php $echo = $row['nucleo'] == '1' ? 'selected' : ''; echo $echo;?>>SANTA ROSA DE CABAL</option>
									<option value="2" <?php $echo = $row['nucleo'] == '2' ? 'selected' : ''; echo $echo;?>>QUINDIO</option>
									<option value="3" <?php $echo = $row['nucleo'] == '3' ? 'selected' : ''; echo $echo;?>>RIOSUCIO</option>
								</select>
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="cargo">(*) Cargo: </label>
								<select class="form-select" name="cargo" id="cargo" required>
									<option value="1" <?php $echo = $row['cargo'] == '1' ? 'selected' : ''; echo $echo;?>>DESPACHADOR</option>
									<option value="2" <?php $echo = $row['cargo'] == '2' ? 'selected' : ''; echo $echo;?>>MONITOR</option>
									<option value="3" <?php $echo = $row['cargo'] == '3' ? 'selected' : ''; echo $echo;?>>SUPERVISOR DE APROVECHAMIENTO</option>
									<option value="4" <?php $echo = $row['cargo'] == '4' ? 'selected' : ''; echo $echo;?>>INSPECTOR DE EQUIPOS</option>
									<option value="5" <?php $echo = $row['cargo'] == '5' ? 'selected' : ''; echo $echo;?>>JEFE DE LINEA</option>
									<option value="6" <?php $echo = $row['cargo'] == '6' ? 'selected' : ''; echo $echo;?>>MOTOSIERRISTA</option>
									<option value="7" <?php $echo = $row['cargo'] == '7' ? 'selected' : ''; echo $echo;?>>ESTROBADOR</option>
									<option value="8" <?php $echo = $row['cargo'] == '8' ? 'selected' : ''; echo $echo;?>>DESCORTEZADOR</option>
									<option value="9" <?php $echo = $row['cargo'] == '9' ? 'selected' : ''; echo $echo;?>>ARRIERO</option>
									<option value="10" <?php $echo = $row['cargo'] == '10' ? 'selected' : ''; echo $echo;?>>GUADAÑADOR</option>
									<option value="11" <?php $echo = $row['cargo'] == '11' ? 'selected' : ''; echo $echo;?>>CAMINERO</option>
									<option value="12" <?php $echo = $row['cargo'] == '12' ? 'selected' : ''; echo $echo;?>>APRENDIZ SENA</option>
									<option value="13" <?php $echo = $row['cargo'] == '13' ? 'selected' : ''; echo $echo;?>>SILVICULTOR</option>
									<option value="14" <?php $echo = $row['cargo'] == '14' ? 'selected' : ''; echo $echo;?>>MECÁNICO</option>
									<option value="15" <?php $echo = $row['cargo'] == '15' ? 'selected' : ''; echo $echo;?>>COORDINADOR OPERATIVO</option>
									<option value="16" <?php $echo = $row['cargo'] == '16' ? 'selected' : ''; echo $echo;?>>COORDINADOR SSTAV</option>
									<option value="17" <?php $echo = $row['cargo'] == '17' ? 'selected' : ''; echo $echo;?>>GERENTE</option>
									<option value="18" <?php $echo = $row['cargo'] == '18' ? 'selected' : ''; echo $echo;?>>ASISTENTE ADMINISTRATIVO</option>
									<option value="19" <?php $echo = $row['cargo'] == '19' ? 'selected' : ''; echo $echo;?>>GESTOR FINANCIERO</option>
									<option value="20" <?php $echo = $row['cargo'] == '20' ? 'selected' : ''; echo $echo;?>>GESTOR DE SISTEMAS DE INFORMACIÓN</option>
									<option value="21" <?php $echo = $row['cargo'] == '21' ? 'selected' : ''; echo $echo;?>>AUXILIAR SSTAV</option>
									<option value="22" <?php $echo = $row['cargo'] == '22' ? 'selected' : ''; echo $echo;?>>SUPERVISOR DE SILVICULTURA</option>
									<option value="23" <?php $echo = $row['cargo'] == '23' ? 'selected' : ''; echo $echo;?>>SUPERVISOR DE VIAS</option>
									<option value="24" <?php $echo = $row['cargo'] == '24' ? 'selected' : ''; echo $echo;?>>GESTOR ADMINISTRATIVO</option>
									<option value="25" <?php $echo = $row['cargo'] == '25' ? 'selected' : ''; echo $echo;?>>GESTOR DEL RIESGO</option>
									<option value="26" <?php $echo = $row['cargo'] == '26' ? 'selected' : ''; echo $echo;?>>COORDINADOR AMBIENTAL</option>
									<option value="27" <?php $echo = $row['cargo'] == '27' ? 'selected' : ''; echo $echo;?>>SUPERNUMERARIO</option>
									<option value="28" <?php $echo = $row['cargo'] == '28' ? 'selected' : ''; echo $echo;?>>APRENDIZ UNIVERSITARIO</option>
									<option value="29" <?php $echo = $row['cargo'] == '29' ? 'selected' : ''; echo $echo;?>>AUXILIAR ASERRIO</option>
									<option value="30" <?php $echo = $row['cargo'] == '30' ? 'selected' : ''; echo $echo;?>>MEDIDOR</option>
									<option value="31" <?php $echo = $row['cargo'] == '31' ? 'selected' : ''; echo $echo;?>>OPERADOR ASERRIO</option>
									<option value="32" <?php $echo = $row['cargo'] == '32' ? 'selected' : ''; echo $echo;?>>OPERADOR DE EVACUACIÓN Y CARGUE</option>
									<option value="33" <?php $echo = $row['cargo'] == '33' ? 'selected' : ''; echo $echo;?>>OPERADOR DE EXTRACCIÓN</option>
									<option value="34" <?php $echo = $row['cargo'] == '34' ? 'selected' : ''; echo $echo;?>>OPERADOR MAQUINARIA</option>
									<option value="35" <?php $echo = $row['cargo'] == '35' ? 'selected' : ''; echo $echo;?>>COORDINADOR RECURSOS HUMANOS</option>
									<option value="36" <?php $echo = $row['cargo'] == '36' ? 'selected' : ''; echo $echo;?>>COORDINADOR OPERATIVO</option>
									<option value="37" <?php $echo = $row['cargo'] == '37' ? 'selected' : ''; echo $echo;?>>RECIBIDOR DE VIAS</option>
									<option value="38" <?php $echo = $row['cargo'] == '38' ? 'selected' : ''; echo $echo;?>>MAMPOSTERO</option>
									<option value="39" <?php $echo = $row['cargo'] == '39' ? 'selected' : ''; echo $echo;?>>AUXILIAR DE MAMPOSTERÍA</option>
									<option value="40" <?php $echo = $row['cargo'] == '40' ? 'selected' : ''; echo $echo;?>>INVESTIGADOR</option>
									<option value="41" <?php $echo = $row['cargo'] == '41' ? 'selected' : ''; echo $echo;?>>INGENIERO CIVIL</option>
									<option value="42" <?php $echo = $row['cargo'] == '42' ? 'selected' : ''; echo $echo;?>>INGENIERO FORESTAL</option>
									<option value="43" <?php $echo = $row['cargo'] == '43' ? 'selected' : ''; echo $echo;?>>SOCIAL</option>
									<option value="44" <?php $echo = $row['cargo'] == '44' ? 'selected' : ''; echo $echo;?>>MEJORADORA SOCIAL</option>
									<option value="45" <?php $echo = $row['cargo'] == '45' ? 'selected' : ''; echo $echo;?>>OFICIOS VARIOS</option>
									<option value="46" <?php $echo = $row['cargo'] == '46' ? 'selected' : ''; echo $echo;?>>AUXILIAR EN SISTEMAS DE INFORMACIÓN</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="proceso">(*) Proceso: </label>
								<select class="form-select" name="proceso" id="proceso" required>
									<option value="1" <?php $echo = $row['proceso'] == '1' ? 'selected' : ''; echo $echo;?>>DIRECCIONAMIENTO ESTRATÉGICO</option>
									<option value="2" <?php $echo = $row['proceso'] == '2' ? 'selected' : ''; echo $echo;?>>SILVICULTURA</option>
									<option value="3" <?php $echo = $row['proceso'] == '3' ? 'selected' : ''; echo $echo;?>>APROVECHAMIENTO</option>
									<option value="4" <?php $echo = $row['proceso'] == '4' ? 'selected' : ''; echo $echo;?>>ADMINISTRATIVO</option>
									<option value="5" <?php $echo = $row['proceso'] == '5' ? 'selected' : ''; echo $echo;?>>APROVECHAMIENTO</option>
									<option value="6" <?php $echo = $row['proceso'] == '6' ? 'selected' : ''; echo $echo;?>>FINANCIERO</option>
									<option value="7" <?php $echo = $row['proceso'] == '7' ? 'selected' : ''; echo $echo;?>>GESTIÓN DEL RIESGO</option>
									<option value="8" <?php $echo = $row['proceso'] == '8' ? 'selected' : ''; echo $echo;?>>GESTIÓN DE LA INFORMACIÓN</option>
									<option value="9" <?php $echo = $row['proceso'] == '9' ? 'selected' : ''; echo $echo;?>>SOCIAL</option>
									<option value="10" <?php $echo = $row['proceso'] == '10' ? 'selected' : ''; echo $echo;?>>VIAS</option>
									<option value="11" <?php $echo = $row['proceso'] == '11' ? 'selected' : ''; echo $echo;?>>INVENTARIO FORESTAL</option>
									<option value="12" <?php $echo = $row['proceso'] == '12' ? 'selected' : ''; echo $echo;?>>OPERATIVO</option>
								</select>
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="estado">(*) Estado: </label>
								<select class="form-select" name="estado" id="estado" required>
									<option value="1" <?php $echo = $row['estado'] == '1' ? 'selected' : ''; echo $echo;?>>ACTIVO</option>
									<option value="2" <?php $echo = $row['estado'] == '2' ? 'selected' : ''; echo $echo;?>>INACTIVO</option>
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
								<input class="form-control span8 tip" type="date" name="fecha_salida" id="fecha_salida" value="<?php $echo = (isset($row["fecha_salida"]) != NULL) ? $row['fecha_salida'] : ''; echo $echo; ?>">
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
				<?php
				$consultaTalla = mysqli_query($conn, "SELECT * FROM cliente_tallas WHERE id_empleado='$id'") or die (mysqli_error($conn));
				$rowTalla = mysqli_fetch_assoc($consultaTalla);
				?>
				<center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_tallas" role="button" aria-expanded="false" aria-controls="ref_tallas">
						<i class="bi bi-arrow-down"></i> INFORMACIÓN DE TALLAS DE DOTACIÓN
					</a></center>
				<div class="collapse show" id="ref_tallas">
					<div class="card card-body">

						<h5>Tallas del empleado: </h5>
						<div class="input-group shadow-sm">
							<span class="input-group-text w-auto" for="camisa">(*) Talla camisa:</span>
							<input name="camisa" onkeyup="mayus(this);" id="camisa" class="form-control" type="text" placeholder="Talla de camisa" value="<?php $echo = (isset($rowTalla['camisa']) != NULL) ? $rowTalla['camisa'] : ''; echo $echo;?>">
							<span class="input-group-text w-auto" for="pantalon">(*) Talla pantalón:</span>
							<input name="pantalon" onkeyup="mayus(this);" id="pantalon" class="form-control" type="text" placeholder="Talla de pantalón" value="<?php $echo = (isset($rowTalla['pantalon']) != NULL) ? $rowTalla['pantalon'] : ''; echo $echo;?>">
						</div>
						<br>

						<div class="input-group shadow-sm">
							<span class="input-group-text w-auto" for="botas">(*) Talla botas:</span>
							<input name="botas" id="botas" class="form-control" type="text" placeholder="Talla de botas" value="<?php $echo = (isset($rowTalla['botas']) != NULL) ? $rowTalla['botas'] : ''; echo $echo; ?>">
							<span class="input-group-text w-auto" for="guayo">(*) Talla guayo:</span>
							<input name="guayo" id="guayo" class="form-control" type="text" placeholder="Talla de guayo" value="<?php $echo = (isset($rowTalla['guayo']) != NULL) ? $rowTalla['guayo'] : ''; echo $echo; ?>">
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
									<option value="<?php echo $row['eps'] ?>"><?php echo $epss[$row['eps']] ?></option> <!-- Realizar estos parametros con el resto de selects -->
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
									<option value="1" <?php $echo = $row['pensiones'] == '1' ? 'selected' : ''; echo $echo;?>>PROTECCIÓN S.A.</option>
									<option value="2" <?php $echo = $row['pensiones'] == '2' ? 'selected' : ''; echo $echo;?>>PORVENIR S.A.</option>
									<option value="3" <?php $echo = $row['pensiones'] == '3' ? 'selected' : ''; echo $echo;?>>COLPENSIONES</option>
									<option value="4" <?php $echo = $row['pensiones'] == '4' ? 'selected' : ''; echo $echo;?>>OLD MUTUAL</option>
									<option value="5" <?php $echo = $row['pensiones'] == '5' ? 'selected' : ''; echo $echo;?>>NINGUNA AFP</option>
									<option value="6" <?php $echo = $row['pensiones'] == '6' ? 'selected' : ''; echo $echo;?>>COLFONDOS</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="caja">(*) Caja de Compensación: </label>
								<select class="form-select" name="caja" id="caja" required>
									<option value="1" <?php $echo = $row['caja'] == '1' ? 'selected' : ''; echo $echo;?>>COMFAMILIAR RISARALDA</option>
									<option value="2" <?php $echo = $row['caja'] == '2' ? 'selected' : ''; echo $echo;?>>COMFACALDAS</option>
									<option value="3" <?php $echo = $row['caja'] == '3' ? 'selected' : ''; echo $echo;?>>COMFENALCO QUINDIO</option>
									<option value="4" <?php $echo = $row['caja'] == '4' ? 'selected' : ''; echo $echo;?>>COMFENALCO VALLE</option>
									<option value="5" <?php $echo = $row['caja'] == '5' ? 'selected' : ''; echo $echo;?>>NINGUNA CAJA</option>
								</select>
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="servicio_funerario">Servicio funerario: </span>
								<input type="text" onkeyup="mayus(this);" name="serv_funerario" id="serv_funerario" class="form-control" placeholder="INGRESA EL SERVICIO FUNERARIO" value="<?php $echo = (isset($row['serv_funerario']) != NULL) ? $row['serv_funerario'] : ''; echo $echo;?>">
							</div>&nbsp;
							<hr>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="enfermedad"> Enfermedad o tratamiento médico: </label>
								<select class="form-select" name="enfermedad" id="enfermedad">
									<option value="1" <?php $echo = $row['enfermedad'] == '1' ? 'selected' : ''; echo $echo;?>>NO</option>
									<option value="2" <?php $echo = $row['enfermedad'] == '2' ? 'selected' : ''; echo $echo;?>>SI</option>
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
				$sql_cliente_academico = mysqli_query($conn, "SELECT curso, completado, semestre, titulo FROM cliente_academico WHERE id_cliente='$id'");
				$row_curso = mysqli_fetch_assoc($sql_cliente_academico);
				?>
				<div class="collapse show" id="ref_academica">
					<div class="card card-body">
						<h5>Datos de estudio:</h5>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="curso">(*) Nivel Educativo: </label>
								<select class="form-select" name="curso" id="curso" required>
									<option value="1" <?php $echo = $row_curso['curso'] == '1' ? 'selected' : ''; echo $echo;?>>NINGUNO</option>
									<option value="2" <?php $echo = $row_curso['curso'] == '2' ? 'selected' : ''; echo $echo;?>>BÁSICA PRIMARIA</option>
									<option value="3" <?php $echo = $row_curso['curso'] == '3' ? 'selected' : ''; echo $echo;?>>SECUNDARIA</option>
									<option value="4" <?php $echo = $row_curso['curso'] == '4' ? 'selected' : ''; echo $echo;?>>MEDIA VOCACIONAL</option>
									<option value="5" <?php $echo = $row_curso['curso'] == '5' ? 'selected' : ''; echo $echo;?>>TÉCNICO</option>
									<option value="6" <?php $echo = $row_curso['curso'] == '6' ? 'selected' : ''; echo $echo;?>>TECNÓLOGO</option>
									<option value="7" <?php $echo = $row_curso['curso'] == '7' ? 'selected' : ''; echo $echo;?>>PROFESIONAL</option>
									<option value="8" <?php $echo = $row_curso['curso'] == '8' ? 'selected' : ''; echo $echo;?>>ESPECIALISTA</option>
									<option value="9" <?php $echo = $row_curso['curso'] == '9' ? 'selected' : ''; echo $echo;?>>MAGISTER</option>
									<option value="10" <?php $echo = $row_curso['curso'] == '10' ? 'selected' : ''; echo $echo;?>>DOCTOR</option>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="completado">(*) Completado: </label>
								<select class="form-select" name="completado" id="completado">
									<option value="" <?php $echo = $row_curso['completado'] == NULL ? 'selected' : ''; echo $echo;?>>SELECCIONA</option>
									<option value="1" <?php $echo = $row_curso['completado'] == 1 ? 'selected' : ''; echo $echo;?>>SI</option>
									<option value="0" <?php $echo = $row_curso['completado'] == 0 ? 'selected' : ''; echo $echo;?>>NO</option>
								</select>
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="semestre"> Años/Semestres completados: </label>
								<input type="number" name="semestre" id="semestre" class="form-control" placeholder="INGRESA AÑOS O SEMESTRES COMPLETADOS" value="<?php $echo = (isset($row_curso['semestre']) != NULL) ? $row_curso['semestre'] : ''; echo $echo; ?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="titulo"> Nombre de titulo obtenido: </label>
								<input type="text" onkeyup="mayus(this);" name="titulo" id="titulo" class="form-control" placeholder="INGRESA NOMBRE DE TITULO OBTENIDO" value="<?php $echo = (isset($row_curso['titulo']) != NULL) ? $row_curso['titulo'] : ''; echo $echo;?>">
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
								<?php
								$consultaCursosCortos = mysqli_query($conn, "SELECT id, nombre_curso, duracion, entidad, tiempo, certificado FROM cliente_cursos WHERE id_cliente='$id'") or die (mysqli_error($conn));
								$cliente_cursos_cortos = array();
								while ($resultadoCursosCortos = mysqli_fetch_assoc($consultaCursosCortos)) {
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
									<input type="hidden" id="id_curso1" name="id_curso1" value="<?php $echo = $cliente_cursos_cortos[0][5] != NULL ? $cliente_cursos_cortos[0][5] : ''; echo $echo;?>">
									<label class="input-group-text w-auto" for="nombre_curso1"> Nombre del curso: </label>
									<input type="text" onkeyup="mayus(this);" name="nombre_curso1" id="nombre_curso1" value="<?php $echo = $cliente_cursos_cortos[0][0] != NULL ? $cliente_cursos_cortos[0][0] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
								</div>
								<br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto" for="entidad_curso1"> Entidad: </label>
									<input type="text" onkeyup="mayus(this);" name="entidad_curso1" id="entidad_curso1" value="<?php $echo = $cliente_cursos_cortos[0][2] != NULL ? $cliente_cursos_cortos[0][2] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
								</div>
								<br>
								<div class="d-flex">
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="duracion_curso1"> Duración del curso: </label>
										<input type="text" onkeyup="mayus(this);" name="duracion_curso1" id="duracion_curso1" value="<?php $echo = $cliente_cursos_cortos[0][1] != NULL ? $cliente_cursos_cortos[0][1] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA DURACION DEL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="tiempo_curso1"> Año del curso: </label>
										<input type="text" onkeyup="mayus(this);" maxlength="4" name="tiempo_curso1" id="tiempo_curso1" value="<?php $echo = $cliente_cursos_cortos[0][3] != NULL ? $cliente_cursos_cortos[0][3] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="certificado_curso1"> Titulo certificado: </label>
										<select class="form-select" name="certificado_curso1" id="certificado_curso1">
											<option value="0" <?php $echo = $cliente_cursos_cortos[0][4] == '0' ? 'selected' : ''; echo $echo;?>>SELECCIONA</option>
											<option value="1" <?php $echo = $cliente_cursos_cortos[0][4] == '1' ? 'selected' : ''; echo $echo;?>>NO</option>
											<option value="2" <?php $echo = $cliente_cursos_cortos[0][4] == '2' ? 'selected' : ''; echo $echo;?>>SI</option>
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
									<input type="hidden" id="id_curso2" name="id_curso2" value="<?php $echo = $cliente_cursos_cortos[1][5] != NULL ? $cliente_cursos_cortos[1][5] : ''; echo $echo;?>">
									<label class="input-group-text w-auto" for="nombre_curso2"> Nombre del curso: </label>
									<input type="text" onkeyup="mayus(this);" name="nombre_curso2" id="nombre_curso2" value="<?php $echo = $cliente_cursos_cortos[1][0] != NULL ? $cliente_cursos_cortos[1][0] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
								</div>
								<br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto" for="entidad_curso2"> Entidad: </label>
									<input type="text" onkeyup="mayus(this);" name="entidad_curso2" id="entidad_curso2" value="<?php $echo = $cliente_cursos_cortos[1][2] != NULL ? $cliente_cursos_cortos[1][2] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
								</div>

								<br>
								<div class="d-flex">
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="duracion_curso2"> Duración del curso: </label>
										<input type="text" onkeyup="mayus(this);" name="duracion_curso2" id="duracion_curso2" value="<?php $echo = $cliente_cursos_cortos[1][1] != NULL ? $cliente_cursos_cortos[1][1] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA DURACIÓN DEL CURSO">
									</div>&nbsp;
									<hr>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="tiempo_curso2"> Año del curso: </label>
										<input type="text" onkeyup="mayus(this);" maxlength="4" name="tiempo_curso2" id="tiempo_curso2" value="<?php $echo = $cliente_cursos_cortos[1][3] != NULL ? $cliente_cursos_cortos[1][3] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
									</div>&nbsp;
									<hr>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="certificado_curso2"> Titulo certificado: </label>
										<select class="form-select" name="certificado_curso2" id="certificado_curso2">
											<option value="0" <?php $echo = $cliente_cursos_cortos[1][4] == '0' ? 'selected' : ''; echo $echo;?>>SELECCIONA</option>
											<option value="1" <?php $echo = $cliente_cursos_cortos[1][4] == '1' ? 'selected' : ''; echo $echo;?>>NO</option>
											<option value="2" <?php $echo = $cliente_cursos_cortos[1][4] == '2' ? 'selected' : ''; echo $echo;?>>SI</option>
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
									<input type="hidden" id="id_curso3" name="id_curso3" value="<?php $echo = $cliente_cursos_cortos[2][5] != NULL ? $cliente_cursos_cortos[2][5] : ''; echo $echo;?>">
									<label class="input-group-text w-auto" for="nombre_curso3"> Nombre del curso: </label>
									<input type="text" onkeyup="mayus(this);" name="nombre_curso3" id="nombre_curso3" value="<?php $echo = $cliente_cursos_cortos[2][0] != NULL ? $cliente_cursos_cortos[2][0] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
								</div>
								<br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto" for="entidad_curso3"> Entidad: </label>
									<input type="text" onkeyup="mayus(this);" name="entidad_curso3" id="entidad_curso3" value="<?php $echo = $cliente_cursos_cortos[2][2] != NULL ? $cliente_cursos_cortos[2][2] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
								</div>
								<br>
								<div class="d-flex">
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="duracion_curso3"> Duración del curso: </label>
										<input type="text" onkeyup="mayus(this);" name="duracion_curso3" id="duracion_curso3" value="<?php $echo = $cliente_cursos_cortos[2][1] != NULL ? $cliente_cursos_cortos[2][1] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA DURACION DEL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="tiempo_curso3"> Año del curso: </label>
										<input type="text" onkeyup="mayus(this);" maxlength="4" name="tiempo_curso3" id="tiempo_curso3" value="<?php $echo = $cliente_cursos_cortos[2][3] != NULL ? $cliente_cursos_cortos[2][3] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="certificado_curso3"> Titulo certificado: </label>
										<select class="form-select" name="certificado_curso3" id="certificado_curso3">
											<option value="0" <?php $echo = $cliente_cursos_cortos[2][4] == '0' ? 'selected' : ''; echo $echo;?>>SELECCIONA</option>
											<option value="1" <?php $echo = $cliente_cursos_cortos[2][4] == '1' ? 'selected' : ''; echo $echo;?>>NO</option>
											<option value="2" <?php $echo = $cliente_cursos_cortos[2][4] == '2' ? 'selected' : ''; echo $echo;?>>SI</option>
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
									<input type="hidden" id="id_curso4" name="id_curso4" value="<?php $echo = $cliente_cursos_cortos[3][5] != NULL ? $cliente_cursos_cortos[3][5] : ''; echo $echo;?>">
									<label class="input-group-text w-auto" for="nombre_curso4"> Nombre del curso: </label>
									<input type="text" onkeyup="mayus(this);" name="nombre_curso4" id="nombre_curso4" value="<?php $echo = $cliente_cursos_cortos[3][0] != NULL ? $cliente_cursos_cortos[3][0] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
								</div>
								<br>
								<div class="input-group shadow-sm">
									<label class="input-group-text w-auto" for="entidad_curso4"> Entidad: </label>
									<input type="text" onkeyup="mayus(this);" name="entidad_curso4" id="entidad_curso4" value="<?php $echo = $cliente_cursos_cortos[3][2] != NULL ? $cliente_cursos_cortos[3][2] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
								</div>
								<br>
								<div class="d-flex">
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="duracion_curso4"> Duración del curso: </label>
										<input type="text" onkeyup="mayus(this);" name="duracion_curso4" id="duracion_curso4" value="<?php $echo = $cliente_cursos_cortos[3][1] != NULL ? $cliente_cursos_cortos[3][1] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA DURACION DEL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="tiempo_curso4"> Año del curso: </label>
										<input type="text" onkeyup="mayus(this);" maxlength="4" name="tiempo_curso4" id="tiempo_curso4" value="<?php $echo = $cliente_cursos_cortos[3][3] != NULL ? $cliente_cursos_cortos[3][3] : ''; echo $echo;?>" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
									</div>&nbsp;
									<br>
									<div class="input-group shadow-sm">
										<label class="input-group-text w-auto" for="certificado_curso4"> Titulo certificado: </label>
										<select class="form-select" name="certificado_curso4" id="certificado_curso4">
											<option value="0" <?php $echo = $cliente_cursos_cortos[3][4] == '0' ? 'selected' : ''; echo $echo;?>>SELECCIONA</option>
											<option value="1" <?php $echo = $cliente_cursos_cortos[3][4] == '1' ? 'selected' : ''; echo $echo;?>>NO</option>
											<option value="2" <?php $echo = $cliente_cursos_cortos[3][4] == '2' ? 'selected' : ''; echo $echo;?>>SI</option>
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
				<?php
				$consultaVehiculo = mysqli_query($conn, "SELECT vehiculo, ven_soat, ven_tecnomecanica FROM cliente_vehiculo WHERE id_empleado='$id'") or die (mysqli_error($conn));
				$rowVehiculo = mysqli_fetch_assoc($consultaVehiculo);
				?>
				<center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_vehiculo" role="button" aria-expanded="false" aria-controls="ref_vehiculo">
						<i class="bi bi-arrow-down"></i> VEHÍCULO
					</a></center>
				<div class="collapse show" id="ref_vehiculo">
					<div class="card card-body">
						<h5>Datos del vehículo:</h5>
						<div class="input-group shadow-sm">
							<label class="input-group-text w-25" for="vehiculo">(*) Vehículo: </label>
							<select class="form-select" name="vehiculo" id="vehiculo">
								<option value="NINGUNO" <?php $echo = $rowVehiculo['vehiculo'] == 'NINGUNO' ? 'selected' : ''; echo $echo;?>>NINGUNO</option>
								<option value="MOTO" <?php $echo = $rowVehiculo['vehiculo'] == 'MOTO' ? 'selected' : ''; echo $echo;?>>MOTO</option>
								<option value="CARRO" <?php $echo = $rowVehiculo['vehiculo'] == 'CARRO' ? 'selected' : ''; echo $echo;?>>CARRO</option>
							</select>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="ven_soat">Vencimiento del soat: </span>
								<input type="date" name="ven_soat" id="ven_soat" class="form-control" value="<?php $echo = $rowVehiculo['ven_soat'] != NULL ? $rowVehiculo['ven_soat'] : ''; echo $echo;?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="ven_tecnomecanica">Vencimiento de la tecno-mecánica: </span>
								<input type="date" name="ven_tecnomecanica" id="ven_tecnomecanica" class="form-control" value="<?php $echo = $rowVehiculo['ven_tecnomecanica'] != NULL ? $rowVehiculo['ven_tecnomecanica'] : ''; echo $echo;?>">
							</div>
						</div>
						<center>
							<hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_vehiculo" role="button" aria-expanded="true" aria-controls="ref_vehiculo">
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
					<?php $consultaLaboral = mysqli_query($conn, "SELECT id, empresa, jefe, telefono, cargo, tiempo_exp, motivo FROM cliente_laborales WHERE id_empleado='$id'") or die (mysqli_error($conn));
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
							<input type="hidden" id="id_laboral" name="id_laboral" value="<?php $echo = $cliente_laboral[0][6] != NULL ? $cliente_laboral[0][6] : ''; echo $echo;?>">
							<input name="empresa" onkeyup="mayus(this);" id="empresa" class="form-control" type="text" placeholder="INGRESA LA EMPRESA" value="<?php $echo = $cliente_laboral[0][0] != NULL ? $cliente_laboral[0][0] : ''; echo $echo;?>">
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="jefe">Jefe inmediato: </span>
								<input type="text" onkeyup="mayus(this);" name="jefe" id="jefe" class="form-control" placeholder="INGRESA EL NOMBRE DEL JEFE INMEDIATO" value="<?php $echo = $cliente_laboral[0][1] != NULL ? $cliente_laboral[0][1] : ''; echo $echo;?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="telefonoE">Teléfono de contacto: </span>
								<input type="number" name="telefonoE" id="telefonoE" class="form-control" placeholder="INGRESE EL NUMERO DE TELEFONO DEL CONTACTO" value="<?php $echo = $cliente_laboral[0][2] != NULL ? $cliente_laboral[0][2] : ''; echo $echo;?>">
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="cargoE">Cargo que desempeñó: </label>
								<input type="text" onkeyup="mayus(this);" name="cargoE" id="cargoE" class="form-control" placeholder="CARGO DEL EMPLEADO EN ESA EMPRESA" value="<?php $echo = $cliente_laboral[0][3] != NULL ? $cliente_laboral[0][3] : ''; echo $echo;?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="tiempo_exp">Tiempo de experiencia: </span>
								<input type="number" name="tiempo_exp" id="tiempo_exp" class="form-control" placeholder="INGRESE EL TIEMPO DE EXPERIENCIA EN NUMERO DE MESES" value="<?php $echo = $cliente_laboral[0][4] != NULL ? $cliente_laboral[0][4] : ''; echo $echo;?>">
								<input type="text" class="form-control w-25" readonly value="MESES">
							</div>
						</div>
						<br>
						<div class="input-group shadow-sm">
							<label class="input-group-text w-25" for="motivo">(*) Motivo de retiro: </label>
							<textarea type="text" onkeyup="mayus(this);" name="motivo" id="motivo" class="form-control" placeholder="MOTIVO DEL RETIRO"><?php $echo = $cliente_laboral[0][5] != NULL ? $cliente_laboral[0][5] : ''; echo $echo;?></textarea>
						</div>
						<br>
						<hr>

						<!-- Referencia laboral 2 -->
						<h5>Datos segunda referencia laboral:</h5>
						<div class="input-group shadow-sm">
							<span class="input-group-text w-auto" for="empresa2">(*) Empresa: </span>
							<input type="hidden" id="id_laboral2" name="id_laboral2" value="<?php $echo = $cliente_laboral[1][6] != NULL ? $cliente_laboral[1][6] : ''; echo $echo;?>">
							<input name="empresa2" onkeyup="mayus(this);" id="empresa2" class=" form-control" type="text" placeholder="INGRESA LA EMPRESA" value="<?php $echo = $cliente_laboral[1][0] != NULL ? $cliente_laboral[1][0] : ''; echo $echo;?>">
						</div>
						<hr>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<span class="input-group-text w-25" for="jefe2">Jefe inmediato: </span>
								<input type="text" onkeyup="mayus(this);" name="jefe2" id="jefe2" class="form-control" placeholder="INGRESA EL NOMBRE DEL JEFE INMEDIATO" value="<?php $echo = $cliente_laboral[1][1] != NULL ? $cliente_laboral[1][1] : ''; echo $echo;?>">
							</div>&nbsp;
							<hr>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="telefonoE2">Teléfono del contacto: </span>
								<input type="number" name="telefonoE2" id="telefonoE2" class="form-control" placeholder="INGRESE EL NUMERO DE TELEFONO DEL CONTACTO" value="<?php $echo = $cliente_laboral[1][2] != NULL ? $cliente_laboral[1][2] : ''; echo $echo;?>">
							</div>
						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto" for="cargoE2">Cargo que desempeñó: </label>
								<input type="text" style="text-transform:uppercase;" name="cargoE2" id="cargoE2" class="form-control" placeholder="CARGO DEL EMPLEADO EN ESA EMPRESA" value="<?php $echo = $cliente_laboral[1][3] != NULL ? $cliente_laboral[1][3] : ''; echo $echo;?>">
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<span class="input-group-text w-auto" for="tiempo_exp2">Tiempo de experiencia: </span>
								<input type="number" name="tiempo_exp2" id="tiempo_exp2" class="form-control" placeholder="INGRESE EL TIEMPO DE EXPERIENCIA EN NUMERO DE MESES" value="<?php $echo = $cliente_laboral[1][4] != NULL ? $cliente_laboral[1][4] : ''; echo $echo;?>">
								<input type="text" class="form-control w-25" readonly value="MESES">
							</div>
						</div>
						<br>

						<div class="input-group shadow-sm">
							<label class="input-group-text w-25" for="motivo2">(*) Motivo de retiro: </label>
							<textarea type="text" name="motivo2" id="motivo2" class="form-control" placeholder="MOTIVO DEL RETIRO"><?php $echo = $cliente_laboral[1][5] != NULL ? $cliente_laboral[1][5] : ''; echo $echo;?></textarea>
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
						<?php
						$consultaContacto = mysqli_query($conn, "SELECT id, nombre_contacto, parentesco, contacto_directo, numero FROM cliente_contacto WHERE id_empleado='$id'") or die (mysqli_error($conn));
						$cliente_contacto = array();
						while ($resultadoContacto = mysqli_fetch_assoc($consultaContacto)) {
							$nombre_contacto = $resultadoContacto['nombre_contacto'];
							$parentesco = $parentescos[$resultadoContacto['parentesco']];
							$numero = $resultadoContacto['numero'];
							$parentesco_id = $resultadoContacto['parentesco'];
							$id_contacto = $resultadoContacto['id'];
							$contacto_directo = $resultadoContacto['contacto_directo'];
							array_push($cliente_contacto, ["$nombre_contacto", "$parentesco", "$numero", "$parentesco_id", "$id_contacto", "$contacto_directo"]);
						}
						?>

						<!-- Referencia personal # 1 -->
						<h5>Datos primera referencia personal:</h5>

						<div class="input-group shadow-sm">
							<label class="input-group-text w-auto">(*) Nombres completos del contacto: </label>

							<input type="hidden" id="id_contacto" name="id_contacto" value="<?php $echo = $cliente_contacto[0][4] != NULL ? $cliente_contacto[0][4] : ''; echo $echo; ?>">
							<input type="text" onkeyup="mayus(this);" name="nombre_contacto" id="nombre_contacto" class="form-control" placeholder="INGRESE EL NOMBRE DEL CONTACTO" value="<?php $echo = $cliente_contacto[0][0] != NULL ? $cliente_contacto[0][0] : ''; echo $echo;?>">

						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto">(*) Parentesco: </label>

								<select class="form-select" name="parentesco" id="parentesco">

									<option value="<?php $echo = $cliente_contacto[0][3] != NULL ? $cliente_contacto[0][3] : '1'; echo $echo; ?>"selected><?php $echo = $cliente_contacto[0][1] != NULL ? $cliente_contacto[0][1] : 'SELECCIONA'; echo $echo;?></option>

									<?php
									$query = $conn->query("SELECT * FROM parentesco");
									while ($parentesco = mysqli_fetch_array($query)) {
										echo'<option value="' . $parentesco['id'] . '">' . $parentesco['parentesco'] . '</option>';
									}
									?>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto">(*) Número de celular: </label>
								<input type="number" name="numero" id="numero" class="form-control" placeholder="Ingrese el numero del celular" value="<?php $echo = $cliente_contacto[0][2] != NULL ? $cliente_contacto[0][2] : ''; echo $echo;?>">
							</div>&nbsp;
							<br>
							<label class="input-group-text w-auto"> Es contacto directo: </label>
							<div class="d-flex flex-row">&nbsp;
								<!-- si -->
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="contacto_directo1" id="contacto_directo1" value="1" <?php $echo = $cliente_contacto[0][5] == '1' ? 'checked' : ''; echo $echo;?>>
									<label class="form-check-label">
										SI </label>
								</div>
								<!-- final si -->
								<!-- no -->
								<div class="form-check form-check-inline">
									<label class="form-check-label ">
										NO </label>
									<input class="form-check-input" type="radio" name="contacto_directo1" id="contacto_directo1" value="0" <?php $echo = $cliente_contacto[0][5] == '0' ? 'checked' : ''; echo $echo;?>>
								</div>
								<!-- final no -->
							</div>
						</div>
						<br>
						<hr>

						<!-- Referencia personal 2 -->
						<h5>Datos segunda referencia personal:</h5>
						<div class="input-group shadow-sm">

							<label class="input-group-text w-auto">(*) Nombres completos del contacto: </label>

							<input type="hidden" id="id_contacto2" name="id_contacto2" value="<?php $echo = $cliente_contacto[1][4] != NULL ? $cliente_contacto[1][4] : ''; echo $echo;?>">
							<input type="text" onkeyup="mayus(this);" name="nombre_contacto2" id="nombre_contacto2" class="form-control" placeholder="INGRESE EL NOMBRE DEL CONTACTO" value="<?php $echo = $cliente_contacto[1][0] != NULL ? $cliente_contacto[1][0] : ''; echo $echo;?>">

						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">

								<label class="input-group-text w-auto">(*) Parentesco: </label>

								<select class="form-select" name="parentesco2" id="parentesco2">

								<option value="<?php $echo = $cliente_contacto[1][3] != NULL ? $cliente_contacto[1][3] : '1'; echo $echo; ?>" selected><?php $echo = $cliente_contacto[1][1] != NULL ? $cliente_contacto[1][1] : 'SELECCIONA'; echo $echo;?></option>
									<?php
									$query = $conn->query("SELECT * FROM parentesco");
									while ($parentesco = mysqli_fetch_array($query)) {
										echo '<option value="' . $parentesco['id'] . '">' . $parentesco['parentesco'] . '</option>';
									}
									?>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">

								<label class="input-group-text w-auto">(*) Número de celular: </label>

								<input type="number" name="numero2" id="numero2" class="form-control" placeholder="Ingrese el numero del celular" value="<?php $echo = $cliente_contacto[1][2] != NULL ? $cliente_contacto[1][2] : ''; echo $echo;?>">
							</div>&nbsp;
							<br>
							<label class="input-group-text w-auto"> Es contacto directo: </label>
							<div class="d-flex flex-row">&nbsp;
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="contacto_directo2" id="contacto_directo2" value="1" <?php $echo = $cliente_contacto[1][5] == '1' ? 'checked' : ''; echo $echo;?>>
									<label class="form-check-label">
										SI </label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="contacto_directo2" id="contacto_directo2" value="0" <?php $echo = $cliente_contacto[1][5] == '0' ? 'checked' : ''; echo $echo;?>>
									<label class="form-check-label">
										NO </label>
								</div>
							</div>
						</div>
						<br>
						<hr>

						<!-- Referencia personal 3 -->
						<h5>Datos tercera referencia personal:</h5>
						<div class="input-group shadow-sm">

							<label class="input-group-text w-auto">(*) Nombres completos del contacto: </label>

							<input type="hidden" id="id_contacto3" name="id_contacto3" value="<?php $echo = $cliente_contacto[2][4] != NULL ? $cliente_contacto[2][4] : ''; echo $echo;?>">
							<input type="text" onkeyup="mayus(this);" name="nombre_contacto3" id="nombre_contacto3" class="form-control" placeholder="INGRESE EL NOMBRE DEL CONTACTO" value="<?php $echo = $cliente_contacto[2][0] != NULL ? $cliente_contacto[2][0] : ''; echo $echo;?>">

						</div>
						<br>
						<div class="d-flex">
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto">(*) Parentesco: </label>

								<select class="form-select" name="parentesco3" id="parentesco3">

								<option value="<?php $echo = $cliente_contacto[2][3] != NULL ? $cliente_contacto[2][3] : '1'; echo $echo; ?>"selected><?php $echo = $cliente_contacto[2][1] != NULL ? $cliente_contacto[2][1] : 'SELECCIONA'; echo $echo; ?></option>

									<?php
									$query = $conn->query("SELECT * FROM parentesco");
									while ($parentesco = mysqli_fetch_array($query)) {

										echo '<option value="' . $parentesco['id'] . '">' . $parentesco['parentesco'] . '</option>';
									} ?>
								</select>
							</div>&nbsp;
							<br>
							<div class="input-group shadow-sm">
								<label class="input-group-text w-auto">(*) Número de celular: </label>

								<input type="number" name="numero3" id="numero3" class="form-control" placeholder="Ingrese el numero del celular" value="<?php $echo = $cliente_contacto[2][2] != NULL ? $cliente_contacto[2][2] : ''; echo $echo;?>">

							</div>&nbsp;
							<br>
							<label class="input-group-text w-auto"> Es contacto directo: </label>
							<div class="d-flex flex-row">&nbsp;
								<div class="form-check form-check-inline">
									
									<input class="form-check-input" type="radio" name="contacto_directo3" id="contacto_directo3" value="1" <?php $echo = $cliente_contacto[2][5] == '1' ? 'checked' : ''; echo $echo;?>>
									<label class="form-check-label">
										SI </label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="contacto_directo3" id="contacto_directo3" value="0" <?php $echo = $cliente_contacto[2][5] == '0' ? 'checked' : ''; echo $echo;?>>
									<label class="form-check-label">
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