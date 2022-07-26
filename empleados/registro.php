<?php session_start();
include "../include/conn/conn.php";
include "../cond/todo.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("head.php"); ?>
</head>

<body>
    <?php include("../include/navegacion/nav.php"); ?>

    <div class="container-fluid border border-success bg-light">
        <hr>
        <div class="alert alert-success" role="alert">
            <center><strong>¡Hola!</strong> Asegúrate de que la información que estas diligenciando esté
                actualizada hasta la fecha, en tal caso de que se requiera modificar la información en otro
                momento, puedes hacerlo al darle clic en el botón <i class="bi bi-pencil-fill"></i> o en el botón "Editar
                Información" en la visualización del empleado <i class="bi bi-search"></i> . <strong>¡Muchas
                    Gracias!</strong></center>
        </div>
        <hr>
        <?php
        if (isset($_POST['input'])) {
            $nombres    = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
            $primer_apellido    = mysqli_real_escape_string($conn, (strip_tags($_POST['primer_apellido'], ENT_QUOTES)));
            $segundo_apellido    = mysqli_real_escape_string($conn, (strip_tags($_POST['segundo_apellido'], ENT_QUOTES)));
            $cedula      = mysqli_real_escape_string($conn, (strip_tags($_POST['cedula'], ENT_QUOTES)));
            $exp_ced  = mysqli_real_escape_string($conn, (strip_tags($_POST['exp_ced'], ENT_QUOTES)));
            $fecha_expedicion  = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_expedicion'], ENT_QUOTES)));
            $fecha_nacimiento  = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_nacimiento'], ENT_QUOTES)));
            $edad    = mysqli_real_escape_string($conn, (strip_tags($_POST['edad'], ENT_QUOTES)));
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
            $cargo         = mysqli_real_escape_string($conn, (strip_tags($_POST['cargo'], ENT_QUOTES)));
            $proceso  = mysqli_real_escape_string($conn, (strip_tags($_POST['proceso'], ENT_QUOTES)));
            $estado  = mysqli_real_escape_string($conn, (strip_tags($_POST['estado'], ENT_QUOTES)));
            $fecha_ingreso  = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_ingreso'], ENT_QUOTES)));

            $añoD = date('y');
            $nucleoSolo = $nucleos[$nucleo][0];
            $noGenerado = mt_rand(100, 999);
            $no_contrato = "$nucleoSolo-$noGenerado-$añoD";

            //referencia de tallas para dotacion
            $camisa = mysqli_real_escape_string($conn, (strip_tags(strtoupper($_POST['camisa']), ENT_QUOTES)));
            $pantalon = mysqli_real_escape_string($conn, (strip_tags($_POST['pantalon'], ENT_QUOTES)));
            $botas = mysqli_real_escape_string($conn, (strip_tags($_POST['botas'], ENT_QUOTES)));
            $guayo = mysqli_real_escape_string($conn, (strip_tags($_POST['guayo'], ENT_QUOTES)));

            //referencia de seguridad
            $arl  = mysqli_real_escape_string($conn, (strip_tags($_POST['arl'], ENT_QUOTES)));
            $eps  = mysqli_real_escape_string($conn, (strip_tags($_POST['eps'], ENT_QUOTES)));
            $pensiones  = mysqli_real_escape_string($conn, (strip_tags($_POST['pensiones'], ENT_QUOTES)));
            $caja = mysqli_real_escape_string($conn, (strip_tags($_POST['caja'], ENT_QUOTES)));
            $servicio_funerario  = mysqli_real_escape_string($conn, (strip_tags($_POST['servicio_funerario'], ENT_QUOTES)));
            $enfermedad = mysqli_real_escape_string($conn, (strip_tags($_POST['enfermedad'], ENT_QUOTES)));

            //referencia academica
            $curso  = mysqli_real_escape_string($conn, (strip_tags($_POST['curso'], ENT_QUOTES)));
            $completado = mysqli_real_escape_string($conn, (strip_tags($_POST['completado'], ENT_QUOTES)));
            $semestre = mysqli_real_escape_string($conn, (strip_tags($_POST['semestre'], ENT_QUOTES)));
            $titulo = mysqli_real_escape_string($conn, (strip_tags($_POST['titulo'], ENT_QUOTES)));

            //referencias de cursos cortos
            $nombre_curso1 = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_curso1'], ENT_QUOTES)));
            $duracion_curso1 = mysqli_real_escape_string($conn, (strip_tags($_POST['duracion_curso1'], ENT_QUOTES)));
            $entidad_curso1 = mysqli_real_escape_string($conn, (strip_tags($_POST['entidad_curso1'], ENT_QUOTES)));
            $tiempo_curso1 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempo_curso1'], ENT_QUOTES)));
            $certificado_curso1 = mysqli_real_escape_string($conn, (strip_tags($_POST['certificado_curso1'], ENT_QUOTES)));

            $nombre_curso2 = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_curso2'], ENT_QUOTES)));
            $duracion_curso2 = mysqli_real_escape_string($conn, (strip_tags($_POST['duracion_curso2'], ENT_QUOTES)));
            $entidad_curso2 = mysqli_real_escape_string($conn, (strip_tags($_POST['entidad_curso2'], ENT_QUOTES)));
            $tiempo_curso2 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempo_curso2'], ENT_QUOTES)));
            $certificado_curso2 = mysqli_real_escape_string($conn, (strip_tags($_POST['certificado_curso2'], ENT_QUOTES)));

            $nombre_curso3 = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_curso3'], ENT_QUOTES)));
            $duracion_curso3 = mysqli_real_escape_string($conn, (strip_tags($_POST['duracion_curso3'], ENT_QUOTES)));
            $entidad_curso3 = mysqli_real_escape_string($conn, (strip_tags($_POST['entidad_curso3'], ENT_QUOTES)));
            $tiempo_curso3 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempo_curso3'], ENT_QUOTES)));
            $certificado_curso3 = mysqli_real_escape_string($conn, (strip_tags($_POST['certificado_curso3'], ENT_QUOTES)));

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
            $empresa  = mysqli_real_escape_string($conn, (strip_tags($_POST['empresa'], ENT_QUOTES)));
            $jefe  = mysqli_real_escape_string($conn, (strip_tags($_POST['jefe'], ENT_QUOTES)));
            $telefonoE = mysqli_real_escape_string($conn, (strip_tags($_POST['telefonoE'], ENT_QUOTES)));
            $cargoE  = mysqli_real_escape_string($conn, (strip_tags($_POST['cargoE'], ENT_QUOTES)));
            $tiempo_exp  = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempo_exp'], ENT_QUOTES)));
            $motivo = mysqli_real_escape_string($conn, (strip_tags($_POST['motivo'], ENT_QUOTES)));

            $empresa2  = mysqli_real_escape_string($conn, (strip_tags($_POST['empresa2'], ENT_QUOTES)));
            $jefe2  = mysqli_real_escape_string($conn, (strip_tags($_POST['jefe2'], ENT_QUOTES)));
            $telefonoE2 = mysqli_real_escape_string($conn, (strip_tags($_POST['telefonoE2'], ENT_QUOTES)));
            $cargoE2  = mysqli_real_escape_string($conn, (strip_tags($_POST['cargoE2'], ENT_QUOTES)));
            $tiempo_exp2  = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempo_exp2'], ENT_QUOTES)));
            $motivo2 = mysqli_real_escape_string($conn, (strip_tags($_POST['motivo2'], ENT_QUOTES)));

            //referencia personal
            $nombre_contacto  = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_contacto'], ENT_QUOTES)));
            $parentesco  = mysqli_real_escape_string($conn, (strip_tags($_POST['parentesco'], ENT_QUOTES)));
            $numero = mysqli_real_escape_string($conn, (strip_tags($_POST['numero'], ENT_QUOTES)));
            $contacto_directo1 = mysqli_real_escape_string($conn, (strip_tags($_POST['contacto_directo1'], ENT_QUOTES)));

            $nombre_contacto2  = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_contacto2'], ENT_QUOTES)));
            $parentesco2  = mysqli_real_escape_string($conn, (strip_tags($_POST['parentesco2'], ENT_QUOTES)));
            $numero2 = mysqli_real_escape_string($conn, (strip_tags($_POST['numero2'], ENT_QUOTES)));
            $contacto_directo2 = mysqli_real_escape_string($conn, (strip_tags($_POST['contacto_directo2'], ENT_QUOTES)));

            $nombre_contacto3  = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre_contacto3'], ENT_QUOTES)));
            $parentesco3  = mysqli_real_escape_string($conn, (strip_tags($_POST['parentesco3'], ENT_QUOTES)));
            $numero3 = mysqli_real_escape_string($conn, (strip_tags($_POST['numero3'], ENT_QUOTES)));
            $contacto_directo3 = mysqli_real_escape_string($conn, (strip_tags($_POST['contacto_directo3'], ENT_QUOTES)));

            $consulta = mysqli_query($conn, "SELECT cedula FROM clientes WHERE cedula=$cedula");
            $resultado1 = mysqli_fetch_array($consulta);
            if ($cedula == isset($resultado1['cedula'])) {
                echo "<script> confirm('La cedula ya esta registrada en el sistema'); history.go(-1)</script>";
            } else {

                /**Conectar la base de datos de nomina, para crear un registro en clientes
                 * ayudandonos asi a que se cree la nomina de esa persona si se requiere
                 */
                $consulta2 = mysqli_query($conexion, "SELECT cedula FROM clientes WHERE cedula=$cedula");
                if (mysqli_num_rows($consulta2) > 0) {
                    echo "<script> confirm('La cedula ya esta registrada en el sistema de nomina');</script>";
                } else {
                    $nombre_entero = $nombres . ' ' . $primer_apellido . ' ' . $segundo_apellido;
                    $insert2 = mysqli_query($conexion, "INSERT INTO clientes(id, nombres, cedula) VALUES(NULL,'$nombre_entero', '$cedula')") or die(mysqli_error($conexion));
                }
                mysqli_close($conexion);
                /**Cerramos la base de datos ya que solo nos sirve en este momento */

                $insert = mysqli_query($conn, "INSERT INTO clientes(id, cedula, primer_apellido, segundo_apellido, nombres, exp_ced, fecha_expedicion, fecha_nacimiento, civil, genero, raza, rh, hijos, acargo, eps, pensiones, caja, telefono, no_contrato, servicio_funerario, enfermedad, email, direccion, estrato, tip_vivi, nucleo, cargo, proceso, estado, arl, fecha_ingreso)VALUES(NULL,'$cedula','$primer_apellido', '$segundo_apellido', '$nombres', '$exp_ced', '$fecha_expedicion', '$fecha_nacimiento', '$civil', '$genero', '$raza', '$rh', '$hijos', '$acargo', '$eps', '$pensiones', '$caja', '$telefono', '$no_contrato', '$servicio_funerario', '$enfermedad', '$email', '$direccion', '$estrato', '$tip_vivi', '$nucleo', '$cargo', '$proceso', '$estado', '$arl', '$fecha_ingreso')") or die(mysqli_error($conn));
                if ($insert) {
                    /**Ejecutamos la misma consulta anterior pero esta vez ya insertado los datos para sacar el id generado de este registro y asi poder sacar la informacion correspondiente*/
                    $consulta1 = mysqli_query($conn, "SELECT id FROM clientes WHERE cedula=$cedula");
                    $resultado1 = mysqli_fetch_array($consulta1);
                    $id = $resultado1["id"];

                    //referencia de tallas para dotacion
                    $insertTallas = mysqli_query($conn, "INSERT INTO cliente_tallas(id, id_empleado, camisa, pantalon, botas, guayo)
                                    VALUES (NULL, '$id', '$camisa', '$pantalon', '$botas', '$guayo')") or die(mysqli_error($conn));
                    //referencia academica
                    $insert_cliente_academico = mysqli_query($conn, "INSERT INTO cliente_academico (id, id_cliente, curso, completado, semestre, titulo)VALUES(NULL,'$id','$curso','$completado','$semestre','$titulo')") or die(mysqli_error($conn));

                    //referencias de cursos cortos
                    if ($nombre_curso1 != "") {
                        $insert_curso1 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso1', '$duracion_curso1', '$entidad_curso1', '$tiempo_curso1','$certificado_curso1')") or die(mysqli_error($conn));
                    }
                    if ($nombre_curso2 != "") {
                        $insert_curso2 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso2', '$duracion_curso2', '$entidad_curso2', '$tiempo_curso2','$certificado_curso2')") or die(mysqli_error($conn));
                    }
                    if ($nombre_curso3 != "") {
                        $insert_curso3 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso3', '$duracion_curso3', '$entidad_curso3', '$tiempo_curso3','$certificado_curso3')") or die(mysqli_error($conn));
                    }
                    if ($nombre_curso4 != "") {
                        $insert_curso4 = mysqli_query($conn, "INSERT INTO cliente_cursos (id, id_cliente, nombre_curso, duracion, entidad, tiempo, certificado)VALUES(NULL, '$id', '$nombre_curso4', '$duracion_curso4', '$entidad_curso4', '$tiempo_curso4','$certificado_curso4')") or die(mysqli_error($conn));
                    }
                    //referencia vehicular
                    if ($ven_soat == '') {
                        $ven_soat = '0101-01-01';
                    }
                    if ($ven_tecnomecanica == '') {
                        $ven_tecnomecanica = '0101-01-01';
                    }
                    $insertVehiculo = mysqli_query($conn, "INSERT INTO cliente_vehiculo(id, id_empleado, vehiculo, ven_soat, ven_tecnomecanica)
                                    VALUES(NULL,'$id','$vehiculo','$ven_soat','$ven_tecnomecanica')") or die(mysqli_error($conn));

                    //referencia laboral
                    if ($empresa == "" && $empresa2 == "") {
                    } else if ($empresa2 == "") {
                        $insertLaborales = mysqli_query($conn, "INSERT INTO cliente_laborales(id, id_empleado, empresa, jefe, telefono, cargo, tiempo_exp, motivo)
                                        VALUES(NULL,'$id','$empresa','$jefe','$telefonoE','$cargoE','$tiempo_exp','$motivo')") or die(mysqli_error($conn));
                    } else {
                        $insertLaborales = mysqli_query($conn, "INSERT INTO cliente_laborales(id, id_empleado, empresa, jefe, telefono, cargo, tiempo_exp, motivo)
                                        VALUES(NULL,'$id','$empresa','$jefe','$telefonoE','$cargoE','$tiempo_exp','$motivo')") or die(mysqli_error($conn));

                        $insertLaborales = mysqli_query($conn, "INSERT INTO cliente_laborales(id, id_empleado, empresa, jefe, telefono, cargo, tiempo_exp, motivo)
                                        VALUES(NULL,'$id','$empresa2','$jefe2','$telefonoE2','$cargoE2','$tiempo_exp2','$motivo2')") or die(mysqli_error($conn));
                    }

                    //referencia personal
                    if ($nombre_contacto == "" && $nombre_contacto2 == "" && $nombre_contacto3 == "") {
                    } else if ($nombre_contacto2 == "" && $nombre_contacto3 == "") {
                        $insertContacto = mysqli_query($conn, "INSERT INTO cliente_contacto(id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)
                                        VALUES(NULL,'$id','$nombre_contacto','$parentesco', '$contacto_directo1','$numero')") or die(mysqli_error($conn));
                    } else if ($nombre_contacto3 == "") {
                        $insertContacto = mysqli_query($conn, "INSERT INTO cliente_contacto(id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)
                                        VALUES(NULL,'$id','$nombre_contacto','$parentesco', '$contacto_directo1','$numero')") or die(mysqli_error($conn));

                        $insertContacto = mysqli_query($conn, "INSERT INTO cliente_contacto(id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)
                                        VALUES(NULL,'$id','$nombre_contacto2','$parentesco2', '$contacto_directo2','$numero2')") or die(mysqli_error($conn));
                    } else {
                        $insertContacto = mysqli_query($conn, "INSERT INTO cliente_contacto(id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)
                                        VALUES(NULL,'$id','$nombre_contacto','$parentesco', '$contacto_directo1','$numero')") or die(mysqli_error($conn));

                        $insertContacto = mysqli_query($conn, "INSERT INTO cliente_contacto(id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)
                                        VALUES(NULL,'$id','$nombre_contacto2','$parentesco2', '$contacto_directo2','$numero2')") or die(mysqli_error($conn));

                        $insertContacto = mysqli_query($conn, "INSERT INTO cliente_contacto(id, id_empleado, nombre_contacto, parentesco, contacto_directo, numero)
                                        VALUES(NULL,'$id','$nombre_contacto3','$parentesco3', '$contacto_directo3','$numero3')") or die(mysqli_error($conn));
                    }

                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos de ' . $nombres . ' han sido agregados correctamente por favor escoge que quieres hacer.</div><a href="registro.php" class="btn btn-sm btn-success"><i class="bi bi-arrow-left"></i> Registro</a><br><br><a href="index.php" class="btn btn-sm btn-success"><i class="bi bi-arrow-left"></i> Inicio</a>';
                    echo "<script>window.location = 'excelEmpleado.php?id=$id'</script>";
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos, verifique que el empleado no esté ya registrado en el sistema.</div>';
                }
            }
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-person-plus-fill"></i> Registrar nuevo empleado</h4>
            </div>

            <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">

                <div class="control-group">
                    <div class="controls">
                        <a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i>
                            Regresar</a>
                    </div>
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
                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-auto" for="nombres">(*) Nombres: </span>
                            <input type="text" onkeyup="mayus(this);" name="nombres" id="nombres" class="form-control" placeholder="INGRESA EL NOMBRE COMPLETO" required>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="nombres">(*) Primer Apellido: </span>
                                <input type="text" onkeyup="mayus(this);" name="primer_apellido" id="primer_apellido" class="form-control" placeholder="INGRESAR PRIMER APELLIDO" required>
                            </div>&nbsp;
                            <hr>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="nombres"> Segundo Apellido: </span>
                                <input type="text" onkeyup="mayus(this);" name="segundo_apellido" id="segundo_apellido" class="form-control" placeholder="INGRESAR SEGUNDO APELLIDO">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="cedula">(*) Cédula: </span>
                                <input name="cedula" id="cedula" class="form-control" type="number" placeholder="INGRESA LA CÉDULA" required>
                            </div>
                            <span id="result1" name="result1" class=""></span>
                            <hr>&nbsp;

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="exp_ced">(*) Lugar de Expedición: </span>
                                <input name="exp_ced" onkeyup="mayus(this);" id="exp_ced" class=" form-control" type="text" placeholder="INGRESA EL LUGAR DE EXPEDICIÓN" required>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="fecha_expedicion">(*) Fecha de Expedición:
                                </span>
                                <input name="fecha_expedicion" id="fecha_expedicion" class=" form-control" type="date" required>
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="fecha_ingreso">(*) Fecha de Ingreso: </label>
                                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class=" form-control" required onblur="calc()">
                            </div>
                        </div>
                        <br>

                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="fecha_nacimiento">(*) Fecha de Nacimiento: </span>
                                <input name="fecha_nacimiento" id="fecha_nacimiento" class=" form-control" type="date" required onblur="calc()">
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="edad">Edad de ingreso: </span>
                                <input name="edad" id="edad" class=" form-control" type="number" readonly placeholder="">
                                <input name="tiempo" id="tiempo" class=" form-control w-50" type="text" readonly placeholder="Tiempo en días, meses o años">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="civil">(*) Estado Civil: </label>
                                <select class="form-select" name="civil" id="civil" required>
                                    <option selected>SELECCIONA EL ESTADO CIVIL</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM estado_civil");
                                    while ($civil = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $civil['id'] . '">' . $civil['civil'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="genero">(*) Género: </label>
                                <select class="form-select" name="genero" id="genero" required>
                                    <option value="">SELECCIONA EL GÉNERO</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM genero");
                                    while ($genero = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $genero['id'] . '">' . $genero['genero'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="raza">(*) Raza: </label>
                                <select class="form-select" name="raza" id="raza" required>
                                    <option value="">SELECCIONA LA RAZA</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM raza");
                                    while ($raza = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $raza['id'] . '">' . $raza['raza'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="rh">(*) RH Sanguíneo: </label>
                                <select class="form-select" name="rh" id="rh" required>
                                    <option value="">SELECCIONA EL RH</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM rh");
                                    while ($rh = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $rh['id'] . '">' . $rh['rh'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="hijos">(*) Número de Hijos: </span>
                                <input name="hijos" id="hijos" class=" form-control" type="number" placeholder="INGRESA EL NÚMERO DE HIJOS" required>
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="acargo">(*) Personas a Cargo: </span>
                                <input name="acargo" id="acargo" class=" form-control" type="number" placeholder="INGRESA LAS PERSONAS A CARGO" required>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="telefono">(*) Número de Celular: </span>
                                <input name="telefono" id="telefono" class=" form-control" type="number" placeholder="INGRESA EL NÚMERO DE CELULAR" required>
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="email">Email (Si tiene): </span>
                                <input type="email" name="email" id="email" class="form-control" placeholder="INGRESE EL CORREO ELECTRONICO">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="direccion">(*) Dirección: </label>
                                <input type="text" onkeyup="mayus(this);" name="direccion" id="direccion" class="form-control" placeholder="DIRECCIÓN DEL EMPLEADO" required>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="estrato">(*) Estrato socioeconómico: </label>
                                <input type="number" name="estrato" id="estrato" class=" form-control" placeholder="ESTRATO SOCIOECONÓMICO" required>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="tip_vivi">(*) Tipo de Vivienda: </label>
                                <select class="form-select" name="tip_vivi" id="tip_vivi" required>
                                    <option value="">SELECCIONA EL TIPO DE VIVIENDA</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM tip_vivi");
                                    while ($tip_vivi = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $tip_vivi['id'] . '">' . $tip_vivi['tipo_vivienda'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="nucleo">(*) Núcleo: </label>
                                <select class="form-select" name="nucleo" id="nucleo" required>
                                    <option value="">SELECCIONA EL NÚCLEO</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM nucleos");
                                    while ($nucleo = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $nucleo['id_nucleos'] . '">' . $nucleo['nucleos'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="cargo">(*) Cargo: </label>
                                <select class="form-select" name="cargo" id="cargo" required>
                                    <option value="">SELECCIONA EL CARGO</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM cargos");
                                    while ($cargo = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $cargo['id'] . '">' . $cargo['cargo'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="proceso">(*) Proceso: </label>
                                <select class="form-select" name="proceso" id="proceso" required>
                                    <option value="">SELECCIONA EL PROCESO</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM proceso");
                                    while ($proceso = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $proceso['id'] . '">' . $proceso['proceso'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="estado">(*) Estado: </label>
                                <select class="form-select" name="estado" id="estado" required>
                                    <option value="">SELECCIONA EL ESTADO</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM estado");
                                    while ($estado = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $estado['id'] . '">' . $estado['estado'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <center>
                            <hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_datos" role="button" aria-expanded="true" aria-controls="ref_datos">
                                <i class="bi bi-arrow-up"></i> Cerrar Segmento
                            </a>
                        </center>
                    </div>
                </div>
                <br>

                <!-- Información de tallas para dotación -->
                <center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_tallas" role="button" aria-expanded="false" aria-controls="ref_tallas">
                        <i class="bi bi-arrow-down"></i> INFORMACIÓN DE TALLAS PARA DOTACIÓN
                    </a></center>
                <div class="collapse show" id="ref_tallas">
                    <div class="card card-body">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-25" for="camisa">(*)Talla camisa:</span>
                            <input name="camisa" id="camisa" required class="form-control" type="text" placeholder="Talla de camisa" onkeyup="mayus(this);">
                            <span class="input-group-text w-25" for="pantalon">(*)Talla pantalon:</span>
                            <input name="pantalon" id="pantalon" required class="form-control" type="text" placeholder="Talla de pantalon" onkeyup="mayus(this);">
                        </div>
                        <br>

                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-25" for="botas">(*)Talla botas:</span>
                            <input name="botas" id="botas" required class="form-control" type="text" placeholder="Talla de botas">
                            <span class="input-group-text w-25" for="guayo">(*)Talla guayo:</span>
                            <input name="guayo" id="guayo" required class="form-control" type="text" placeholder="Talla de guayo">
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
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="ARL">(*) ARL: </label>
                                <select class="form-select" name="arl" id="arl" required>
                                    <option value="SURA" selected>SURA</option>

                                </select>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="eps">(*) EPS: </label>
                                <select class="form-select" name="eps" id="eps" required>
                                    <option value="">SELECCIONA LA EPS</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM eps");
                                    while ($eps = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $eps['id'] . '">' . $eps['eps'] . '</option>';
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
                                    <option value="">SELECCIONA EL FONDO DE PENSIONES</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM fondo_pensiones");
                                    while ($pensiones = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $pensiones['id'] . '">' . $pensiones['fondo_pensiones'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="caja">(*) Caja de Compensación: </label>
                                <select class="form-select" name="caja" id="caja" required>
                                    <option value="">SELECCIONA LA CAJA DE COMPENSACIÓN</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM caja_compensacion");
                                    while ($caja = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $caja['id'] . '">' . $caja['caja_compensacion'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="servicio_funerario">Servicio funerario: </span>
                                <input type="text" onkeyup="mayus(this);" name="servicio_funerario" id="servicio_funerario" class="form-control" placeholder="INGRESA EL SERVICIO FUNERARIO">
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="enfermedad">Enfermedad o tratamiento médico: </label>
                                <select class="form-select" name="enfermedad" id="enfermedad">
                                    <option value="1" selected>NO</option>
                                    <option value="2">SI</option>
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
                <div class="collapse show" id="ref_academica">
                    <div class="card card-body">
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="curso">(*) Nivel Educativo: </label>
                                <select class="form-select" name="curso" id="curso" required>
                                    <option value="">SELECCIONA EL NIVEL EDUCATIVO</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM nivel_educativo");
                                    while ($nivel_educativo = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $nivel_educativo['id'] . '">' . $nivel_educativo['nivel_educativo'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="completado">(*) Completado: </label>
                                <select class="form-select" name="completado" id="completado" required>
                                    <option value="" selected>SELECCIONA</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="semestre"> Años/Semestres completados: </label>
                                <input type="number" name="semestre" id="semestre" class="form-control" placeholder="INGRESA AÑOS O SEMESTRES COMPLETADOS">
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="titulo"> Nombre de titulo obtenido: </label>
                                <input type="text" onkeyup="mayus(this);" name="titulo" id="titulo" class="form-control" placeholder="INGRESA NOMBRE DE TITULO OBTENIDO">
                            </div>
                        </div>
                        <center>
                            <hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_academica" role="button" aria-expanded="true" aria-controls="ref_academica">
                                <i class="bi bi-arrow-up"></i> Cerrar Segmento
                            </a>
                        </center>
                    </div>
                </div>
                <!-- Información cursos corto duracion -->
                <center><hr><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_cursos" role="button" aria-expanded="false" aria-controls="ref_cursos">
                        <i class="bi bi-arrow-down"></i> CURSOS DE CORTA DURACIÓN
                    </a></center>
                <div class="collapse show" id="ref_cursos">
                    <div class="card card-body">
                        <!-- Curso corto 1 -->
                        <center><br><a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#curso1" role="button" aria-expanded="false" aria-controls="curso1">
                                <i class="bi bi-arrow-down"></i> Curso corto #1
                            </a></center>
                        <div class="collapse show" id="curso1">
                            <div class="card card-body">
                                <div class="input-group shadow-sm">
                                    <label class="input-group-text w-25" for="nombre_curso1"> Nombre del curso: </label>
                                    <input type="text" onkeyup="mayus(this);" name="nombre_curso1" id="nombre_curso1" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
                                </div>
                                <br>
                                <div class="input-group shadow-sm">
                                    <label class="input-group-text w-25" for="entidad_curso1"> Entidad: </label>
                                    <input type="text" onkeyup="mayus(this);" name="entidad_curso1" id="entidad_curso1" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="duracion_curso1"> Duración del curso: </label>
                                        <input type="text" onkeyup="mayus(this);" name="duracion_curso1" id="duracion_curso1" class="form-control" placeholder="INGRESA DURACION DEL CURSO">
                                    </div>&nbsp;
                                    <br>
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="tiempo_curso1"> Año del curso: </label>
                                        <input type="text" maxlength="4" name="tiempo_curso1" id="tiempo_curso1" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
                                    </div>&nbsp;
                                    <br>
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="certificado_curso1"> Titulo certificado: </label>
                                        <select class="form-select" name="certificado_curso1" id="certificado_curso1">
                                            <option value="" selected>SELECCIONA</option>
                                            <option value="1">SI</option>
                                            <option value="0">NO</option>
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
                        <div class="collapse" id="curso2">
                            <div class="card card-body">
                                <div class="input-group shadow-sm">
                                    <label class="input-group-text w-25" for="nombre_curso2"> Nombre del curso: </label>
                                    <input type="text" onkeyup="mayus(this);" name="nombre_curso2" id="nombre_curso2" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
                                </div>
                                <br>
                                <div class="input-group shadow-sm">
                                    <label class="input-group-text w-25" for="entidad_curso2"> Entidad: </label>
                                    <input type="text" onkeyup="mayus(this);" name="entidad_curso2" id="entidad_curso2" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="duracion_curso2"> Duración del curso: </label>
                                        <input type="text" onkeyup="mayus(this);" name="duracion_curso2" id="duracion_curso2" class="form-control" placeholder="INGRESA DURACION DEL CURSO">
                                    </div>&nbsp;
                                    <br>
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="tiempo_curso2"> Año del curso: </label>
                                        <input type="text" maxlength="4" name="tiempo_curso2" id="tiempo_curso2" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
                                    </div>&nbsp;
                                    <br>
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="certificado_curso2"> Titulo certificado: </label>
                                        <select class="form-select" name="certificado_curso2" id="certificado_curso2">
                                            <option value="" selected>SELECCIONA</option>
                                            <option value="1">SI</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                </div>
                                <center><br><a class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="collapse" href="#curso2" role="button" aria-expanded="true" aria-controls="curso2">
                                        <i class="bi bi-arrow-up"></i> Cerrar
                                    </a></center>
                            </div>
                        </div>

                        <!-- Curso corto 3 -->
                        <center>
                            <hr><a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#curso3" role="button" aria-expanded="false" aria-controls="curso3">
                                <i class="bi bi-arrow-down"></i> Curso corto #3
                            </a>
                        </center>
                        <div class="collapse" id="curso3">
                            <div class="card card-body">
                                <div class="input-group shadow-sm">
                                    <label class="input-group-text w-25" for="nombre_curso3"> Nombre del curso: </label>
                                    <input type="text" onkeyup="mayus(this);" name="nombre_curso3" id="nombre_curso3" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
                                </div>
                                <br>
                                <div class="input-group shadow-sm">
                                    <label class="input-group-text w-25" for="entidad_curso3"> Entidad: </label>
                                    <input type="text" onkeyup="mayus(this);" name="entidad_curso3" id="entidad_curso3" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="duracion_curso3"> Duración del curso: </label>
                                        <input type="text" onkeyup="mayus(this);" name="duracion_curso3" id="duracion_curso3" class="form-control" placeholder="INGRESA DURACION DEL CURSO">
                                    </div>&nbsp;
                                    <br>
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="tiempo_curso3"> Año del curso: </label>
                                        <input type="text" maxlength="4" name="tiempo_curso3" id="tiempo_curso3" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
                                    </div>&nbsp;
                                    <br>
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="certificado_curso3"> Titulo certificado: </label>
                                        <select class="form-select" name="certificado_curso3" id="certificado_curso3">
                                            <option value="" selected>SELECCIONA</option>
                                            <option value="1">SI</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                </div>
                                <center><br><a class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="collapse" href="#curso3" role="button" aria-expanded="true" aria-controls="curso3">
                                        <i class="bi bi-arrow-up"></i> Cerrar
                                    </a></center>
                            </div>
                        </div>

                        <!-- Curso corto 4 -->
                        <center>
                            <hr><a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#curso4" role="button" aria-expanded="false" aria-controls="curso4">
                                <i class="bi bi-arrow-down"></i> Curso corto #4
                            </a>
                        </center>
                        <div class="collapse" id="curso4">
                            <div class="card card-body">
                                <div class="input-group shadow-sm">
                                    <label class="input-group-text w-25" for="nombre_curso4"> Nombre del curso: </label>
                                    <input type="text" onkeyup="mayus(this);" name="nombre_curso4" id="nombre_curso4" class="form-control" placeholder="INGRESA NOMBRE DEL CURSO">
                                </div>
                                <br>
                                <div class="input-group shadow-sm">
                                    <label class="input-group-text w-25" for="entidad_curso4"> Entidad: </label>
                                    <input type="text" onkeyup="mayus(this);" name="entidad_curso4" id="entidad_curso4" class="form-control" placeholder="INGRESA ENTIDAD DEL CURSO">
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="duracion_curso4"> Duración del curso: </label>
                                        <input type="text" onkeyup="mayus(this);" name="duracion_curso4" id="duracion_curso4" class="form-control" placeholder="INGRESA DURACION DEL CURSO">
                                    </div>&nbsp;
                                    <br>
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="tiempo_curso4"> Año del curso: </label>
                                        <input type="text" maxlength="4" name="tiempo_curso4" id="tiempo_curso4" class="form-control" placeholder="INGRESA EL AÑO EN EL QUE SE REALIZÓ EL CURSO">
                                    </div>&nbsp;
                                    <br>
                                    <div class="input-group shadow-sm">
                                        <label class="input-group-text w-auto" for="certificado_curso4"> Titulo certificado: </label>
                                        <select class="form-select" name="certificado_curso4" id="certificado_curso4">
                                            <option value="" selected>SELECCIONA</option>
                                            <option value="1">SI</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                </div>
                                <center><br><a class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="collapse" href="#curso4" role="button" aria-expanded="true" aria-controls="curso4">
                                        <i class="bi bi-arrow-up"></i> Cerrar
                                    </a></center>
                                <hr>
                            </div>
                        </div>
                        <center>
                            <hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_cursos" role="button" aria-expanded="true" aria-controls="#ref_cursos">
                                <i class="bi bi-arrow-up"></i> Cerrar Segmento
                            </a>
                        </center>
                    </div>
                </div>
                <!-- VEHICULO -->
                <center>
                    <hr><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_vehiculo" role="button" aria-expanded="false" aria-controls="ref_vehiculo">
                        <i class="bi bi-arrow-down"></i> VEHÍCULO
                    </a>
                </center>
                <div class="collapse show" id="ref_vehiculo">
                    <div class="card card-body">
                        <div class="input-group shadow-sm">
                            <label class="input-group-text w-25" for="vehiculo">(*) Vehículo: </label>
                            <select class="form-select" name="vehiculo" id="vehiculo">
                                <option value="NINGUNO" selected>SELECCIONA EL VEHÍCULO</option>
                                <option value="CARRO">Carro</option>
                                <option value="MOTO">Moto</option>
                            </select>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="ven_soat">Vencimiento del soat: </span>
                                <input type="date" name="ven_soat" id="ven_soat" class="form-control">
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="ven_tecnomecanica">Vencimiento de la tecnomecanica: </span>
                                <input type="date" name="ven_tecnomecanica" id="ven_tecnomecanica" class="form-control">
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
                    <div class="card card-body">
                        <h5>Datos primera referencia laboral:</h5>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-25" for="empresa">(*) Empresa: </span>
                            <input name="empresa" onkeyup="mayus(this);" id="empresa" class=" form-control" type="text" placeholder="INGRESA LA EMPRESA">
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="jefe">Jefe inmediato: </span>
                                <input type="text" onkeyup="mayus(this);" name="jefe" id="jefe" class="form-control" placeholder="INGRESA EL NOMBRE DEL JEFE INMEDIATO">
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="telefonoE">Teléfono de contacto: </span>
                                <input type="number" name="telefonoE" id="telefonoE" class="form-control" placeholder="INGRESE EL NUMERO DE TELÉFONO DEL CONTACTO">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="cargoE">Cargo: </label>
                                <input type="text" onkeyup="mayus(this);" name="cargoE" id="cargoE" class="form-control" placeholder="CARGO DEL EMPLEADO EN ESA EMPRESA">
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="tiempo_exp"> Tiempo de experiencia: </span>
                                <input type="number" name="tiempo_exp" id="tiempo_exp" class="form-control" placeholder="INGRESE EL TIEMPO DE EXPERIENCIA EN NUMERO DE MESES">
                                <input type="text" class="form-control" readonly value="MESES">
                            </div>
                        </div>
                        <br>
                        <div class="input-group shadow-sm">
                            <label class="input-group-text w-25" for="motivo">(*) Motivo de retiro: </label>
                            <textarea type="text" onkeyup="mayus(this);" name="motivo" id="motivo" class="form-control" placeholder="MOTIVO DEL RETIRO" required></textarea>
                        </div>
                        <br>
                        <hr>

                        <!-- Referencia laboral 2 -->
                        <h5>Datos segunda referencia laboral:</h5>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-25" for="empresa2">(*) Empresa: </span>
                            <input name="empresa2" onkeyup="mayus(this);" id="empresa2" class=" form-control" type="text" placeholder="INGRESA LA EMPRESA">
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="jefe2">Jefe inmediato: </span>
                                <input type="text" onkeyup="mayus(this);" name="jefe2" id="jefe2" class="form-control" placeholder="INGRESA EL NOMBRE DEL JEFE INMEDIATO">
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="telefonoE2">Teléfono de contacto: </span>
                                <input type="number" onkeyup="mayus(this);" name="telefonoE2" id="telefonoE2" class="form-control" placeholder="INGRESE EL NUMERO DE TELÉFONO DEL CONTACTO">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="cargoE2">Cargo: </label>
                                <input type="text" onkeyup="mayus(this);" name="cargoE2" id="cargoE2" class="form-control" placeholder="CARGO DEL EMPLEADO EN ESA EMPRESA">
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="tiempo_exp2">Tiempo de experiencia: </span>
                                <input type="number" name="tiempo_exp2" id="tiempo_exp2" class="form-control" placeholder="INGRESE EL TIEMPO DE EXPERIENCIA EN NUMERO DE MESES">
                                <input type="text" class="form-control" readonly value="MESES">
                            </div>
                        </div>
                        <br>

                        <div class="input-group shadow-sm">
                            <label class="input-group-text w-25" for="motivo2">(*) Motivo de retiro: </label>
                            <textarea type="text" onkeyup="mayus(this);" name="motivo2" id="motivo2" class="form-control" placeholder="MOTIVO DEL RETIRO"></textarea>
                        </div>
                        <center>
                            <hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_laborales" role="button" aria-expanded="true" aria-controls="ref_laborales">
                                <i class="bi bi-arrow-up"></i> Cerrar Segmento
                            </a>
                        </center>
                    </div>
                </div>
               

                <!-- REFERENCIAS PERSONALES -->
                <center><hr><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_personales" role="button" aria-expanded="false" aria-controls="ref_personales">
                        <i class="bi bi-arrow-down"></i> REFERENCIAS PERSONALES
                </center></a>
                <div class="collapse show" id="ref_personales">
                    <!-- Referencia personal # 1 -->
                    <div class="card card-body">
                        <h5>Datos primera referencia personal:</h5>
                        <div class="input-group shadow-sm">
                            <label class="input-group-text w-25" for="nombre_contacto">(*) Nombre del contacto: </label>
                            <input type="text" onkeyup="mayus(this);" name="nombre_contacto" id="nombre_contacto" class="form-control" placeholder="INGRESE EL NOMBRE DEL CONTACTO">
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="parentesco">(*) Parentesco: </label>
                                <select class="form-select" name="parentesco" id="parentesco">
                                    <option value="">SELECCIONA EL PARENTESCO</option>
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
                                <label class="input-group-text w-auto" for="numero">(*) Numero de celular: </label>
                                <input type="number" name="numero" id="numero" class="form-control" placeholder="Ingrese el numero del celular">
                            </div>&nbsp;
                            <br>
                            <label class="input-group-text w-auto" for="contacto_directo1"> Es contacto directo: </label>
                            <div class="d-flex flex-row">&nbsp;
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="contacto_directo1" id="contacto_directo1" value="1">
                                    <label class="form-check-label" for="contacto_directo1">
                                        SI</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="contacto_directo1" id="contacto_directo1" value="0" checked>
                                    <label class="form-check-label" for="contacto_directo1">
                                        NO</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>

                        <!-- Referencia personal 2 -->
                        <h5>Datos segunda referencia personal:</h5>
                        <div class="input-group shadow-sm">
                            <label class="input-group-text w-25" for="nombre_contacto2">(*) Nombre del contacto: </label>
                            <input type="text" onkeyup="mayus(this);" name="nombre_contacto2" id="nombre_contacto2" class="form-control" placeholder="INGRESE EL NOMBRE DEL CONTACTO">
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-25" for="parentesco2">(*) Parentesco: </label>
                                <select class="form-select" name="parentesco2" id="parentesco2">
                                    <option value="">SELECCIONA EL PARENTESCO</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM parentesco");
                                    while ($parentesco = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $parentesco['id'] . '">' . $parentesco['parentesco'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>

                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="numero2">(*) Numero de celular: </label>
                                <input type="number" name="numero2" id="numero2" class="form-control" placeholder="Ingrese el numero del celular">
                            </div>&nbsp;
                            <br>
                            <label class="input-group-text w-auto" for="contacto_directo2"> Es contacto directo: </label>
                            <div class="d-flex flex-row">&nbsp;
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="contacto_directo2" id="contacto_directo2" value="1">
                                    <label class="form-check-label" for="contacto_directo2">
                                        SI
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="contacto_directo2" id="contacto_directo2" value="0" checked>
                                    <label class="form-check-label" for="contacto_directo2">
                                        NO
                                    </label>
                                </div>
                            </div>

                        </div>
                        <br>
                        <hr>
                        <!-- Referencia personal 3 -->
                        <h5>Datos tercera referencia personal:</h5>
                        <div class="input-group shadow-sm">
                            <label class="input-group-text w-25" for="nombre_contacto3">(*) Nombre del contacto: </label>
                            <input type="text" onkeyup="mayus(this);" name="nombre_contacto3" id="nombre_contacto3" class="form-control" placeholder="INGRESE EL NOMBRE DEL CONTACTO">
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="parentesco3">(*) Parentesco: </label>
                                <select class="form-select" name="parentesco3" id="parentesco3">
                                    <option value="">SELECCIONA EL PARENTESCO</option>
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
                                <label class="input-group-text w-auto" for="numero3">(*) Numero de celular: </label>
                                <input type="number" name="numero3" id="numero3" class="form-control" placeholder="Ingrese el numero del celular">
                            </div>&nbsp;
                            <br>
                            <label class="input-group-text w-auto" for="contacto_directo3"> Es contacto directo: </label>
                            <div class="d-flex flex-row">&nbsp;
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="conctato_directo3" id="conctacto_directo3" value="1">
                                    <label class="form-check-label" for="contacto_directo3">
                                        SI</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="contacto_directo3" id="contacto_directo3" value="0" checked>
                                    <label class="form-check-label" for="contacto_directo3">
                                        NO</label>
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
                            <h6>Para registrar los cambios realizados, dar clic en el siguiente botón de Registrar o de lo contrario en el botón de Cancelar para salir:</h6>
                        </center>
                        <div class="controls">
                            <center><button type="submit" name="input" id="input" class="btn btn-sm btn-success">Registrar</button>
                                <a href="index.php" class="btn btn-sm btn-secondary btn-block"><i class="bi bi-x-circle"></i> Cancelar</a>
                            </center>
                        </div>
                    </div>
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

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body>

<script>
    $(document).ready(function() {
        $("#cedula").focusout(function() {
            $.ajax({
                url: '../include/cedulas/cc.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    cedulas: $('#cedula').val()
                }
            }).done(function(respuesta) {
                $("#result1").html(respuesta.cedula);
            });
        });
    });

    function calc() {
        var fechacalcular = $('#fecha_nacimiento').val();
        var fechafixed = fechacalcular.replace("/", "-");
        var fixing = moment(fechafixed).format("DD-MM-YYYY");
        var nac = moment(fixing, 'DD-MM-YYYY');
        var inputDate = moment(nac, 'DD-MM-YYYY');

        var fechacalcularI = $('#fecha_ingreso').val();
        var fechafixedI = fechacalcularI.replace("/", "-");
        var fixingI = moment(fechafixedI).format("DD-MM-YYYY");
        var ingreso = moment(fixingI, 'DD-MM-YYYY');
        var inputDateI = moment(ingreso, 'DD-MM-YYYY');

        //AÑOS
        var birth = moment(nac).format("YYYY");
        var tday = moment(ingreso).format("YYYY");

        //MESES
        var birthmonth = moment(nac).format("MM-YYYY");
        var tdaymonth = moment(ingreso).format("MM-YYYY");

        //DIAS
        var birthday = moment(nac).format("MM-YYYY");
        var tdayday = moment(ingreso).format("MM-YYYY");

        if (inputDate === ingreso) {
            var diff = ingreso.diff(nac, 'hours');
            $('#edad').val(diff);
            console.log(diff + ' hours old');
            $('#tiempo').val('HORAS');

        } else if (birthmonth === tdaymonth) {
            var diff = ingreso.diff(nac, 'days');
            $('#edad').val(diff);
            $('#tiempo').val('DÍAS');
            console.log(diff + ' days old');

        } else if (birth === tday) {
            var diff = ingreso.diff(nac, 'months');
            $('#edad').val(diff);
            $('#tiempo').val('MESES');
            console.log(diff + ' months old');

        } else if (birth != tday && ingreso.diff(nac, 'months') < 12) {
            var diff = ingreso.diff(nac, 'months');
            $('#edad').val(diff);
            $('#tiempo').val('MESES');
            console.log(diff + ' months old');

        } else {
            var diff = ingreso.diff(nac, 'years');
            $('#edad').val(diff);
            $('#tiempo').val('AÑOS');
            console.log(diff + ' years old');
        }
    }

    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>


</html>