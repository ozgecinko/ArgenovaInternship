<?php
session_start ();
include("dbconnection.php"); 

if(isset($_REQUEST['sub']))
{
$a = $_REQUEST['username'];
$b = $_REQUEST['password'];

$res = mysqli_query($con,"select* from users where username='$a'and password='$b'");
$result=mysqli_fetch_array($res);
if($result)
{
	
	$_SESSION["process"]="1";
	header("location:panel/user/index.php");
}
else	
{
	header("location:process.php?err=1");
	
}
}
?>