<?php
if (!isset($_SESSION['id']))
{
	header("refresh:10;location:index.php");
	exit();
}
else if (!in_array($_SESSION['userrole'], $userrole))
{
	header("location:".$_SESSION['userrole'].".php");
	exit();
}
?>