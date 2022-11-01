<div class="modal fade" id="mimodal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="titulo" class="panel-title"></h4>
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
<?php
if (isset($_POST['filtro_nucleo'])) {
    $input_nucleo = mysqli_real_escape_string($conn, (strip_tags($_POST['input_nucleo'], ENT_QUOTES)));
    if ($input_nucleo == '1') {
        $sql = mysqli_query($conn, "SELECT * FROM epp");
        while ($row = mysqli_fetch_assoc($sql)) {
        ?>
            <tr class="table-responsive">
                <td><?php echo $row['codigo'] ?></td>
                <td><td><img src="<?php echo $row['imagen']; ?>" width="5%"></td></td>
                <td><a onclick="loadData('bi bi-search','Visualización del elemento','visualizar',<?php echo  $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#mimodal"><?php echo $row['nombre'] ?></a></td>
                <td><?php echo $row['stock'] ?></td>
                <td><?php echo $nucleosEmpleado[$row['nucleo']] ?></td>
                <td><?php echo $row['proveedor'] ?></td>
                <td><?php echo $row['precio'] ?></td>
                <td>
                    <a href="visualizar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Visualizar" class="btn btn-sm btn-secondary"> <i class="bi bi-search"></i> </a>
                    <a href="editar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-success"> <i class="bi bi-pencil-fill"></i> </a>
                    <a href="index.php?action=delete&id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos de: <?php echo $row['nombre'] ?>?\')" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i> </a>
                </td>
            </tr>

        <?php
        }
        ?>
        <?php
    } else {
        if ($input_nucleo == '2') {
            $sql = mysqli_query($conn, "SELECT * FROM epp WHERE nucleo='1'");
            while ($row = mysqli_fetch_assoc($sql)) {
            ?>
                <tr class="table-responsive">
                    <td><?php echo $row['codigo'] ?></td>
                    <td><td><img src="<?php echo $row['imagen']; ?>" width="5%"></td></td>
                    <td><a onclick="loadData('bi bi-search','Visualización del elemento','visualizar',<?php echo  $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#mimodal"><?php echo $row['nombre'] ?></a></td>
                    <td><?php echo $row['stock'] ?></td>
                    <td><?php echo $nucleosEmpleado[$row['nucleo']] ?></td>
                    <td><?php echo $row['proveedor'] ?></td>
                    <td><?php echo $row['precio'] ?></td>
                    <td>
                        <a href="visualizar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Visualizar" class="btn btn-sm btn-success"> <i class="bi bi-search"></i> </a>
                        <a href="editar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-success"> <i class="bi bi-pencil-fill"></i> </a>
                        <a href="index.php?action=delete&id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos de: <?php echo $row['nombre'] ?>?\')" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i> </a>
                    </td>
                </tr>

            <?php
            }
            ?>
            <?php
        } else {
            if ($input_nucleo == '3') {
                $sql = mysqli_query($conn, "SELECT * FROM epp WHERE nucleo='3'");
                while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr class="table-responsive">
                        <td><?php echo $row['codigo'] ?></td>
                        <td><td><img src="<?php echo $row['imagen']; ?>" width="5%"></td></td>
                        <td><a onclick="loadData('bi bi-search','Visualización del elemento','visualizar',<?php echo  $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#mimodal"><?php echo $row['nombre'] ?></a></td>
                        <td><?php echo $row['stock'] ?></td>
                        <td><?php echo $nucleosEmpleado[$row['nucleo']] ?></td>
                        <td><?php echo $row['proveedor'] ?></td>
                        <td><?php echo $row['precio'] ?></td>
                        <td>
                            <a href="visualizar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Visualizar" class="btn btn-sm btn-dark"> <i class="bi bi-search"></i> </a>
                            <a href="editar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-success"> <i class="bi bi-pencil-fill"></i> </a>
                            <a href="index.php?action=delete&id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos de: <?php echo $row['nombre'] ?>?\')" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i> </a>
                        </td>
                    </tr>

                <?php
                }
                ?>
            <?php
            }
            ?>
        <?php
        }
        ?>
    <?php
    }
    ?>
    <?php
} else {
    if ($_SESSION['tipo'] == 'gerente' || $_SESSION['tipo'] == 'sistemas' || $_SESSION['tipo'] == 'gestor_riesgo') {
        $sql = mysqli_query($conn, "SELECT * FROM epp");
        while ($row = mysqli_fetch_assoc($sql)) {
        ?>
            <tr class="table-responsive">
                <td><?php echo $row['codigo'] ?></td>
                <td><td><img src="<?php echo $row['imagen']; ?>" width="5%"></td></td>
                <td><a onclick="loadData('bi bi-search','Visualización del elemento','visualizar',<?php echo  $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#mimodal"><?php echo $row['nombre'] ?></a></td>
                <td><?php echo $row['stock'] ?></td>
                <td><?php echo $nucleosEmpleado[$row['nucleo']] ?></td>
                <td><?php echo $row['proveedor'] ?></td>
                <td><?php echo $row['precio'] ?></td>
                <td>
                    <a href="visualizar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Visualizar" class="btn btn-sm btn-secondary"> <i class="bi bi-search"></i> </a>
                    <a href="editar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-success"> <i class="bi bi-pencil-fill"></i> </a>
                    <a href="index.php?action=delete&id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos de: <?php echo $row['nombre'] ?>?\')" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i> </a>
                </td>
            </tr>
        <?php
        }
        ?>
    <?php
    } else {
        if ($_SESSION['nucleo'] == '1' && $_SESSION['tipo'] == 'aux') {
            $sql = mysqli_query($conn, "SELECT * FROM epp WHERE nucleo=1");
            while ($row = mysqli_fetch_assoc($sql)) {
            ?>
                <tr class="table-responsive">
                    <td><?php echo $row['codigo'] ?></td>
                    <td><td><img src="<?php echo $row['imagen']; ?>" width="5%"></td></td>
                    <td><a onclick="loadData('bi bi-search','Visualización del elemento','visualizar',<?php echo  $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#mimodal"><?php echo $row['nombre'] ?></a></td>
                    <td><?php echo $row['stock'] ?></td>
                    <td><?php echo $nucleosEmpleado[$row['nucleo']] ?></td>
                    <td><?php echo $row['proveedor'] ?></td>
                    <td><?php echo $row['precio'] ?></td>
                    <td>
                        <a href="visualizar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Visualizar" class="btn btn-sm btn-success"> <i class="bi bi-search"></i> </a>
                        <a href="editar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-success"> <i class="bi bi-pencil-fill"></i> </a>
                    </td>
                </tr>

            <?php
            }
        } else {
            if ($_SESSION['nucleo'] == '3' && $_SESSION['tipo'] == 'aux') {
                $sql = mysqli_query($conn, "SELECT * FROM epp WHERE nucleo=3");
                while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr class="table-responsive">
                        <td><?php echo $row['codigo'] ?></td>
                        <td><td><img src="<?php echo $row['imagen']; ?>" width="5%"></td></td>
                        <td><a onclick="loadData('bi bi-search','Visualización del elemento','visualizar',<?php echo  $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#mimodal"><?php echo $row['nombre'] ?></a></td>
                        <td><?php echo $row['stock'] ?></td>
                        <td><?php echo $nucleosEmpleado[$row['nucleo']] ?></td>
                        <td><?php echo $row['proveedor'] ?></td>
                        <td><?php echo $row['precio'] ?></td>
                        <td>
                            <a href="visualizar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Visualizar" class="btn btn-sm btn-success"> <i class="bi bi-search"></i> </a>
                            <a href="editar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-success"> <i class="bi bi-pencil-fill"></i> </a>
                        </td>
                    </tr>
    
                <?php
                }
            }
        }
    }
    ?>
<?php
}
?>