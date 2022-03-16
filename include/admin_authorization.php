<?php 
session_start();

require_once "../config/database.php";

if(isset($_SESSION['ANAME']))
{
$NAME= $_SESSION["ANAME"];
$ids = $_SESSION["ADMIN_ID"];
}
else {
	echo "<script> location.href='admin_login.php' </script>";
}


?>