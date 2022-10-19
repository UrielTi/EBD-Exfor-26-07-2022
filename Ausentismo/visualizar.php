<?php
include("../login/userRestrintion.php");
include "../include/conn/conn.php";
include("../cond/todo.php"); ?>
<div class="alert alert-success" role="alert">
    <center><strong>Nota:</strong> Si la información que ves aquí es errónea, puedes modificarla
        usando el botón de <strong>"<i class="bi bi-pencil-square"></i> Editar
            Información"</strong>.</center>
</div>
<hr>
<?php
$id = intval($_GET['id']);
$sql = mysqli_query($conn, "SELECT * FROM ausentismo WHERE id='$id'");
if (mysqli_num_rows($sql) == 0) {
    header("Location: index.php");
} else {
    $row = mysqli_fetch_assoc($sql);
}
?>

<div class="panel panel-default">

    <form name="form1" id="form1" class="form-horizontal row-fluid" action="visualizar.php" method="GET">

        <div class="input-group shadow-sm">
            <div class="controls">
                <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i class="bi bi-pencil-square"></i> Editar Información</a>
            </div>
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" id="id">ID: </span>
            <input class="form-control" type="text" name="id" id="id" value="<?php echo $row['id']; ?>" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="nombres">Nombres: </span>
            <input class="form-control" type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="cedula">Cédula: </span>
            <input class="form-control" name="cedula" id="cedula" value="<?php echo $row['cedula']; ?>" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="cargo">Cargo: </span>
            <input name="cargo" id="cargo" value="<?php echo $cargos[$row['cargo']] ?>" class="form-control " type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="proceso">Proceso: </span>
            <input name="proceso" id="proceso" value="<?php echo $procesos[$row['proceso']] ?>" class=" form-control " type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="nucleo">Núcleo: </span>
            <input name="nucleo" id="nucleo" value="<?php echo $nucleos[$row['nucleo']] ?>" class="form-control " type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="eps">EPS: </span>
            <input name="eps" id="eps" value="<?php echo $epss[$row['eps']] ?>" class="form-control " type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <label class="input-group-text w-25" for="mes_evento">Mes del Evento: </label>
            <input name="mes_evento" id="mes_evento" value="<?php echo $meses[$row['mes_evento']] ?>" class="form-control" type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="fecha_inicio">Fecha de Inicio: </span>
            <input name="fecha_inicio" id="fecha_inicio" value="<?php echo $row['fecha_inicio']; ?>" class=" form-control " type="text" readonly="readonly" />
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="fecha_final">Fecha Final: </span>
            <input name="fecha_final" id="fecha_final" value="<?php echo $row['fecha_final']; ?>" class=" form-control " type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="dias_ausentismo">Dias de Ausentismo: </span>
            <input name="dias_ausentismo" id="dias_ausentismo" value="<?php echo $row['dias_ausentismo']; ?>" class=" form-control " type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="prorroga">Prorroga: </span>
            <input name="prorroga" id="prorroga" value="<?php echo $prorrogas[$row['prorroga']] ?>" class=" form-control " type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="dx">(*) Diagnostico (DX): </span>
            <input name="dx" id="dx" value="<?php echo $row['dx']; ?>" class="form-control" type="text" readonly>
            <textarea name="diagnostico" id="diagnostico" class="form-control" type="text" rows="1" required readonly><?php echo $row['diagnostico'] ?></textarea>
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="descripcion">Descripción: </span>
            <textarea name="descripcion" id="descripcion" class=" form-control " type="text" readonly="readonly"><?php echo $row['descripcion']; ?></textarea>
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="evento">Tipo de Evento: </span>
            <input name="evento" id="evento" value="<?php echo $eventos[$row['evento']] ?>" class="form-control " type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="peligro_aso">Peligro Asociado: </span>
            <input name="peligro_aso" id="peligro_aso" value="<?php echo $peligros[$row['peligro_aso']] ?>" class="form-control " type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="sve">SVE: </span>
            <input name="sve" id="sve" value="<?php echo $programas[$row['sve']] ?>" class="form-control " type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <span class="input-group-text w-25" for="estado">Estado: </span>
            <input name="estado" id="estado" value="<?php echo $estados_aus[$row['estado']] ?>" class="form-control " type="text" readonly="readonly">
        </div>
        <hr>

        <div class="input-group shadow-sm">
            <div class="controls">
                <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i class="bi bi-pencil-square"></i> Editar Información</a>
            </div>
        </div>
        <hr>
    </form>
</div>