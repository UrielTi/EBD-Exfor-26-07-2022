<?php
$id_empleado = intval($_GET['id']);
$consultEntregas = mysqli_query($conn, "SELECT id, id_empleado, elemento, cantidad, talla, fecha, estado FROM entrega_epp WHERE id_empleado='$id_empleado' ORDER BY estado ASC") or die(mysqli_error($conn));

while (($rE = mysqli_fetch_assoc($consultEntregas)) != NULL) {

?>
    <tr>
        <td class="align-middle"><?php echo $rE['elemento'] ?></td>
        <td class="align-middle"><?php echo $rE['cantidad'] ?></td>
        <td class="align-middle"><?php echo $rE['talla'] ?></td>
        <td class="align-middle"><?php echo $rE['fecha'] ?></td>
        <td class="align-middle"><?php $echo = $rE['estado'] == 0 ? '<span class="badge rounded-pill text-bg-warning"><i class="bi bi-shield-exclamation"></i> Pendiente</span>' : '<span class="badge rounded-pill text-bg-success"><i class="bi bi-shield-check"></i> Diligenciado</span>'; echo $echo;?></td>
        <td class="align-middle">
        <a href="returnItem.php?action=delete&id=<?php echo $rE['id'] ?>" onclick="return confirm('Si este elemento no se ha podido entregar al empleado por alguna razón de click en *Ok*. Este registro se eliminará')" data-toggle="tooltip" title="Devolver EPP" class="btn btn-warning"><i class="bi bi-recycle"></i></a>
        </td>
    </tr>

<?php
}
?>
<div class="modal fade" id="mimodal" role="dialog" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
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