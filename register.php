<?php
	require_once("class/LoginClass.php");
	
	if ( LoginClass::check_if_emailaddress_exists($_POST['email']))
	{
		echo "Het door u ingevulde emailadres is al bij ons in gebruik.<br>
		      U wordt teruggestuurd naar de registratiepagina.";
		header("refresh:5;url=index.php?content=register_form");
		
	}
	else 
	{
		LoginClass::insert_into_loginClass($_POST['email']);
			
		echo "U bent succesvol geregistreerd. U ontvangt een email<br>
			  met daarin een activatielink. U wordt dan doorgestuurd naar<br>
			  een pagina waarop u een nieuw wachtwoord moet kiezen. Daarna<br>
			  is uw account geactiveerd en kunt u inloggen. U wordt nu<br>
			  doorgestuurd naar de homepage.";	
		header("refresh:6; url=index.php?content=homepage");
	}	
?>