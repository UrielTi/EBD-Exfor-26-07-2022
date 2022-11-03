<?php
include "../include/conn/conn.php";
$sql = mysqli_query($conn, "SELECT imagen, nombre, stock, nucleos FROM epp e, nucleos n WHERE (e.nucleo = n.id_nucleos) and rotacion=1");

while ($row = mysqli_fetch_assoc($sql)) {
?>
    <div class="card card-body">
        <div class="d-flex">
            <div class="card" style="width: 30rem;">
                <div class="d-flex justify-content-center">
                    <img class="col-md-1 form-control" src="./webp/<?php echo $row['imagen']; ?>" readonly>
                </div>
            </div>&nbsp;
            <div class="container">
                <div class="input-group input-group-sm shadow-sm">
                    <span class="input-group-text w-auto" for="nombre">Nombre: </span>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>" readonly="readonly">
                </div>
                <br>
                <div class="input-group input-group-sm shadow-sm">
                    <span class="input-group-text w-auto" for="nombre">Núcleo: </span>
                    <input name="nucleo" id="nucleo" value="<?php echo $row['nucleos'] ?>" class="form-control" type="text" readonly="readonly" />
                </div>
                <br>
                <div class="input-group input-group-sm shadow-sm">
                    <span class="input-group-text w-auto" for="nombre">Cantidad actual: </span>
                    <input name="stock" id="stock" value="<?php echo $row['stock'] ?>" class="form-control" type="text" readonly="readonly" />
                </div>
            </div>
        </div>
    </div>
    <br>
<?php } ?>