<?php
	// Als je methoden uit de LoginClass wilt gebruiken
	//  dan moet je deze class eerst toevoegen met require_once
	require_once("class/LoginClass.php");
	
	// Als je methoden uit de SessionClass wilt gebruiken
	//  dan moet je deze class eerst toevoegen met require_once
	require_once("class/SessionClass.php");
	
	//Check of beide velden zijn ingevoerd	
	if ( !empty($_POST['email']) && !empty($_POST['password']))
	{
		//Check of de ingevulde emailadres en wachtwoord bestaan in database	
		if (LoginClass::check_if_email_password_exists($_POST['email'],
													   $_POST['password']))
		{
			/* Check nu duidelijk is dat de combinatie van email en password
			 * bestaat of het account wel geactiveerd is.			 * 
			 */
			if (LoginClass::check_if_account_is_activated($_POST['email'],
														  $_POST['password']))
		    {
			
				/* Roep de static method find_user_by_email_password aan uit
				 * de LoginClass. Deze method geeft precies 1 LoginClass-object
				 * terug. Je kunt via dit object de properties opvragen zoals:
				 * get_id(), get_email(), get_password, enz......
				 * 
				 * Geef dit object vervolgens mee aan de method login($userObject)
				 * uit de SessionClass. 
				 */  								
				$session->
					login(LoginClass::find_user_by_email_password($_POST['email'],
																  $_POST['password']));
				
				switch ($_SESSION['userrole'])
				{
					case 'root':
						header("location:index.php?content=root_homepage");
					break;
					case 'administrator':
						header("location:index.php?content=admin_homepage");			
					break;
					case 'customer':
						header("location:index.php?content=customer_homepage");
					break;
					case 'developer':
						header("location:index.php?content=developer_homepage");
					break;
					case 'photographer':
						header("location:index.php?content=photographer_homepage");
					break;			
				}
			}
			else
			{
				echo "Uw account is nog niet door u geactiveerd. Check uw<br>
					  email voor het klikken op de activatielink";
				header("refresh:4; url=index.php?content=homepage");
				
			}
		}
		else
		{
			//Blijkbaar is het record niet gevonden in de database
			echo "De ingevoerde combinatie van emailadres - wachtwoord is ons niet bekend. U wordt 	doorgestuurd naar de inlogpagina";
			header("refresh:4; url=index.php?content=login_form");
		}		
	}
	else
	{
		echo 'U heeft beide of een van beide velden niet ingevuld. 
			  U wordt doorgestuurd naar de inlogpagina';
		header("refresh:4;url=index.php?content=login_form");
	}

?>
