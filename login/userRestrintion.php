<?php
    if (!session_id()) session_start();
    if (!isset($_SESSION['email'])){
        echo "<script>window.location = '../login/login.php'</script>";
        exit();
    }
?>