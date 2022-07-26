<?php
session_start();
include "../../include/conn/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <?php include("../head.php"); ?>
    </head>

<body>

    <div class="container-fluid border border-success bg-light">
        <hr>
        <div class="alert alert-success" role="alert">
            <center><strong>¡Hola!</strong> Asegúrate que la información que estas diligenciando esté actualizada hasta la fecha, <strong>¡Muchas Gracias!</strong></center>
        </div>
        <hr>
        <?php
        $id = intval($_GET['id']);
        $sql = mysqli_query($conn, "SELECT * FROM documentos_obsoletos WHERE id='$id'");
        if (mysqli_num_rows($sql) == 0) {
            echo '<div class="alert alert-danger alert-dismissable">&nbsp; Error 404 apartado no encontrado &nbsp;<a href="index.php"  class="btn btn-outline-danger" data-dismiss="alert" aria-hidden="true">Volver al menú principal &times;</a></div>';
        } else {
            $row = mysqli_fetch_assoc($sql);
            $banner = $row['nombre'];
            $id_documento = $row['id_documento'];
            $v = (int)$row['version'];
            // Condicional y ternario para el consecutivo sin digitar
            $cons_1 = $row['consecutivo'];
            $vers = sprintf("%02d", $row['version']);
            if ($cons_1 == '0') {
                $cod_1 = $row['codigo'];
                $cons = substr($cod_1, -3);
                $cons = str_replace(array("-"), '', $cons);
                $update_cons = mysqli_query($conn, "UPDATE documentos SET consecutivo='$cons' WHERE id='$id'") or die(mysqli_error($conn));
            } else {
                $cons_cr = $row['consecutivo'];
                $cons = sprintf("%02d", $cons_cr);
            }
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="h3"><i class="bi bi-clipboard2-pulse-fill"></i> Editar la información del documento obsoleto: <small class="text-success"><?php echo $banner; ?> V<?php echo $v; ?></small></p>
            </div>
            <form name="form1" id="form1" class="form-horizontal row-fluid" action="old_update.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">

                <div class="input-group shadow-sm">
                    <a href="oldversions.php?id=<?php echo $id_documento; ?>" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i> Regresar</a>
                </div>

                <hr>

                <p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>

                <div class="input-group shadow-sm">
                    <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>" readonly="readonly">
                    <input class="form-control" type="hidden" name="id_documento" id="id_documento" value="<?php echo $row['id_documento']; ?>" readonly="readonly">
                </div>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="codigo">(*) Codigo: </span>
                    <input type="text" name="codigo" id="codigo" class="form-control" value="<?php echo $row['codigo']; ?>" readOnly>
                </div>
                <br>

                <!-- Edición del código del Documento -->
                <div class="input-group shadow-sm">
                    <span class="input-group-text w-auto" for="proceso">(*) Proceso: </span>
                    <select class="form-select" name="select_proceso" id="select_proceso" aria-label="Default select example" value="<?php echo $row['proceso']; ?>">
                        <option value="<?php echo $row['proceso']; ?>" selected><?php echo $row['proceso']; ?></option>
                        <option value="">SELECCIONA</option>
                        <?php
                        $proceso = $conn->query("SELECT * FROM proceso");
                        while ($nombresP = mysqli_fetch_array($proceso)) {
                            $id_p = $nombresP['id'];
                            $select_proceso = $nombresP['proceso'];
                            echo '<option value="' . $id_p . '">' .  $select_proceso . '</option>';
                        }
                        ?>
                    </select>
                    <span class="input-group-text w-auto" for="codigo">(*) Tipo: </span>
                    <select class="form-select" id="select_tipo" name="select_tipo" aria-label="Default select example">
                        <option value="<?php echo $row['tipo']; ?>" selected><?php echo $row['tipo']; ?></option>
                        <option value="">SELECCIONA</option>
                        <?php
                        $tipo = $conn->query("SELECT * FROM tipodc");
                        while ($nombresT = mysqli_fetch_array($tipo)) {
                            $id_t = $nombresT['id'];
                            $select_tipo = $nombresT['tipo'];
                            echo '<option value="' . $id_t . '">' . $select_tipo . '</option>';
                        }
                        ?>
                    </select>
                    <span class="input-group-text w-auto" for="consecutivo">(*) Consecutivo: </span>
                    <select class="form-select" id="select_consecutivo" name="select_consecutivo" aria-label="Default select example">
                        <option value="<?php echo $cons; ?>" selected><?php echo $cons; ?></option>
                        <option value="">SELECCIONA</option>
                        <?php
                        for ($i = 1;; $i++) {
                            if ($i > 500) {
                                break;
                            }
                            echo '<option value="' . $i . '">' . $i . '</option>';
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

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="sistema">(*) Sistema: </span>
                    <input class="form-control" name="sistema" id="sistema" type="text" list="sistemaList" placeholder="sistema" autocomplete="off" value="<?php echo $row['sistema']; ?>">
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
                    <input class="form-control" name="aprobacion" id="aprobacion" type="text" list="aprobacionList" placeholder="Aprobacion" value="<?php echo $row['aprobacion']; ?>" autocomplete="off">
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
                    <input type="text" style="text-transform:uppercase;" name="nombres" id="nombres" class="form-control" placeholder="INGRESA EL NOMBRE DEL ELEMENTO" value="<?php echo $row['nombre']; ?>" required>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="u_fisica">(*) Ubicacion fisica: </span>
                    <input name="u_fisica" id="u_fisica" class=" form-control" type="text" placeholder="UBICACION FISICA DEL ELEMENTO" value="<?php echo $row['u_fisica']; ?>" required>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="u_digital">(*) Ubicacion digital: </span>
                    <input type="text" style="text-transform:uppercase;" name="u_digital" id="u_digital" class="form-control" placeholder="UBICACION DIGITAL DEL ELEMENTO" value="<?php echo $row['u_digital']; ?>" required>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="version">(*) Version: </span>
                    <input name="version" id="version" class="form-control" placeholder="Version" type="number" value="<?php echo $vers; ?>">
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="origen">(*) Origen: </span>
                    <input class="form-control" name="origen" id="origen" type="text" list="origenList" placeholder="Origen" value="<?php echo $row['origen']; ?>" autocomplete="off">
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
                    <input name="personaE" id="personaE" class=" form-control" type="text" placeholder="PERSONA QUE ELABORO" value="<?php echo $row['personaE']; ?>" required>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="personaA">(*) Persona que aprobo: </span>
                    <input name="personaA" style="text-transform:uppercase;" id="personaA" class=" form-control" type="text" placeholder="PERSONA QUE APROBO" value="<?php echo $row['personaA']; ?>" required>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="estado">(*) Estado: </span>
                    <input class="form-control" name="estado" id="estado" type="text" list="estadoList" placeholder="estado" value="<?php echo $row['estado']; ?>" autocomplete="off">
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
                    <input name="actualizado" id="actualizado" class=" form-control" type="date" value="<?php echo $row['actualizado'] ?>">
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="revisado">(*) Fecha de revisado: </span>
                    <input name="revisado" id="revisado" class=" form-control" type="date" value="<?php echo $row['revisado'] ?>">
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="vigente_desde">(*) Vigente desde: </span>
                    <input name="vigente_desde" id="vigente_desde" class=" form-control" type="date" value="<?php echo $row['vigente_desde'] ?>">
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="archivo">(*) Archivo: </span>
                    <input name="archivo" id="archivo" class=" form-control" type="file">
                    <input readonly value="<?php echo $row['archivo'] ?>" name="documento_actual" class="form-control" type="text">
                </div>
                <br>

                <div class="control-group">
                    <center>
                        <h6>Para guardar los cambios realizados, dar clic en el siguiente botón de Actualizar o de lo contrario en el botón de Cancelar para salir:</h6>
                    </center>
                    <div class="controls">
                        <center><button type="submit" name="update" id="update" class="btn btn-sm btn-success"><i class="bi bi-clipboard2-check-fill"></i> Actualizar</button>
                            <a href="oldversions.php?id=<?php echo $id_documento; ?>" class="btn btn-sm btn-secondary btn-block"><i class="bi bi-clipboard2-x-fill"></i> Cancelar</a>
                        </center>
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

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>




</body>

</html>