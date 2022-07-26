<?php
include("../include/conn/conn.php");
include('../cond/todo.php');
$sql = mysqli_query($conn, "SELECT id, cedula, primer_apellido, segundo_apellido, nombres, cargo, eps, nucleo, estado, fecha_ingreso, fecha_salida FROM clientes");
while ($row = mysqli_fetch_assoc($sql)) {
    /*$sqlcedula = mysqli_query($conn, "SELECT * FROM cliente_tallas WHERE id_empleado='" . $row['id'] . "'");*/
    $sqlAus = mysqli_query($conn, "SELECT id FROM ausentismo WHERE cedula='" . $row['cedula'] . "'");
?>
    <tr>
        <td width="10%"><?php echo $row['cedula'] ?></td>
        <td width="25%"><a onclick="loadData('bi bi-search',' Visualización del empleado','visualizar',<?php echo $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#mimodal">
                <?php echo $row['primer_apellido'] . ' ' . $row['segundo_apellido'] . ' ' . $row['nombres'] ?></a></td>

        <td width="10%"><?php echo $cargos[$row["cargo"]] ?></td>
        <td width="10%"><?php echo $epss[$row["eps"]] ?></td>
        <td width="5%"><?php echo $nucleosEmpleado[$row["nucleo"]] ?></td>
        <td width="15%"><a onclick="loadData('bi bi-search',' Editar, fecha y estado','editar_fecha_estado',<?php echo $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#mimodal">
                <?php if ($row['estado'] == 1) {

                    echo $estadosIngSal[$row["estado"]] . '<br>' . $row['fecha_ingreso'];
                } else {
                    if ($row['fecha_salida'] == '0101-01-01') {
                        $fecha_default = 'Sin Fecha de Salida';
                        echo $estadosIngSal[$row["estado"]] . '<br>' . $fecha_default;
                    } else {
                        echo $estadosIngSal[$row["estado"]] . '<br>' . $row['fecha_salida'];
                    }
                } ?> <i class="bi bi-pencil"></i></td>
        <td width="5%"><?php echo $estados[$row["estado"]] ?></td>


        <td>
            <a href="visualizar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Ver" class="btn btn-sm btn-secondary"> <i class="bi bi-search"></i> </a>

            <a href="excelEmpleado.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Descargar hoja de vida" class="btn btn-sm btn-primary"> <i class="bi bi-file-earmark-arrow-down"></i> </a>

            <a href="editar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-success"> <i class="bi bi-pencil-fill"></i> </a>

            <?php if (mysqli_num_rows($sqlAus) > 0) { ?>
                <a onclick="loadData('bi bi-heart-fill',' Visualizar ausentismo del empleado','ausentismo','<?php echo $row['cedula'] ?>')" data-toggle="tooltip" title="Ausentismo" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#mimodal"> <i class="bi bi-heart-fill"></i> </a>
            <?php } else { ?>
                <a onclick="mensaje()" data-toggle="tooltip" title="Ausentismo" class="btn btn-sm btn-info"> <i class="bi bi-heart-fill"></i> </a>
            <?php } ?>

            <?php if ($row['estado'] == 1) { ?>
                <a onclick="inactivo()" href="cambiarEstado.php?cambio=activo&id=<?php echo $row['id']; ?>" title="Cambiar a inactivo" class="btn btn-sm btn-outline-dark"> <i class="bi bi-emoji-laughing-fill"></i></a>
            <?php } else { ?>
                <a onclick="activo()" href="cambiarEstado.php?cambio=inactivo&id=<?php echo $row['id']; ?>" title="Cambiar activo" class="btn btn-sm btn-dark"> <i class="bi bi-emoji-frown-fill"></i> </a>
            <?php } ?>

            <!-- <a href="index.php?action=delete&id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos de: ' . $row['nombres'] . '?\')" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i> </a> -->
        </td>
    </tr>
<?php }
?>
<div class="modal fade" id="mimodal" role="dialog"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="titulo" class="panel-title"><i class="bi bi-search"></i></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="bi bi-arrow-left"></i> Regresar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function loadData(icon, titulo, archivo, idC) {
        document.getElementById("titulo").innerHTML = '<i class="' + icon + '"></i>' + titulo;
        $(".modal-body").load(archivo + ".php?id=" + idC, function() {
            $("#mimodal").modal({
                show: true
            });
        });
    }

    function mensaje() {
        alert('Este empleado no tiene ausentismo')
    }

    function inactivo() {
        alert('Este empleado ahora esta inactivo, por favor editar la fecha de salida del empleado')

    }

    function activo() {
        alert('Este empleado vuelve a estar activo')
    }

    function loadDataTarea(icon, titulo, idC) {
        document.getElementById("titulo").innerHTML = '<i class="' + icon + '"></i>' + titulo;
        $(".modal-body").load("../tareas/crudTarea.php?grupo=" + idC, function() {
            $("#viewDataDota").modal({
                show: true
            });
        });
    }
</script>