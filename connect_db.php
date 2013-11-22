<?php

	// maak een object $db en geef hem te optie om verbing te maken met de database
	$db = mysql_connect("localhost", "root", "")
						or die("geen verbinding db");
	// selecteerd database en verbind hem daarmee
	mysql_select_db("prive", $db)
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
		
		case 'inloggen': var_dump($_POST);
			if (!empty($_POST['email'])	 && !empty($_POST['password']))
	{
			$email = $_POST['email'];
			$password = $_POST['password'];
			$query = ('SELECT * FROM users WHERE email ="$email" and password ="$password"');

			mysql_query($query, $db)
						or die("query fail");
			header("location:read.php");
		
	}
	else
	{
		echo "veld niet ingevuld";
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