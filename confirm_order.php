<?php
	require_once('class/LoginClass.php');
	require_once('class/OrderClass.php');

	if ( LoginClass::check_if_email_password_matches_md5($_GET['email'],
														 $_GET['password'] ))
	{
		OrderClass::update_confirmed($_GET['order_id']);	
		echo "Uw opdracht is bevestigd. We houden u op de hoogte van de<br>
			  voortgang. U wordt doorgestuurd naar uw homepage";
		header('refresh:6;url=index.php?content=customer_homepage');
		
	}
	else 
	{
		echo "U heeft geen rechten op deze pagina. U wordt doorgestuur<br>
			  naar de homepage";
		header('refresh:5;url=index.php?content=homepage');	
	}

?>