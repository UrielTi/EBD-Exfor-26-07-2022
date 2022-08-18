<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("headOld.php"); ?>

</head>
<?php
include "../../include/conn/conn.php";
include "../../cond/todo.php";
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
        <?php $id = intval($_GET['id']);
        $sql = mysqli_query($conn, "SELECT * FROM documentos_obsoletos WHERE id='$id'");
        if (mysqli_num_rows($sql) == 0) {
            header("Location: index.php");
        } else {
            $row = mysqli_fetch_assoc($sql);
            $id_documento = $row['id_documento'];
            $cons = sprintf("%02d", $row['consecutivo']);
            $vers = sprintf("%02d", $row['version']);
        }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-search"></i> Visualización del documento antiguo</h4>
                <div class="input-group shadow-sm-auto">
                    <a href="oldversions.php?id=<?php echo $id_documento; ?>" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i> Regresar</a>
                </div>
            </div>
            <hr>
            <form name="form1" id="form1" class="form-horizontal row-fluid" action="visualizar.php" method="GET" enctype="multipart/form-data">
                
                <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>" readonly="readonly">
                
                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="codigo">(*) Codigo: </span>
                    <input type="text" name="codigo" id="codigo" class="form-control" value="<?php echo $row['codigo']; ?>" readOnly>
                </div>
                <br>

                <!-- Edición del código del Documento -->
                <div class="input-group shadow-sm">
                    <span class="input-group-text w-auto" for="proceso">(*) Proceso: </span>
                    <select class="form-select" name="select_proceso" id="select_proceso" aria-label="Default select example" disabled>
                        <option value="<?php echo $row['proceso']; ?>" selected><?php echo $row['proceso']; ?></option>
                    </select>
                    <span class="input-group-text w-auto" for="codigo">(*) Tipo: </span>
                    <select class="form-select" id="select_tipo" name="select_tipo" aria-label="Default select example" disabled>
                        <option value="<?php echo $row['tipo']; ?>" selected><?php echo $row['tipo']; ?></option>
                    </select>
                    <span class="input-group-text w-auto" for="consecutivo">(*) Consecutivo: </span>
                    <select class="form-select" id="select_consecutivo" name="select_consecutivo" aria-label="Default select example" disabled>
                        <option value="<?php echo $cons; ?>" selected><?php echo $cons; ?></option>
                    </select>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="sistema">Sistema: </span>
                    <input class="form-control" name="sistema" id="sistema" type="text" value="<?php echo $row['sistema'] ?>" readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="aprobacion">Aprobacion: </span>
                    <input class="form-control" name="aprobacion" id="aprobacion" type="text" value="<?php echo $row['aprobacion']; ?>" readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="nombres">Nombre: </span>
                    <input type="text" style="text-transform:uppercase;" name="nombres" id="nombres" class="form-control" placeholder="INGRESA EL NOMBRE DEL ELEMENTO" value="<?php echo $row['nombre']; ?>" required readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="u_fisica">Ubicacion fisica: </span>
                    <input name="u_fisica" id="u_fisica" class=" form-control" type="text" placeholder="UBICACION FISICA DEL ELEMENTO" value="<?php echo $row['u_fisica']; ?>" required readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="u_digital">Ubicacion digital: </span>
                    <input type="text" style="text-transform:uppercase;" name="u_digital" id="u_digital" class="form-control" placeholder="UBICACION DIGITAL DEL ELEMENTO" value="<?php echo $row['u_digital']; ?>" required readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="version">Version: </span>
                    <input name="version" id="version" class="form-control" placeholder="Version" type="number" value="<?php echo $vers; ?>" required readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="origen">Origen: </span>
                    <input class="form-control" name="origen" id="origen" type="text" list="origenList" value="<?php echo $row['origen']; ?>" readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="personaE">Persona que elaboro: </span>
                    <input name="personaE" id="personaE" class=" form-control" type="text" placeholder="PERSONA QUE ELABORO" value="<?php echo $row['personaE']; ?>" required readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="personaA">Persona que aprobo: </span>
                    <input name="personaA" style="text-transform:uppercase;" id="personaA" class=" form-control" type="text" placeholder="PERSONA QUE APROBO" value="<?php echo $row['personaA']; ?>" required readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="estado">Estado: </span>
                    <input class="form-control" name="estado" id="estado" type="text" value="<?php echo $row['estado'] ?>" readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="actualizado">(*) Fecha de actualizacion: </span>
                    <input name="actualizado" id="actualizado" class=" form-control" type="date" value="<?php echo $row['actualizado'] ?>" readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="revisado">(*) Fecha de revisado: </span>
                    <input name="revisado" id="revisado" class=" form-control" type="date" value="<?php echo $row['revisado'] ?>" readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="vigente_desde">(*) Vigente desde: </span>
                    <input name="vigente_desde" id="vigente_desde" class=" form-control" type="date" value="<?php echo $row['vigente_desde'] ?>" readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="tiempoR1">(*) Tiempo de Retención inicial: </span>
                    <input value="<?php echo $row['tiempo_r1'];?>" class="form-control" type="date" readonly>
                    <span class="input-group-text" for="tiempoR2">(*) Tiempo de Retención final </span>
                    <input value="<?php echo $row['tiempo_r2'];?>" class="form-control" type="date" readonly>
                </div>
                <br>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="archivo">Archivo: </span>
                    <input name="archivo" id="archivo" class=" form-control" type="text" value="<?php echo $row['archivo']; ?>" required readonly>
                </div>
                <br>
                <div class="card card-body">
                    <div class="control-group">
                        <center>
                            <h6>Para modificar y actualizar la información del empleado, dar clic en el siguiente botón de Editar información o de lo contrario en el botón de Cancelar:</h6>
                            <div class="controls">
                                <a href="old_editar.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Editar Información</a>
                                <a href="oldversions.php?id=<?php echo $id_documento; ?>" class="btn btn-secondary btn btn-block"><i class="bi bi-x-circle"></i> Cancelar</a>
                        </center>
                    </div>
                </div><br>
                <br>
            </form>
        </div>
    </div>
</body>