<nav class="navbar navbar-expand-lg navbar-light bg-success shadow p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="index2.php" style="color: #FFFFFF; font-size: 20px;" ;><i class="bi bi-tree-fill"></i> BASE DE DATOS EXFOR S.A.S.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#abrirnavbar" aria-controls="abrirnavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="abrirnavbar">
            <div class="justify-content-end">
                <a class="btn btn-light" href="../documental/index.php" style="color: #198754; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .80rem;" ;>Listado Maestro</a>
                <a class="btn btn-light btn-sm" href="../empleados/index.php" style="color: #198754; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .80rem" ;>Empleados</a>
                <a class="btn btn-light btn-sm" href="../entregaEPP/index.php" style="color: #198754; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .80rem" ;>EEPP</a>
                <a class="btn btn-light btn-sm" href="../newEPP/index.php" style="color: #198754; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .80rem" ;>Inventario</a>
                <a class="btn btn-light btn-sm" href="../dotacion/index.php" style="color: #198754; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .80rem" ;>Dotación</a>
                <a class="btn btn-light btn-sm" href="../Ausentismo/index.php" style="color: #198754; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .80rem" ;>SIS</a>

                <div class="btn-group dropend">
                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #198754; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .80rem">
                        Usuario
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"><?php echo $_SESSION['username']; ?></a></li>
                        <li>
                            <a class="dropdown-item">
                                <form class="bg-success dropdown-item" action="../login/cerrarSesion.php" method="POST">
                                    <button id="cerrar" name="cerrar" type="submit" class="nav-link btn btn-link" style="color: #FFFFFF">CERRAR SESION </button>
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>