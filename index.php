<?php
include 'header.php';

if (!isset($_SESSION['user'])) {
	echo
	'
	<div class = "formBox">
		<form action="includes/signup.inc.php" method="POST" enctype="multipart/form-data">

			<img src="src/avatar1.png" class="avatar" id="profile-img-tag">
			<input type="file" name="avatar" class="avatar" id="profile-img" accept="image/*">

			<script type="text/javascript">
				// Script display the image in the file choose button
				function readURL(input) {
					if (input.files && input.files[0]) {
						var reader = new FileReader();

						reader.onload = function (e) {
							$("#profile-img-tag").attr("src", e.target.result);
						}
						reader.readAsDataURL(input.files[0]);
					}
				}
				$("#profile-img").change(function(){
					readURL(this);
				});
			</script>

			<input type="text" name="first" placeholder="Nombre" required>
			<input type="text" name="last" placeholder="Apellidos" required>
			<input type="text" name="user" placeholder="Nombre de Usuario" required>
			<input type="email" name="email" placeholder="Correo electronico" required>
			<input type="password" name="pass" placeholder="Ingrese una contraseña" required>
			<input type="password" name="pass2" placeholder="Repita la contraseña" required>		
			<select name="type">
				<option value="1">Tipo de Docente</option>
				<option value="2">Planta</option>
				<option value="3">Maestria</option>
				<option value="4">Ocasional</option>
			</select>

			<button type="submit" name="btnR">REGISTRARSE</button>
		</form>
	</div>
	';
}
else header("Location: queries.php");