<?php
session_start();

include_once 'dbC.inc.php';

$useremail = mysqli_real_escape_string($conn,$_POST['first']);
$password = mysqli_real_escape_string($conn,$_POST['pass']);

$sql = 
"
SELECT *
FROM `users`
WHERE (user = ? OR email = ?) AND pass = ?;
";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt,$sql)) echo "SQL error";
else {
	mysqli_stmt_bind_param($stmt,"sss",$useremail,$useremail,$password);
	mysqli_stmt_execute($stmt);
}
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
	$_SESSION['user'] = $row['user'];
	$_SESSION['pass'] = $password;
	$_SESSION['avatar'] = $row['avatar'];
	header("Location: ../index.php?login=success");
}
else header("Location: ../index.php?login=error");
