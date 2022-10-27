<?php
include('../login/userRestrintion.php');
include('../include/conn/conn.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" type="text/css" href="./css/inputFile.css">
    <?php include("head.php"); ?>
</head>

<body>
    <?php include("../include/navegacion/nav.php"); ?>

    <div class="container-fluid border border-success bg-light">

        <?php include('insert.php'); ?>
        <hr>
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="h3"><i class="bi bi-bag-plus-fill"></i>&nbsp; Inventario <small class="text-success"> Registro </small></p>
            </div>
            <div class="panel-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <center><strong>¡Hola! </strong> Recuerda digitar correctamente los datos del elemento además de tomar la foto del elemento, Muchas Gracias.</center>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <a href="index.php" class="btn btn-sm btn-success">&nbsp;<i class="bi bi-arrow-left"></i>
                            Ir al Inventario </a>
                    </div>
                </div>
                <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST" enctype="multipart/form-data">
            </div>
            <hr>
            <!-- información elemento -->
            <span class="badge text-bg-success" style="font-size: 17px; margin-left: 13px;"> Datos del Elemento: </span>
            <br><br>
            <div class="container-fluid">
                <div class="input-group">
                    <input type="text" name="nombre" id="nombre" class="form-control rounded-end shadow-sm" style="margin-right: 10px; border-color: #198754; border-width: 1px;" onkeyup="mayus(this);" placeholder="NOMBRE DEL ELEMENTO" required>
                    <input type="hidden" name="nucleo" value="<?php echo $_SESSION['nucleo']; ?>">
                    <input name="proveedor" id="proveedor" onkeyup="mayus(this);" class="form-control rounded-start shadow-sm" style="border-color: #198754; border-width: 1px;" type="text" placeholder="PROVEEDOR" required>
                </div>
                <br>
                <div class="input-group">
                    <select class="form-select rounded-end shadow-sm" style="margin-right: 10px; border-color: #198754; border-width: 1px;" aria-label="Default select example" id="rotacion" name="rotacion" required>
                        <option value=""> Rotación </option>
                        <option value="0"> Baja </option>
                        <option value="1"> Alta </option>
                    </select>
                    <select id="my_selector" name="tipo_talla" class="form-select rounded-start shadow-sm" style="border-color: #198754; border-width: 1px;" aria-label="Default select example" required>
                        <option value="1">Tipo de Talla</option>
                        <option value="2">Única</option>
                        <option value="3">Múltiple</option> <!-- Colocar aria controls a los collapse de abajo -->
                    </select>
                </div>
                <br>
                <div class="custom-input-file d-grid gap-2 d-md-block col-6 mx-auto shadow">
                    <input type="file" id="fichero-tarifas" name="img" class="input-file" value="">
                    <i class="bi bi-camera-fill"></i> Imágen del elemento <i class="bi bi-paperclip"></i>
                </div>
                <br>
                <!-- Tallas (única o multiples) -->
                <?php include('../newEPP/tabla_tallas.php') ?>
                <hr>
                <p>
            </div>
            <span class="badge" style="font-size: 17px; margin-left: 13px; background-color: #0d6efdff;"> Total del elemento: </span>
            <br><br>
            <div class="container-fluid">
                <div class="input-group">
                    <div class="input-group">
                        <span class="input-group-text shadow-sm" style="background-color: #0d6efdff; color: white; border-color: #0d6efdff; border-width: 1px;" id="addon-wrapping"> Cantidad: </span>
                        <input name="cantidad" id="cantidad" class="form-control rounded-end shadow-sm" style="margin-right: 10px; border-color: #0d6efdff; border-width: 1px;" type="number" readonly>
                        <span class="input-group-text shadow-sm rounded-start" style="background-color: #0d6efdff; color: white; border-color: #0d6efdff; border-width: 1px;" id="addon-wrapping"> Precio: </span>
                        <input name="precio" id="precio" class="form-control shadow-sm" style="border-color: #0d6efdff; border-width: 1px;" type="number" readonly>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <br>

        <div class="control-group">
            <center>
                <h6>Para registrar los cambios realizados, dar clic en el siguiente botón de Registrar o de lo contrario en el botón de Cancelar para salir:</h6>
            </center>
            <div class="controls">
                <center><button type="submit" name="input" id="input" class="btn btn-sm btn-success"><i class="bi bi-bag-plus-fill"></i></i> Registrar</button>
                    <a href="index.php" class="btn btn-sm btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
                </center>
            </div>
        </div>
        <br>
        </form>
    </div>
    <br>
    <div class="card-footer">
        <div class="container">
            <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios
                    Forestales </b></center>
        </div>
    </div>
</body>

</html>