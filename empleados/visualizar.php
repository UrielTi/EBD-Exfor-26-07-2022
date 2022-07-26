<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("head.php"); ?>

</head>
<?php
include "../include/conn/conn.php";
include "../cond/todo.php";
?>

<body>
    <div class="container-fluid border border-success bg-light">
        <hr>

        <div class="alert alert-success" role="alert">
            <center><strong>Nota:</strong> Si la información que se encuentra aquí es errónea o está desactualizada, se puede modificar
                dando clic en el botón de <strong>"<i class="bi bi-pencil-square"></i> Editar
                    Información"</strong> al final de la página.</center>
        </div>
        <hr>
        <?php
        $id = intval($_GET['id']);
        $sql = mysqli_query($conn, "SELECT * FROM clientes WHERE id='$id'");
        if (mysqli_num_rows($sql) == 0) {
            echo "<script>window.location = 'index.php'</script>";
        } else {
            $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <div class="panel panel-default">
            <hr>
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-search"></i> Visualización de la Información del empleado</h4>
            </div>
            <form name="form1" id="form1" class="form-horizontal row-fluid" action="visualizar.php" method="GET">
                <div class="input-group shadow-sm-auto">
                    <a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i> Regresar</a>
                </div>
                <!-- Datos personales -->
                <hr>
                <center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_datos_personales" role="button" aria-expanded="false" aria-controls="ref_datos_personales">
                        <i class="bi bi-arrow-down"></i> DATOS PERSONALES
                    </a></center>
                <div class="collapse show" id="ref_datos_personales">
                    <div class="card card-body">
                        <!-- información personal -->
                        <h5>Datos personales del empleado:</h5>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-auto" id="id">ID: </span>
                            <input class="form-control w-25" type="text" name="id" id="id" value="<?php echo $row['id']; ?>" readonly="readonly">
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" id="id">Nombres: </span>
                                <input class="form-control" type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" readonly="readonly">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" id="primer_apellido">Primer Apellido: </span>
                                <input class="form-control w-auto" type="text" name="primer_apellido" id="primer_apellido" value="<?php echo $row['primer_apellido']; ?>" readonly="readonly">
                            </div>
                            <div class="col">
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" id="segundo_apellido">Segundo Apellido: </span>
                                <input class="form-control w-auto" type="text" name="segundo_apellido" id="segundo_apellido" value="<?php echo $row['segundo_apellido']; ?>" readonly="readonly">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" id="cedula">Cédula: </span>
                                <input class="form-control w-auto" type="number" name="cedula" id="cedula" value="<?php echo $row['cedula']; ?>" readonly="readonly">
                            </div>
                            <div class="col">
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text  w-auto" id="exp_ced">Lugar de Expedición: </span>
                                <input class="form-control  w-auto" type="text" name="exp_ced" id="exp_ced" value="<?php echo $row['exp_ced']; ?>" readonly="readonly">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" id="fecha_expedicion">Fecha de Expedición: </span>
                                <input class="form-control" type="date" name="fecha_expedicion" id="fecha_expedicion" value="<?php echo $row['fecha_expedicion']; ?>" readonly="readonly">
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" id="fecha_nacimiento">Fecha de Nacimiento: </span>
                                <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" readonly="readonly">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="civil">Estado Civil: </label>
                                <input name="civil" id="civil" value="<?php echo $estados_civiles[$row['civil']] ?>" class="form-control" type="text" readonly="readonly">
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="genero">Género: </label>
                                <input name="genero" id="genero" value="<?php echo $generos[$row['genero']] ?>" class="form-control" type="text" readonly="readonly">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="raza">Raza: </label>
                                <input name="raza" id="raza" value="<?php echo $razas[$row['raza']] ?>" class="form-control" type="text" readonly="readonly">
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="rh">RH Sanguíneo: </label>
                                <input name="rh" id="rh" value="<?php echo $rhs[$row['rh']] ?>" class="form-control" type="text" readonly="readonly">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" id="hijos">Número de Hijos: </span>
                                <input name="hijos" id="hijos" value="<?php echo $row['hijos']; ?>" class="form-control" type="text" readonly="readonly" />
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" id="acargo">Personas a Cargo: </span>
                                <input name="acargo" id="acargo" value="<?php echo $row['acargo']; ?>" class="form-control" type="text" readonly="readonly" />
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" id="telefono">Número de Celular: </span>
                                <input name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>" class="form-control" type="text" readonly="readonly" />
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" id="email">Correo Electrónico: </span>
                                <input name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control" type="email" readonly="readonly" />
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" id="direccion">Dirección de Residencia: </label>
                                <input name="direccion" id="direccion" value="<?php echo $row['direccion']; ?>" class="form-control" type="text" readonly="readonly" />
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" id="estrato">Estrato socio-económico: </label>
                                <input name="estrato" id="estrato" value="<?php echo $row['estrato']; ?>" class="form-control" type="text" readonly="readonly" />
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="tip_vivi">Tipo de Vivienda: </label>
                                <input name="tip_vivi" id="tip_vivi" value="<?php echo $tipos_vivienda[$row['tip_vivi']] ?>" class="form-control" type="text" readonly="readonly" />
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="nucleo">Núcleo: </label>
                                <input name="nucleo" id="nucleo" value="<?php echo $nucleos[$row['nucleo']] ?>" class="form-control" type="text" readonly="readonly" />
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="cargo">Cargo: </label>
                                <input name="cargo" id="cargo" value="<?php echo $cargos[$row['cargo']] ?>" class="form-control" type="text" readonly="readonly" />
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="proceso">Proceso: </label>
                                <input name="proceso" id="proceso" value="<?php echo $procesos[$row['proceso']] ?>" class="form-control" type="text" readonly="readonly" />
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="estado">Estado: </label>
                                <input name="estado" id="estado" value="<?php echo $estadosEmpleado[$row['estado']] ?>" class="form-control" type="text" readonly="readonly" />
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" id="fecha_ingreso">Fecha de Ingreso: </label>
                                <input name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $row['fecha_ingreso']; ?>" class="form-control" type="date" readonly="readonly" />
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" id="fecha_ingreso">Fecha de Salida: </label>
                                <input name="fecha_salida" id="fecha_salida" value="<?php if (isset($row['fecha_salida']) && $row['fecha_salida'] != '0101-01-01') {
                                                                                        echo $row['fecha_salida'];
                                                                                    } ?>" class="form-control" type="date" readonly="readonly" />
                            </div>
                        </div>
                        <center>
                            <hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_datos_personales" role="button" aria-expanded="false" aria-controls="ref_datos_personales">
                                <i class="bi bi-arrow-up"></i> Cerrar Segmento
                            </a>
                        </center>
                    </div>
                </div> <!-- Cerrar DATOS PERSONALES -->
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
                            <span class="input-group-text w-25" for="camisa">(*) Talla camisa:</span>
                            <input name="camisa" id="camisa" required class="form-control" type="text" readonly value="<?php echo $rowTalla['camisa']; ?>">
                            <span class="input-group-text w-25" for="pantalon">(*) Talla pantalón:</span>
                            <input name="pantalon" id="pantalon" required class="form-control" type="text" readonly value="<?php echo $rowTalla['pantalon']; ?>">
                        </div>
                        <br>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-25" for="botas">(*) Talla botas:</span>
                            <input name="botas" id="botas" required class="form-control" type="text" readonly value="<?php echo $rowTalla['botas']; ?>">
                            <span class="input-group-text w-25" for="guayo">(*) Talla guayo:</span>
                            <input name="guayo" id="guayo" required class="form-control" type="text" readonly value="<?php echo $rowTalla['guayo']; ?>">
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
                                <label class="input-group-text w-auto" for="eps">EPS: </label>
                                <input name="eps" id="eps" value="<?php echo $epss[$row['eps']] ?>" class="form-control" type="text" readonly="readonly" />
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="pensiones">Fondo de Pensiones: </label>
                                <input name="pensiones" id="pensiones" value="<?php echo $pensiones[$row['pensiones']] ?>" class="form-control" type="text" readonly="readonly" />
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="caja">Caja de Compensación: </label>
                                <input name="caja" id="caja" value="<?php echo $cajas[$row['caja']]  ?>" class="form-control" type="text" readonly="readonly" />
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="servicio_funerario">Servicio funerario: </span>
                                <input type="text" style="text-transform:uppercase;" name="servicio_funerario" id="servicio_funerario" class="form-control" readonly value="<?php echo $row['servicio_funerario'] ?>">
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="enfermedad">Enfermedad o tratamiento médico: </label>
                                <input name="enfermedad" id="enfermedad" value="<?php $enfermedad = $row['enfermedad'] == 1 ? 'NO' : 'SI';
                                                                                echo $enfermedad; ?>" class="form-control" type="text" readonly="readonly" />
                            </div>
                        </div>

                        <center>
                            <hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_seguridad" role="button" aria-expanded="true" aria-controls="ref_seguridad">
                                <i class="bi bi-arrow-up"></i> Cerrar Segmento
                            </a>
                        </center>
                    </div>
                </div>
        </div>
        </hr>
        <hr>
        <?php
        $id = intval($_GET['id']);
        $sql_cliente_curso = mysqli_query($conn, "SELECT * FROM cliente_academico WHERE id_cliente='$id'");
        if (mysqli_num_rows($sql_cliente_curso) == 0) {
            echo "<script>window.location = 'index.php'</script>";
        } else {
            $row_curso = mysqli_fetch_assoc($sql);
        } ?>

        <!-- Información académica -->
        <center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_academica" role="button" aria-expanded="false" aria-controls="ref_academica">
                <i class="bi bi-arrow-down"></i> INFORMACIÓN ACADÉMICA
            </a></center>
        <div class="collapse show" id="ref_academica">
            <div class="card card-body">
                <h5>Datos de estudio:</h5>
                <div class="d-flex">
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="curso">Nivel Educativo: </label>
                        <input name="curso" id="curso" value="<?php if (isset($row_curso['curso'])) {
                                                                    echo $row_curso['curso'];
                                                                } ?>" class="form-control" type="text" readonly />
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="completado">Completado: </label>
                        <input name="completado" id="completado" value="<?php if (isset($row_curso['completado'])) {
                                                                            echo $row_curso['completado'];
                                                                        } ?>" class="form-control" type="text" readonly />
                    </div>
                </div>
                <br>
                <div class="d-flex">
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="semestre">Años/Semestres completados: </label>
                        <input name="semestre" id="semestre" value="<?php if (isset($row_curso['semestres'])) {
                                                                        echo $row_curso['semestres'];
                                                                    } ?>" class="form-control" type="number" readonly />
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="titulo">Nombre de titulo obtenido: </label>
                        <input name="titulo" id="titulo" value="<?php if (isset($row_curso['titulo'])) {
                                                                    echo $row_curso['titulo'];
                                                                } ?>" class="form-control" type="text" readonly />
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
                            <input type="text" name="nombre_curso1" id="nombre_curso1" value="<?php if (isset($cliente_cursos_cortos[0][0])) {
                                                                                                    echo $cliente_cursos_cortos[0][0];
                                                                                                } ?>" class="form-control" readonly>
                        </div>
                        <br>
                        <div class="input-group shadow-sm">
                            <label class="input-group-text w-auto" for="entidad_curso1"> Entidad: </label>
                            <input type="text" name="entidad_curso1" id="entidad_curso1" value="<?php if (isset($cliente_cursos_cortos[0][2])) {
                                                                                                    echo $cliente_cursos_cortos[0][2];
                                                                                                } ?>" class="form-control" readonly>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="duracion_curso1"> Duracion del curso: </label>
                                <input type="text" name="duracion_curso1" id="duracion_curso1" value="<?php if (isset($cliente_cursos_cortos[0][1])) {
                                                                                                            echo $cliente_cursos_cortos[0][1];
                                                                                                        } ?>" class="form-control" readonly>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="tiempo_curso1"> Año del curso: </label>
                                <input type="text" name="tiempo_curso1" id="tiempo_curso1" value="<?php if (isset($cliente_cursos_cortos[0][3])) {
                                                                                                        echo $cliente_cursos_cortos[0][3];
                                                                                                    } ?>" class="form-control" readonly>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="certificado_curso1"> Titulo certificado: </label>
                                <input type="text" name="certificado_curso1" id="certificado_curso1" value="<?php if (isset($cliente_cursos_cortos[0][4]) == '' || '0') {
                                                                                                                echo 'NO';
                                                                                                            } else {
                                                                                                                echo 'SI';
                                                                                                            } ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <center>
                            <hr><a class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="collapse" href="#curso1" role="button" aria-expanded="true" aria-controls="curso1">
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
                            <input type="hidden" id="id_curso2" name="id_curso2" value="<?php if (isset($cliente_cursos_cortos[1][5])) {
                                                                                            echo $cliente_cursos_cortos[1][5];
                                                                                        } ?>">
                            <label class="input-group-text w-auto" for="nombre_curso2"> Nombre del curso: </label>
                            <input type="text" name="nombre_curso2" id="nombre_curso2" value="<?php if (isset($cliente_cursos_cortos[1][0])) {
                                                                                                    echo $cliente_cursos_cortos[1][0];
                                                                                                } ?>" class="form-control" readonly>
                        </div>
                        <br>
                        <div class="input-group shadow-sm">
                            <label class="input-group-text w-auto" for="entidad_curso2"> Entidad: </label>
                            <input type="text" name="entidad_curso2" id="entidad_curso2" value="<?php if (isset($cliente_cursos_cortos[1][2])) {
                                                                                                    echo $cliente_cursos_cortos[1][2];
                                                                                                } ?>" class="form-control" readonly>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="duracion_curso2"> Duración del curso: </label>
                                <input type="text" name="duracion_curso2" id="duracion_curso2" value="<?php if (isset($cliente_cursos_cortos[1][1])) {
                                                                                                            echo $cliente_cursos_cortos[1][1];
                                                                                                        } ?>" class="form-control" readonly>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="tiempo_curso2"> Año del curso: </label>
                                <input type="text" maxlength="4" name="tiempo_curso2" id="tiempo_curso2" value="<?php if (isset($cliente_cursos_cortos[1][3])) {
                                                                                                                    echo $cliente_cursos_cortos[1][3];
                                                                                                                } ?>" class="form-control" readonly>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="certificado_curso2"> Titulo certificado: </label>
                                <input type="text" name="certificado_curso2" id="certificado_curso2" value="<?php if (isset($cliente_cursos_cortos[1][4]) == '' || '0') {
                                                                                                                echo 'NO';
                                                                                                            } else {
                                                                                                                echo 'SI';
                                                                                                            } ?>" class="form-control" readonly>

                            </div>
                        </div>
                        <center>
                            <hr><a class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="collapse" href="#curso2" role="button" aria-expanded="true" aria-controls="curso2">
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
                <div class="collapse" id="curso3">
                    <div class="card card-body">
                        <div class="input-group shadow-sm">
                            <input type="hidden" id="id_curso3" name="id_curso3" value="<?php if (isset($cliente_cursos_cortos[2][5])) {
                                                                                            echo $cliente_cursos_cortos[2][5];
                                                                                        } ?>">
                            <label class="input-group-text w-auto" for="nombre_curso3"> Nombre del curso: </label>
                            <input type="text" name="nombre_curso3" id="nombre_curso3" value="<?php if (isset($cliente_cursos_cortos[2][0])) {
                                                                                                    echo $cliente_cursos_cortos[2][0];
                                                                                                } ?>" class="form-control" readonly>
                        </div>
                        <br>
                        <div class="input-group shadow-sm">
                            <label class="input-group-text w-auto" for="entidad_curso3"> Entidad: </label>
                            <input type="text" name="entidad_curso3" id="entidad_curso3" value="<?php if (isset($cliente_cursos_cortos[2][2])) {
                                                                                                    echo $cliente_cursos_cortos[2][2];
                                                                                                } ?>" class="form-control" readonly>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="duracion_curso3"> Duración del curso: </label>
                                <input type="text" name="duracion_curso3" id="duracion_curso3" value="<?php if (isset($cliente_cursos_cortos[2][1])) {
                                                                                                            echo $cliente_cursos_cortos[2][1];
                                                                                                        } ?>" class="form-control" readonly>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="tiempo_curso3"> Año del curso: </label>
                                <input type="text" maxlength="4" name="tiempo_curso3" id="tiempo_curso3" value="<?php if (isset($cliente_cursos_cortos[2][3])) {
                                                                                                                    echo $cliente_cursos_cortos[2][3];
                                                                                                                } ?>" class="form-control" readonly>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="certificado_curso3"> Titulo certificado: </label>
                                <input type="text" name="certificado_curso3" id="certificado_curso3" value="<?php if (isset($cliente_cursos_cortos[2][4]) == '' || '0') {
                                                                                                                echo 'NO';
                                                                                                            } else {
                                                                                                                echo 'SI';
                                                                                                            } ?>" class="form-control" readonly>

                            </div>
                        </div>
                        <center>
                            <hr><a class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="collapse" href="#curso3" role="button" aria-expanded="true" aria-controls="curso3">
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
                <div class="collapse" id="curso4">
                    <div class="card card-body">
                        <div class="input-group shadow-sm">
                            <input type="hidden" id="id_curso4" name="id_curso4" value="<?php if (isset($cliente_cursos_cortos[3][5])) {
                                                                                            echo $cliente_cursos_cortos[3][5];
                                                                                        } ?>">
                            <label class="input-group-text w-auto" for="nombre_curso4"> Nombre del curso: </label>
                            <input type="text" name="nombre_curso4" id="nombre_curso4" value="<?php if (isset($cliente_cursos_cortos[3][0])) {
                                                                                                    echo $cliente_cursos_cortos[3][0];
                                                                                                } ?>" class="form-control" readonly>
                        </div>
                        <br>
                        <div class="input-group shadow-sm">
                            <label class="input-group-text w-auto" for="entidad_curso4"> Entidad: </label>
                            <input type="text" name="entidad_curso4" id="entidad_curso4" value="<?php if (isset($cliente_cursos_cortos[3][2])) {
                                                                                                    echo $cliente_cursos_cortos[3][2];
                                                                                                } ?>" class="form-control" readonly>
                        </div>

                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="duracion_curso4"> Duración del curso: </label>
                                <input type="text" name="duracion_curso4" id="duracion_curso4" value="<?php if (isset($cliente_cursos_cortos[3][1])) {
                                                                                                            echo $cliente_cursos_cortos[3][1];
                                                                                                        } ?>" class="form-control" readonly>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="tiempo_curso4"> Año del curso: </label>
                                <input type="text" maxlength="4" name="tiempo_curso4" id="tiempo_curso4" value="<?php if (isset($cliente_cursos_cortos[3][3])) {
                                                                                                                    echo $cliente_cursos_cortos[3][3];
                                                                                                                } ?>" class="form-control" readonly>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="certificado_curso4"> Titulo certificado: </label>
                                <input type="text" name="certificado_curso4" id="certificado_curso4" value="<?php if (isset($cliente_cursos_cortos[3][4]) == '' || '0') {
                                                                                                                echo 'NO';
                                                                                                            } else {
                                                                                                                echo 'SI';
                                                                                                            } ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <center>
                            <hr><a class="btn btn-outline-primary btn-sm float-right" data-bs-toggle="collapse" href="#curso4" role="button" aria-expanded="true" aria-controls="curso4">
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
                    <input type="text" name="vehiculo" id="vehiculo" readonly class="form-control" value="<?php if (isset($rowVehiculo['vehiculo'])) {
                                                                                                                echo $rowVehiculo['vehiculo'];
                                                                                                            } ?>">
                </div>
                <br>
                <div class="d-flex">
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-auto" for="ven_soat">Vencimiento del soat: </span>
                        <input type="date" name="ven_soat" id="ven_soat" readonly class="form-control" value="<?php if (isset($rowVehiculo['ven_soat']) && $rowVehiculo['ven_soat'] != '0101-01-01') {
                                                                                                                    echo $rowVehiculo['ven_soat'];
                                                                                                                } ?>">
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-auto" for="ven_tecnomecanica">Vencimiento de la tecno-mecánica: </span>
                        <input type="date" name="ven_tecnomecanica" id="ven_tecnomecanica" readonly class="form-control" value="<?php if (isset($rowVehiculo['ven_tecnomecanica']) && $rowVehiculo['ven_tecnomecanica'] != '0101-01-01') {
                                                                                                                                    echo $rowVehiculo['ven_tecnomecanica'];
                                                                                                                                } ?>">
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
                    <input name="empresa" id="empresa" class=" form-control" type="text" readonly value="<?php if (isset($cliente_laboral[0][0])) {
                                                                                                                echo $cliente_laboral[0][0];
                                                                                                            } ?>">
                </div>
                <br>
                <div class="d-flex">
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-auto" for="jefe">Jefe inmediato: </span>
                        <input type="text" style="text-transform:uppercase;" name="jefe" id="jefe" class="form-control" readonly value="<?php if (isset($cliente_laboral[0][1])) {
                                                                                                                                            echo $cliente_laboral[0][1];
                                                                                                                                        } ?>">
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-auto" for="telefonoE">Teléfono de contacto: </span>
                        <input type="number" name="telefonoE" id="telefonoE" class="form-control" readonly value="<?php if (isset($cliente_laboral[0][2])) {
                                                                                                                        echo $cliente_laboral[0][2];
                                                                                                                    } ?>">
                    </div>
                </div>
                <br>
                <div class="d-flex">
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="cargoE">Cargo: </label>
                        <input type="text" style="text-transform:uppercase;" name="cargoE" id="cargoE" class="form-control" readonly value="<?php if (isset($cliente_laboral[0][3])) {
                                                                                                                                                echo $cliente_laboral[0][3];
                                                                                                                                            } ?>">
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-auto" for="tiempo_exp">Tiempo de experiencia: </span>
                        <input type="number" name="tiempo_exp" id="tiempo_exp" class="form-control" readonly value="<?php if (isset($cliente_laboral[0][4])) {
                                                                                                                        echo $cliente_laboral[0][4];
                                                                                                                    } ?>">
                        <input type="text" class="form-control w-25" readonly value="MESES">
                    </div>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="motivo">(*) Motivo de retiro: </label>
                    <textarea type="text" name="motivo" id="motivo" class="form-control" readonly><?php if (isset($cliente_laboral[0][5])) {
                                                                                                        echo $cliente_laboral[0][5];
                                                                                                    } ?></textarea>
                </div>
                <br>
                <hr>

                <!-- Referencia laboral 2 -->
                <h5>Datos segunda referencia laboral:</h5>
                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="empresa2">(*) Empresa: </span>
                    <input name="empresa2" id="empresa2" class=" form-control" type="text" readonly value="<?php if (isset($cliente_laboral[1][0])) {
                                                                                                                echo $cliente_laboral[1][0];
                                                                                                            } ?>">
                </div>
                <br>
                <div class="d-flex">
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-auto" for="jefe2">Jefe inmediato: </span>
                        <input type="text" style="text-transform:uppercase;" name="jefe2" id="jefe2" class="form-control" readonly value="<?php if (isset($cliente_laboral[1][1])) {
                                                                                                                                                echo $cliente_laboral[1][1];
                                                                                                                                            } ?>">
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-auto" for="telefonoE2">Teléfono del contacto: </span>
                        <input type="number" name="telefonoE2" id="telefonoE2" class="form-control" readonly value="<?php if (isset($cliente_laboral[1][2])) {
                                                                                                                        echo $cliente_laboral[1][2];
                                                                                                                    } ?>">
                    </div>
                </div>
                <br>
                <div class="d-flex">
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="cargoE2">Cargo: </label>
                        <input type="text" style="text-transform:uppercase;" name="cargoE2" id="cargoE2" class="form-control" readonly value="<?php if (isset($cliente_laboral[1][3])) {
                                                                                                                                                    echo $cliente_laboral[1][3];
                                                                                                                                                } ?>">
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <span class="input-group-text w-auto" for="tiempo_exp2">Tiempo de experiencia: </span>
                        <input type="number" name="tiempo_exp2" id="tiempo_exp2" class="form-control" readonly value="<?php if (isset($cliente_laboral[1][4])) {
                                                                                                                            echo $cliente_laboral[1][4];
                                                                                                                        } ?>">
                        <input type="text" class="form-control w-25" readonly value="MESES">
                    </div>
                </div>
                <br>
                <div class="input-group shadow-sm">
                    <label class="input-group-text w-auto" for="motivo2">(*) Motivo de retiro: </label>
                    <textarea type="text" name="motivo2" id="motivo2" readonly class="form-control"><?php if (isset($cliente_laboral[1][5])) {
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
        <?php $consultaContacto = mysqli_query($conn, "SELECT * FROM cliente_contacto WHERE id_empleado=$id");
        $cliente_contacto = array();
        while ($resultadoContacto = mysqli_fetch_assoc($consultaContacto)) {
            $nombre_contacto = $resultadoContacto['nombre_contacto'];
            $parentesco = $parentescos[$resultadoContacto['parentesco']];
            $numero = $resultadoContacto['numero'];
            $parentesco_id = $resultadoContacto['parentesco'];
            $id_contacto = $resultadoContacto['id'];
            $contacto_directo = $resultadoContacto['contacto_directo'];
            array_push($cliente_contacto, ["$nombre_contacto", "$parentesco", "$numero", "$parentesco_id", "$id_contacto", "$contacto_directo"]);
        } ?>
        <center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_personales" role="button" aria-expanded="false" aria-controls="ref_personales">
                <i class="bi bi-arrow-down"></i> REFERENCIAS PERSONALES
        </center></a>
        <div id="ref_personales" class="collapse show">
            <div class="card card-body">
                <!-- Referencia personal # 1 -->
                <h5>Datos primera referencia personal:</h5>
                <div class="input-group shadow-sm">
                    <label class="input-group-text w-auto" for="nombre_contacto">(*) Nombre del contacto: </label>
                    <input type="text" style="text-transform:uppercase;" name="nombre_contacto" id="nombre_contacto" class="form-control" readonly value="<?php if (isset($cliente_contacto[0][0])) {
                                                                                                                                                                echo $cliente_contacto[0][0];
                                                                                                                                                            } ?>">
                </div>
                <br>
                <div class="d-flex">
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="parentesco">(*) Parentesco: </label>
                        <input type="text" name="parentesco" id="parentesco" class="form-control" readonly value="<?php if (isset($cliente_contacto[0][1])) {
                                                                                                                        echo $cliente_contacto[0][1];
                                                                                                                    } ?>">
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="numero">(*) Número de celular: </label>
                        <input type="number" name="numero" id="numero" class="form-control" readonly value="<?php if (isset($cliente_contacto[0][2])) {
                                                                                                                echo $cliente_contacto[0][2];
                                                                                                            } ?>">
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="contacto_directo1"> Contacto Directo: </label>
                        <input type="text" name="contacto_directo1" id="contacto_directo1" class="form-control" readonly value="<?php if (isset($cliente_contacto[0][6]) == '' || '0') {
                                                                                                                                    echo 'NO';
                                                                                                                                } else {
                                                                                                                                    echo 'SI';
                                                                                                                                } ?>">
                    </div>
                </div>
                <br>
                <hr>

                <!-- Referencia personal 2 -->
                <h5>Datos segunda referencia personal:</h5>
                <div class="input-group shadow-sm">
                    <label class="input-group-text w-auto" for="nombre_contacto2">(*) Nombre del contacto: </label>
                    <input type="text" style="text-transform:uppercase;" name="nombre_contacto2" id="nombre_contacto2" class="form-control" readonly value="<?php if (isset($cliente_contacto[1][0])) {
                                                                                                                                                                echo $cliente_contacto[1][0];
                                                                                                                                                            } ?>">
                </div>
                <br>
                <div class="d-flex">
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="parentesco2">(*) Parentesco: </label>
                        <input type="text" name="parentesco2" id="parentesco2" class="form-control" readonly value="<?php if (isset($cliente_contacto[1][1])) {
                                                                                                                        echo $cliente_contacto[1][1];
                                                                                                                    } ?>">
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="numero2">(*) Número de celular: </label>
                        <input type="number" name="numero2" id="numero2" class="form-control" readonly value="<?php if (isset($cliente_contacto[1][2])) {
                                                                                                                    echo $cliente_contacto[1][2];
                                                                                                                } ?>">
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="contacto_directo2"> Contacto Directo: </label>
                        <input type="text" name="contacto_directo2" id="contacto_directo2" class="form-control" readonly value="<?php if (isset($cliente_contacto[1][6]) == '' || '0') {
                                                                                                                                    echo 'NO';
                                                                                                                                } else {
                                                                                                                                    echo 'SI';
                                                                                                                                } ?>">
                    </div>
                </div>
                <br>
                <hr>
                <!-- Referencia personal 3 -->
                <h5>Datos tercera referencia personal:</h5>
                <div class="input-group shadow-sm">
                    <label class="input-group-text w-auto" for="nombre_contacto3">(*) Nombre del contacto: </label>
                    <input type="text" style="text-transform:uppercase;" name="nombre_contacto3" id="nombre_contacto3" class="form-control" readonly value="<?php if (isset($cliente_contacto[2][0])) {
                                                                                                                                                                echo $cliente_contacto[2][0];
                                                                                                                                                            } ?>">
                </div>
                <br>
                <div class="d-flex">
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="parentesco3">(*) Parentesco: </label>
                        <input type="text" name="parentesco3" id="parentesco3" class="form-control" readonly value="<?php if (isset($cliente_contacto[2][1])) {
                                                                                                                        echo $cliente_contacto[2][1];
                                                                                                                    } ?>">
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="numero3">(*) Número de celular: </label>
                        <input type="number" name="numero3" id="numero3" class="form-control" readonly value="<?php if (isset($cliente_contacto[2][2])) {
                                                                                                                    echo $cliente_contacto[2][2];
                                                                                                                } ?>">
                    </div>&nbsp;
                    <br>
                    <div class="input-group shadow-sm">
                        <label class="input-group-text w-auto" for="contacto_directo3"> Contacto Directo: </label>
                        <input type="text" name="contacto_directo3" id="contacto_directo3" class="form-control" readonly value="<?php if (isset($cliente_contacto[2][6]) == '' || '0') {
                                                                                                                                    echo 'NO';
                                                                                                                                } else {
                                                                                                                                    echo 'SI';
                                                                                                                                } ?>">
                    </div>
                </div>
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
                    <h6>Para modificar y actualizar la información del empleado, dar clic en el siguiente botón de Editar información o de lo contrario en el botón de Cancelar:</h6>
                    <div class="controls">
                        <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i> Editar Información</a>
                        <a href="index.php" class="btn btn-sm btn-secondary btn btn-block"><i class="bi bi-x-circle"></i> Cancelar</a>
                </center>
            </div>
        </div>
        </form>
        <br>
    </div>
    <div class="card-footer">
        <div class="container">
            <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios
                    Forestales </b></center>
        </div>
    </div>

    <!-- habilitar javascript -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>