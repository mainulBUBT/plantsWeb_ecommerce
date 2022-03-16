<?php 
session_start();

require_once "../config/database.php";

if(isset($_SESSION['SNAME']))
{
$SNAME= $_SESSION["SNAME"];
$ids = $_SESSION["SMEMBER_ID"];
}
else {
	echo "<script> location.href='staff_login.php' </script>";
}


?>