<div class="modal fade" id="viewDocumental" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="titulo" class="panel-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar Ventana</button>
            </div>
        </div>
    </div>
</div>
<?php
if ($_SESSION['tipo'] == 'gerente' || $_SESSION['tipo'] == 'sistemas' || $_SESSION['tipo'] == 'gestor_riesgo') {
    $sql = mysqli_query($conn, "SELECT id,codigo,version,nombre,tipo,origen,actualizado,revisado,archivo FROM documentos");
    while ($row = mysqli_fetch_assoc($sql)) {
        $nombreDocumento = $row['archivo'];
?>
        <tr>
            <td class="align-middle"><?php echo strtoupper($row['codigo']) ?></td>
            <td class="align-middle"><?php echo $row['version'] ?></td>
            <td class="align-middle"><a onclick="loadDataDocumental('bi bi-search','Visualizar','visualizar','<?php echo $row['id'] ?>')" href="" data-bs-toggle="modal" data-bs-target="#viewDocumental"><?php echo strtoupper($row['nombre']) ?></a></td>
            <td class="align-middle"><?php echo $row['tipo'] ?></td>
            <td class="align-middle"><?php echo $row['origen'] ?></td>
            <td class="align-middle"><?php $act = $row['actualizado'] == '0101-01-01' ? 'N/A' : $row['actualizado'];
                                        echo $act; ?></td>
            <td class="align-middle"><?php $rev = $row['revisado'] == '0101-01-01' ? 'N/A' : $row['revisado'];
                                        echo $rev; ?></td>
            <!-- <td class="align-middle">
            
        </td> -->
            <td class="align-middle">
                <a onclick="loadId('../documental/visualizar.php?id=','<?php echo $row['id'] ?>')" data-toggle="tooltip" title="Visualizar información" class="btn btn-secondary btn-sm"> <i class="bi bi-search"></i> </a>
                <a onclick="loadId('../documental/documental_obsoletos/oldversions.php?id=','<?php echo $row['id'] ?>')" title="Ver versiones obsoletas" class="btn btn-dark btn-sm"><i class="bi bi-stopwatch"></i></a>
                <a href="downloads.php?file=<?php echo $row['archivo'] ?>" title="Descargar documento" class="btn btn-primary btn-sm"><i class="bi bi-download"></i></a>
                <a onclick="loadId('../documental/editar.php?id=','<?php echo $row['id'] ?>')" data-toggle="tooltip" title="Editar o actualizar datos" class="btn btn-success btn-sm"> <i class="bi bi-pencil-fill"></i></a>
                <a href="index.php?action=delete&id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos de: <?php echo $row['nombre'] ?>?\')" class="btn btn-danger btn-sm"> <i class="bi bi-trash-fill"></i> </a>
            </td>
        </tr>
        <?php
    }
} else {
    if ($_SESSION['tipo'] == 'aux') {
        $sql = mysqli_query($conn, "SELECT id,codigo,version,nombre,tipo,origen,actualizado,revisado,archivo FROM documentos");
        while ($row = mysqli_fetch_assoc($sql)) {
            $nombreDocumento = $row['archivo'];
        ?>
            <tr>
                <td class="align-middle"><?php echo strtoupper($row['codigo']) ?></td>
                <td class="align-middle"><?php echo $row['version'] ?></td>
                <td class="align-middle"><a onclick="loadDataDocumental('bi bi-search','Visualizar','visualizar','<?php echo $row['id'] ?>')" href="" data-bs-toggle="modal" data-bs-target="#viewDocumental"><?php echo strtoupper($row['nombre']) ?></a></td>
                <td class="align-middle"><?php echo $row['tipo'] ?></td>
                <td class="align-middle"><?php echo $row['origen'] ?></td>
                <td class="align-middle"><?php $act = $row['actualizado'] == '0101-01-01' ? 'N/A' : $row['actualizado'];
                                            echo $act; ?></td>
                <td class="align-middle"><?php $rev = $row['revisado'] == '0101-01-01' ? 'N/A' : $row['revisado'];
                                            echo $rev; ?></td>
                <!-- <td class="align-middle">
            
        </td> -->
                <td class="align-middle">
                    <a onclick="loadId('../documental/visualizar.php?id=','<?php echo $row['id'] ?>')" data-toggle="tooltip" title="Visualizar información" class="btn btn-secondary btn-sm"> <i class="bi bi-search"></i> </a>
                    <a onclick="loadId('../documental/documental_obsoletos/oldversions.php?id=','<?php echo $row['id'] ?>')" title="Ver versiones obsoletas" class="btn btn-dark btn-sm"><i class="bi bi-stopwatch"></i></a>
                    <a href="downloads.php?file=<?php echo $row['archivo'] ?>" title="Descargar documento" class="btn btn-primary btn-sm"><i class="bi bi-download"></i></a>
                    <a onclick="loadId('../documental/editar.php?id=','<?php echo $row['id'] ?>')" data-toggle="tooltip" title="Editar o actualizar datos" class="btn btn-success btn-sm"> <i class="bi bi-pencil-fill"></i></a>
                </td>
            </tr>
            <?php
        }
    } else {
        if ($_SESSION['tipo'] == 'sena' || $_SESSION['tipo'] == 'sst') {
            $sql = mysqli_query($conn, "SELECT id,codigo,version,nombre,tipo,origen,actualizado,revisado,archivo FROM documentos");
            while ($row = mysqli_fetch_assoc($sql)) {
                $nombreDocumento = $row['archivo'];
            ?>
                <tr>
                    <td class="align-middle"><?php echo strtoupper($row['codigo']) ?></td>
                    <td class="align-middle"><?php echo $row['version'] ?></td>
                    <td class="align-middle"><a onclick="loadDataDocumental('bi bi-search','Visualizar','visualizar','<?php echo $row['id'] ?>')" href="" data-bs-toggle="modal" data-bs-target="#viewDocumental"><?php echo strtoupper($row['nombre']) ?></a></td>
                    <td class="align-middle"><?php echo $row['tipo'] ?></td>
                    <td class="align-middle"><?php echo $row['origen'] ?></td>
                    <td class="align-middle"><?php $act = $row['actualizado'] == '0101-01-01' ? 'N/A' : $row['actualizado'];
                                                echo $act; ?></td>
                    <td class="align-middle"><?php $rev = $row['revisado'] == '0101-01-01' ? 'N/A' : $row['revisado'];
                                                echo $rev; ?></td>
                    <!-- <td class="align-middle">
                
            </td> -->
                    <td class="align-middle">
                        <a onclick="loadId('../documental/visualizar.php?id=','<?php echo $row['id'] ?>')" data-toggle="tooltip" title="Visualizar información" class="btn btn-secondary btn-sm"> <i class="bi bi-search"></i> </a>
                        <a href="downloads.php?file=<?php echo $row['archivo'] ?>" title="Descargar documento" class="btn btn-primary btn-sm"><i class="bi bi-download"></i></a>
                    </td>
                </tr>
<?php
            }
        }
    }
}
