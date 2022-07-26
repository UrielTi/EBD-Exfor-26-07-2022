<?php include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("head.php"); ?>
</head>

<body>
    <?php include("../include/navegacion/nav.php"); ?>

    <div class="container-fluid border border-success bg-light">
        <hr>
        <div class="alert alert-success" role="alert">
            <center><strong>¡Hola!</strong> Asegúrate de que la información del elemento EPP que estas diligenciando sea
                la correcta, en cualquier caso si necesitas modificar algún dato en otro
                momento puedes hacerlo con el botón <i class="bi bi-pencil-fill"></i> o en "Editar
                Información" en la visualización de los elementos EPP <i class="bi bi-search"></i> , <strong>¡Muchas
                    Gracias!</strong></center>
        </div>
        <hr>
        <?php
        if (isset($_POST['input'])) {
            $nombre = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre'], ENT_QUOTES)));
            //$codigo  	= mysqli_real_escape_string($conn, (strip_tags($_POST['codigo'], ENT_QUOTES)));
            $cantidad = mysqli_real_escape_string($conn, (strip_tags($_POST['cantidad'], ENT_QUOTES)));
            $nucleo = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
            $proveedor = mysqli_real_escape_string($conn, (strip_tags($_POST['proveedor'], ENT_QUOTES)));
            $precio1 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio'], ENT_QUOTES)));
            $precio = number_format($precio1);
            $imagen = mysqli_real_escape_string($conn, (file_get_contents($_FILES["img"]["tmp_name"], ENT_QUOTES)));
            //TALLAS
            $tipo_talla = mysqli_real_escape_string($conn, (strip_tags($_POST['tipo_talla'], ENT_QUOTES)));
            $tallaU = mysqli_real_escape_string($conn, (strip_tags($_POST['tallaU'], ENT_QUOTES)));
            $tallaS = mysqli_real_escape_string($conn, (strip_tags($_POST['tallaS'], ENT_QUOTES)));
            $tallaM = mysqli_real_escape_string($conn, (strip_tags($_POST['tallaM'], ENT_QUOTES)));
            $tallaL = mysqli_real_escape_string($conn, (strip_tags($_POST['tallaL'], ENT_QUOTES)));
            $tallaXL = mysqli_real_escape_string($conn, (strip_tags($_POST['tallaXL'], ENT_QUOTES)));
            $tallaXXL = mysqli_real_escape_string($conn, (strip_tags($_POST['tallaXXL'], ENT_QUOTES)));
            $talla28 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla28'], ENT_QUOTES)));
            $talla29 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla29'], ENT_QUOTES)));
            $talla30 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla30'], ENT_QUOTES)));
            $talla31 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla31'], ENT_QUOTES)));
            $talla32 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla32'], ENT_QUOTES)));
            $talla33 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla33'], ENT_QUOTES)));
            $talla34 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla34'], ENT_QUOTES)));
            $talla35 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla35'], ENT_QUOTES)));
            $talla36 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla36'], ENT_QUOTES)));
            $talla37 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla37'], ENT_QUOTES)));
            $talla38 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla38'], ENT_QUOTES)));
            $talla39 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla39'], ENT_QUOTES)));
            $talla40 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla40'], ENT_QUOTES)));
            $talla41 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla41'], ENT_QUOTES)));
            $talla42 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla42'], ENT_QUOTES)));
            $talla43 = mysqli_real_escape_string($conn, (strip_tags($_POST['talla43'], ENT_QUOTES)));
            //precios
            $precioU = mysqli_real_escape_string($conn, (strip_tags($_POST['precioU'], ENT_QUOTES)));
            $precioS = mysqli_real_escape_string($conn, (strip_tags($_POST['precioS'], ENT_QUOTES)));
            $precioM = mysqli_real_escape_string($conn, (strip_tags($_POST['precioM'], ENT_QUOTES)));
            $precioL = mysqli_real_escape_string($conn, (strip_tags($_POST['precioL'], ENT_QUOTES)));
            $precioXL = mysqli_real_escape_string($conn, (strip_tags($_POST['precioXL'], ENT_QUOTES)));
            $precioXXL = mysqli_real_escape_string($conn, (strip_tags($_POST['precioXXL'], ENT_QUOTES)));
            $precio28 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio28'], ENT_QUOTES)));
            $precio29 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio29'], ENT_QUOTES)));
            $precio30 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio30'], ENT_QUOTES)));
            $precio31 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio31'], ENT_QUOTES)));
            $precio32 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio32'], ENT_QUOTES)));
            $precio33 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio33'], ENT_QUOTES)));
            $precio34 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio34'], ENT_QUOTES)));
            $precio35 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio35'], ENT_QUOTES)));
            $precio36 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio36'], ENT_QUOTES)));
            $precio37 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio37'], ENT_QUOTES)));
            $precio38 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio38'], ENT_QUOTES)));
            $precio39 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio39'], ENT_QUOTES)));
            $precio40 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio40'], ENT_QUOTES)));
            $precio41 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio41'], ENT_QUOTES)));
            $precio42 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio42'], ENT_QUOTES)));
            $precio43 = mysqli_real_escape_string($conn, (strip_tags($_POST['precio43'], ENT_QUOTES)));
            //alta rotacion
            $rotacion = mysqli_real_escape_string($conn, (strip_tags($_POST['rotacion'], ENT_QUOTES)));

            $sql_nucleo = mysqli_query($conn, "SELECT * FROM nucleos WHERE id_nucleos='$nucleo'");
            $row_nucleo = mysqli_fetch_assoc($sql_nucleo);
            $aleatorio = mt_rand(100, 999);
            $codigo = strtoupper($nombre[0]) . '-' . "$aleatorio" . '-' . $row_nucleo['id_nucleos'][0];

            $name_mayus = strtoupper($nombre);

            $select_codigo = ("SELECT codigo FROM epp WHERE codigo='" . $codigo . "'");
            $query_codigo = mysqli_query($conn, $select_codigo);
            $total_codigos = mysqli_num_rows($query_codigo);
            if ($total_codigos <= 0) {
            } else {
                $aleatorio2 = mt_rand(100, 999);
                $codigo = strtoupper($nombre[0]) . '-' . "$aleatorio2" . '-' . $row_nucleo['nucleo'][0];
            }
            mysqli_free_result($query_codigo);

            $insert = mysqli_query($conn, "INSERT INTO epp(id, codigo, imagen, nombre, stock, nucleo, proveedor, precio, rotacion, tipo_talla)VALUES(NULL,'$codigo', '$imagen', '$nombre', '$cantidad', '$nucleo', '$proveedor', '$precio', '$rotacion', '$tipo_talla')") or die(mysqli_error($conn));
            if ($insert) {
                $consultaEpp = mysqli_query($conn, "SELECT id FROM epp WHERE codigo='$codigo'");
                $resultadoEpp = mysqli_fetch_assoc($consultaEpp);
                $id_elemento = intval($resultadoEpp['id']);

                if ($tallaU >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', 'U', '$tallaU', '$precioU')") or die(mysqli_error($conn));
                }
                if ($tallaS >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', 'S', '$tallaS', '$precioS')") or die(mysqli_error($conn));
                }
                if ($tallaM >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', 'M', '$tallaM', '$precioM')") or die(mysqli_error($conn));
                }
                if ($tallaL >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', 'L', '$tallaL', '$precioL')") or die(mysqli_error($conn));
                }
                if ($tallaXL >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', 'XL', '$tallaXL', '$precioXL')") or die(mysqli_error($conn));
                }
                if ($tallaXXL >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', 'XXL', '$tallaXXL', '$precioXXL')") or die(mysqli_error($conn));
                }
                if ($talla28 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '28', '$talla28', '$precio28')") or die(mysqli_error($conn));
                }
                if ($talla29 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '29', '$talla29', '$precio29')") or die(mysqli_error($conn));
                }
                if ($talla30 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '30', '$talla30', '$precio30')") or die(mysqli_error($conn));
                }
                if ($talla31 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '31', '$talla31', '$precio31')") or die(mysqli_error($conn));
                }
                if ($talla32 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '32', '$talla32', '$precio32')") or die(mysqli_error($conn));
                }
                if ($talla33 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '33', '$talla33', '$precio33')") or die(mysqli_error($conn));
                }
                if ($talla34 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '34', '$talla34', '$precio34')") or die(mysqli_error($conn));
                }
                if ($talla35 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '35', '$talla35', '$precio35')") or die(mysqli_error($conn));
                }
                if ($talla36 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '36', '$talla36', '$precio36')") or die(mysqli_error($conn));
                }
                if ($talla37 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '37', '$talla37', '$precio37')") or die(mysqli_error($conn));
                }
                if ($talla38 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '38', '$talla38', '$precio38')") or die(mysqli_error($conn));
                }
                if ($talla39 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '39', '$talla39', '$precio39')") or die(mysqli_error($conn));
                }
                if ($talla40 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '40', '$talla40', '$precio40')") or die(mysqli_error($conn));
                }
                if ($talla41 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '41', '$talla41', '$precio41')") or die(mysqli_error($conn));
                }
                if ($talla42 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '42', '$talla42', '$precio42')") or die(mysqli_error($conn));
                }
                if ($talla43 >= '0') {
                    $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio_unitario)VALUES(NULL, '$id_elemento', '43', '$talla43', '$precio43')") or die(mysqli_error($conn));
                }
                echo '<div class="alert alert-success alert-dismissable"><center>&nbsp; Se ha registrado correctamente el elemento &nbsp;<button type="button" class="btn btn-outline-success" data-dismiss="alert" aria-hidden="true">Cerrar Ventana &times;</button></center></div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissable">&nbsp; No se pudo registrar el elemento verifique los datos &nbsp;<button type="button" class="btn btn-outline-success" data-dismiss="alert" aria-hidden="true">Volver Intentar &times;</button></div>';
            }
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-bag-plus-fill"></i></i> Ingresar un nuevo elemento</h4>
            </div>

            <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST" enctype="multipart/form-data">

                <div class="control-group">
                    <div class="controls">
                        <a href="index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>
                <hr>
                <p class="fw-bold text-danger">Todos los campos señalizados con un (*) son obligatorios.</p>
                <hr>

                <!-- información elemento -->
                <center><a class="btn btn-success w-25" data-bs-toggle="collapse" href="#ref_info_elemento" role="button" aria-expanded="false" aria-controls="ref_info_elemento">
                        <i class="bi bi-arrow-down"></i> INFORMACIÓN DEL ELEMENTO
                    </a></center>
                <div class="collapse show" id="ref_info_elemento">
                    <div class="card card-body">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-auto" for="img">(*) Imagen o fotografía: </span>
                            <input type="file" name="img" id="img" class="form-control">
                        </div>
                        <br>

                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-auto" for="nombre">(*) Nombre del elemento: </span>
                            <input type="text" name="nombre" id="nombre" class="form-control" onkeyup="mayus(this);" placeholder="INGRESA EL NOMBRE DEL ELEMENTO" required>
                        </div>
                        <br>
                        <!-- Tallas (única o multiples) -->
                        <?php include('../newEPP/tabla_tallas.php') ?>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="cantidad">Cantidad total: </span>
                                <input name="cantidad" id="cantidad" class="form-control" type="number" readonly>
                                <span class="input-group-text w-50"> unidad(es)</span>
                            </div>&nbsp;
                            <br>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="precio">Precio total: </span>
                                <span class="input-group-text w-auto">$</span>
                                <input name="precio" id="precio" class="form-control precio_moneda" type="number" readonly>
                                <span class="input-group-text w-50"> pesos</span>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="input-group shadow-sm">
                                <label class="input-group-text w-auto" for="nucleo">(*) Núcleo: </label>
                                <select class="form-select" name="nucleo" id="nucleo" required>
                                    <option value="">SELECCIONA EL NÚCLEO</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM nucleos");
                                    while ($nucleo = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $nucleo['id_nucleos'] . '">' . $nucleo['nucleos'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>&nbsp;
                            <br>

                            <div class="input-group shadow-sm">
                                <span class="input-group-text w-auto" for="proveedor">(*) Proveedor: </span>
                                <input name="proveedor" id="proveedor" onkeyup="mayus(this);" class="form-control" type="text" placeholder="INGRESA AL PROVEEDOR" required>
                            </div>
                        </div>
                        <br>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text w-auto" for="rotacion">(*) Es un elemento de alta rotacion: </span>
                            <select class="form-control" id="rotacion" name="rotacion">
                                <option value="0">NO</option>
                                <option value="1">SI</option>
                            </select>
                        </div>
                        <center>
                            <hr><a class="btn btn-outline-success float-right" data-bs-toggle="collapse" href="#ref_info_elemento" role="button" aria-expanded="true" aria-controls="ref_personales">
                                <i class="bi bi-arrow-up"></i> Cerrar Segmento
                            </a>
                        </center>
                    </div>
                </div>
                <hr>
                <div class="card card-body">
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
                </div>

            </form>
        </div>
        <!--/.content-->
        <!--/.container-->
        <br>
        <!--/.wrapper-->
        <div class="card-footer">
            <div class="container">
                <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios
                        Forestales </b></center>
            </div>
        </div>

        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body>

<!-- Valores en pesos -->
<script>
    $("input.precio_moneda").each((i, ele) => {
        let clone = $(ele).clone(false)
        clone.attr("type", "text")
        let ele1 = $(ele)
        clone.val(Number(ele1.val()).toLocaleString("es"))
        $(ele).after(clone)
        $(ele).hide()
        clone.mouseenter(() => {
            ele1.show()
            clone.hide()
        })
        setInterval(() => {
            let newv = Number(ele1.val()).toLocaleString("es")
            if (clone.val() != newv) {
                clone.val(newv)
            }
        }, 10)
        $(ele).mouseleave(() => {
            $(clone).show()
            $(ele1).hide()
        })
    })
</script>

</html>