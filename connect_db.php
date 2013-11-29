<?php

	// maak een object $db en geef hem te optie om verbing te maken met de database
	$db = mysql_connect("localhost", "root", "")
						or die("geen verbinding db");
	// selecteerd database en verbind hem daarmee
	mysql_select_db("fotosjaak", $db)
					or die("geen verbing db!");

	switch ($_POST['submit']) {
		case 'registreren':
				// zet gegeven data in database
				$sql = "INSERT INTO `users`( `id`,
							  	    `email`,
							        `password` )
							VALUES (NULL,
									 '".$_POST['email']."',
									 '".$_POST['password']."' )";

	// stuur de query naar de database
	mysql_query($sql, $db)
				or die("qeury fail");
	header("location:index.php");
			break;
		
		case 'inloggen':
			if (!empty($_POST['email'])	 && !empty($_POST['password']))
	{
			$email = $_POST['email'];
			$password = $_POST['password'];
			// selecteerd de tabel met de gegevens die je witl hebben
			$query = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
			//Verstuurd de query naar de database
			$result = mysql_query($query, $db)
						or die("query fail");
			if(mysql_num_rows($result) > 0)
			{
					
				$record = mysql_fetch_array($result);
				$_SESSION['id'] = $record['id'];
				$_SESSION['password'] = $record['password'];
				$_SESSION['userrole'] = $record['userrole'];
				$_SESSION['ingelogd'] = true;
				var_dump($record);
				switch ($record['userrole']) {
					case 'customer':
						header("location:customer.php");
						break;
					case 'admin':
						header("location:admin.php");
						break;
					case 'root':
						header("location:root.php");
						break;	
				}
		}
		else
		{
			echo "Gebruikersnaam en/of wachtwoord fout ingevuld.";
			header("refresh:10; url=login.php");
		}
	}
	else
	{
		echo 'veld niet ingevuld';
	}

		break;
	case 'update':
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query = mysql_query('UPDATE users SET email="'.$email.'", password="'.$password.'" ') or die ("query fail");
		mysql_query($query);
		header("location:read.php");
		break;

	case 'delete':
		$query = mysql_query("DELETE FROM users");
		mysql_query($query);
		header("location:read.php");
		break;

		default:
			
			break;
	}

?>