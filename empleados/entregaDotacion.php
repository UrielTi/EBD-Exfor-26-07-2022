<?php
include "../include/conn/conn.php";
include "../cond/todo.php";
?>
    <div class="panel panel-default">
        <form name="form2" id="form2" class="form-horizontal row-fluid" action="excelDotacion.php" method="POST">
            <div class="input-group shadow-sm">
                <label class="input-group-text w-25" for="nucleo">(*) Núcleo: </label>
                <select class="form-select" name="nucleo" id="nucleo" required>
                    <option value="">SELECCIONA EL NÚCLEO</option>
                    <?php
                    $query = $conn->query("SELECT * FROM nucleos");
                    while ($nucleo = mysqli_fetch_array($query)) {
                        echo '<option value="' . $nucleo['id'] . '">' . $nucleo['nucleo'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <hr>

            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="fecha">(*) Fecha: </span>
                <input name="fecha" id="fecha" class=" form-control" type="date"
                    required>
            </div>
            <hr>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="input" id="input"
                        class="btn btn-sm btn-primary">Descargar excel</button>
                </div>
            </div>
            
        </form>
    </div>
<?php
    /*$sql = mysqli_query($conn, "SELECT nombres, cedula, fecha_ingreso, nucleo, cargo, DATE_ADD(fecha_ingreso, INTERVAL 4 MONTH) as fecha_i FROM clientes");
    while ($row = mysqli_fetch_assoc($sql)){
        if($row['fecha_i'] > date("Y-m-d")){
?>
    <div class="panel panel-default">
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="entregaDotacion.php" method="GET">
            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="nombres">Nombres: </span>
                <input class="form-control" type="text" name="nombres" id="nombres"
                    value="<?php echo $row['nombres']; ?>" readonly="readonly">
            </div>
            <hr>
            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="cedula">Informacion: </span>
                <input class="form-control" type="text" name="cedula" id="cedula"
                    value="<?php echo $row['cedula']; ?>" readonly="readonly">
                <input class="form-control" type="text" name="cargo" id="cargo"
                    value="<?php echo $cargos[$row['cargo']] ?>" readonly="readonly">
                <input class="form-control" type="text" name="nucleo" id="nucleo"
                    value="<?php echo $nucleos[$row['nucleo']] ?>" readonly="readonly">
                <input class="form-control" type="text" name="fecha_ingreso" id="fecha_ingreso"
                    value="<?php echo $row['fecha_ingreso']; ?>" readonly="readonly">
            </div>
            <hr>
            <span>--------------------------------------------------------------------------------------------------------------------</span>
            <hr>
        </form>
    </div>
<?php } } */?>