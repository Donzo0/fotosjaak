<?php
	require_once("class/SessionClass.php");
	require_once("class/LoginClass.php");
	

	// Check of de loginformulier velden wel zijn ingevuld
	if (!empty($_POST['email']) && !empty($_POST['password']))
	{
		/* Check in de database of beide ingevoerde waarden in
		 * het loginformulier wel bestaan in de login tabel
		 * Tussen de haakjes van het onderstaande if-statement
		 * moet true of false komen te staan. We schrijven daarvoor
		 * een method in de LoginClass class. 
		 * Een static method uit een class kan worden aangeroepen
		 * met: de naam van de class gevolgd door dan een
		 * dubbele dubbele punt gevold door de naam van de method.
		 */
		if (LoginClass::check_if_email_password_exists($_POST['email'],
													   $_POST['password']))
		{
			/* Vind de logingegevens van de user die inlogt. Je krijgt
			 * een loginClass object terug. En je kan dus de properties
			 * getLogin() en getUserrole() opvragen. Geef het loginClass
			 * object mee aan de login method uit het $session object. Het
			 * $session object wordt gemaakt in het bestand SessionClass.php 
			 */	
				
			if (LoginClass::check_if_account_is_activated($_POST['email'],
														  $_POST['password']))
			{	
					
				$session->login(LoginClass::find_login_user($_POST['email'],
															$_POST['password']));
							
				switch ($_SESSION['userrole'])
				{
					case 'customer':
						header("location:index.php?content=customer_homepage");
						break;
					case 'administrator':
						header("location:index.php?content=admin_homepage");
						break;
					case 'root':
						header("location:index.php?content=root_homepage");
						break;
					case 'developer':
						header("location:index.php?content=developer_homepage");
						break;
					case 'photographer':
						header("location:index.php?content=photographer_homepage");
						break;	
					case 'coworker':
						header("location:index.php?content=coworker_homepage");
						break;			
				}						
			}
			else 
			{
				echo "U account is niet geactiveerd. Check uw inbox of spambox
					  en activeer alsnog uw account";
				header("refresh:4; url=index.php?content=login");
			}		
		}
		else
		{
			echo "Gebruikersnaam en/of wachtwoord niet bekent";
			header("refresh:4; url=index.php?content=login");
		}
	}
	else
	{
		//Stuur door naar login met foutmelding
		echo "U heeft een of meerdere velden niet ingevuld";
		header("refresh:4; url=index.php?content=login");
	}


?>