<?php
include "../login/userRestrintion.php";
?>

<!-- <link rel="stylesheet" href="../scss/custom.css"> -->
<link rel="stylesheet" type="text/css" href="../css/styles_navbar.css" />

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" <a class="navbar-brand" href="index.php">
            <img src="../../EBD/include/images/Logo_EXFORSAS.png" alt="Exfor SAS" width="250"> <!-- -->
        </a></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavSistemas" aria-controls="navbarNavSistemas" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarNavSistemas">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <a class="button gradient  mx-auto" class="nav-link" href="../documental/index.php">Documental</a>

                <!-- Desplegable Elementos -->
                <div class="btn-group mx-auto">
                    <a class="button gradient dropdown-toggle  dropdown-toggle-split" data-bs-toggle="dropdown" href="#collapseElements" type="button" aria-controls="collapseElements">Elementos</a>
                    <ul class="dropdown-menu dropdown-menu-dark" id="collapseElements">
                        <li><a class="dropdown-item" href="../dotacion/index.php">Entrega dotación</a></li>
                        <li><a class="dropdown-item" href="../entregaEPP/index.php">Entrega EPP</a></li>
                        <li><a class="dropdown-item" href="../newEPP/index.php">Inventario EPP</a></li>

                    </ul>
                </div>

                <a class="button gradient  mx-auto" class="nav-link" href="../empleados/index.php">Empleados</a>
                <a class="button gradient  mx-auto" class="nav-link" href="../Ausentismo/index.php">Ausentismo</a>
            </ul>

            <!-- session -->
            <!-- Desplegable usuario -->
            <div class="btn-group mx-auto">
                <a class="button gradient dropdown-toggle  dropdown-toggle-split" data-bs-toggle="dropdown" href="#collapseUser" type="button" aria-controls="collapseUser"><i class="bi bi-person-circle"></i>
                    <?php echo $_SESSION['username'] ?></a>
                <ul class="dropdown-menu dropdown-menu-dark" id="collapseUser">
                    <form action="../login/cerrarSesion.php" method="POST">
                        <button class="dropdown-item" id="cerrar" name="cerrar" type="submit"><i class="bi bi-x-square"></i> Cerrar sesión
                        </button>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</nav>