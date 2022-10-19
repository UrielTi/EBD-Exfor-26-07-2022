<?php
include "../include/conn/conn.php";
?>
<?php
include("../cond/todo.php"); ?>

<div class="container-fluid border border-success bg-light">
    <hr>
    <?php
    if (isset($_POST['input'])) {
        $nombres = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
        $cedula = mysqli_real_escape_string($conn, (strip_tags($_POST['cedula'], ENT_QUOTES)));
        $cargo = mysqli_real_escape_string($conn, (strip_tags($_POST['cargo'], ENT_QUOTES)));
        $nucleo = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
        $proceso = mysqli_real_escape_string($conn, (strip_tags($_POST['proceso'], ENT_QUOTES)));
        $camisa = mysqli_real_escape_string($conn, (strip_tags($_POST['camisa'], ENT_QUOTES)));
        $pantalon = mysqli_real_escape_string($conn, (strip_tags($_POST['pantalon'], ENT_QUOTES)));
        $botas = mysqli_real_escape_string($conn, (strip_tags($_POST['botas'], ENT_QUOTES)));
        $guayo = mysqli_real_escape_string($conn, (strip_tags($_POST['guayo'], ENT_QUOTES)));

        $insert = mysqli_query($conn, "INSERT INTO cliente_tallas(id, nombres, cedula, cargo, nucleo, proceso, camisa, pantalon, botas, guayo)
                    VALUES (NULL, '$nombres', '$cedula', '$cargo', '$nucleo', '$proceso', '$camisa', '$pantalon', '$botas', '$guayo')") or die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Se han registrado las tallas!'); window.location = 'index.php'</script>";
        } else {
            echo "<script>alert('Error, no se pudo registrar las tallas'); window.location = 'index.php'</script>";
        }
    }
    ?>
    <div class="panel panel-default">
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registrarTalla.php" method="POST">
            <hr>
            <p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>

            <hr>

            <?php
            $cedula = $_GET['id'];
            $sql = mysqli_query($conn, "SELECT nombres,cedula,cargo,proceso,nucleo FROM clientes WHERE cedula='$cedula'");
            $row = mysqli_fetch_assoc($sql);
            ?>

            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="nombres">(*) nombre: </span>
                <input name="nombres" id="nombres" class="form-control" type="text" required value="<?php echo $row['nombres'] ?>" readonly>
            </div>
            <hr>

            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="cedula">(*) cédula: </span>
                <input name="cedula" id="cedula" class="form-control" type="text" required value="<?php echo $row['cedula'] ?>" readonly>
            </div>
            <hr>

            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="cargo">(*) cargo: </span>
                <input name="cargo" id="cargo" class="form-control" type="hidden" required readonly value="<?php echo $row['cargo'] ?>">
                <input name="cargo1" id="cargo1" class="form-control" type="text" required value="<?php echo $cargos[$row['cargo']] ?>" readonly>
            </div>
            <hr>

            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="nucleo">(*) Núcleo: </span>
                <input name="nucleo" id="nucleo" class="form-control" type="hidden" required readonly value="<?php echo $row['nucleo'] ?>">
                <input name="nucleo1" id="nucleo1" class="form-control" type="text" required value="<?php echo $nucleos[$row['nucleo']] ?>" readonly>
            </div>
            <hr>

            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="proceso">(*) Proceso: </span>
                <input name="proceso" id="proceso" class="form-control" type="hidden" required readonly value="<?php echo $row['proceso'] ?>">
                <input name="proceso1" id="proceso1" class="form-control" type="text" required value="<?php echo $procesos[$row['proceso']] ?>" readonly>
            </div>
            <hr>

            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="camisa">(*)Talla camisa:</span>
                <input name="camisa" id="camisa" required class="form-control" type="text" placeholder="Talla de camisa">
                <span class="input-group-text w-25" for="pantalon">(*)Talla pantalón:</span>
                <input name="pantalon" id="pantalon" required class="form-control" type="text" placeholder="Talla de pantalon">
            </div>
            <hr>

            <div class="input-group shadow-sm">
                <span class="input-group-text w-25" for="botas">(*)Talla botas:</span>
                <input name="botas" id="botas" required class="form-control" type="text" placeholder="Talla de botas">
                <span class="input-group-text w-25" for="guayo">(*)Talla guayo:</span>
                <input name="guayo" id="guayo" required class="form-control" type="text" placeholder="Talla de guayo">
            </div>
            <hr>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                </div>
            </div>
            <hr>

        </form>
    </div>