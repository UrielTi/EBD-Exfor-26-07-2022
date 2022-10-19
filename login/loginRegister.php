<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesión EXFOR S.A.S.</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<?php
	include "../include/conn/conn.php";
	
	if(isset($_POST['entrar'])){
		$tipo = mysqli_real_escape_string($conn, (strip_tags($_POST['tipo'], ENT_QUOTES)));
		$correo = mysqli_real_escape_string($conn, (strip_tags($_POST['correo'], ENT_QUOTES)));
		$username = mysqli_real_escape_string($conn, (strip_tags($_POST['user'], ENT_QUOTES)));
		$password = mysqli_real_escape_string($conn, (strip_tags($_POST['password'], ENT_QUOTES)));
		$nucleo = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));

        $passwordEncrypt = hash('sha512', $password);

		$insert = mysqli_query($conn,"INSERT INTO users(id, tipo, email, username, password, nucleo)VALUES(NULL, '$tipo', '$correo', '$username', '$passwordEncrypt', '$nucleo')") or die(mysqli_error($conn));

        if ($insert) {
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos, verifique que el usuario no esté ya registrado en el sistema.</div>';
        }
		
	}
?>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3><center>REGISTRARSE</center></h3>
				<h3><center>EXFOR S.A.S.</center></h3>
			</div>
			<div class="card-body">
				<form method="POST" action="loginRegister.php">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
						</div>
						<input id="correo" name="correo" type="email" class="form-control" placeholder="CORREO ELECTRONICO">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input id="user" name="user" type="text" class="form-control" placeholder="NOMBRE COMPLETO">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="bi bi-people-fill"></i></span>
						</div>
						<select id="tipo" name="tipo" type="text" class="form-select">
							<option value="">ESCOGE EL TIPO DE USUARIO</option>
							<option value="admin">ADMIN</option>
							<option value="supervisor">SUPERVISOR</option>
							<option value="contador">CONTADOR</option>
							<option value="gerente">GERENTE</option>
						</select>
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
						</div>
						<select id="nucleo" name="nucleo" type="number" class="form-select">
							<option value="">ESCOGE EL NUCLEO</option>
							<option value="1">SANTA ROSA</option>
							<option value="2">QUINDIO</option>
							<option value="3">RIOSUCIO</option>
						</select>
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input id="password" name="password" type="password" class="form-control" placeholder="CONTRASEÑA">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Recuerdame
					</div>
					<div class="form-group">
						<input id="entrar" name="entrar" type="submit" value="Registrarse" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Ya tienes una cuenta?<a href="login.php">Inicia sesion</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Haz olvidado la contraseña?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>