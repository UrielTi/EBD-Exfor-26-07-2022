<?php
    session_start();
    include("../include/conn/conn.php");
    if(isset($_SESSION['email'])){
        echo "<script>window.location = '../empleados/index.php'</script>";
    }
?>