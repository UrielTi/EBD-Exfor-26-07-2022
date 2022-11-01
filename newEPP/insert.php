<?php
if (isset($_POST['input'])) {
    $nombre = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre'], ENT_QUOTES)));
    //$codigo = mysqli_real_escape_string($conn, (strip_tags($_POST['codigo'], ENT_QUOTES)));
    $cantidad = mysqli_real_escape_string($conn, (strip_tags($_POST['cantidad'], ENT_QUOTES)));
    $nucleo = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
    $proveedor = mysqli_real_escape_string($conn, (strip_tags($_POST['proveedor'], ENT_QUOTES)));
    $precio = mysqli_real_escape_string($conn, (strip_tags($_POST['precio'], ENT_QUOTES)));

    $archivo = mysqli_real_escape_string($conn, (strip_tags($_FILES['img']['name'], ENT_QUOTES)));

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

    // Determinar la imagen y convertirla a webp si es necesario
    $path = "temp/" . $archivo;
    $extension = pathinfo($path, PATHINFO_EXTENSION);

    if ($_FILES['img']['error'] > 0) {
        echo "<script>alert('Error inesperado al subir el archivo'); window.location = 'registro.php'</script>";
    } else {
        $limite_kb = 200;
        if ($_FILES["img"]["size"] <= ($limite_kb * 1024)) {
            if ($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png' || $extension == 'webp') {
                // Primero subimos el archivo para poder modificarlo
                $ruta = "temp/";
                $imagePath = $ruta . $archivo;
                $quality = 80;

                move_uploaded_file($_FILES["img"]["tmp_name"], $imagePath);

                // comprobamos el tipo de imagen y la convertimos si es el caso
                if ($extension == 'jpeg' || $extension == 'jpg') {
                    //Obtengo la imagen guardada
                    $im = imagecreatefromjpeg($imagePath);
                    //Se le asigna el nuevo tipo de imagen
                    $newImagePath = str_replace("jpg", "webp", $imagePath);
                    //Se convierte la imagen
                    imagewebp($im, $newImagePath, $quality);
                    imagedestroy($im);
                    $imagen = $newImagePath;
                } else if ($extension == 'png') {
                    $im = imagecreatefrompng($imagePath);
                    $newImagePath = str_replace("png", "webp", $imagePath);
                    imagewebp($im, $newImagePath, $quality);
                    imagedestroy($im);
                    $imagen = $newImagePath;
                } else if ($extension == 'webp') {
                    $imagen = $archivo;
                }
            } else {
                echo "<script>alert(' La imágen no es del tipo JPEG, JPG, PNG, WEBP. '); window.location = 'registro.php'</script>";
            }
        } else {
            echo "<script>alert(' La imágen pesa más de 20MB '); window.location = 'registro.php'</script>";
        }
    }
    $sql_nucleo = mysqli_query($conn, "SELECT * FROM nucleos WHERE id_nucleos='$nucleo'") or die(mysqli_error($conn));
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
        // eliminar foto original y deja el formato webp
        if ($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png') {
            unlink($imagePath);
        }
        
        $consultaEpp = mysqli_query($conn, "SELECT id FROM epp WHERE codigo='$codigo'");
        $resultadoEpp = mysqli_fetch_assoc($consultaEpp);
        $id_elemento = intval($resultadoEpp['id']);
        if ($tallaU >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', 'U', '$tallaU', '$precioU')") or die(mysqli_error($conn));
        }
        if ($tallaS >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', 'S', '$tallaS', '$precioS')") or die(mysqli_error($conn));
        }
        if ($tallaM >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', 'M', '$tallaM', '$precioM')") or die(mysqli_error($conn));
        }
        if ($tallaL >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', 'L', '$tallaL', '$precioL')") or die(mysqli_error($conn));
        }
        if ($tallaXL >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', 'XL', '$tallaXL', '$precioXL')") or die(mysqli_error($conn));
        }
        if ($tallaXXL >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', 'XXL', '$tallaXXL', '$precioXXL')") or die(mysqli_error($conn));
        }
        if ($talla28 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '28', '$talla28', '$precio28')") or die(mysqli_error($conn));
        }
        if ($talla29 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '29', '$talla29', '$precio29')") or die(mysqli_error($conn));
        }
        if ($talla30 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '30', '$talla30', '$precio30')") or die(mysqli_error($conn));
        }
        if ($talla31 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '31', '$talla31', '$precio31')") or die(mysqli_error($conn));
        }
        if ($talla32 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '32', '$talla32', '$precio32')") or die(mysqli_error($conn));
        }
        if ($talla33 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '33', '$talla33', '$precio33')") or die(mysqli_error($conn));
        }
        if ($talla34 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '34', '$talla34', '$precio34')") or die(mysqli_error($conn));
        }
        if ($talla35 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '35', '$talla35', '$precio35')") or die(mysqli_error($conn));
        }
        if ($talla36 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '36', '$talla36', '$precio36')") or die(mysqli_error($conn));
        }
        if ($talla37 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '37', '$talla37', '$precio37')") or die(mysqli_error($conn));
        }
        if ($talla38 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '38', '$talla38', '$precio38')") or die(mysqli_error($conn));
        }
        if ($talla39 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '39', '$talla39', '$precio39')") or die(mysqli_error($conn));
        }
        if ($talla40 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '40', '$talla40', '$precio40')") or die(mysqli_error($conn));
        }
        if ($talla41 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '41', '$talla41', '$precio41')") or die(mysqli_error($conn));
        }
        if ($talla42 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '42', '$talla42', '$precio42')") or die(mysqli_error($conn));
        }
        if ($talla43 >= '0') {
            $insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id_elemento', '43', '$talla43', '$precio43')") or die(mysqli_error($conn));
        }
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><center> Se ha registrado correctamente el elemento en el inventario </center><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><center> No se pudo registrar el elemento en el inventario </center><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}
