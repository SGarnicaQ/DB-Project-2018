<?php
session_start();

include_once 'dbC.inc.php';

$maxsize = 2097152;

if (isset($_FILES['avatar'])) {
	if(($_FILES['avatar']['size'] >= $maxsize) || ($_FILES['avatar']['size'] == 0)) {
		header("Location: ../index.php?signup=ErrorLongFile");
	}
	$avatar = mysqli_real_escape_string($conn,file_get_contents($_FILES['avatar']['tmp_name']));
}
//else $avatar = NULL;

$first = mysqli_real_escape_string($conn,$_POST['first']);
$last = mysqli_real_escape_string($conn,$_POST['last']);
$username = mysqli_real_escape_string($conn,$_POST['user']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['pass']);
$password2 = mysqli_real_escape_string($conn,$_POST['pass2']);
$type = mysqli_real_escape_string($conn,$_POST['type']);

$re = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?!.*[\'\"*><;\\\\\/]).{8,50}/m';
$re2 = '/^[a-zA-Z0-9]+([_ -]?[a-zA-Z0-9])*$/m';

if ($username == $password) {
	header("Location: ../index.php?signup=UserPassError");
}
elseif (!preg_match($re,$password)) {
	header("Location: ../index.php?signup=InvalidPass");
}
elseif (!preg_match($re2,$username)) {
	# code...
}
elseif (empty($password) or $password != $password2) {
	header("Location: ../index.php?signup=WrongPass");
}
else {
	$stmt = mysqli_stmt_init($conn);

	if (isset($_FILES['avatar'])) {
		$sql =
		"
		INSERT INTO `users` (user,first,last,pass,email,type,avatar) 
		VALUES (?,?,?,?,?,?,'$avatar');
		";
	} else {
		$sql =
		"
		INSERT INTO `users` (user,first,last,pass,email,type) 
		VALUES (?,?,?,?,?,?);
		";
	}
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo "SQL error";
	} else {
		mysqli_stmt_bind_param($stmt,"sssssi",$username,$first,$last,$password,$email,$type);
		mysqli_stmt_execute($stmt);
	}
	header("Location: ../index.php?signup=success");
}