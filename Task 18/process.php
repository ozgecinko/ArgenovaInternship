<?php
include 'dbconnection.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();

// Check if POST variable "username" and "password" exists, if not default the value to blank, basically the same for all variables
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if($username && $password){
	$_SESSION["process"]="1";
	header("location:panel/index.php");
}
else{
	header("location:process.php?err=1");
}

?>