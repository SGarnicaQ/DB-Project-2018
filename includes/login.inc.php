<?php
session_start();

if (isset($_POST['btnL'])) {
	include_once 'dbC.inc.php';

	$user_email = mysqli_real_escape_string($conn,$_POST['user_email']);
	$password = mysqli_real_escape_string($conn,$_POST['pass']);

	// Check empty espaces
	if (empty($user_email) || empty($password)) {
		header("Location: ../index.php?login=empty");
		exit();
	}
	else {
		$sql =
		"
		SELECT * FROM DOCENTE WHERE NOMBRE_USUARIO = '$user_email' OR CORREO_INST = '$user_email';
		";
		$result = mysqli_query($conn,$sql);
		$checkResult = mysqli_num_rows($result);

		// Check for database insertion error **Duplicated user/email**
		if ($checkResult > 1) {
			header("Location: ../index.php?login=error");
			exit();
		}
		else {
			if ($row = mysqli_fetch_assoc($result)) {

				$CheckPass = password_verify($password,$row['CONTRASENA']);

				// Check if password is incorrect
				if ($CheckPass == false) {
					header("Location: ../index.php?login=passError");
					exit();
				}
				// Check if password is correct
				elseif ($CheckPass == true) {
					$_SESSION['username'] = $row['NOMBRE_DOC'];
					$_SESSION['id'] = $row['CEDULA'];
					$_SESSION['user'] = $row['NOMBRE_USUARIO'];
					header("Location: ../profile.php?login=success");
					exit();
				}
				// Check verification problems
				else {
					header("Location: ../index.php?login=error");
					exit();
				}
			}
			// Check if user don't exist
			else {
				header("Location: ../signup.php?login=user");
				exit();
			}
		}
	}
}
// Redirect if not allowed access
else {
	header('Location: ../index.php?login=error');
	exit();
}