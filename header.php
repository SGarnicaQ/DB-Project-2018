<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bases de datos</title>

	<link rel="icon" href="src/avatar.png">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body>
	<header>
			<div class="main-wrapper">
				<ul>
					<li><a href="index.php">INICIO</a></li>
					<li><a href="profile.php">PERFIL</a></li>
					<li><a href="slides.php">PRESENTACION</a></li>
				</ul>
				<div class="login">
					<?php 
					if (isset($_SESSION['username'])) {
						echo
						'
						<p>Bienvenid@ '.$_SESSION['username'].'</p>
						<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="btnLO">Salir</button>
						</form>
						';
					}
					else {
						echo
						'
						<form action="includes/login.inc.php" method="POST">
							<input type="text" name="user_email" placeholder="Usuario/Correo">
							<input type="password" name="pass" placeholder="Contraseña">
							<button type="submit" name="btnL">ENTRAR</button>
						</form>
						<form action="signup.php">
							<button type="submit" name="btnR">Registrarse</button>
						</form>
						';
					}
					?>


				</div>
			</div>
	</header>