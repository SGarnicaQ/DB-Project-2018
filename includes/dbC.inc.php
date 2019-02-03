<?php

$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "proyect";

$conn =  mysqli_connect($dbServer,$dbUser,$dbPass,$dbName) or die("Connection failed: ".mysqli_connect_error());