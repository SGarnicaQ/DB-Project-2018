<?php 
if (isset($_POST['btnSQL'])) {
	include_once 'dbC.inc.php';
	$sql = $_POST['sql'];
	$result = mysqli_query($conn,$sql);
	header('Location: ../profile.php?acc="4"&dba=success');
	exit();
}
// Redirect if not allowed access
else {
	header('Location: ../profile.php?acc="4"');
	exit();
}