<?php 
if (isset($_POST['btnNP'])) {
	include_once 'dbC.inc.php';
	session_start();
	$newProgram = mysqli_real_escape_string($conn,$_POST['btnNP']);
	$idDocente = mysqli_real_escape_string($conn,$_SESSION['id']);

	$sql = 
	'
	INSERT INTO PROGRAMA_DOCENTE VALUES
	(?,?);
	';
	$stmt = mysqli_stmt_init($conn);
	// Conection database or sql Error
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("Location: ../profile.php?acc=3&newPro=Error");
		exit();
	}
	// Success Insert
	else {
		mysqli_stmt_bind_param($stmt,"ii",$idDocente,$newProgram);
		mysqli_stmt_execute($stmt);
		$_SESSION['msg'] = "Registrado correctamente";
		unset($_SESSION['repopulate']);
		header("Location: ../profile.php?acc=3&newPro=success");
		exit();
	}
}
// Redirect if not allowed access
else {
	header('Location: ../profile.php?acc=3&newPro=error');
	exit();
}