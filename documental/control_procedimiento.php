<?php
session_start();
include "../include/conn/conn.php";
?>
<html lang="en">

<head>
    <?php include("head.php"); ?>
</head>
<?php
$document = 'PROCEDIMIENTO CONTROL DE DOCUMENTOS';
$select = mysqli_query($conn, "SELECT archivo FROM documentos WHERE nombre='$document'");
$query = mysqli_fetch_assoc($select);
$path = "files/";
$archivo = $query['archivo'];
$src = 'src="' . $path . $archivo . '"';
?>

<body>
    <div class="container">
        <div class="alert alert-info" role="alert"> En este apartado encontrarás información que es necesaria para llevar a cabo
            el adecuado manejo de documentos de la empresa, para ello a continuación podrá navegar en una vista previa
            del documento PROCEDIMIENTO CONTROL DE DOCUMENTOS.
        </div>
        <hr>
        <div class="d-flex">
            <div class="card" style="width: 100%;">
                <div class="d-flex justify-content-center">
                    <embed <?php echo $src; ?> type="application/pdf" style="width: 100% !important;" height="500px" />
                </div>
            </div>&nbsp;
            <div class="container">
                <h5 class="card-title text-primary">Referencias:</h5>
                <br>
                <div class="alert alert-info" role="alert">Elaboración de Documentos - Pág.12</div>
                <div class="alert alert-info" role="alert">Actualización y Modificación de documentos - Pág.13-14</div>
                <h5 class="card-title text-primary">Solicitudes:</h5>
                <br>
                <div class="alert alert-info" href="" role="alert">En caso de que se genere la necesidad de actualizar o
                    modificar algún documento, porfavor comunicarse directamente con: <strong>gestionriesgo@exfor.co</strong>
                    ¡Muchas Gracias!.
                </div>
                <h5 class="card-title text-primary">Descargar archivo:</h5>
                <br>
                <div class="d-flex flex-column mb-3">
                    <a href="downloads.php?file=<?php echo $archivo; ?>" title="Descargar documento" class="btn btn-primary btn-lg"><i class="bi bi-download"></i></a>
                </div>
            </div>
        </div>
</body>

</html>