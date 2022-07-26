<?php
include "../include/conn/conn.php";
$sql = mysqli_query($conn, "SELECT id, imagen, nombre, proveedor, stock, precio, nucleos FROM epp e, nucleos n WHERE (e.nucleo = n.id_nucleos) and stock <= 10 ORDER BY stock");
while ($row = mysqli_fetch_assoc($sql)) {
    if ($row['stock'] <= 10) {
    ?>
        <div class="card card-body">
            <div class="d-flex">
                <div class="card" style="width: 30rem;">
                    <div class="d-flex justify-content-center">
                        <img class="col-md-1 form-control" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" readonly="readonly" >
                    </div>
                </div>&nbsp;
                <div class="container">
                    <div class="input-group input-group-sm shadow-sm">
                        <span class="input-group-text w-auto" for="nombre">Nombre: </span>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>" readonly="readonly">
                    </div>
                    <br>
                    <div class="input-group input-group-sm shadow-sm">
                        <span class="input-group-text w-auto" for="nombre">Cantidad actual: </span>
                        <input class="form-control" type="number" name="cantidad" id="cantidad" value="<?php echo $row['stock']; ?>" readonly="readonly">
                    </div>
                    <br>
                    <div class="input-group input-group-sm shadow-sm">
                        <span class="input-group-text w-auto" for="nombre">Núcleo: </span>
                        <input name="nucleo" id="nucleo" value="<?php echo $row['nucleos'] ?>" class="form-control" type="text" readonly="readonly"/>
                    </div>
                    <br>
                    <div class="input-group input-group-sm shadow-sm">
                        <label class="input-group-text w-auto" for="proveedor">Proveedor: </label>
                        <input name="proveedor" id="proveedor" value="<?php echo $row['proveedor']; ?>" class="form-control" type="text" readonly="readonly" />
                    </div>
                    <br>
                    <div class="input-group input-group-sm shadow-sm">
                        <label class="input-group-text w-auto" for="proveedor">Precio aproximado: </label>
                        <span class="input-group-text w-auto">$</span>
                        <input name="precio" id="precio" value="<?php 
                        if($row['stock'] == 0){
                            echo $row['precio'];
                        } else {
                            echo $precio_aproximado = $row['precio']/$row['stock'];
                        }
                        ;?>" class="form-control" type="number" readonly="readonly" />
                    </div>
                    <br>
                    <a href="visualizar.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Visualizar" class="btn btn-sm btn-secondary"> <i class="bi bi-search"></i> Visualizar elemento </a>
                </div>
            </div>
        </div>
        <br>
    <?php
    }
}
?>