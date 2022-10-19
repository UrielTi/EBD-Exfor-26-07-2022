<?php
include("../login/userRestrintion.php");
include "../include/conn/conn.php";
include("../cond/todo.php");

$id = intval($_GET['id']);
$sql = mysqli_query($conn, "SELECT * FROM entrega_epp WHERE id='$id'");
if (mysqli_num_rows($sql) == 0) {
    header("Location: index.php");
} else {
    $row = mysqli_fetch_assoc($sql);
}
?>

<div class="panel panel-default">
    <form name="form1" id="form1" class="form-horizontal row-fluid" action="visualizar.php" method="GET" enctype="multipart/form-data">
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="id">ID: </span>
            <input class="form-control" type="number" name="id" id="id" value="<?php echo $row['id']; ?>" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="nombre">Nombres: </span>
            <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" id="cedula">Cedula: </span>
            <input class="form-control" type="number" name="cedula" id="cedula" value="<?php echo $row['cedula']; ?>" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="nucleo">(*) nucleo: </span>
            <input name="nucleo" id="nucleo" class=" form-control" type="text" value="<?php echo $nucleos[$row['nucleo']] ?>" required readonly>
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="proceso">(*) proceso: </span>
            <input name="proceso" id="proceso" class=" form-control" type="text" value="<?php echo $procesos[$row['proceso']] ?>" required readonly>
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="cargo">(*) cargo: </span>
            <input name="cargo" id="cargo" class=" form-control" type="text" value="<?php echo $cargos[$row['cargo']] ?>" required readonly>
        </div>
        <hr>

        <div class="card-group">
            <span class="input-group-text"> TALLAS: </span>
            <div class="card">
                <span class="input-group-text" for="info_orden"> S: </span>
                <input name="tallaS" id="tallaS" class="form-control" type="number" value="<?php echo $row['tallaS'] ?>" readonly>
            </div>
            <div class="card">
                <span class="input-group-text" for="info_orden"> M: </span>
                <input name="tallaM" id="tallaM" class="form-control" type="number" value="<?php echo $row['tallaM'] ?>" readonly>
            </div>
            <div class="card">
                <span class="input-group-text" for="info_orden"> L: </span>
                <input name="tallaL" id="tallaL" class="form-control" type="number" value="<?php echo $row['tallaL'] ?>" readonly>
            </div>
            <div class="card">
                <span class="input-group-text" for="info_orden"> XL: </span>
                <input name="tallaXL" id="tallaXL" class="form-control" type="number" value="<?php echo $row['tallaXL'] ?>" readonly>
            </div>
            <div class="card">
                <span class="input-group-text" for="info_orden"> 28: </span>
                <input name="talla28" id="talla28" class="form-control" type="number" value="<?php echo $row['talla28'] ?>" readonly>
            </div>
            <div class="card">
                <span class="input-group-text" for="info_orden"> 30: </span>
                <input name="talla30" id="talla30" class="form-control" type="number" value="<?php echo $row['talla30'] ?>" readonly>
            </div>
            <div class="card">
                <span class="input-group-text" for="info_orden"> 32: </span>
                <input name="talla32" id="talla32" class="form-control" type="number" value="<?php echo $row['talla32'] ?>" readonly>
            </div>
            <div class="card">
                <span class="input-group-text" for="info_orden"> 34: </span>
                <input name="talla34" id="talla34" class="form-control" type="number" value="<?php echo $row['talla34'] ?>" readonly>
            </div>
            <div class="card">
                <span class="input-group-text" for="info_orden"> 36: </span>
                <input name="talla36" id="talla36" class="form-control" type="number" value="<?php echo $row['talla36'] ?>" readonly>
            </div>
            <div class="card">
                <span class="input-group-text" for="info_orden"> 38: </span>
                <input name="talla38" id="talla38" class="form-control" type="number" value="<?php echo $row['talla38'] ?>" readonly>
            </div>
            <div class="card">
                <span class="input-group-text" for="info_orden"> 40: </span>
                <input name="talla40" id="talla40" class="form-control" type="number" value="<?php echo $row['talla40'] ?>" readonly>
            </div>
            <div class="card">
                <span class="input-group-text" for="info_orden"> 42: </span>
                <input name="talla42" id="talla42" class="form-control" type="number" value="<?php echo $row['talla42'] ?>" readonly>
            </div>
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <label class="input-group-text w-25" for="cantidad">Cantidad: </label>
            <input name="cantidad" id="cantidad" value="<?php echo $row['cantidad']; ?>" class="form-control" type="number" readonly="readonly" />
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <label class="input-group-text w-25" for="elemento">elemento: </label>
            <input name="elemento" id="elemento" value="<?php echo $row['elemento']; ?>" class="form-control" type="text" readonly="readonly" />
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <label class="input-group-text w-25" for="precio">Precio: </label>
            <input name="precio" id="precio" value="<?php echo $row['precio']; ?>" class="form-control" type="number" readonly="readonly" />
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <label class="input-group-text w-25" for="fecha">Fecha: </label>
            <input name="fecha" id="fecha" value="<?php echo $row['fecha']; ?>" class="form-control" type="text" readonly="readonly" />
        </div>
        <hr>
    </form>
</div>