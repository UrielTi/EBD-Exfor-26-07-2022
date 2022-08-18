<?php
include '../include/conn/conn.php';
if (isset($_POST['update'])) {
	if (
		!empty($_FILES['img']['tmp_name'])
		&& file_exists($_FILES['img']['tmp_name'])
	) {
		$imagen = addslashes(file_get_contents($_FILES['img']['tmp_name'], ENT_QUOTES));
	}
	$id			= intval($_POST['id']);
	$nombre	= mysqli_real_escape_string($conn, (strip_tags($_POST['nombre'], ENT_QUOTES)));
	$codigo  	= mysqli_real_escape_string($conn, (strip_tags($_POST['codigo'], ENT_QUOTES)));
	$cantidad  = mysqli_real_escape_string($conn, (strip_tags($_POST['cantidad'], ENT_QUOTES)));
	$proveedor  = mysqli_real_escape_string($conn, (strip_tags($_POST['proveedor'], ENT_QUOTES)));
	$precio  = mysqli_real_escape_string($conn, (strip_tags($_POST['precio'], ENT_QUOTES)));
	$nucleo  = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
	$rotacion  = mysqli_real_escape_string($conn, (strip_tags($_POST['rotacion'], ENT_QUOTES)));
	/**TALLAS */
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
	/**PRECIO */
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
	/**ID */
	$idU  = mysqli_real_escape_string($conn, (strip_tags($_POST['idU'], ENT_QUOTES)));
	$idS  = mysqli_real_escape_string($conn, (strip_tags($_POST['idS'], ENT_QUOTES)));
	$idM  = mysqli_real_escape_string($conn, (strip_tags($_POST['idM'], ENT_QUOTES)));
	$idL  = mysqli_real_escape_string($conn, (strip_tags($_POST['idL'], ENT_QUOTES)));
	$idXL  = mysqli_real_escape_string($conn, (strip_tags($_POST['idXL'], ENT_QUOTES)));
	$idXXL  = mysqli_real_escape_string($conn, (strip_tags($_POST['idXXL'], ENT_QUOTES)));
	$id28  = mysqli_real_escape_string($conn, (strip_tags($_POST['id28'], ENT_QUOTES)));
	$id29  = mysqli_real_escape_string($conn, (strip_tags($_POST['id29'], ENT_QUOTES)));
	$id30  = mysqli_real_escape_string($conn, (strip_tags($_POST['id30'], ENT_QUOTES)));
	$id31  = mysqli_real_escape_string($conn, (strip_tags($_POST['id31'], ENT_QUOTES)));
	$id32  = mysqli_real_escape_string($conn, (strip_tags($_POST['id32'], ENT_QUOTES)));
	$id33  = mysqli_real_escape_string($conn, (strip_tags($_POST['id33'], ENT_QUOTES)));
	$id34  = mysqli_real_escape_string($conn, (strip_tags($_POST['id34'], ENT_QUOTES)));
	$id35  = mysqli_real_escape_string($conn, (strip_tags($_POST['id35'], ENT_QUOTES)));
	$id36  = mysqli_real_escape_string($conn, (strip_tags($_POST['id36'], ENT_QUOTES)));
	$id37  = mysqli_real_escape_string($conn, (strip_tags($_POST['id37'], ENT_QUOTES)));
	$id38  = mysqli_real_escape_string($conn, (strip_tags($_POST['id38'], ENT_QUOTES)));
	$id39  = mysqli_real_escape_string($conn, (strip_tags($_POST['id39'], ENT_QUOTES)));
	$id40  = mysqli_real_escape_string($conn, (strip_tags($_POST['id40'], ENT_QUOTES)));
	$id41  = mysqli_real_escape_string($conn, (strip_tags($_POST['id41'], ENT_QUOTES)));
	$id42  = mysqli_real_escape_string($conn, (strip_tags($_POST['id42'], ENT_QUOTES)));
	$id43  = mysqli_real_escape_string($conn, (strip_tags($_POST['id43'], ENT_QUOTES)));

	$sql = mysqli_query($conn, "SELECT * FROM epp WHERE codigo='$codigo'");
	$row = mysqli_fetch_assoc($sql);

	$update = mysqli_query($conn, "UPDATE epp SET nombre='$nombre', stock='$cantidad', nucleo='$nucleo', proveedor='$proveedor', precio='$precio', rotacion='$rotacion', tipo_talla='$tipo_talla' WHERE id='$id' AND codigo='$codigo'") or die(mysqli_error($conn));
	if ($update) {
		if (isset($imagen)) {
			$consult_img = mysqli_query($conn, "SELECT imagen FROM epp WHERE id='$id' and codigo='$codigo'");
			$query_img = mysqli_fetch_assoc($consult_img);
			if (mysqli_num_rows($consult_img) == 0) {
				if ($imagen >= '') {
					$insert_img = mysqli_query($conn, "INSERT INTO epp (imagen)VALUES('$imagen') WHERE id='$id' AND codigo='$codigo'");
				}
			} else {
				if ($imagen != $query_img['imagen']) {
					$update_img = mysqli_query($conn, "UPDATE epp SET imagen='$imagen' WHERE id='$id' AND codigo='$codigo'");
				}
			}
		}
		//Update tallas
		$consult_tallaU = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='U'");
		$epp_tallaU = mysqli_fetch_assoc($consult_tallaU);
		if (mysqli_num_rows($consult_tallaU) == 0) {
			if ($tallaU >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', 'U', '$tallaU', '$precioU')") or die(mysqli_error($conn));
			}
		} else {
			if ($tallaU != $epp_tallaU['cantidad'] || $precioU != $epp_tallaU['precio']) {
				if($tallaU == ''){
					$tallaU = '0';
					$precioU = '0';
				}
				$updateTallaU = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$tallaU', precio='$precioU' WHERE id=$idU and id_elemento=$id");
			}
		}
		$consult_tallaS = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='S'");
		$epp_tallaS = mysqli_fetch_assoc($consult_tallaS);
		if (mysqli_num_rows($consult_tallaS) == 0) {
			if ($tallaS >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', 'S', '$tallaS', '$precioS')") or die(mysqli_error($conn));
			}
		} else {
			if ($tallaS != $epp_tallaS['cantidad'] || $precioS != $epp_tallaS['precio']) {
				if($tallaS == ''){
					$tallaS = '0';
					$precioS = '0';
				}
				$updateTallaS = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$tallaS', precio='$precioS' WHERE id=$idS and id_elemento=$id");
			}
		}
		$consult_tallaM = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='M'");
		$epp_tallaM = mysqli_fetch_assoc($consult_tallaM);
		if (mysqli_num_rows($consult_tallaM) == 0) {
			if ($tallaM >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', 'M', '$tallaM', '$precioM')") or die(mysqli_error($conn));
			}
		} else {
			if ($tallaM != $epp_tallaM['cantidad'] || $precioM != $epp_tallaM['precio']) {
				if($tallaM == ''){
					$tallaM = '0';
					$precioM = '0';
				}
				$updateTallaM = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$tallaM', precio='$precioM' WHERE id=$idM and id_elemento=$id");
			}
		}
		$consult_tallaL = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='L'");
		$epp_tallaL = mysqli_fetch_assoc($consult_tallaL);
		if (mysqli_num_rows($consult_tallaL) == 0) {
			if ($tallaL >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', 'L', '$tallaL', '$precioL')") or die(mysqli_error($conn));
			}
		} else {
			if ($tallaL != $epp_tallaL['cantidad'] || $precioL != $epp_tallaL['precio']) {
				if($tallaL == ''){
					$tallaL = '0';
					$precioL = '0';
				}
				$updateTallaL = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$tallaL', precio='$precioL' WHERE id=$idL and id_elemento=$id");
			}
		}
		$consult_tallaXL = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='XL'");
		$epp_tallaXL = mysqli_fetch_assoc($consult_tallaXL);
		if (mysqli_num_rows($consult_tallaXL) == 0) {
			if ($tallaXL >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', 'XL', '$tallaXL', '$precioXL')") or die(mysqli_error($conn));
			}
		} else {
			if ($tallaXL != $epp_tallaXL['cantidad'] || $precioXL != $epp_tallaXL['precio']) {
				if($tallaXL == ''){
					$tallaXL = '0';
					$precioXL = '0';
				}
				$updateTallaXL = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$tallaXL', precio='$precioXL' WHERE id=$idXL and id_elemento=$id");
			}
		}
		$consult_tallaXXL = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='XXL'");
		$epp_tallaXXL = mysqli_fetch_assoc($consult_tallaXXL);
		if (mysqli_num_rows($consult_tallaXXL) == 0) {
			if ($tallaXXL >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', 'XXL', '$tallaXXL', '$precioXXL')") or die(mysqli_error($conn));
			}
		} else {
			if ($tallaXXL != $epp_tallaXXL['cantidad'] || $precioXXL != $epp_tallaXXL['precio']) {
				if($tallaXXL == ''){
					$tallaXXL = '0';
					$precioXXL = '0';
				}
				$updateTallaXXL = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$tallaXXL', precio='$precioXXL' WHERE id=$idXXL and id_elemento=$id");
			}
		}
		$consult_talla28 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='28'");
		$epp_talla28 = mysqli_fetch_assoc($consult_talla28);
		if (mysqli_num_rows($consult_talla28) == 0) {
			if ($talla28 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '28', '$talla28', '$precio28')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla28 != $epp_talla28['cantidad'] || $precio28 != $epp_talla28['precio']) {
				if($talla28 == ''){
					$talla28 = '0';
					$precio28 = '0';
				}
				$updateTalla28 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla28', precio='$precio28' WHERE id=$id28 and id_elemento=$id");
			}
		}
		$consult_talla29 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='29'");
		$epp_talla29 = mysqli_fetch_assoc($consult_talla29);
		if (mysqli_num_rows($consult_talla29) == 0) {
			if ($talla29 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '29', '$talla29', '$precio29')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla29 != $epp_talla29['cantidad'] || $precio29 != $epp_talla29['precio']) {
				if($talla29 == ''){
					$talla29 = '0';
					$precio29 = '0';
				}
				$updateTalla29 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla29', precio='$precio29' WHERE id=$id29 and id_elemento=$id");
			}
		}

		$consult_talla30 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='30'");
		$epp_talla30 = mysqli_fetch_assoc($consult_talla30);
		if (mysqli_num_rows($consult_talla30) == 0) {
			if ($talla30 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '30', '$talla30', '$precio30')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla30 != $epp_talla30['cantidad'] || $precio30 != $epp_talla30['precio']) {
				if($talla30 == ''){
					$talla30 = '0';
					$precio30 = '0';
				}
				$updateTalla30 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla30', precio='$precio30' WHERE id=$id30 and id_elemento=$id");
			}
		}

		$consult_talla31 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='31'");
		$epp_talla31 = mysqli_fetch_assoc($consult_talla31);
		if (mysqli_num_rows($consult_talla31) == 0) {
			if ($talla31 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '31', '$talla31', '$precio31')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla31 != $epp_talla31['cantidad'] || $precio31 != $epp_talla31['precio']) {
				if($talla31 == ''){
					$talla31 = '0';
					$precio31 = '0';
				}
				$updateTalla31 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla31', precio='$precio31' WHERE id=$id31 and id_elemento=$id");
			}
		}
		$consult_talla32 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='32'");
		$epp_talla32 = mysqli_fetch_assoc($consult_talla32);
		if (mysqli_num_rows($consult_talla32) == 0) {
			if ($talla32 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '32', '$talla32', '$precio32')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla32 != $epp_talla32['cantidad'] || $precio32 != $epp_talla32['precio']) {
				if($talla32 == ''){
					$talla32 = '0';
					$precio32 = '0';
				}
				$updateTalla32 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla32', precio='$precio32' WHERE id=$id32 and id_elemento=$id");
			}
		}
		$consult_talla33 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='33'");
		$epp_talla33 = mysqli_fetch_assoc($consult_talla33);
		if (mysqli_num_rows($consult_talla33) == 0) {
			if ($talla33 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '33', '$talla33', '$precio33')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla33 != $epp_talla33['cantidad'] || $precio33 != $epp_talla33['precio']) {
				if($talla33 == ''){
					$talla33 = '0';
					$precio33 = '0';
				}
				$updateTalla33 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla33', precio='$precio33' WHERE id=$id33 and id_elemento=$id");
			}
		}
		$consult_talla34 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='34'");
		$epp_talla34 = mysqli_fetch_assoc($consult_talla34);
		if (mysqli_num_rows($consult_talla34) == 0) {
			if ($talla34 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '34', '$talla34', '$precio34')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla34 != $epp_talla34['cantidad'] || $precio34 != $epp_talla34['precio']) {
				if($talla34 == ''){
					$talla34 = '0';
					$precio34 = '0';
				}
				$updateTalla34 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla34', precio='$precio34' WHERE id=$id34 and id_elemento=$id");
			}
		}
		$consult_talla35 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='35'");
		$epp_talla35 = mysqli_fetch_assoc($consult_talla35);
		if (mysqli_num_rows($consult_talla35) == 0) {
			if ($talla35 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '35', '$talla35', '$precio35')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla35 != $epp_talla35['cantidad'] || $precio35 != $epp_talla35['precio']) {
				if($talla35 == ''){
					$talla35 = '0';
					$precio35 = '0';
				}
				$updateTalla35 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla35', precio='$precio35' WHERE id=$id35 and id_elemento=$id");
			}
		}
		$consult_talla36 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='36'");
		$epp_talla36 = mysqli_fetch_assoc($consult_talla36);
		if (mysqli_num_rows($consult_talla36) == 0) {
			if ($talla36 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '36', '$talla36', '$precio36')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla36 != $epp_talla36['cantidad'] || $precio36 != $epp_talla36['precio']) {
				if($talla36 == ''){
					$talla36 = '0';
					$precio36 = '0';
				}
				$updateTalla36 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla36', precio='$precio36' WHERE id=$id36 and id_elemento=$id");
			}
		}
		$consult_talla37 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='37'");
		$epp_talla37 = mysqli_fetch_assoc($consult_talla37);
		if (mysqli_num_rows($consult_talla37) == 0) {
			if ($talla37 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '37', '$talla37', '$precio37')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla37 != $epp_talla37['cantidad'] || $precio37 != $epp_talla37['precio']) {
				if($talla37 == ''){
					$talla37 = '0';
					$precio37 = '0';
				}
				$updateTalla37 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla37', precio='$precio37' WHERE id=$id37 and id_elemento=$id");
			}
		}
		$consult_talla38 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='38'");
		$epp_talla38 = mysqli_fetch_assoc($consult_talla38);
		if (mysqli_num_rows($consult_talla38) == 0) {
			if ($talla38 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '38', '$talla38', '$precio38')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla38 != $epp_talla38['cantidad'] || $precio38 != $epp_talla38['precio']) {
				if($talla38 == ''){
					$talla38 = '0';
					$precio38 = '0';
				}
				$updateTalla38 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla38', precio='$precio38' WHERE id=$id38 and id_elemento=$id");
			}
		}
		$consult_talla39 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='39'");
		$epp_talla39 = mysqli_fetch_assoc($consult_talla39);
		if (mysqli_num_rows($consult_talla39) == 0) {
			if ($talla39 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '39', '$talla39', '$precio39')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla39 != $epp_talla39['cantidad'] || $precio39 != $epp_talla39['precio']) {
				if($talla39 == ''){
					$talla39 = '0';
					$precio39 = '0';
				}
				$updateTalla39 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla39', precio='$precio39' WHERE id=$id39 and id_elemento=$id");
			}
		}
		$consult_talla40 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='40'");
		$epp_talla40 = mysqli_fetch_assoc($consult_talla40);
		if (mysqli_num_rows($consult_talla40) == 0) {
			if ($talla40 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '40', '$talla40', '$precio40')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla40 != $epp_talla40['cantidad'] || $precio40 != $epp_talla40['precio']) {
				if($talla40 == ''){
					$talla40 = '0';
					$precio40 = '0';
				}
				$updateTalla40 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla40', precio='$precio40' WHERE id=$id40 and id_elemento=$id");
			}
		}
		$consult_talla41 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='41'");
		$epp_talla41 = mysqli_fetch_assoc($consult_talla41);
		if (mysqli_num_rows($consult_talla41) == 0) {
			if ($talla41 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '41', '$talla41', '$precio41')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla41 != $epp_talla41['cantidad'] || $precio41 != $epp_talla41['precio']) {
				if($talla41 == ''){
					$talla41 = '0';
					$precio41 = '0';
				}
				$updateTalla41 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla41', precio='$precio41' WHERE id=$id41 and id_elemento=$id");
			}
		}
		$consult_talla42 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='42'");
		$epp_talla42 = mysqli_fetch_assoc($consult_talla42);
		if (mysqli_num_rows($consult_talla42) == 0) {
			if ($talla42 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '42', '$talla42', '$precio42')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla42 != $epp_talla42['cantidad'] || $precio42 != $epp_talla42['precio']) {
				if($talla42 == ''){
					$talla42 = '0';
					$precio42 = '0';
				}
				$updateTalla42 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla42', precio='$precio42' WHERE id=$id42 and id_elemento=$id");
			}
		}
		$consult_talla43 = mysqli_query($conn, "SELECT id, cantidad, precio FROM elemento_tallas WHERE id_elemento=$id and talla='43'");
		$epp_talla43 = mysqli_fetch_assoc($consult_talla43);
		if (mysqli_num_rows($consult_talla43) == 0) {
			if ($talla43 >= '0') {
				$insertEppTallas = mysqli_query($conn, "INSERT INTO elemento_tallas(id, id_elemento, talla, cantidad, precio)VALUES(NULL, '$id', '43', '$talla43', '$precio43')") or die(mysqli_error($conn));
			}
		} else {
			if ($talla43 != $epp_talla43['cantidad'] || $precio43 != $epp_talla43['precio']) {
				if($talla43 == ''){
					$talla43 = '0';
					$precio43 = '0';
				}
				$updateTalla43 = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$talla43', precio='$precio43' WHERE id=$id43 and id_elemento=$id");
			}
		}
		echo "<script>alert('Los datos del elemento se han actualizado correctamente'); window.location = 'editar.php?id=$id'</script>";
	} else {
		echo "<script>alert('No se pudo actualizar el elemento verifique los datos'); window.location = 'editar.php?id=$id'</script>";
	}
}
