<?php
include("../include/conn/conn.php");
if (isset($_POST['load_pending'])) {
    $consultEntregas = mysqli_query($conn, "SELECT id, id_empleado, documento, fecha, COUNT(*) AS tanda, MAX(fecha) AS maxFecha, estado FROM entrega_epp WHERE estado = 0 GROUP BY id_empleado, documento HAVING MAX(tanda) <= 1") or die(mysqli_error($conn));
    while ($rE = mysqli_fetch_assoc($consultEntregas)) {
        $id_empleado = $rE['id_empleado'];
        $documento = $rE['documento'];
        $consultEmpleado = mysqli_query($conn, "SELECT nombres, primer_apellido, segundo_apellido, cedula FROM clientes WHERE id = '$id_empleado'") or die(mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($consultEmpleado)) {
?>
            <tr>
                <td class="align-middle"><?php echo $row['nombres'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido']; ?></td>
                <td class="align-middle"><?php echo $row['cedula'] ?></td>
                <td class="align-middle"><?php echo $rE['maxFecha'] ?></td>
                <td class="align-middle"><?php $echo = $rE['estado'] == 0 ? '<span class="badge rounded-pill text-bg-warning"><i class="bi bi-shield-exclamation"></i> Pendiente</span>' : '<span class="badge rounded-pill text-bg-success"><i class="bi bi-shield-check"></i> Diligenciado</span>';
                                            echo $echo ?></td>
                <td class="align-middle">
                    <a href="excelEntregas.php?id=<?php echo $id_empleado ?>" data-toggle="tooltip" title="Descargar constancia" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-down"></i></a>
                    <a onclick="loadId('registro.php?id=','<?php echo $id_empleado; ?>')" data-toggle="tooltip" title="Gestionar entregas" class="btn btn-success"><i class="bi bi-journal-medical"></i></a>
                    <a onclick="loadData('bi bi-list-ul', 'Listado de Entregas del Empleado', 'listadoEntregas', <?php echo $id_empleado; ?>, <?php echo $rE['id']; ?>)" data-toggle="tooltip" title="Mostrar listado de entregas del empleado" data-bs-toggle="modal" data-bs-target="#mimodal" class="btn btn-secondary"><i class="bi bi-list-ul"></i></a>
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
    <?php } else {
    if (isset($_POST['load_diligence'])) {
        $consultEntregas = mysqli_query($conn, "SELECT id, id_empleado, documento, fecha, COUNT(*) AS tanda, MAX(fecha) AS maxFecha, estado FROM entrega_epp WHERE estado = 1 GROUP BY id_empleado, documento HAVING MAX(tanda) <= 1") or die(mysqli_error($conn));
        while ($rE = mysqli_fetch_assoc($consultEntregas)) {
            $id_empleado = $rE['id_empleado'];
            $documento = $rE['documento'];
            $consultEmpleado = mysqli_query($conn, "SELECT nombres, primer_apellido, segundo_apellido, cedula FROM clientes WHERE id = '$id_empleado'") or die(mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($consultEmpleado)) {
    ?>
                <tr>
                    <td class="align-middle"><?php echo $row['nombres'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido']; ?></td>
                    <td class="align-middle"><?php echo $row['cedula'] ?></td>
                    <td class="align-middle"><?php echo $rE['maxFecha'] ?></td>
                    <td class="align-middle"><?php $echo = $rE['estado'] == 0 ? '<span class="badge rounded-pill text-bg-warning"><i class="bi bi-shield-exclamation"></i> Pendiente</span>' : '<span class="badge rounded-pill text-bg-success"><i class="bi bi-shield-check"></i> Diligenciado</span>';
                                                echo $echo ?></td>
                    <td class="align-middle">
                        <a href="downloads.php?file=<?php echo $documento ?>" data-toggle="tooltip" title="Descargar documento diligenciado" class="btn btn-primary"><i class="bi bi-download"></i></a>
                        <a onclick="loadId('registro.php?id=','<?php echo $id_empleado; ?>')" data-toggle="tooltip" title="Gestionar entregas" class="btn btn-success"><i class="bi bi-journal-medical"></i></a>
                        <a onclick="loadData('bi bi-list-ul', 'Listado de Entregas del Empleado', 'listadoEntregas', <?php echo $id_empleado; ?>, <?php echo $rE['id']; ?>)" data-toggle="tooltip" title="Mostrar listado de entregas del empleado" data-bs-toggle="modal" data-bs-target="#mimodal" class="btn btn-secondary"><i class="bi bi-list-ul"></i></a>
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
        <?php } else {
        $consultEntregas = mysqli_query($conn, "SELECT id, id_empleado, documento, MAX(fecha) as maxFecha, estado FROM entrega_epp GROUP BY id_empleado, documento ORDER BY estado ASC") or die(mysqli_error($conn));
        while ($rE = mysqli_fetch_assoc($consultEntregas)) {
            $id_empleado = $rE['id_empleado'];
            $documento = $rE['documento'];
            $consultEmpleado = mysqli_query($conn, "SELECT nombres, primer_apellido, segundo_apellido, cedula FROM clientes WHERE id = '$id_empleado'") or die(mysqli_error($conn));
            while ($rEm = mysqli_fetch_assoc($consultEmpleado)) {
        ?>
                <tr>
                    <td class="align-middle"><?php echo $rEm['nombres'] . ' ' . $rEm['primer_apellido'] . ' ' . $rEm['segundo_apellido']; ?></td>
                    <td class="align-middle"><?php echo $rEm['cedula'] ?></td>
                    <td class="align-middle"><?php echo $rE['maxFecha'] ?></td>
                    <td class="align-middle"><?php $echo = $rE['estado'] == 0 ? '<span class="badge rounded-pill text-bg-warning"><i class="bi bi-shield-exclamation"></i> Pendiente</span>' : '<span class="badge rounded-pill text-bg-success"><i class="bi bi-shield-check"></i> Diligenciado</span>';
                                                echo $echo ?></td>
                    <td class="align-middle">
                        <a href="<?php $echo2 = $rE['estado'] == 0 ? "excelEntregas.php?id=" . $id_empleado : "downloads.php?file=" . $documento;
                                    echo $echo2; ?>" data-toggle="tooltip" title="<?php $echo3 = $rE['estado'] == 0 ? 'Descargar constancia' : 'Descargar documento diligenciado';
                                                                                    echo $echo3; ?>" class="btn btn-primary"><i class="<?php $echo4 = $rE['estado'] == 0 ? 'bi bi-file-earmark-arrow-down' : 'bi bi-download';
                                                                                                                                        echo $echo4; ?>"></i></a>
                        <a onclick="loadId('registro.php?id=','<?php echo $id_empleado; ?>')" data-toggle="tooltip" title="Gestionar entregas" class="btn btn-success"><i class="bi bi-journal-medical"></i></a>
                        <a onclick="loadData('bi bi-list-ul', 'Listado de Entregas del Empleado', 'listadoEntregas', <?php echo $id_empleado; ?>, <?php echo $rE['id']; ?>)" data-toggle="tooltip" title="Mostrar listado de entregas del empleado" data-bs-toggle="modal" data-bs-target="#mimodal" class="btn btn-secondary"><i class="bi bi-list-ul"></i></a>
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
    <?php } ?>
<?php } ?>
<script>
    function loadData(icon, titulo, archivo, idC, idE) {
        document.getElementById("titulo").innerHTML = '<i class="' + icon + '"></i>' + ' ' + titulo;
        $(".modal-body").load(archivo + ".php?id=" + idC + "&id2=" + idE, function() {
            $("#mimodal").modal({
                show: true
            });
        });
    }
</script>