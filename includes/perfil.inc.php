<?php
if (isset($_POST['btnP'])) {
	if (isset($_FILES['avatar'])) {
		include_once 'dbC.inc.php';
		session_start();
		$avatar = mysqli_real_escape_string($conn,file_get_contents($_FILES["avatar"]["tmp_name"]));
		$sql =
		'
		UPDATE DOCENTE SET IMAGEN_PERFIL = "'.$avatar.'"
		WHERE CEDULA = '.$_SESSION['id'].';
		';

		$result = mysqli_query($conn,$sql);
		header("Location: ../profile.php?acc=5&perfil=success");
		exit();
	}
	else {
		header("Location: ../profile.php?acc=5&perfil=else");
		exit();
	}
}
// Redirect if not allowed access
else {
	header('Location: ../profile.php?acc=5&perfil=error');
	exit();
}