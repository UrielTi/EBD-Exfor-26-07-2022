<?php
    session_start();
    if (isset($_POST['cerrar'])){
      session_destroy();
      header("location: login.php");
    }
?>