<?php

if (LoginClass::check_if_email_password_exists($_GET['email'],
												$_GET['password']));
{

}
else
{
	echo "u Heeft geen rechten om op deze pagina kan komen";
	header("refresh:5;index.php?content=homepage");
	exit();
}

echo "email: ".$_GET['email']."<br>";
echo "password: ".$_GET['password'];