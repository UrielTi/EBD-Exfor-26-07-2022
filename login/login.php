<?php include "entryLogin.php"; include "head.php";?>
	<style>
		#intro {
			background-image: url(https://cdn.wallpaperhub.app/cloudcache/c/5/b/a/6/3/c5ba63954e9c64a62f88b06ddf6a4a2b0c44a1c5.jpg);
			height: 100vh;
		}

		/* Height for devices larger than 576px */
		@media (min-width: 992px) {
			#intro {
				margin-top: -58.59px;
			}
		}

		.navbar .nav-link {
			color: #fff !important;
		}
    </style>

    <script>
        function mostrarPassword(){
            var cambio = document.getElementById("password");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('#icon').removeClass('bi bi-eye-fill').addClass('bi bi-eye-slash-fill');
            }else{
                cambio.type = "password";
                $('#icon').removeClass('bi bi-eye-slash-fill').addClass('bi bi-eye-fill');
            }
        }
    </script>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand">
                <strong>SISTEMAS WEB EXFOR S.A.S.</strong>
            </a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
                aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    <!-- Navbar -->
<?php
	
	if(isset($_POST['entrar'])){
		$email = mysqli_real_escape_string($conn, (strip_tags($_POST['email'], ENT_QUOTES)));
		$pwd = mysqli_real_escape_string($conn, (strip_tags($_POST['password'], ENT_QUOTES)));

		$user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if ($row = mysqli_fetch_array($user)){
			$pwdCrypt = hash('sha512', $pwd);
			if ($pwdCrypt === $row['password']){
				$_SESSION['email'] = $email;
				$_SESSION['username'] = $row['username'];
				$_SESSION['tipo'] = $row['tipo'];
                $_SESSION['nucleo'] = $row['nucleo'];
				echo "<script>window.location = '../empleados/index.php'</script>";
			}else{
				echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">&times;</button>Error, Usuario y/o contraseña incorrector, verifique que el todos sus datos sean correctos y vuelve a intentarlo.</div>';
			}
		}else{
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">&times;</button>Error, El usuario no existe</div>';
		}
	}
?>
<body>
<!-- Background image -->
<div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-md-8">
                    <form method="POST" action="login.php" class="bg-white  rounded-5 shadow-5-strong p-5">
                        <h2>Inicio de Sesión</h2>
                        <hr>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control" />
                            <label class="form-label" for="email">Correo:</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control" />
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-primary btn-lg" type="button" onclick="mostrarPassword()"> <span id="icon" class="bi bi-eye-fill"></span> </button>
                                </div> 
                            </div>
                            <label class="form-label" for="password">Contraseña:</label>
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4 d-flex justify-content-center">
                            <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                    checked />
                                    <label class="form-check-label" for="form1Example3">
                                        Recordarme
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <button id="entrar" name="entrar" type="submit"
                                class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Background image -->
</body>
</html>