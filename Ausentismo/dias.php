<?php
    include "../include/conn/conn.php";
    include "../cond/todo.php";
    $sql = mysqli_query($conn, "SELECT nombres,cedula,cargo,nucleo, dx, diagnostico, sum(dias_ausentismo) as dias FROM ausentismo GROUP BY nombres, cedula, cargo, nucleo, dx, diagnostico");
    while ($row = mysqli_fetch_assoc($sql)){
        if($row['dias'] >= 145 && $row['dias'] <= 500){
?>
    <div class="panel panel-default">
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="dias.php" method="GET">
            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="nombres">Nombres: </span>
                <input class="form-control" type="text" name="nombres" id="nombres"
                    value="<?php echo $row['nombres']; ?>" readonly="readonly">
            </div>
            <hr>
            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="cedula">Cedula: </span>
                <input class="form-control" type="text" name="cedula" id="cedula"
                    value="<?php echo $row['cedula']; ?>" readonly="readonly">
            </div>
            <hr>
            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="cargo">Cargo: </span>
                <input class="form-control" type="text" name="cargo" id="cargo"
                    value="<?php echo $cargos[$row['cargo']] ?>" readonly="readonly">
            </div>
            <hr>
            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="nucleo">Nucleo: </span>
                <input class="form-control" type="text" name="nucleo" id="nucleo"
                    value="<?php echo $nucleos[$row['nucleo']] ?>" readonly="readonly">
            </div>
            <hr>
            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="dx">Diagnostico: </span>
                <input class="form-control" type="text" name="dx" id="dx"
                    value="<?php echo $row['dx'] ?>" readonly="readonly">
                <textarea name="diagnostico" id="diagnostico" class="form-control" readonly>
                    <?php echo $row['diagnostico'] ?>
                </textarea>
            </div>
            <hr>
            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="Dias">Dias totales: </span>
                <input class="form-control" type="text" name="Dias" id="Dias"
                    value="<?php echo $row['dias']; ?>" readonly="readonly">
            </div>
            <hr>
            <span>--------------------------------------------------------------------------------------------------------------------</span>
            <hr>
        </form>
    </div>
<?php } } ?>