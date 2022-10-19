<?php
if (isset($_POST['update'])) {
	$id	= intval($_GET['id']);
	$nombres = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
	$primer_apellido = mysqli_real_escape_string($conn, (strip_tags($_POST['primer_apellido'], ENT_QUOTES)));
	$segundo_apellido = mysqli_real_escape_string($conn, (strip_tags($_POST['segundo_apellido'], ENT_QUOTES)));
	$cedula = mysqli_real_escape_string($conn, (strip_tags($_POST['cedula'], ENT_QUOTES)));
	$exp_ced = mysqli_real_escape_string($conn, (strip_tags($_POST['exp_ced'], ENT_QUOTES)));
	$fecha_expedicion = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_expedicion'], ENT_QUOTES)));
	$fecha_nacimiento = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_nacimiento'], ENT_QUOTES)));
	// No aplica; $edad	= mysqli_real_escape_string($conn, (strip_tags($_POST['edad'], ENT_QUOTES)));
	$civil = mysqli_real_escape_string($conn, (strip_tags($_POST['civil'], ENT_QUOTES)));
	$genero = mysqli_real_escape_string($conn, (strip_tags($_POST['genero'], ENT_QUOTES)));
	$raza = mysqli_real_escape_string($conn, (strip_tags($_POST['raza'], ENT_QUOTES)));
	$rh = mysqli_real_escape_string($conn, (strip_tags($_POST['rh'], ENT_QUOTES)));
	$hijos = mysqli_real_escape_string($conn, (strip_tags($_POST['hijos'], ENT_QUOTES)));
	$acargo = mysqli_real_escape_string($conn, (strip_tags($_POST['acargo'], ENT_QUOTES)));
	$telefono = mysqli_real_escape_string($conn, (strip_tags($_POST['telefono'], ENT_QUOTES)));
	$email = mysqli_real_escape_string($conn, (strip_tags($_POST['email'], ENT_QUOTES)));
	$direccion = mysqli_real_escape_string($conn, (strip_tags($_POST['direccion'], ENT_QUOTES)));
	$estrato = mysqli_real_escape_string($conn, (strip_tags($_POST['estrato'], ENT_QUOTES)));
	$tip_vivi = mysqli_real_escape_string($conn, (strip_tags($_POST['tip_vivi'], ENT_QUOTES)));
	$nucleo = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
	$cargo = mysqli_real_escape_string($conn, (strip_tags($_POST['cargo'], ENT_QUOTES)));
	$proceso = mysqli_real_escape_string($conn, (strip_tags($_POST['proceso'], ENT_QUOTES)));
	$estado = mysqli_real_escape_string($conn, (strip_tags($_POST['estado'], ENT_QUOTES)));
	$fecha_ingreso = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_ingreso'], ENT_QUOTES)));
	$fecha_salida = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_salida'], ENT_QUOTES)));

	//referencia de tallas para dotacion
	$camisa = mysqli_real_escape_string($conn, (strip_tags(strtoupper($_POST['camisa']), ENT_QUOTES)));
	$pantalon = mysqli_real_escape_string($conn, (strip_tags($_POST['pantalon'], ENT_QUOTES)));
	$botas = mysqli_real_escape_string($conn, (strip_tags($_POST['botas'], ENT_QUOTES)));
	$guayo = mysqli_real_escape_string($conn, (strip_tags($_POST['guayo'], ENT_QUOTES)));

	//referencia de seguridad
	$eps  = mysqli_real_escape_string($conn, (strip_tags($_POST['eps'], ENT_QUOTES)));
	$pensiones  = mysqli_real_escape_string($conn, (strip_tags($_POST['pensiones'], ENT_QUOTES)));
	$caja = mysqli_real_escape_string($conn, (strip_tags($_POST['caja'], ENT_QUOTES)));
	$serv_funerario  = mysqli_real_escape_string($conn, (strip_tags($_POST['serv_funerario'], ENT_QUOTES)));
	$enfermedad = mysqli_real_escape_string($conn, (strip_tags($_POST['enfermedad'], ENT_QUOTES)));

	//referencia academica
	$curso  = mysqli_real_escape_string($conn, (strip_tags($_POST['curso'], ENT_QUOTES)));
	$completado = mysqli_real_escape_string($conn, (strip_tags($_POST['completado'], ENT_QUOTES)));
	$semestre = mysqli_real_escape_string($conn, (strip_tags($_POST['semestre'], ENT_QUOTES)));
	$titulo = mysqli_real_escape_string($conn, (strip_tags($_POST['titulo'], ENT_QUOTES)));

	//referencias de cursos cortos
	$id_curso1 = mysqli_real_escape_string($conn, (strip_tags($_POST['id_curso1'], ENT_QUOTES)));
	$nombre_curso1 = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_curso1'], ENT_QUOTES)));
	$duracion_curso1 = mysqli_real_escape_string($conn, (strip_tags($_POST['duracion_curso1'], ENT_QUOTES)));
	$entidad_curso1 = mysqli_real_escape_string($conn, (strip_tags($_POST['entidad_curso1'], ENT_QUOTES)));
	$tiempo_curso1 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempo_curso1'], ENT_QUOTES)));
	$certificado_curso1 = mysqli_real_escape_string($conn, (strip_tags($_POST['certificado_curso1'], ENT_QUOTES)));

	$id_curso2 = mysqli_real_escape_string($conn, (strip_tags($_POST['id_curso2'], ENT_QUOTES)));
	$nombre_curso2 = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_curso2'], ENT_QUOTES)));
	$duracion_curso2 = mysqli_real_escape_string($conn, (strip_tags($_POST['duracion_curso2'], ENT_QUOTES)));
	$entidad_curso2 = mysqli_real_escape_string($conn, (strip_tags($_POST['entidad_curso2'], ENT_QUOTES)));
	$tiempo_curso2 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempo_curso2'], ENT_QUOTES)));
	$certificado_curso2 = mysqli_real_escape_string($conn, (strip_tags($_POST['certificado_curso2'], ENT_QUOTES)));

	$id_curso3 = mysqli_real_escape_string($conn, (strip_tags($_POST['id_curso3'], ENT_QUOTES)));
	$nombre_curso3 = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_curso3'], ENT_QUOTES)));
	$duracion_curso3 = mysqli_real_escape_string($conn, (strip_tags($_POST['duracion_curso3'], ENT_QUOTES)));
	$entidad_curso3 = mysqli_real_escape_string($conn, (strip_tags($_POST['entidad_curso3'], ENT_QUOTES)));
	$tiempo_curso3 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempo_curso3'], ENT_QUOTES)));
	$certificado_curso3 = mysqli_real_escape_string($conn, (strip_tags($_POST['certificado_curso3'], ENT_QUOTES)));

	$id_curso4 = mysqli_real_escape_string($conn, (strip_tags($_POST['id_curso4'], ENT_QUOTES)));
	$nombre_curso4 = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_curso4'], ENT_QUOTES)));
	$duracion_curso4 = mysqli_real_escape_string($conn, (strip_tags($_POST['duracion_curso4'], ENT_QUOTES)));
	$entidad_curso4 = mysqli_real_escape_string($conn, (strip_tags($_POST['entidad_curso4'], ENT_QUOTES)));
	$tiempo_curso4 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempo_curso4'], ENT_QUOTES)));
	$certificado_curso4 = mysqli_real_escape_string($conn, (strip_tags($_POST['certificado_curso4'], ENT_QUOTES)));

	//referencia vehicular
	$vehiculo = mysqli_real_escape_string($conn, (strip_tags($_POST['vehiculo'], ENT_QUOTES)));
	$ven_soat = mysqli_real_escape_string($conn, (strip_tags($_POST['ven_soat'], ENT_QUOTES)));
	$ven_tecnomecanica = mysqli_real_escape_string($conn, (strip_tags($_POST['ven_tecnomecanica'], ENT_QUOTES)));

	//referencia laboral
	$id_laboral  = mysqli_real_escape_string($conn, (strip_tags($_POST['id_laboral'], ENT_QUOTES)));
	$empresa  = mysqli_real_escape_string($conn, (strip_tags($_POST['empresa'], ENT_QUOTES)));
	$jefe  = mysqli_real_escape_string($conn, (strip_tags($_POST['jefe'], ENT_QUOTES)));
	$telefonoE = mysqli_real_escape_string($conn, (strip_tags($_POST['telefonoE'], ENT_QUOTES)));
	$cargoE  = mysqli_real_escape_string($conn, (strip_tags($_POST['cargoE'], ENT_QUOTES)));
	$tiempo_exp  = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempo_exp'], ENT_QUOTES)));
	$motivo = mysqli_real_escape_string($conn, (strip_tags($_POST['motivo'], ENT_QUOTES)));
	
	$id_laboral2  = mysqli_real_escape_string($conn, (strip_tags($_POST['id_laboral2'], ENT_QUOTES)));
	$empresa2  = mysqli_real_escape_string($conn, (strip_tags($_POST['empresa2'], ENT_QUOTES)));
	$jefe2  = mysqli_real_escape_string($conn, (strip_tags($_POST['jefe2'], ENT_QUOTES)));
	$telefonoE2 = mysqli_real_escape_string($conn, (strip_tags($_POST['telefonoE2'], ENT_QUOTES)));
	$cargoE2  = mysqli_real_escape_string($conn, (strip_tags($_POST['cargoE2'], ENT_QUOTES)));
	$tiempo_exp2  = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempo_exp2'], ENT_QUOTES)));
	$motivo2 = mysqli_real_escape_string($conn, (strip_tags($_POST['motivo2'], ENT_QUOTES)));

	//referencia personal
	$id_contacto  = mysqli_real_escape_string($conn, (strip_tags($_POST['id_contacto'], ENT_QUOTES)));
	$nombreContacto  = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_contacto'], ENT_QUOTES)));
	$parentesco  = mysqli_real_escape_string($conn, (strip_tags($_POST['parentesco'], ENT_QUOTES)));
	$numero = mysqli_real_escape_string($conn, (strip_tags($_POST['numero'], ENT_QUOTES)));
	$contactoDirecto1 = mysqli_real_escape_string($conn, (strip_tags($_POST['contacto_directo1'], ENT_QUOTES)));

	$id_contacto2  = mysqli_real_escape_string($conn, (strip_tags($_POST['id_contacto2'], ENT_QUOTES)));
	$nombreContacto2  = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_contacto2'], ENT_QUOTES)));
	$parentesco2  = mysqli_real_escape_string($conn, (strip_tags($_POST['parentesco2'], ENT_QUOTES)));
	$numero2 = mysqli_real_escape_string($conn, (strip_tags($_POST['numero2'], ENT_QUOTES)));
	$contactoDirecto2 = mysqli_real_escape_string($conn, (strip_tags($_POST['contacto_directo2'], ENT_QUOTES)));

	$id_contacto3  = mysqli_real_escape_string($conn, (strip_tags($_POST['id_contacto3'], ENT_QUOTES)));
	$nombreContacto3  = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_contacto3'], ENT_QUOTES)));
	$parentesco3  = mysqli_real_escape_string($conn, (strip_tags($_POST['parentesco3'], ENT_QUOTES)));
	$numero3 = mysqli_real_escape_string($conn, (strip_tags($_POST['numero3'], ENT_QUOTES)));
	$contactoDirecto3 = mysqli_real_escape_string($conn, (strip_tags($_POST['contacto_directo3'], ENT_QUOTES)));


	// Datos cliente
	$consultDatos = mysqli_query($conn, "SELECT * FROM clientes WHERE id='$id'") or die(mysqli_error($conn));
	$rDE = mysqli_fetch_assoc($consultDatos);
	if ($cedula != $rDE['cedula'] || $nombres != $rDE['nombres'] || $primer_apellido != $rDE['primer_apellido'] || $segundo_apellido != $rDE['segundo_apellido'] || $exp_ced != $rDE['exp_ced'] || $fecha_expedicion != $rDE['feha_expedicion'] || $fecha_nacimiento != $rDE['fecha_nacimiento'] || $civil != $rDE['civil'] || $genero != $rDE['genero'] || $raza != $rDE['raza'] || $rh != $rDE['rh'] || $hijos != $rDE['hijos'] || $acargo != $rDE['acargo'] || $telefono != $rDE['telefono'] || $email != $rDE['email'] || $direccion != $rDE['direccion'] || $estrato != $rDE['estrato'] || $tip_vivi != $rDE['tip_vivi'] || $nucleo != $rDE['nucleo'] || $cargo != $rDE['cargo'] || $proceso != $rDE['proceso'] || $estado != $rDE['estado'] || $fecha_ingreso != $rDE['fecha_ingreso'] || $fecha_salida != $rDE['fecha_salida']) {
		$updateCliente = mysqli_query($conn, "UPDATE clientes SET  cedula='$cedula', nombres='$nombres', primer_apellido='$primer_apellido', segundo_apellido='$segundo_apellido', exp_ced='$exp_ced', fecha_expedicion='$fecha_expedicion', fecha_nacimiento='$fecha_nacimiento', civil='$civil', genero='$genero', raza='$raza', rh='$rh', hijos='$hijos', acargo='$acargo', telefono='$telefono', email='$email', direccion='$direccion', estrato='$estrato', tip_vivi='$tip_vivi', nucleo='$nucleo', cargo='$cargo', proceso='$proceso', estado='$estado', fecha_ingreso='$fecha_ingreso', fecha_salida='$fecha_salida' WHERE id='$id'") or die(mysqli_error($conn));
	}
	
	//referencia de tallas para dotacion
	$consultaTallas = mysqli_query($conn, "SELECT camisa, pantalon, botas, guayo FROM cliente_tallas WHERE id_empleado='$id'") or die(mysqli_error($conn));
	if (mysqli_num_rows($consultaTallas) <= 0) {
		if ($camisa != '' || $pantalon != '' || $botas != '' || $guayo != '') {
			$insertTallas = mysqli_query($conn, "INSERT INTO cliente_tallas(id, id_empleado, camisa, pantalon, botas, guayo)
                            VALUES (NULL, '$id', '$camisa', '$pantalon', '$botas', '$guayo')") or die(mysqli_error($conn));
		}
	} else {
		$rT = mysqli_fetch_assoc($consultaTallas);
		if ($camisa != $rT['camisa'] || $pantalon != $rT['pantalon'] || $botas != $rT['botas'] || $guayo != $rT['guayo']) {
			$updateTallas = mysqli_query($conn, "UPDATE cliente_tallas SET camisa='$camisa', pantalon='$pantalon', botas='$botas', guayo='$guayo' WHERE id_empleado='$id'") or die(mysqli_error($conn));
		}
	}
	
	// Datos de seguridad social
	$consultSeguridad = mysqli_query($conn, "SELECT eps, pensiones, caja, serv_funerario, enfermedad FROM clientes WHERE id='$id'") or die (mysqli_error($conn));
	$rS = mysqli_fetch_assoc($consultSeguridad);
	if ($eps != $rS['eps'] || $pensiones != $rS['pensiones'] || $caja != $rS['caja'] || $serv_funerario != $rS['serv_funerario'] || $enfermedad != $rS['enfermedad']) {
		$updateSeguridad = mysqli_query($conn, "UPDATE clientes SET eps='$eps', pensiones='$pensiones', caja='$caja', serv_funerario='$serv_funerario', enfermedad='$enfermedad' WHERE id='$id'") or die (mysqli_error($conn));
	}
	
	//referencia academica
	$consultaAcademico = mysqli_query($conn, "SELECT curso, completado, semestre, titulo FROM cliente_academico WHERE id_cliente='$id'") or die(mysqli_error($conn));
	$rA = mysqli_fetch_assoc($consultaAcademico);
	if ($curso != $rA['curso'] || $completado != $rA['completado'] || $semestre != $rA['semestre'] || $titulo != $rA['titulo']) {
		$update_cliente_academico = mysqli_query($conn, "UPDATE cliente_academico SET curso='$curso', completado='$completado', semestre='$semestre', titulo='$titulo' WHERE id_cliente='$id'") or die(mysqli_error($conn));
	}
	
	//Cursos cortos del empleado

	// Curso #1
	if ($id_curso1 == '') {
		if ($nombre_curso1 != '' || $duracion_curso1 != '' || $entidad_curso1 != '' || $tiempo_curso1 != '' || $certificado_curso1 != '') {
			$insert_curso1 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso1', '$duracion_curso1', '$entidad_curso1', '$tiempo_curso1','$certificado_curso1')") or die(mysqli_error($conn));
		}
	} else {
		$consultaCurso1 = mysqli_query($conn, "SELECT * FROM cliente_cursos WHERE id='$id_curso1' AND id_cliente='$id'") or die(mysqli_error($conn));
		$rC1 = mysqli_fetch_assoc($consultaCurso1);
		if ($nombre_curso1 != $rC1['nombre_curso'] || $duracion_curso1 != $rC1['duracion'] || $entidad_curso1 != $rC1['entidad'] || $tiempo_curso1 != $rC1['tiempo'] || $certificado_curso1 != $rC1['certificado']) {
			$update_curso1 = mysqli_query($conn, "UPDATE cliente_cursos SET nombre_curso='$nombre_curso1', duracion='$duracion_curso1', entidad='$entidad_curso1', tiempo='$tiempo_curso1', certificado='$certificado_curso1' WHERE id='$id_curso1' AND id_cliente='$id'") or die(mysqli_error($conn));
		}
	}
	// Curso #2
	if ($id_curso2 == '') {
		if ($nombre_curso2 != '' || $duracion_curso2 != '' || $entidad_curso2 != '' || $tiempo_curso2 != '' || $certificado_curso2 != '') {
			$insert_curso2 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso2', '$duracion_curso2', '$entidad_curso2', '$tiempo_curso2','$certificado_curso2')") or die(mysqli_error($conn));
		}
	} else {
		$consultaCurso2 = mysqli_query($conn, "SELECT nombre_curso, duracion, entidad, tiempo, certificado FROM cliente_cursos WHERE id_cliente='$id' AND id='$id_curso2'") or die(mysqli_error($conn));
		$rC2 = mysqli_fetch_assoc($consultaCurso2);
		if ($nombre_curso2 != $rC2['nombre_curso'] || $duracion_curso2 != $rC2['duracion'] || $entidad_curso2 != $rC2['entidad'] || $tiempo_curso2 != $rC2['tiempo'] || $certificado_curso2 != $rC2['certificado']) {
			$update_curso2 = mysqli_query($conn, "UPDATE cliente_cursos SET nombre_curso='$nombre_curso2', duracion='$duracion_curso2', entidad='$entidad_curso2', tiempo='$tiempo_curso2', certificado='$certificado_curso2' WHERE id='$id_curso2' and id_cliente='$id'") or die(mysqli_error($conn));
		}
	}
	// Curso #3
	if ($id_curso3 == '') {
		if ($nombre_curso3 != '' || $duracion_curso3 != '' || $entidad_curso3 != '' || $tiempo_curso3 != '' || $certificado_curso3 != '') {
			$insert_curso3 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso3', '$duracion_curso3', '$entidad_curso3', '$tiempo_curso3','$certificado_curso3')") or die(mysqli_error($conn));
		}
	} else {
		$consultaCurso3 = mysqli_query($conn, "SELECT nombre_curso, duracion, entidad, tiempo, certificado FROM cliente_cursos WHERE id_cliente='$id' AND id='$id_curso3'") or die(mysqli_error($conn));
		$rC3 = mysqli_fetch_assoc($consultaCurso3);
		if ($nombre_curso3 != $rC3['nombre_curso'] || $duracion_curso3 != $rC3['duracion'] || $entidad_curso3 != $rC3['entidad'] || $tiempo_curso3 != $rC3['tiempo'] || $certificado_curso3 != $rC3['certificado']) {
			$update_curso3 = mysqli_query($conn, "UPDATE cliente_cursos SET nombre_curso='$nombre_curso3', duracion='$duracion_curso3', entidad='$entidad_curso3', tiempo='$tiempo_curso3', certificado='$certificado_curso3' WHERE id='$id_curso3' and id_cliente='$id'") or die(mysqli_error($conn));
		}
	}
	// Curso $4
	if ($id_curso4 == '') {
		if ($nombre_curso4 != '' || $duracion_curso4 != '' || $entidad_curso4 != '' || $tiempo_curso4 != '' || $certificado_curso4 != '') {
			$insert_curso4 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso4', '$duracion_curso4', '$entidad_curso4', '$tiempo_curso4','$certificado_curso4')") or die(mysqli_error($conn));
		}
	} else {
		$consultaCurso4 = mysqli_query($conn, "SELECT nombre_curso, duracion, entidad, tiempo, certificado FROM cliente_cursos WHERE id_cliente='$id' AND id='$id_curso4'") or die(mysqli_error($conn));
		$rC4 = mysqli_fetch_assoc($consultaCurso4);
		if ($nombre_curso4 != $rC4['nombre_curso'] || $duracion_curso4 != $rC4['duracion'] || $entidad_curso4 != $rC4['entidad'] || $tiempo_curso4 != $rC4['tiempo'] || $certificado_curso4 != $rC4['certificado']) {
			$update_curso4 = mysqli_query($conn, "UPDATE cliente_cursos SET nombre_curso='$nombre_curso4', duracion='$duracion_curso4', entidad='$entidad_curso4', tiempo='$tiempo_curso4', certificado='$certificado_curso4' WHERE id='$id_curso4' and id_cliente='$id'") or die(mysqli_error($conn));
		}
	}
	// Datos del vehiculo del empleado

	//Se removieron dos lineas de Vensoat y ventecnomecanica, generaban error en local y en las bases de datos, ahora el valor por defaul se genera en la base de datos.
	$consultaVehiculo = mysqli_query($conn, "SELECT vehiculo, ven_soat, ven_tecnomecanica FROM cliente_vehiculo WHERE id_empleado='$id'") or die (mysqli_error($conn));
	if (mysqli_num_rows($consultaVehiculo) <= 0) {
		if ($vehiculo != '' || $ven_soat != '' || $ven_tecnomecanica != '') {
			$insertVehiculo = mysqli_query($conn, "INSERT INTO cliente_vehiculo (id, id_empleado, vehiculo, ven_soat, ven_tecnomecanica)VALUES(NULL,'$id','$vehiculo','$ven_soat','$ven_tecnomecanica')") or die(mysqli_error($conn));
		}
	} else {
		$rV = mysqli_fetch_assoc($consultaVehiculo);
		if ($vehiculo != $rV['vehiculo'] || $ven_soat != $rV['ven_soat'] || $ven_tecnomecanica != $rV['ven_tecnomecanica']) {
			$updateVehiculo = mysqli_query($conn, "UPDATE cliente_vehiculo SET vehiculo='$vehiculo', ven_soat='$ven_soat', ven_tecnomecanica='$ven_tecnomecanica' WHERE id_empleado='$id'") or die(mysqli_error($conn));
		}
	}

	// Referencias laborales que tiene el empleado
	
	// Referencia Laboral #1
	if ($id_laboral == '') {
		if ($empresa != '' || $jefe != '' || $telefonoE != '' || $cargoE != '' || $tiempo_exp != '' || $motivo != '') {
			$insertLaborales = mysqli_query($conn, "INSERT INTO cliente_laborales(id, id_empleado, empresa, jefe, telefono, cargo, tiempo_exp, motivo)VALUES(NULL,'$id','$empresa','$jefe','$telefonoE','$cargoE','$tiempo_exp','$motivo')") or die(mysqli_error($conn));
		}
	} else {
		$consultaLaboral1 = mysqli_query($conn, "SELECT empresa, jefe, telefono, cargo, tiempo_exp, motivo FROM cliente_laborales WHERE id='$id_laboral' AND id_empleado='$id'") or die(mysqli_error($conn));
		$rCL1 = mysqli_fetch_assoc($consultaLaboral1);
		if ($empresa != $rCL1['empresa'] || $jefe != $rCL1['jefe'] || $telefonoE != $rCL1['telefono'] || $cargoE != $rCL1['cargo'] || $tiempo_exp != $rCL1['tiempo_exp'] || $motivo != $rCL1['motivo']) {
			$updateLaborales1 = mysqli_query($conn, "UPDATE cliente_laborales SET empresa='$empresa', jefe='$jefe', telefono='$telefonoE', cargo='$cargoE', tiempo_exp='$tiempo_exp', motivo='$motivo' WHERE id='$id_laboral' AND id_empleado='$id'") or die(mysqli_error($conn));
		}
	}
	// Referencia Laboral #2
	if ($id_laboral2 == '') {
		if ($empresa2 != '' || $jefe2 != '' || $telefonoE2 != '' || $cargoE2 != '' || $tiempo_exp2 != '' || $motivo2 != '') {
			$insertLaborales2 = mysqli_query($conn, "INSERT INTO cliente_laborales(id, id_empleado, empresa, jefe, telefono, cargo, tiempo_exp, motivo)VALUES(NULL,'$id','$empresa2','$jefe2','$telefonoE2','$cargoE2','$tiempo_exp2','$motivo2')") or die(mysqli_error($conn));
		}
	} else {
		$consultaLaboral2 = mysqli_query($conn, "SELECT empresa, jefe, telefono, cargo, tiempo_exp, motivo FROM cliente_laborales WHERE id='$id_laboral2' AND id_empleado='$id'") or die(mysqli_error($conn));
		$rCL2 = mysqli_fetch_assoc($consultaLaboral2);
		if ($empresa2 != $rCL2['empresa'] || $jefe2 != $rCL2['jefe'] || $telefonoE2 != $rCL2['telefono'] || $cargoE2 != $rCL2['cargo'] || $tiempo_exp2 != $rCL2['tiempo_exp'] || $motivo2 != $rCL2['motivo']) {
			$updateLaborales2 = mysqli_query($conn, "UPDATE cliente_laborales SET empresa='$empresa2', jefe='$jefe2', telefono='$telefonoE2', cargo='$cargoE2', tiempo_exp='$tiempo_exp2', motivo='$motivo2' WHERE id='$id_laboral2' AND id_empleado='$id'") or die(mysqli_error($conn));
		}
	}
	
	//referencia personal
	// Contacto 1
	if ($id_contacto == '') {
		if ($nombreContacto != '' || $parentesco != '' || $numero != '') {
			$iRP = mysqli_query($conn, "INSERT INTO cliente_contacto (id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)VALUES(NULL, '$id', '$nombreContacto', '$parentesco', '$contactoDirecto1', '$numero')") or die (mysqli_error($conn));
		}
	} else {
		$consultContacto1 = mysqli_query($conn, "SELECT nombre_contacto, parentesco, contacto_directo, numero FROM cliente_contacto WHERE id=$id_contacto AND id_empleado=$id") or die (mysqli_error($conn));
		$rCE1 = mysqli_fetch_assoc($consultContacto1);
		if ($nombreContacto != $rCE1['nombre_contacto'] || $parentesco != $rCE1['parentesco'] || $contactoDirecto1 != $rCE1['contacto_directo'] || $numero != $rCE1['numero']) {
			$uRP = mysqli_query($conn, "UPDATE `cliente_contacto` SET `nombre_contacto`='$nombreContacto',`parentesco`='$parentesco',`contacto_directo`='$contactoDirecto1',`numero`='$numero' WHERE id=$id_contacto AND id_empleado='$id'") or die (mysqli_error($conn));
		}
	}

	// Contacto 2
	if ($id_contacto2 == '') {
		if ($nombreContacto2 != '' || $parentesco2 != '' || $numero2 != '') {
			$iRP2 = mysqli_query($conn, "INSERT INTO cliente_contacto (id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)VALUES(NULL, '$id', '$nombreContacto2', '$parentesco2', '$contactoDirecto2', '$numero2')") or die (mysqli_error($conn));
		}
	} else {
		$consultContacto2 = mysqli_query($conn, "SELECT nombre_contacto, parentesco, contacto_directo, numero FROM cliente_contacto WHERE id=$id_contacto2 AND id_empleado='$id'") or die (mysqli_error($conn));
		$rCE2 = mysqli_fetch_assoc($consultContacto2);
		if ($nombreContacto2 != $rCE2['nombre_contacto'] || $parentesco2 != $rCE2['parentesco'] || $contactoDirecto2 != $rCE2['contacto_directo'] || $numero2 != $rCE2['numero']) {
			$uRP2 = mysqli_query($conn, "UPDATE `cliente_contacto` SET `nombre_contacto`='$nombreContacto2',`parentesco`='$parentesco2',`contacto_directo`='$contactoDirecto2',`numero`='$numero2' WHERE id=$id_contacto2 AND id_empleado='$id'") or die (mysqli_error($conn));
		}
	}
	
	//Contacto 3
	if ($id_contacto3 == '') {
		if ($nombreContacto3 != '' || $parentesco3 != '' || $numero3 != '') {
			$iRP3 = mysqli_query($conn, "INSERT INTO cliente_contacto (id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)VALUES(NULL, '$id', '$nombreContacto3', '$parentesco3', '$contactoDirecto3', '$numero3')") or die (mysqli_error($conn));
		}
	} else {
		$consultContacto3 = mysqli_query($conn, "SELECT nombre_contacto, parentesco, contacto_directo, numero FROM cliente_contacto WHERE id=$id_contacto3 AND id_empleado='$id'") or die (mysqli_error($conn));
		$rCE3 = mysqli_fetch_assoc($consultContacto3);
		if ($nombreContacto3 != $rCE3['nombre_contacto'] || $parentesco3 != $rCE3['parentesco'] || $contactoDirecto3 != $rCE3['contacto_directo'] || $numero3 != $rCE3['numero']) {
			$uRP3 = mysqli_query($conn, "UPDATE `cliente_contacto` SET `nombre_contacto`='$nombreContacto3',`parentesco`='$parentesco3',`contacto_directo`='$contactoDirecto3',`numero`='$numero3' WHERE id=$id_contacto3 AND id_empleado='$id'") or die (mysqli_error($conn));
		}
	}

	if ($updateCliente || $insertTallas || $updateTallas || $updateSeguridad || $update_cliente_academico || $insert_curso1 || $update_curso1 || $insert_curso2 || $update_curso2 || $insert_curso3 || $update_curso3 || $insert_curso4 || $update_curso4 || $insertVehiculo || $updateVehiculo
	|| $insertLaborales || $updateLaborales1 || $insertLaborales2 || $updateLaborales2 || $insertContacto1 || $iRP || $uRP || $iRP2 || $uRP2 || $iRP3 || $uRP3) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><center>Se han actualizado correctamente los datos del empleado</center><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	} else {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><center>No se han podido actualizar los datos del empleado</center><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	}
}