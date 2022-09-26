<?php
$id_empleado = intval($_GET['id']);
$consultEntregas = mysqli_query($conn, "SELECT id, id_empleado, elemento, cantidad, talla, fecha FROM entrega_epp WHERE id_empleado='$id_empleado'") or die(mysqli_error($conn));

while (($rE = mysqli_fetch_assoc($consultEntregas)) != NULL) {

?>
    <tr>
        <td class="align-middle"><?php echo $rE['elemento'] ?></td>
        <td class="align-middle"><?php echo $rE['cantidad'] ?></td>
        <td class="align-middle"><?php echo $rE['talla'] ?></td>
        <td class="align-middle"><?php echo $rE['fecha'] ?></td>
        <td class="align-middle">
        <a href="registro.php?action=delete&id=<?php echo $rE['id'] ?>" data-toggle="tooltip" title="Devolver EPP" onclick="return confirm ('¿Esta seguro de devolver el elemento? Se perderá este registro!');" class="btn btn-warning"><i class="bi bi-recycle"></i></a> 
        <?php ?>
        </td>
    </tr>

<?php
}
?>