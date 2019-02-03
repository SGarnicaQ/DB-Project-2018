<?php 
	session_start();
	include 'includes/dbC.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bases de Datos</title>

	<link rel="icon" href="src/avatar2.png">
	<!-- Stylesheet -->
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<!-- Ajax scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>
<body>
	<header>
		<nav>
			<ul>
				<li>
					<form action="index.php">
						<button type="submit" name="btnH">INICIO</button>
					</form>
				</li>
				<li>
					<form action="slides.php">
						<button type="submit" name="btnS">PRESENTACION</button>
					</form>
				</li>
				<?php
				if (isset($_SESSION['user']))
					echo
					'
					<li>
						<p>Bienvenido '.mysqli_real_escape_string($conn,$_SESSION['user']).'</p>
					</li>
					<li>
						<img src="data:image/png;base64, '.base64_encode($_SESSION['avatar']).'">
					</li>
					<li>
						<form action="includes/logout.inc.php">
							<button type="submit" name="btnLogO">SALIR</button>
						</form>
					</li>
					';
				else
					echo
					'
					<li>
						<form action="includes/login.inc.php" method="POST">

							<input required type="text" name = "first" placeholder="Usuario o Correo">
							<input required type="password" name = "pass" placeholder="Contraseña">

							<button type="submit" name="btnLogI">ENTRAR</button>
						</form>
					</li>
					';
				?>
			</ul> 		
		</nav>
	</header>