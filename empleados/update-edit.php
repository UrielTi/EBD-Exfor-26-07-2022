<?php
include "../include/conn/conn.php";
if (isset($_POST['update'])) {
	$id			= intval($_POST['id']);
	$nombres	= mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
	$primer_apellido    = mysqli_real_escape_string($conn, (strip_tags($_POST['primer_apellido'], ENT_QUOTES)));
	$segundo_apellido    = mysqli_real_escape_string($conn, (strip_tags($_POST['segundo_apellido'], ENT_QUOTES)));
	$cedula  	= mysqli_real_escape_string($conn, (strip_tags($_POST['cedula'], ENT_QUOTES)));
	$exp_ced  = mysqli_real_escape_string($conn, (strip_tags($_POST['exp_ced'], ENT_QUOTES)));
	$fecha_expedicion  = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_expedicion'], ENT_QUOTES)));
	$fecha_nacimiento  = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_nacimiento'], ENT_QUOTES)));
	// No aplica; $edad	= mysqli_real_escape_string($conn, (strip_tags($_POST['edad'], ENT_QUOTES)));
	$civil  = mysqli_real_escape_string($conn, (strip_tags($_POST['civil'], ENT_QUOTES)));
	$genero  = mysqli_real_escape_string($conn, (strip_tags($_POST['genero'], ENT_QUOTES)));
	$raza  = mysqli_real_escape_string($conn, (strip_tags($_POST['raza'], ENT_QUOTES)));
	$rh  = mysqli_real_escape_string($conn, (strip_tags($_POST['rh'], ENT_QUOTES)));
	$hijos  = mysqli_real_escape_string($conn, (strip_tags($_POST['hijos'], ENT_QUOTES)));
	$acargo  = mysqli_real_escape_string($conn, (strip_tags($_POST['acargo'], ENT_QUOTES)));
	$telefono  = mysqli_real_escape_string($conn, (strip_tags($_POST['telefono'], ENT_QUOTES)));
	$email  = mysqli_real_escape_string($conn, (strip_tags($_POST['email'], ENT_QUOTES)));
	$direccion  = mysqli_real_escape_string($conn, (strip_tags($_POST['direccion'], ENT_QUOTES)));
	$estrato  = mysqli_real_escape_string($conn, (strip_tags($_POST['estrato'], ENT_QUOTES)));
	$tip_vivi  = mysqli_real_escape_string($conn, (strip_tags($_POST['tip_vivi'], ENT_QUOTES)));
	$nucleo  = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
	$cargo 		= mysqli_real_escape_string($conn, (strip_tags($_POST['cargo'], ENT_QUOTES)));
	$proceso  = mysqli_real_escape_string($conn, (strip_tags($_POST['proceso'], ENT_QUOTES)));
	$estado  = mysqli_real_escape_string($conn, (strip_tags($_POST['estado'], ENT_QUOTES)));
	$fecha_ingreso  = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_ingreso'], ENT_QUOTES)));
	$fecha_salida  = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_salida'], ENT_QUOTES)));

	//referencia de tallas para dotacion
	$camisa = mysqli_real_escape_string($conn, (strip_tags(strtoupper($_POST['camisa']), ENT_QUOTES)));
	$pantalon = mysqli_real_escape_string($conn, (strip_tags($_POST['pantalon'], ENT_QUOTES)));
	$botas = mysqli_real_escape_string($conn, (strip_tags($_POST['botas'], ENT_QUOTES)));
	$guayo = mysqli_real_escape_string($conn, (strip_tags($_POST['guayo'], ENT_QUOTES)));

	//referencia de seguridad
	$eps  = mysqli_real_escape_string($conn, (strip_tags($_POST['eps'], ENT_QUOTES)));
	$pensiones  = mysqli_real_escape_string($conn, (strip_tags($_POST['pensiones'], ENT_QUOTES)));
	$caja = mysqli_real_escape_string($conn, (strip_tags($_POST['caja'], ENT_QUOTES)));
	$servicio_funerario  = mysqli_real_escape_string($conn, (strip_tags($_POST['servicio_funerario'], ENT_QUOTES)));
	$enfermedad = mysqli_real_escape_string($conn, (strip_tags($_POST['enfermedad'], ENT_QUOTES)));

	//referencia academica
	$id_academico  = mysqli_real_escape_string($conn, (strip_tags($_POST['id_academico'], ENT_QUOTES)));
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
	$vehiculo  = mysqli_real_escape_string($conn, (strip_tags($_POST['vehiculo'], ENT_QUOTES)));
	$ven_soat  = mysqli_real_escape_string($conn, (strip_tags($_POST['ven_soat'], ENT_QUOTES)));
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
	$nombre_contacto  = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_contacto'], ENT_QUOTES)));
	$parentesco  = mysqli_real_escape_string($conn, (strip_tags($_POST['parentesco'], ENT_QUOTES)));
	$numero = mysqli_real_escape_string($conn, (strip_tags($_POST['numero'], ENT_QUOTES)));
	$contacto_directo1 = mysqli_real_escape_string($conn, (strip_tags($_POST['contacto_directo1'], ENT_QUOTES)));

	$id_contacto2  = mysqli_real_escape_string($conn, (strip_tags($_POST['id_contacto2'], ENT_QUOTES)));
	$nombre_contacto2  = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_contacto2'], ENT_QUOTES)));
	$parentesco2  = mysqli_real_escape_string($conn, (strip_tags($_POST['parentesco2'], ENT_QUOTES)));
	$numero2 = mysqli_real_escape_string($conn, (strip_tags($_POST['numero2'], ENT_QUOTES)));
	$contacto_directo2 = mysqli_real_escape_string($conn, (strip_tags($_POST['contacto_directo2'], ENT_QUOTES)));

	$id_contacto3  = mysqli_real_escape_string($conn, (strip_tags($_POST['id_contacto3'], ENT_QUOTES)));
	$nombre_contacto3  = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_contacto3'], ENT_QUOTES)));
	$parentesco3  = mysqli_real_escape_string($conn, (strip_tags($_POST['parentesco3'], ENT_QUOTES)));
	$numero3 = mysqli_real_escape_string($conn, (strip_tags($_POST['numero3'], ENT_QUOTES)));
	$contacto_directo3 = mysqli_real_escape_string($conn, (strip_tags($_POST['contacto_directo3'], ENT_QUOTES)));

	$update = mysqli_query($conn, "UPDATE clientes SET  cedula='$cedula', nombres='$nombres', primer_apellido='$primer_apellido', segundo_apellido='$segundo_apellido', exp_ced='$exp_ced', fecha_expedicion='$fecha_expedicion', fecha_nacimiento='$fecha_nacimiento', civil='$civil', genero='$genero', raza='$raza', rh='$rh', hijos='$hijos', acargo='$acargo', eps='$eps', pensiones='$pensiones', caja='$caja', telefono='$telefono', email='$email', direccion='$direccion', estrato='$estrato', tip_vivi='$tip_vivi', nucleo='$nucleo', cargo='$cargo', proceso='$proceso', estado='$estado', fecha_ingreso='$fecha_ingreso', servicio_funerario='$servicio_funerario', enfermedad='$enfermedad', fecha_salida='$fecha_salida' WHERE id='$id'") or die(mysqli_error($conn));
	if ($update) {
		//referencia de tallas para dotacion
		$consultaTallas = mysqli_query($conn, "SELECT id FROM cliente_tallas WHERE id_empleado=$id");
		if (mysqli_num_rows($consultaTallas) == 0) {
			$insertTallas = mysqli_query($conn, "INSERT INTO cliente_tallas(id, id_empleado, camisa, pantalon, botas, guayo)
                            VALUES (NULL, '$id', '$camisa', '$pantalon', '$botas', '$guayo')") or die(mysqli_error($conn));
		} else {
			$updateTallas = mysqli_query($conn, "UPDATE cliente_tallas SET camisa='$camisa', pantalon='$pantalon', botas='$botas', guayo='$guayo' WHERE id_empleado='$id'") or die(mysqli_error($conn));
		}
		//referencia academica
		$consultaAcademico = $consultaAcademico = mysqli_query($conn, "SELECT id FROM cliente_academico WHERE id_cliente=$id");
		if ($curso == "" || $completado == "" || $semestre == "" || $titulo == "") {
			$insert_cliente_academico = mysqli_query($conn, "INSERT INTO cliente_academico (id, id_cliente, curso, completado, semestre, titulo)VALUES(NULL,'$id','$curso','$completado','$semestre','$titulo')");
		} else {
			$update_cliente_academico = mysqli_query($conn, "UPDATE cliente_academico SET  curso='$curso', completado='$completado', semestre='$semestre', titulo='$titulo' WHERE id='$id_academico' and id_cliente='$id'");
		}
		//referencia de cursos cortos
		$consulta_cursos = $consulta_cursos = mysqli_query($conn, "SELECT id FROM cliente_cursos WHERE id_cliente=$id");
		if (mysqli_num_rows($consulta_cursos) == 0) {
			if ($nombre_curso1 != "" || $duracion_curso1 != "" || $entidad_curso1 != "" || $tiempo_curso1 != "" || $certificado_curso1 != "") {
				$insert_curso1 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso1', '$duracion_curso1', '$entidad_curso1', '$tiempo_curso1','$certificado_curso1')") or die(mysqli_error($conn));
			}
			if ($nombre_curso2 != "" || $duracion_curso2 != "" || $entidad_curso2 != "" || $tiempo_curso2 != "" || $certificado_curso2 != "") {
				$insert_curso2 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso2', '$duracion_curso2', '$entidad_curso2', '$tiempo_curso2','$certificado_curso2')") or die(mysqli_error($conn));
			}
			if ($nombre_curso3 != "" || $duracion_curso3 != "" || $entidad_curso3 != "" || $tiempo_curso3 != "" || $certificado_curso3 != "") {
				$insert_curso3 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso3', '$duracion_curso3', '$entidad_curso3', '$tiempo_curso3','$certificado_curso3')") or die(mysqli_error($conn));
			}
			if ($nombre_curso4 != "" || $duracion_curso4 != "" || $entidad_curso4 != "" || $tiempo_curso4 != "" || $certificado_curso4 != "") {
				$insert_curso4 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso4', '$duracion_curso4', '$entidad_curso4', '$tiempo_curso4','$certificado_curso4')") or die(mysqli_error($conn));
			}
		} else {
			$consult_curso1 = mysqli_query($conn, "SELECT * FROM cliente_cursos WHERE id='$id_curso1' and id_cliente='$id'");
			while ($result_curso1 = mysqli_fetch_array($consult_curso1)) {
				if ($nombre_curso1 != $result_curso1['nombre_curso'] || $duracion_curso1 != $result_curso1['duracion'] || $entidad_curso1 != $result_curso1['entidad'] || $tiempo_curso1 != $result_curso1['tiempo'] || $certificado_curso1 != $result_curso1['certificado']) {
					$update_curso1 = mysqli_query($conn, "UPDATE cliente_cursos SET nombre_curso='$nombre_curso1', duracion='$duracion_curso1', entidad='$entidad_curso1', tiempo='$tiempo_curso1', certificado='$certificado_curso1' WHERE id='$id_curso1' and id_cliente='$id'");
				}
			}
			$consult_curso2 = mysqli_query($conn, "SELECT * FROM cliente_cursos WHERE id='$id_curso2' and id_cliente='$id'");
			while ($result_curso2 = mysqli_fetch_array($consult_curso2)) {
				if ($nombre_curso2 != $result_curso2['nombre_curso'] || $duracion_curso2 != $result_curso2['duracion'] || $entidad_curso2 != $result_curso2['entidad'] || $tiempo_curso2 != $result_curso2['tiempo'] || $certificado_curso2 != $result_curso2['certificado']) {
					$update_curso2 = mysqli_query($conn, "UPDATE cliente_cursos SET nombre_curso='$nombre_curso2', duracion='$duracion_curso2', entidad='$entidad_curso2', tiempo='$tiempo_curso2', certificado='$certificado_curso2' WHERE id='$id_curso2' and id_cliente='$id'");
				}
			}
			$consult_curso3 = mysqli_query($conn, "SELECT * FROM cliente_cursos WHERE id='$id_curso3' and id_cliente='$id'");
			while ($result_curso3 = mysqli_fetch_array($consult_curso3)) {
				if ($nombre_curso3 != $result_curso3['nombre_curso'] || $duracion_curso3 != $result_curso3['duracion'] || $entidad_curso3 != $result_curso3['entidad'] || $tiempo_curso3 != $result_curso3['tiempo'] || $certificado_curso3 != $result_curso3['certificado']) {
					$update_curso3 = mysqli_query($conn, "UPDATE cliente_cursos SET nombre_curso='$nombre_curso3', duracion='$duracion_curso3', entidad='$entidad_curso3', tiempo='$tiempo_curso3', certificado='$certificado_curso3' WHERE id='$id_curso3' and id_cliente='$id'");
				}
			}
			$consult_curso4 = mysqli_query($conn, "SELECT * FROM cliente_cursos WHERE id='$id_curso4' and id_cliente='$id'");
			while ($result_curso4 = mysqli_fetch_array($consult_curso4)) {
				if ($nombre_curso4 != $result_curso4['nombre_curso'] || $duracion_curso4 != $result_curso4['duracion'] || $entidad_curso4 != $result_curso4['entidad'] || $tiempo_curso4 != $result_curso4['tiempo'] || $certificado_curso4 != $result_curso4['certificado']) {
					$update_curso4 = mysqli_query($conn, "UPDATE cliente_cursos SET nombre_curso='$nombre_curso4', duracion='$duracion_curso4', entidad='$entidad_curso4', tiempo='$tiempo_curso4', certificado='$certificado_curso4' WHERE id='$id_curso4' and id_cliente='$id'");
				}
			}
		}

		//referencia de vehiculo
		//Se removieron dos lineas de Vensoat y ventecnomecanica, generaban error en local y en las bases de datos, ahora el valor por defaul se genera en la base de datos.
		$consultaVehiculo = mysqli_query($conn, "SELECT id FROM cliente_vehiculo WHERE id_empleado=$id");
		if (mysqli_num_rows($consultaVehiculo) == 0) {
			$insertVehiculo = mysqli_query($conn, "INSERT INTO cliente_vehiculo(id, id_empleado, vehiculo, ven_soat, ven_tecnomecanica)
                            VALUES(NULL,'$id','$vehiculo','$ven_soat','$ven_tecnomecanica')") or die(mysqli_error($conn));
		} else {
			$updateVehiculo = mysqli_query($conn, "UPDATE cliente_vehiculo SET vehiculo='$vehiculo',ven_soat='$ven_soat',ven_tecnomecanica='$ven_tecnomecanica' WHERE id_empleado='$id'") or die(mysqli_error($conn));
		}

		//referencia laboral
		$consultaLaboral = mysqli_query($conn, "SELECT id FROM cliente_laborales WHERE id_empleado=$id");
		if ($empresa == "" && $empresa2 == "") {
		} elseif (mysqli_num_rows($consultaLaboral) == 0) {
			if ($empresa2 == "") {
				$insertLaborales = mysqli_query($conn, "INSERT INTO cliente_laborales(id, id_empleado, empresa, jefe, telefono, cargo, tiempo_exp, motivo)
                            	VALUES(NULL,'$id','$empresa','$jefe','$telefonoE','$cargoE','$tiempo_exp','$motivo')") or die(mysqli_error($conn));
			} else {
				$insertLaborales = mysqli_query($conn, "INSERT INTO cliente_laborales(id, id_empleado, empresa, jefe, telefono, cargo, tiempo_exp, motivo)
                                VALUES(NULL,'$id','$empresa','$jefe','$telefonoE','$cargoE','$tiempo_exp','$motivo')") or die(mysqli_error($conn));

				$insertLaborales = mysqli_query($conn, "INSERT INTO cliente_laborales(id, id_empleado, empresa, jefe, telefono, cargo, tiempo_exp, motivo)
                                VALUES(NULL,'$id','$empresa2','$jefe2','$telefonoE2','$cargoE2','$tiempo_exp2','$motivo2')") or die(mysqli_error($conn));
			}
		} else {
			if ($empresa2 == "") {
				$updateLaborales = mysqli_query($conn, "UPDATE cliente_laborales SET empresa='$empresa', jefe='$jefe', telefono='$telefonoE', cargo='$cargoE', tiempo_exp='$tiempo_exp',motivo='$motivo' WHERE id_empleado='$id' and id='$id_laboral'") or die(mysqli_error($conn));
			} else {
				$updateLaborales = mysqli_query($conn, "UPDATE cliente_laborales SET empresa='$empresa', jefe='$jefe', telefono='$telefonoE', cargo='$cargoE', tiempo_exp='$tiempo_exp',motivo='$motivo' WHERE id_empleado='$id' and id='$id_laboral'") or die(mysqli_error($conn));

				$updateLaborales = mysqli_query($conn, "UPDATE cliente_laborales SET empresa='$empresa2', jefe='$jefe2', telefono='$telefonoE2', cargo='$cargoE2', tiempo_exp='$tiempo_exp2',motivo='$motivo2' WHERE id_empleado='$id' and id='$id_laboral2'") or die(mysqli_error($conn));
			}
		}

		//referencia personal
		// Se renovó el metodo de actualizar en cuanto a re insert y update 25-05-2022
		$consult_contacto1 = mysqli_query($conn, "SELECT * FROM cliente_contacto WHERE id='$id_contacto' and id_empleado='$id'");
		if (mysqli_num_rows($consult_contacto1) == 0) {
			if ($nombre_contacto != "" || $parentesco != "" || $contacto_directo1 != "" || $numero != "") {
				$insertContacto1 = mysqli_query($conn, "INSERT INTO cliente_contacto(id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)
								VALUES(NULL,'$id','$nombre_contacto','$parentesco', '$contacto_directo1','$numero')") or die(mysqli_error($conn));
			}
		} else {
			while ($result_contacto1 = mysqli_fetch_array($consult_contacto1)) {
				if ($nombre_contacto != $result_contacto1['nombre_contacto'] || $parentesco != $result_contacto1['parentesco'] || $contacto_directo1 != $result_contacto1['contacto_directo'] || $numero != $result_contacto1['numero']) {
					$updateContacto1 = mysqli_query($conn, "UPDATE cliente_contacto SET nombre_contacto='$nombre_contacto', parentesco='$parentesco', contacto_directo='$contacto_directo1', numero='$numero' WHERE id_empleado='$id' and id='$id_contacto'") or die(mysqli_error($conn));
				}
			}
		}

		$consult_contacto2 = mysqli_query($conn, "SELECT * FROM cliente_contacto WHERE id='$id_contacto2' and id_empleado='$id'");
		if (mysqli_num_rows($consult_contacto2) == 0) {
			if ($nombre_contacto2 != "" || $parentesco2 != "" || $contacto_directo2 != "" || $numero2 != "") {
				$insertContacto = mysqli_query($conn, "INSERT INTO cliente_contacto(id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)
								VALUES(NULL,'$id','$nombre_contacto2','$parentesco2', '$contacto_directo2','$numero2')") or die(mysqli_error($conn));
			}
		} else {
			while ($result_contacto2 = mysqli_fetch_array($consult_contacto2)) {
				if ($nombre_contacto2 != $result_contacto2['nombre_contacto'] || $parentesco2 != $result_contacto2['parentesco'] || $contacto_directo2 != $result_contacto2['contacto_directo'] || $numero2 != $result_contacto2['numero']) {
					$updateContacto2 = mysqli_query($conn, "UPDATE cliente_contacto SET nombre_contacto='$nombre_contacto2', parentesco='$parentesco2', contacto_directo='$contacto_directo2', numero='$numero2' WHERE id_empleado='$id' and id='$id_contacto2'") or die(mysqli_error($conn));
				}
			}
		}

		$consult_contacto3 = mysqli_query($conn, "SELECT * FROM cliente_contacto WHERE id='$id_contacto3' and id_empleado='$id'");
		if (mysqli_num_rows($consult_contacto3) == 0) {
			if ($nombre_contacto3 != "" || $parentesco3 != "" || $contacto_directo3 != "" || $numero3 != "") {
				$insertContacto = mysqli_query($conn, "INSERT INTO cliente_contacto(id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)
								VALUES(NULL,'$id','$nombre_contacto3','$parentesco3', '$contacto_directo3','$numero3')") or die(mysqli_error($conn));
			}
		} else {
			while ($result_contacto3 = mysqli_fetch_array($consult_contacto3)) {
				if ($nombre_contacto3 != $result_contacto3['nombre_contacto'] || $parentesco2 != $result_contacto3['parentesco'] || $contacto_directo2 != $result_contacto3['contacto_directo'] || $numero3 != $result_contacto3['numero']) {
					$updateContacto3 = mysqli_query($conn, "UPDATE cliente_contacto SET nombre_contacto='$nombre_contacto3', parentesco='$parentesco3', contacto_directo='$contacto_directo3', numero='$numero3' WHERE id_empleado='$id' and id='$id_contacto3'") or die(mysqli_error($conn));
				}
			}
		}

		echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
	} else {
		echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
	}
}
