<?php
    session_start();
	include "../include/conn/conn.php";
    include "../cond/todo.php";
?>
<?php 
function ElementoTallas($conn, $id_elemento, $talla){
    $consultaEppTallas = mysqli_query($conn,"SELECT * FROM elemento_tallas WHERE id_elemento=$id_elemento AND talla='$talla'");
    $rowEppTallas = mysqli_fetch_assoc($consultaEppTallas);
    return array($rowEppTallas['cantidad'],$rowEppTallas['precio'],$rowEppTallas['id']);
}
list($cantidadS,$precioS,$id_tallaS) = ElementoTallas($conn, $id, 'S');
list($cantidadM,$precioM,$id_tallaM) = ElementoTallas($conn, $id, 'M');
list($cantidadL,$precioL,$id_tallaL) = ElementoTallas($conn, $id, 'L');
list($cantidadXL,$precioXL,$id_tallaXL) = ElementoTallas($conn, $id, 'XL');
list($cantidad28,$precio28,$id_talla28) = ElementoTallas($conn, $id, '28');
list($cantidad30,$precio30,$id_talla30) = ElementoTallas($conn, $id, '30');
list($cantidad32,$precio32,$id_talla32) = ElementoTallas($conn, $id, '32');
list($cantidad34,$precio34,$id_talla34) = ElementoTallas($conn, $id, '34');
list($cantidad36,$precio36,$id_talla36) = ElementoTallas($conn, $id, '36');
list($cantidad38,$precio38,$id_talla38) = ElementoTallas($conn, $id, '38');
list($cantidad40,$precio40,$id_talla40) = ElementoTallas($conn, $id, '40');
list($cantidad42,$precio42,$id_talla42) = ElementoTallas($conn, $id, '42');
?>
