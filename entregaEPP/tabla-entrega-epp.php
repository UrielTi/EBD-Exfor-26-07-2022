<?php
include("../include/conn/conn.php");
$consultEntregas = mysqli_query($conn, "SELECT id_empleado, fecha, COUNT(*) AS tanda, MAX(fecha) AS maxFecha, estado FROM entrega_epp GROUP BY id_empleado HAVING MAX(tanda) <= 1") or die(mysqli_error($conn));
while ($rE = mysqli_fetch_assoc($consultEntregas)) {
    $id_empleado = $rE['id_empleado'];
    $consultEmpleado = mysqli_query($conn, "SELECT nombres, primer_apellido, segundo_apellido, cedula FROM clientes WHERE id = '$id_empleado'") or die(mysqli_error($conn));
    while ($row = mysqli_fetch_assoc($consultEmpleado)) {
?>
        <tr>
            <td class="align-middle"><?php echo $row['nombres'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido']; ?></td>
            <td class="align-middle"><?php echo $row['cedula'] ?></td>
            <td class="align-middle"><?php echo $rE['maxFecha'] ?></td>
            <td class="align-middle"><?php $echo = $rE['estado'] == 0 ? '<span class="badge rounded-pill text-bg-warning">Pendiente</span>' : '<span class="badge rounded-pill text-bg-success">Diligenciado</span>';
                                        echo $echo ?></td>
            <td class="align-middle">
                <a href="" title="Descargar constancia" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-down"></i></a>
                <a onclick="loadId('registro.php?id=','<?php echo $rE['id_empleado'] ?>')" data-toggle="tooltip" title="Gestionar entregas" class="btn btn-success"><i class="bi bi-journal-medical"></i></a>
                <a onclick="loadData('bi bi-list-ul', 'Listado de Entregas del Empleado', 'listadoEntregas', <?php echo $rE['id_empleado'] ?>)" data-toggle="tooltip" title="Mostrar listado de entregas del empleado" data-bs-toggle="modal" data-bs-target="#mimodal" class="btn btn-secondary"><i class="bi bi-list-ul"></i></a>
            </td>
        </tr>
    <?php } ?>
<?php } ?>
<div class="modal fade" id="mimodal" role="dialog" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        document.getElementById("titulo").innerHTML = '<i class="' + icon + '"></i>' + ' ' + titulo;
        $(".modal-body").load(archivo + ".php?id=" + idC, function() {
            $("#mimodal").modal({
                show: true
            });
        });
    }
</script>