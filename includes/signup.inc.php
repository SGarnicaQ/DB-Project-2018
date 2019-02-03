<?php 
if (isset($_POST['btnS'])) {
	include_once 'dbC.inc.php';

	session_start();

	$first = mysqli_real_escape_string($conn,$_POST['first']);
	$last = mysqli_real_escape_string($conn,$_POST['last']);
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['pass']);
	$password2 = mysqli_real_escape_string($conn,$_POST['pass2']);
	//$type = mysqli_real_escape_string($conn,$_POST['type']);
	$_SESSION['repopulate'] = array($first,$last,$username,$email);

	$re = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?!.*[\'\"*><;\\\\\/]).{8,50}/m'; // Match for min 1 number/uppercase/lowercase and don't allow other simbols
	$re2 = '/^[a-zA-Z0-9]+([_ -]?[a-zA-Z0-9])*$/m';
	$re3 = '/^[a-zA-Z0-9 ]*$/'; // Match for just words

	// Check empty espaces
	if (empty($first) || empty($last) || empty($username) || empty($email) || empty($password) || empty($password2) ) {
		$_SESSION['msg'] = "No puedes dejar campos vacios";
		header("Location: ../signup.php?signup=empty");
		exit();
	}
	// Check if first and last name are just words
	elseif (!preg_match($re3,$first) || !preg_match($re3,$last)) {
		$_SESSION['msg'] = "Nombre invalido";
		header("Location: ../signup.php?signup=invalidName");
		exit();
	}
	// Check email format -@-.-
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['msg'] = "Formato de Correo ~@~.~";
		header("Location: ../signup.php?signup=invalidEmail");
		exit();
	}
	// Check if user is valid
	elseif (!preg_match($re2,$username)) {
		$_SESSION['msg'] = "Usuario Invalido usar solo letras numeros y barra baja";
		header("Location: ../signup.php?signup=invalidUser");
		exit();
	}
	// Check if password is allowed
	elseif (!preg_match($re,$password)) {
		$_SESSION['msg'] = "Contraseña invalida usar minimo una mayuscula una minuscula un numero, y no usar caracteres especiales";
		header("Location: ../signup.php?signup=invalidPass");
		exit();
	}
	// Password verification
	elseif ($password != $password2) {
		$_SESSION['msg'] = "Contraseñas no coinciden";
		header("Location: ../signup.php?signup=noMatchPass");
		exit();
	}
	// No invalid areas
	else {
		$sql = 
		"
		SELECT * FROM DOCENTE WHERE NOMBRE_USUARIO = '$username'
		";
		$result = mysqli_query($conn, $sql);
		$checkResult = mysqli_num_rows($result);
		// Check if user already exists
		if ($checkResult > 0) {
			$_SESSION['msg'] = "Este usuario ya esta en uso";
			header("Location: ../signup.php?signup=userTaken");
			exit();
		}
		else {
			$hashedPass = password_hash($password, PASSWORD_DEFAULT);

			$sql =  
			"
			UPDATE DOCENTE SET NOMBRE_USUARIO = ?, CONTRASENA = ?
			WHERE CORREO_INST = '$email';
			";
			$stmt = mysqli_stmt_init($conn);
			// Conection database or sql Error
			if (!mysqli_stmt_prepare($stmt,$sql)) {
				header("Location: ../signup.php?signup=Error");
				exit();
			}
			// Success Insert
			else {
				mysqli_stmt_bind_param($stmt,"ss",$username,$hashedPass);
				mysqli_stmt_execute($stmt);
				$_SESSION['msg'] = "Registrado correctamente";
				unset($_SESSION['repopulate']);
				header("Location: ../signup.php?signup=success");
				exit();
			}
		}
	}
}
// Redirect if not allowed access
else {
	header('Location: ../signup.php?signup=error');
	exit();
}