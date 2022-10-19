<?php session_start();
include "../include/conn/conn.php";
include "../cond/todo.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("head.php"); ?>
</head>

<body>
    <?php include("../empleados/update-fecha.php"); ?>
    <div class="container-fluid border border-success bg-light">
        <hr>
        <div class="alert alert-success" role="alert">
            <center><strong>¡Hola!</strong> Asegúrate de que la información que se esté diligenciando se encuentre actualizada a la fecha. <strong>¡Muchas Gracias!</strong></center>
        </div>
        <hr>
        <?php
        $id = $_GET['id'];
        $sql = mysqli_query($conn, "SELECT id, estado, fecha_salida, fecha_ingreso FROM clientes WHERE id='$id'");
        if (mysqli_num_rows($sql) == 0) {
            echo "<script>window.location = 'index.php'</script>";
        } else {
            $row = mysqli_fetch_assoc($sql);
        } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-pencil-square"></i> Editar Estado, Fecha de ingreso y salida</h4>
            </div>
            <p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>
            <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-fecha.php" method="POST">
                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" id="id">ID: </span>
                    <input class="form-control" type="text" name="id" id="id" value="<?php echo $row['id']; ?>" readonly="readonly">
                </div>
                <hr>
                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" for="estado">(*) Estado: </label>
                    <select class="form-select" name="estado" id="estado" required>
                        <option value="1" <?php if ($row['estado'] == 1) {
                                                echo "selected";
                                            } ?>>ACTIVO</option>
                        <option value="2" <?php if ($row['estado'] == 2) {
                                                echo "selected";
                                            } ?>>INACTIVO</option>
                    </select>
                </div>
                <hr>
                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" id="fecha_ingreso">(*) Fecha de Ingreso: </label>
                    <input name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $row['fecha_ingreso']; ?>" class="form-control span8 tip" type="date" required>
                </div>
                <hr>
                <div class="input-group shadow-sm">
                    <label class="input-group-text w-25" id="fecha_salida">(*) Fecha de Salida: </label>
                    <input name="fecha_salida" id="fecha_salida" value="<?php echo $row["fecha_salida"]; ?>" class="form-control span8 tip" type="date">
                </div>
                <hr>
                <div class="input-group shadow-sm">
                    <div class="controls">
                        <input type="submit" name="update-fecha" id="update-fecha" value="Actualizar" class="btn btn-sm btn-primary" />
                        <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
            </form>
</body>

</html>