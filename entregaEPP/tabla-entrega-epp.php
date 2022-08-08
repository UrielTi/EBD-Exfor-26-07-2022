<?php
include ("../include/conn/conn.php");
$sql = mysqli_query($conn, "SELECT * FROM entrega_epp");
while ($row = mysqli_fetch_assoc($sql)) {
?>
    <tr>
        <td class="align-middle"><a onclick="loadDataDelivery('bi bi-search',' Visualización de la entrega de epp','visualizar',<?php echo $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#mimodal"><?php echo $row['nombre'] ?></a></td>
        <td class="align-middle"><?php echo $row['cedula'] ?></td>
        <td class="align-middle"><?php echo $row['fecha'] ?></td>
        <td class="align-middle">
            <a href="downloads.php?file=<?php echo $row['archivo'] ?>" title="Descargar constancia" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-down"></i></a>
            <a onclick="loadId('../entregaEPP/gestor_entrega.php?id=','<?php echo $row['id'] ?>')" data-toggle="tooltip" title="Gestionar ultima entrega" class="btn btn-success"><i class="bi bi-journal-medical"></i></a>
            <a onclick="loadId('../entregaEPP/historial_entregas.php?id=','<?php echo $row['id'] ?>')" title="Ver entregas al empleado" class="btn btn-secondary"><i class="bi bi-list-ul"></i></a>
            <a onclick="loadDataDelivery('bi bi-search',' Visualización de la entrega de epp','visualizar',<?php echo $row['id'] ?>)" href="" data-toggle="tooltip" title="Ver entregas al empleado" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#mimodal"><i class="bi bi-search"></i></a>

        </td>
    </tr>
<?php
}
?>
