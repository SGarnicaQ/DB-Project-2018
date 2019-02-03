<?php
if (isset($_POST['btnLO'])) {
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../index.php");
	exit();
}
// Redirect if not allowed access
else {
	header('Location: ../index.php?logout=error');
	exit();
}
