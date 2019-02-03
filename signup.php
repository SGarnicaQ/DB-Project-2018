<?php 
include_once 'header.php';


$first = isset($_SESSION['repopulate'][0])?$_SESSION['repopulate'][0]:'';
$last  = isset($_SESSION['repopulate'][1])?$_SESSION['repopulate'][1]:'';
$user  = isset($_SESSION['repopulate'][2])?$_SESSION['repopulate'][2]:'';
$email = isset($_SESSION['repopulate'][3])?$_SESSION['repopulate'][3]:'';

?>
<section class="main-container">
	<div class="main-wrapper signup-form">
		<h1>REGISTRARSE</h1>
		<form action="includes/signup.inc.php" method="POST">
			<input title="Nombre" type="text" name="first" placeholder="Nombre" value=<?php echo '"'.$first.'"'; ?>>
			<input title="Apellidos" type="text" name="last" placeholder="Apellidos" value=<?php echo '"'.$last.'"'; ?>>
			<input title="Usuario" type="text" name="username" placeholder="Usuario" value=<?php echo '"'.$user.'"'; ?>>
			<input title="Correo" type="text" name="email" placeholder="Correo" value=<?php echo '"'.$email.'"'; ?>>
			<input required type="password" name="pass" placeholder="Contraseña">
			<input required type="password" name="pass2" placeholder="Repita contraseña">
			<button type="submit" name="btnS">Registrarme</button>
		</form>
		<?php 
		if (isset($_SESSION['msg'])) {
			if ($_SESSION['msg'] == "Registrado correctamente") {
				echo 
				'
				<h1 style="color:#00ff00;">'.$_SESSION['msg'].'</h1>
				';
			}
			else {
				echo 
				'
				<h1 style="color:#ff0000;">'.$_SESSION['msg'].'</h1>
				';
			}
			unset($_SESSION['msg']);
		}
		?>
	</div>
</section>
<?php 
include_once 'footer.php';
?>