<?php 
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<?php
		if (isset($_SESSION['username'])) {
			include_once 'nav.php';
			if (isset($_GET['acc'])) {
				switch ($_GET['acc']) {
					case '1':
					
					echo 
					'
					<form class="selectTables" action="#" method="POST">
					<select name="tables[]" multiple>
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					</select>
					<button type="submit" name="btnT" value="true">VER</button>
					</form>
					';
					if (isset($_POST['tables'])) {
						include_once 'includes/dbC.inc.php';
						foreach ($_POST['tables'] as $key) {
							switch ($key) {
								case '0':
								$key = 'DBA_UN';
								break;
								case '1':
								$key = '`Docentes que hayan cursado un programa en los ultimos 3 anos`';
								break;
								case '2':
								$key = '`Docentes que tengan incrito un programa en el extranjero`';
								break;
								case '3':
								$key = '`Docentes que tengan inscrito el programa Aalborg`';
								break;
								case '4':
								$key = '`Correo docentes con programa de extension/pedagogia`';
								break;
								case '5':
								$key = '`Docentes con programas inscritos que aun no han visto`';
								break;
								case '6':
								$key = '`Docentes de Sistemas e Industrial en un programa`';
								break;
								case '7':
								$key = '`Docentes de Sistemas e Industrial en un programa`';
								break;
								case '8':
								$key = '`Docentes que han visto programas Google/Harvard`';
								break;
								case '9':
								$key = '`Docentes, en todas las instituciones de Colombia`';
								break;
								case '10':
								$key = '`Ciudades de colombia que no ofrecen programas`';
								break;
								case '11':
								$key = '`Cantidad de dinero invertido por dep. Mayor a 5.2M`';
								break;
								case '12':
								$key = '`Cantidad de programas acreditados por pais`';
								break;
								case '13':
								$key = '`Promedio invertido por Docentes Ocasionales`';
								break;
								case '14':
								$key = '`Relacion porcentual entre el costo promedio de COL y USA`';
								break;
								case '15':
								$key = '`Cantidad de Programas por Innstitucion, con cantidad > 2`';
								break;
								case '16':
								$key = 'PAIS_NO_CURSOS';
								break;
								case '17':
								$key = 'DOCENTE_NO_DOCENTE';
								break;
								case '18':
								$key = '`Departamentos sin docentes`';
								break;
								default:
								break;
							}
							$sql = 
							'
							SELECT * from '.$key.';
							';

							$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

							// Print the column names as the headers of a table
							echo '<div class="tables"><table><caption>'.$key.'</caption><thead><tr>';
							for($i = 0; $i < mysqli_num_fields($result); $i++) {
								$field_info = mysqli_fetch_field($result);
								echo '<th>'.$field_info->name.'</th>';
							}
							echo '</tr></thead>';

							// Print the data
							while($row = mysqli_fetch_row($result)) {
								echo '<tr>';
								foreach($row as $_column) {
									echo '<td>'.$_column.'</td>';
								}
								echo '</tr>';
							}

							echo '</table></div>';
						}
					}
					break;
					case '2':
					include_once 'includes/dbC.inc.php';
					$sql = 
					'
					SELECT DISTINCT TEMA AS `Nombre`, FECHA_INICIO AS `Comienzo`, FECHA_FINALIZACION AS `Fin`, COSTO AS `Costo`
					FROM DOCENTE NATURAL JOIN PROGRAMA_DOCENTE NATURAL JOIN PROGRAMA
					WHERE PROGRAMA_DOCENTE.CEDULA = '.$_SESSION['id'].'
					ORDER BY FECHA_INICIO;
					';

					$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

							// Print the column names as the headers of a table
					echo '<div class="tables"><table><caption>MIS PROGRAMAS</caption><thead><tr>';
					for($i = 0; $i < mysqli_num_fields($result); $i++) {
						$field_info = mysqli_fetch_field($result);
						echo '<th>'.$field_info->name.'</th>';
					}
					echo '</tr></thead>';

							// Print the data
					while($row = mysqli_fetch_row($result)) {
						$d = new DateTime($row[2]);
						$d = date_format($d,"y-m-d");
						if ($d < date("y-m-d")) {
							echo '<tr style="color:#0f0;">';
						}else echo '<tr style="color:#00f;">';
						foreach($row as $_column) {
							echo '<td>'.$_column.'</td>';
						}
						echo '</tr>';
					}

					echo '</table></div>';
					break;
					case '3':
					include_once 'includes/dbC.inc.php';
					$sql = 
					'
					SELECT DISTINCT A.ID_PROG AS "#", A.TEMA AS `Nombre`, A.FECHA_INICIO AS `Comienzo`, A.FECHA_FINALIZACION AS `Fin`, A.COSTO AS `Costo`
					FROM PROGRAMA AS A LEFT JOIN (
					SELECT *
					FROM PROGRAMA_DOCENTE
					WHERE CEDULA = '.$_SESSION['id'].') AS B
					ON A.ID_PROG = B.ID_PROG
					WHERE B.ID_PROG IS NULL AND A.FECHA_INICIO > CURDATE();
					';

					$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

							// Print the column names as the headers of a table
					echo '<div class="tables"><table><caption>PROGRAMAS DISPONIBLES</caption><thead><tr>';
					for($i = 0; $i < mysqli_num_fields($result); $i++) {
						$field_info = mysqli_fetch_field($result);
						echo '<th>'.$field_info->name.'</th>';
					}
					echo '</tr></thead>';

							// Print the data
					while($row = mysqli_fetch_row($result)) {
						$d = new DateTime($row[3]);
						$d = date_format($d,"y-m-d");
						if ($d < date("y-m-d")) {
							echo '<tr style="color:#0f0;">';
						}else echo '<tr style="color:#00f;">';
						foreach($row as $_column) {
							echo '<td>'.$_column.'</td>';
						}
						echo '<td><form action="includes/newPro.inc.php" method="POST"><button type="submit" name="btnNP" value="'.$row[0].'">cursar</button></form></td></tr>';
					}
					echo '</table></div>';
					break;
					case '4':
						$userdba = $_SESSION['id'];
						if ($userdba == 111 OR $userdba == 112 OR $userdba == 113) {
							echo
							'
							<form method="POST" action="includes/dba.inc.php">
								<textarea name="sql">SQL Commands</textarea>
								<button name="btnSQL">Run</button>
							</form>
							';
						}
					break;

					case '5':
					include_once 'includes/dbC.inc.php';
					$sql =
					'
					SELECT IMAGEN_PERFIL
					FROM DOCENTE
					WHERE CEDULA = '.$_SESSION['id'].'
					';
					$result = mysqli_query($conn,$sql);
					$row = mysqli_fetch_row($result);
					$perfil = $row[0];
					echo
					'
					<form action="includes/perfil.inc.php" method="POST" enctype="multipart/form-data">

						<img src="data:image/png;base64,'.base64_encode($perfil).'" name="avatar" class="avatar" id="profile-img-tag">
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
						<button class="btnP" name="btnP">Subir foto de perfil</button>
					</form>
					';
					break;
					default:
					break;

				}
			}
		}
		else {
			echo
			'
			<h1 style="color:#000">Primero entra con tu cuenta de usuario</h1>
			<p style="color:#000">Si aun no tienes, debes registrarte, el correo electronico debe coincidir como algun docente de la institucion</p>
			<p style="color:#000">Recuerde que el correo debe terminar en @unal.edu.co <p> 
			';
		}
		?>

	</div>
</section>
<?php 
include_once 'footer.php';
?>