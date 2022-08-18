<div class="modal fade" id="viewDocumental" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="titulo" class="panel-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="bi bi-arrow-left"></i> CERRAR</button>
            </div>
        </div>
    </div>
</div>
<?php
include("../../include/conn/conn.php");
include("headOld.php");
$id_documento = intval($_GET['id']);
if (!isset($_SESSION['tipo']) == 'gerente' || ($_SESSION['tipo']) == 'sistemas' || ($_SESSION['tipo']) == 'gestor_riesgo'){
    $sql = mysqli_query($conn, "SELECT id,codigo,version,nombre,tipo,origen,actualizado,revisado,archivo FROM documentos_obsoletos WHERE id_documento='$id_documento'");
    while ($row = mysqli_fetch_assoc($sql)) {
    $nombreDocumento = $row['archivo'];
    ?>
    <tr>
        <td class="align-middle"><?php echo $row['version'] ?></td>
        <td class="align-middle"><?php echo strtoupper($row['codigo']) ?></td>
        <td class="align-middle"><a onclick="loadDataDocumental('bi bi-search','Visualización','oldvisualizar',<?php echo $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#viewDocumental"><?php echo strtoupper($row['nombre']) ?></a></td>
        <td class="align-middle"><?php echo $row['tipo'] ?></td>
        <td class="align-middle"><?php echo $row['origen'] ?></td>
        <td class="align-middle"><?php echo $row['actualizado'] ?></td>
        <td class="align-middle"><?php echo $row['revisado'] ?></td>
        <td class="align-middle">
            <a href="olddownloads.php?file=<?php echo $row['archivo'] ?>" title="Descargar documento" class="btn btn-primary btn-sm"><i class="bi bi-download"></i></a>
            <a onclick="loadId('../documental_obsoletos/oldvisualizar.php?id=','<?php echo $row['id'] ?>')" data-toggle="tooltip" title="Visualizar documento antiguo" class="btn btn-success btn-sm"> <i class="bi bi-search"></i> </a>
            <a onclick="loadId('../documental_obsoletos/old_editar.php?id=','<?php echo $row['id'] ?>')" data-toggle="tooltip" title="Editar datos" class="btn btn-success btn-sm"> <i class="bi bi-pencil-fill"></i> </a>
            <a href="oldversions.php?action=delete&id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos de: <?php echo $row['nombre'] ?>?\')" class="btn btn-danger btn-sm"> <i class="bi bi-trash-fill"></i> </a>
        </td>
    </tr>
    <?php 
    } 
    ?>
<?php
} else {
    $sql = mysqli_query($conn, "SELECT id,codigo,version,nombre,tipo,origen,actualizado,revisado,archivo FROM documentos_obsoletos WHERE id_documento='$id_documento'");
    while ($row = mysqli_fetch_assoc($sql)) {
    $nombreDocumento = $row['archivo'];
    ?>
    <tr>
        <td class="align-middle"><?php echo $row['version'] ?></td>
        <td class="align-middle"><?php echo strtoupper($row['codigo']) ?></td>
        <td class="align-middle"><a onclick="loadDataDocumental('bi bi-search','Visualización','oldvisualizar',<?php echo $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#viewDocumental"><?php echo strtoupper($row['nombre']) ?></a></td>
        <td class="align-middle"><?php echo $row['tipo'] ?></td>
        <td class="align-middle"><?php echo $row['origen'] ?></td>
        <td class="align-middle"><?php echo $row['actualizado'] ?></td>
        <td class="align-middle"><?php echo $row['revisado'] ?></td>
        <td class="align-middle">
            <a href="olddownloads.php?file=<?php echo $row['archivo'] ?>" title="Descargar documento" class="btn btn-primary btn-sm"><i class="bi bi-download"></i></a>
            <a onclick="loadId('../documental_obsoletos/oldvisualizar.php?id=','<?php echo $row['id'] ?>')" data-toggle="tooltip" title="Visualizar documento antiguo" class="btn btn-success btn-sm"> <i class="bi bi-search"></i> </a>
            <a onclick="loadId('../documental_obsoletos/old_editar.php?id=','<?php echo $row['id'] ?>')" data-toggle="tooltip" title="Editar datos" class="btn btn-success btn-sm"> <i class="bi bi-pencil-fill"></i> </a>
        </td>
    </tr>
    <?php 
    } 
    ?>
<?php
}
?>