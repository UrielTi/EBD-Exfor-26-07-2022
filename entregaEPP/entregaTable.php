<?php


$consultaEntregas = mysqli_query($conn, "SELECT * FROM entrega_epp WHERE cedula='$cedula' and id_empleado='$id_empleado'") or die(mysqli_error($conn));

if (($resultEntregas = mysqli_fetch_assoc($consultaEntregas)) != NULL) {

?>
    <tr>
        <td class="align-middle"><?php echo $resultEntregas['elemento'] ?></td>
        <td class="align-middle"><?php echo $resultEntregas['cantidad'] ?></td>
        <td class="align-middle"><?php echo $resultEntregas['talla'] ?></td>
        <td class="align-middle"><?php echo $resultEntregas['fecha'] ?></td>
    </tr>

<?php
}
?>