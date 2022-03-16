<?php
session_start();
if(isset($_SESSION['MERCHANT_NAME']))
{
	unset($_SESSION["MERCHANT_ID"]);
	unset($_SESSION["MERCHANT_NAME"]);
	header("Location:../merchant/user_login.php");
}
elseif (isset($_SESSION['ANAME'])) {
	unset($_SESSION["ADMIN_ID"]);
	unset($_SESSION["ANAME"]);
	header("Location:../admin/admin_login.php");
}
elseif (isset($_SESSION['SNAME'])) {
	unset($_SESSION["SMEMBER_ID"]);
	unset($_SESSION["SNAME"]);
	header("Location:../staff/staff_login.php");
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