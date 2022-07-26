<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "mysql";
$db_name = "ebd_exforsa";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Error, no se pudo conectar a la base de datos: '.mysqli_connect_error();
}

if(!mysqli_set_charset($conn, "utf8")){
	printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($conn));
    exit();
}
$db_host1 = "localhost";
$db_user1 = "root";
$db_pass1 = "mysql";
$db_name1 = "exforsa_nomina";

$conexion = new mysqli($db_host1, $db_user1, $db_pass1, $db_name1);

if(mysqli_connect_errno()){
	echo 'Error, no se pudo conectar a la base de datos: '.mysqli_connect_error();
}

if(!mysqli_set_charset($conexion, "utf8")){
	printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($conexion));
    exit();
}

