<?php
include ("../login/userRestrintion.php");
include "../../include/conn/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("headOld.php"); ?>
</head>

<body>

    <div class="container-fluid border border-success bg-light">
        <hr>
        <div class="alert alert-success" role="alert">
            <center><strong>¡Hola!</strong> Recuerda que en este apartado registraras nuevas versiones obsoletas
                del documento, podras actualizar estos datos dando click en el botón <i class="bi bi-pencil-fill"></i> o en "Editar
                Información" en la visualización del documento <i class="bi bi-search"></i> , <strong>¡Muchas
                    Gracias!</strong></center>
        </div>
        <hr>
        <?php
        $id = intval($_GET['id']);
        $sql_actual = mysqli_query($conn, "SELECT nombre, version FROM documentos WHERE id='$id'");
        $row_actual = mysqli_fetch_assoc($sql_actual);
        $banner = $row_actual['nombre'];
        $v = (int)$row_actual['version'];
        ?>
        <?php
        if (isset($_POST['input'])) {
            // elementos de Codigo
            $select_consecutivo = mysqli_real_escape_string($conn, (strip_tags($_POST['select_consecutivo'], ENT_QUOTES)));
            $select_proceso = mysqli_real_escape_string($conn, (strip_tags($_POST['select_proceso'], ENT_QUOTES)));
            $select_tipo = mysqli_real_escape_string($conn, (strip_tags($_POST['select_tipo'], ENT_QUOTES)));
            // inputs de elementos
            $input_consecutivo = mysqli_real_escape_string($conn, (strip_tags($_POST['input_consecutivo'], ENT_QUOTES)));
            $input_proceso = mysqli_real_escape_string($conn, (strip_tags($_POST['input_proceso'], ENT_QUOTES)));
            $input_tipo = mysqli_real_escape_string($conn, (strip_tags($_POST['input_tipo'], ENT_QUOTES)));
            // Datos del documento
            $id_documento = mysqli_real_escape_string($conn, (strip_tags($_POST['id_documento'], ENT_QUOTES)));
            $nombre    = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
            $sistema  = mysqli_real_escape_string($conn, (strip_tags($_POST['sistema'], ENT_QUOTES)));
            $version  = mysqli_real_escape_string($conn, (strip_tags($_POST['version'], ENT_QUOTES)));
            $origen   = mysqli_real_escape_string($conn, (strip_tags($_POST['origen'], ENT_QUOTES)));
            $aprobacion   = mysqli_real_escape_string($conn, (strip_tags($_POST['aprobacion'], ENT_QUOTES)));
            $u_fisica   = mysqli_real_escape_string($conn, (strip_tags($_POST['u_fisica'], ENT_QUOTES)));
            $u_digital   = mysqli_real_escape_string($conn, (strip_tags($_POST['u_digital'], ENT_QUOTES)));
            $estado   = mysqli_real_escape_string($conn, (strip_tags($_POST['estado'], ENT_QUOTES)));
            $actualizado = mysqli_real_escape_string($conn, (strip_tags($_POST['actualizado'], ENT_QUOTES)));
            $revisado = mysqli_real_escape_string($conn, (strip_tags($_POST['revisado'], ENT_QUOTES)));
            $vigente_desde = mysqli_real_escape_string($conn, (strip_tags($_POST['vigente_desde'], ENT_QUOTES)));
            $personaE   = mysqli_real_escape_string($conn, (strip_tags($_POST['personaE'], ENT_QUOTES)));
            $personaA   = mysqli_real_escape_string($conn, (strip_tags($_POST['personaA'], ENT_QUOTES)));
            // Variables tiempo de retencion del documento.
            $tiempoR1 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempoR1'], ENT_QUOTES)));
            $tiempoR2 = mysqli_real_escape_string($conn, (strip_tags($_POST['tiempoR2'], ENT_QUOTES)));
            // Documento.
            $archivo   = mysqli_real_escape_string($conn, (strip_tags($_FILES['archivo']['name'], ENT_QUOTES)));

            $path = "oldfiles/" . $archivo;
            $extension = pathinfo($path, PATHINFO_EXTENSION);

            if ($_FILES['archivo']['error'] > 0) {
                echo "<script>alert('Error inesperado al subir el archivo'); window.location = 'oldregistro.php'</script>";
            } else {
                $limite_kb = 500;
                if ($_FILES["archivo"]["size"] <= ($limite_kb * 1024)) {
                    if ($extension == 'docx' || $extension == 'pptx' || $extension == 'xls' || $extension == 'xlsx' || $extension == 'pdf' || $extension == 'jpeg' || $extension == 'jpg' || $extension == 'png') {
                        $ruta = "../oldfiles/";
                        move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta . $archivo);
                    } else {
                        echo "<script>alert('El documento pesa mas de 500MB o no es del tipo WORD, EXCEL, PDF, POWER POINT, JPEG, PNG'); window.location = 'oldregistro.php'</script>";
                    }
                }
            }

            if ($actualizado === '') {
                $actualizado = '0101-01-01';
            }
            if ($revisado === '') {
                $revisado = '0101-01-01';
            }
            if ($vigente_desde === '') {
                $vigente_desde = '0101-01-01';
            }
            // Archivo generador de codigo de documento.
            include '../generadorCodigo.php';

            $insert = mysqli_query($conn, "INSERT INTO documentos_obsoletos (id, id_documento, sistema, aprobacion, codigo, nombre, u_fisica, u_digital, version, proceso, consecutivo, tipo, estado, origen, actualizado, revisado, vigente_desde, personaE, personaA, tiempo_r1, tiempo_r2, archivo)
							VALUES(NULL, '$id_documento', '$sistema', '$aprobacion', '$codigo', '$nombre', '$u_fisica', '$u_digital', '$version', '$proceso', '$consecutivo', '$tipo', '$estado', '$origen', '$actualizado', '$revisado', '$vigente_desde', '$personaE', '$personaA', '$tiempoR1', '$tiempoR2', '$archivo')") or die(mysqli_error($conn));
            if ($insert) {
                echo "<script>alert('Nueva version obsoleta registrada correctamente'); window.location = 'oldversions.php?id=$id'</script>";
            } else {
                echo "<script>alert('Nueva version obsoleta NO se ha podido registrar correctamente'); window.location = 'oldregistro.php?id=$id'</script>";
            }
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="h3"><i class="bi bi-clipboard2-plus-fill"></i> Registrar nueva versión obsoleta a: <small class="text-success"><?php echo $banner; ?> V<?php echo $v; ?></small></p>
            </div>

            <form name="form1" id="form1" class="form-horizontal row-fluid" action="oldregistro.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">

                <div class="control-group">
                    <div class="controls">
                        <a href="oldversions.php?id=<?php echo $id; ?>" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>

                <hr>

                <p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>

                <input class="form-control" name="id_documento" id="id_documento" type="hidden" value="<?php echo $id; ?>">

              <!-- Generación de código de documento -->
              <div class="input-group shadow-sm">
                    <span class="input-group-text w-auto" for="proceso">(*) Proceso: </span>
                    <select class="form-select" name="select_proceso" id="select_proceso" aria-label="Default select example" required>
                        <option value="" selected>SELECCIONA</option>
                        <?php
                        $proceso = $conn->query("SELECT * FROM proceso");
                        while ($nombresP = mysqli_fetch_array($proceso)) {
                            $id_p = $nombresP['id'];
                            $nombre_proc = $nombresP['proceso'];
                            echo '<option value="'.$id_p.'">'.$nombre_proc.'</option>';
                        }
                        ?>
                    </select>
                    <span class="input-group-text w-auto" for="codigo">(*) Tipo: </span>
                    <select class="form-select" id="select_tipo" name="select_tipo" aria-label="Default select example" required>
                        <option value="" selected>SELECCIONA</option>
                        <?php
                        $tipo = $conn->query("SELECT * FROM tipodc");
                        while ($nombresT = mysqli_fetch_array($tipo)) {
                            $id_t = $nombresT['id'];
                            $nombre_t = $nombresT['tipo'];
                            echo '<option value="'.$id_t.'">'.$nombre_t.'</option>';
                        }
                        ?>
                    </select>
                    <span class="input-group-text w-auto" for="codigo">(*) Consecutivo: </span>
                    <select class="form-select" id="select_consecutivo" name="select_consecutivo" aria-label="Default select example" required>
                        <option value="" selected>SELECCIONA</option>
                        <?php
                        for ($i = 1; ; $i++) {
                            if ($i > 500) {
                                break;
                            }
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                    </select>
                    <span class="input-group-text" id="basic-addon1">Código</span>
                    <input type="text" name="input_proceso" id="input_proceso" class="form-control" placeholder="#" readonly>
                    <span class="input-group-text">-</span>
                    <input type="text" name="input_tipo" id="input_tipo" class="form-control" placeholder="#" readonly>
                    <span class="input-group-text">-</span>
                    <input type="text" name="input_consecutivo" id="input_consecutivo" class="form-control" placeholder="#" readonly>
                </div>
                <br>
               <!-- Datos del documento -->
               <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="sistema">(*) Sistema: </span>
                    <input class="form-control" onkeyup="mayus(this);" name="sistema" id="sistema" type="text" list="sistemaList" placeholder="INGRESA SISTEMA DEL DOCUMENTO " autocomplete="off">
                    <datalist id="sistemaList">
                        <?php
                        $sistema = $conn->query("SELECT * FROM sistemadc");
                        while ($nombresS = mysqli_fetch_array($sistema)) {
                            echo '<option value="' . $nombresS['sistema'] . '"></option>';
                        }
                        ?>
                    </datalist>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="aprobacion">(*) Aprobacion: </span>
                    <input class="form-control" name="aprobacion" id="aprobacion" type="text" list="aprobacionList" placeholder="INGRESA ESTADO DE APROBACIÓN DEL DOCUMENTO" autocomplete="off">
                    <datalist id="aprobacionList">
                        <?php
                        $aprobacion = $conn->query("SELECT * FROM aprobaciondc");
                        while ($nombresA = mysqli_fetch_array($aprobacion)) {
                            echo '<option value="' . $nombresA['nombre'] . '"></option>';
                        }
                        ?>
                    </datalist>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="nombres">(*) Nombre: </span>
                    <input type="text" onkeyup="mayus(this);" name="nombres" id="nombres" class="form-control" placeholder="INGRESA EL NOMBRE DEL DOCUMENTO" required>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="u_fisica">(*) Ubicacion fisica: </span>
                    <input onkeyup="mayus(this);" name="u_fisica" id="u_fisica" class=" form-control" type="text" placeholder="UBICACIÓN FÍSICA DEL DOCUMENTO" required>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="u_digital">(*) Ubicacion digital: </span>
                    <input onkeyup="mayus(this);" type="text" name="u_digital" id="u_digital" class="form-control" placeholder="UBICACIÓN DIGITAL DEL DOCUMENTO" required>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="version">(*) Version: </span>
                    <input name="version" id="version" class="form-control" placeholder="VERSIÓN DEL DOCUMENTO" type="number" step="0.1" required>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="origen">(*) Origen: </span>
                    <input class="form-control" name="origen" id="origen" type="text" list="origenList" placeholder="ORIGEN DEL DOCUMENTO" autocomplete="off">
                    <datalist id="origenList">
                        <?php
                        $origen = $conn->query("SELECT * FROM origendc");
                        while ($nombresO = mysqli_fetch_array($origen)) {
                            echo '<option value="' . $nombresO['origen'] . '"></option>';
                        }
                        ?>
                    </datalist>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="personaE">(*) Persona que elaboro: </span>
                    <input onkeyup="mayus(this);" name="personaE" id="personaE" class=" form-control" type="text" placeholder="PERSONA QUE ELABORÓ EL DOCUMENTO" required>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="personaA">(*) Persona que aprobo: </span>
                    <input onkeyup="mayus(this);" name="personaA" id="personaA" class=" form-control" type="text" placeholder="PERSONA QUE APROBÓ EL DOCUMENTO" required>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="estado">(*) Estado: </span>
                    <input class="form-control" name="estado" id="estado" type="text" list="estadoList" placeholder="ESTADO DEL DOCUMENTO" autocomplete="off">
                    <datalist id="estadoList">
                        <?php
                        $estado = $conn->query("SELECT * FROM estadodc");
                        while ($nombresE = mysqli_fetch_array($estado)) {
                            echo '<option value="' . $nombresE['estado'] . '"></option>';
                        }
                        ?>
                    </datalist>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="actualizado">(*) Fecha de actualizacion: </span>
                    <input name="actualizado" id="actualizado" class=" form-control" type="date">
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="revisado">(*) Fecha de revisado: </span>
                    <input name="revisado" id="revisado" class=" form-control" type="date">
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="vigente_desde">(*) Vigente desde: </span>
                    <input name="vigente_desde" id="vigente_desde" class=" form-control" type="date">
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="tiempoR1">(*) Tiempo de Retención inicial: </span>
                    <input name="tiempoR1" id="tiempoR1" class="form-control" type="date">
                    <span class="input-group-text" for="tiempoR2">(*) Tiempo de Retención final </span>
                    <input name="tiempoR2" id="tiempoR2" class="form-control" type="date">
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="archivo">(*) Archivo: </span>
                    <input name="archivo" id="archivo" class=" form-control" type="file" required>
                </div>
                <br>

                <div class="control-group">
                    <center>
                        <h6>Para registrar los cambios realizados, dar clic en el siguiente botón de Registrar o de lo contrario en el botón de Cancelar para salir:</h6>
                    </center>
                    <div class="controls">
                        <center><button type="submit" name="input" id="input" class="btn btn-sm btn-success"><i class="bi bi-file-earmark-check-fill"></i> Registrar</button>
                            <a href="index.php" class="btn btn-sm btn-secondary btn-block"><i class="bi bi-file-earmark-x-fill"></i> Cancelar</a>
                        </center>
                    </div>
                </div>
            </form>
        </div>
        <!--/.content-->
        <!--/.container-->
        <br>
        <!--/.wrapper-->
        <div class="card-footer">
            <div class="container">
                <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios
                        Forestales </b></center>
            </div>
        </div>

</body>

</html>