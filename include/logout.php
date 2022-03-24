<?php
session_start();
if(isset($_SESSION['USER_NAME']))
{
	unset($_SESSION["USER_NAME"]);
	unset($_SESSION["USER_ID"]);
	header("Location:../user_login.php");
}
elseif (isset($_SESSION['ADMIN_NAME'])) {
	unset($_SESSION["ADMIN_NAME"]);
	unset($_SESSION["ADMIN_ID"]);
	header("Location:../admin/login.php");
}


?>

<!-- if(isset($_SESSION['NAME']))
{
	unset($_SESSION["MEMBER_ID"]);
	unset($_SESSION["NAME"]);
	header("Location:user_login.php");
}
else if(isset($_SESSION['SNAME']))
{
	unset($_SESSION["SMEMBER_ID"]);
	unset($_SESSION["SNAME"]);
	header("Location:staff_login.php");
}
else
{
	unset($_SESSION["ADMIN_ID"]);
	unset($_SESSION["ANAME"]);
	header("Location:admin_login.php");
} -->