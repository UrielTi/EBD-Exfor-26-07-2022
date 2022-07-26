<?php 
    include "../include/conn/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <script>
        $(document).ready(function() {
            $("#nombres").focusout(function() {
                $.ajax({
                    url: '../include/empleados/empleado.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        nombres: $('#nombres').val()
                    }
                }).done(function(respuesta) {
                    $("#nombres").val(respuesta.nombres);
                    $("#cedula").val(respuesta.cedula);
                    $("#cargo").val(respuesta.cargo);
                    $("#cargo1").val(respuesta.cargo1);
                    $("#nucleo").val(respuesta.nucleo);
                    $("#nucleo1").val(respuesta.nucleo1);
                    //Tallas
                    $("#camisa").val(respuesta.camisa);
                    $("#pantalon").val(respuesta.pantalon);
                    $("#botas").val(respuesta.botas);
                    $("#guayo").val(respuesta.guayo);
                });
            });
        });
    </script>
</head>

<body>
    <?php include("../include/navegacion/nav.php"); ?>

    <div class="container-fluid border border-success bg-light">
        <hr>
        <?php
            if (isset($_POST['input'])) {
                $nombre = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
                $cedula = mysqli_real_escape_string($conn, (strip_tags($_POST['cedula'], ENT_QUOTES)));
                $cargo = mysqli_real_escape_string($conn, (strip_tags($_POST['cargo'], ENT_QUOTES)));
                $nucleo = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
                $camisa = mysqli_real_escape_string($conn, (strip_tags($_POST['camisa'], ENT_QUOTES)));
                $pantalon = mysqli_real_escape_string($conn, (strip_tags($_POST['pantalon'], ENT_QUOTES)));
                $botas = mysqli_real_escape_string($conn, (strip_tags($_POST['botas'], ENT_QUOTES)));
                $guayo = mysqli_real_escape_string($conn, (strip_tags($_POST['guayo'], ENT_QUOTES)));
                $fecha1 = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha1'], ENT_QUOTES)));
                $fecha2 = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha2'], ENT_QUOTES)));
                $fecha3 = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha3'], ENT_QUOTES)));

                if ($fecha1 === ''){
                    $fecha1 = date('Y').'/01/01';
                }
                if ($fecha2 === ''){
                    $fecha2 = date('Y').'/01/01';
                }
                if ($fecha3 === ''){
                    $fecha3 = date('Y').'/01/01';
                }

                $insert = mysqli_query($conn, "INSERT INTO dotacion(id, nombre, cedula, cargo, nucleo, camisa, pantalon, botas, guayo, fecha1, fecha2, fecha3)
                    VALUES (NULL, '$nombre', '$cedula', '$cargo', '$nucleo', '$camisa', '$pantalon', '$botas', '$guayo', '$fecha1', '$fecha2', '$fecha3')") or die(mysqli_error($conn));
                if ($insert) {
					echo "<script>alert('Se ha registrado la dotacion!'); window.location = 'index.php'</script>";
				} else {
					echo "<script>alert('Error, no se pudo registrar la dotacion'); window.location = 'index.php'</script>";
				}
            }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-person-plus-fill"></i> Ingresar una dotacion</h4>
            </div>
            <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">
                <div class="control-group">
                    <div class="controls">
                        <a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>
                <hr>
                <p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>

                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="nombres">(*) nombre: </span>
                    <input name="nombres" id="nombres" class="form-control" type="text" required autocomplete="off"
                    placeholder="Ingrese el nombre del empleado" list="empleados">
                    <datalist id="empleados">
                        <?php
                            $query = $conn->query("SELECT nombres,cedula FROM clientes");
                            while ($nombresC = mysqli_fetch_array($query)) {
                                echo '<option value="' . $nombresC['nombres'] . '">' . $nombresC['cedula'] . '</option>';
                            }
                        ?>
                    </datalist>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="cedula">(*) cedula: </span>
                    <input name="cedula" id="cedula" class="form-control" type="text" required
                    placeholder="Ingrese el cedula del empleado" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="cargo">(*) cargo: </span>
                    <input name="cargo" id="cargo" class="form-control" type="hidden" required
                    readonly>
                    <input name="cargo1" id="cargo1" class="form-control" type="text" required
                    placeholder="Ingrese el cargo del empleado" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="nucleo">(*) Nucleo: </span>
                    <input name="nucleo" id="nucleo" class="form-control" type="hidden" required
                    readonly>
                    <input name="nucleo1" id="nucleo1" class="form-control" type="text" required
                    placeholder="Ingrese el nucleo del empleado" readonly>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="camisa">(*)Talla camisa:</span>
                    <input name="camisa" id="camisa" required class="form-control" type="text" 
                        placeholder="Talla de camisa">
                    <span class="input-group-text w-25" for="pantalon">(*)Talla pantalon:</span>
                    <input name="pantalon" id="pantalon" required class="form-control" type="text" 
                        placeholder="Talla de pantalon">
                </div>
				<hr>
				<div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="botas">(*)Talla botas:</span>
                    <input name="botas" id="botas" required class="form-control" type="text" 
                        placeholder="Talla de botas">
                    <span class="input-group-text w-25" for="guayo">(*)Talla guayo:</span>
					<input name="guayo" id="guayo" required class="form-control" type="text" 
						placeholder="Talla de guayo">
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" for="fecha1">(*)Primera entrega:</span>
                    <input name="fecha1" id="fecha1" class="form-control" type="date">
                    <span class="input-group-text" for="fecha2">(*)Segunda entrega:</span>
                    <input name="fecha2" id="fecha2" class="form-control" type="date">
                    <span class="input-group-text" for="fecha3">(*)Tercera entrega:</span>
                    <input name="fecha3" id="fecha3" class="form-control" type="date">
                </div>
                <hr>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                        <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
                <hr>

            </form>
        </div>

        <!--/.container-->
        <br>
        <!--/.wrapper-->
        <div class="card-footer">
            <div class="container">
                <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios
                        Forestales </b></center>
            </div>
        </div>

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>