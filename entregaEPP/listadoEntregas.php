<?php include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>

	<head>
		<?php include("head.php"); ?>
	</head>

<body>
<div class="table-responsive">
            <table id="table" class="table table-bordered border-dark table-striped text-center">
                <thead>
                    <tr class="table-success border-dark">
                        <th>Elemento</th>
                        <th>Cantidad</th>
                        <th>Talla</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_empleado = intval($_GET['id']);
                    $consultEntregas = mysqli_query($conn, "SELECT id, id_empleado, elemento, cantidad, talla, fecha FROM entrega_epp WHERE id_empleado='$id_empleado'") or die(mysqli_error($conn));
                    
                    while (($resultEntregas = mysqli_fetch_assoc($consultEntregas)) != NULL) {
                    
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
                </tbody>
            </table>
        </div>
</body>

</html>