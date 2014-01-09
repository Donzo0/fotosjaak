<?php
	//Met var_dump kun je zien welke variabelen namen en waarden
	//er verstuurd worden.
	
	//var_dump($_POST);
	
	include("connect_db.php");
	
	//Een sql opdracht die een record naar de tabel users wegschrijft
	$sql = "INSERT INTO `users` (`id` ,
								 `firstname` ,
								 `infix` ,
								 `surname`,
								 `city`,
								 `zip_code`,
								 `street`,
								 `house_number`,
								 `birthday`,
								 `sex`,
								 `email`,
								 `password`,
								 `game_type`,
								 `favo_game`,
								 `userrole`)
						 VALUES (NULL ,
								 '".$_POST['firstname']."',
								 '".$_POST['infix']."',
								 '".$_POST['surname']."',
								 '".$_POST['city']."',
								 '".$_POST['zip_code']."',
								 '".$_POST['street']."',
								 '".$_POST['house_number']."',
								 '".$_POST['birthday']."',
								 '".$_POST['sex']."',
								 '".$_POST['email']."',
								 '".$_POST['password']."',
								 '".$_POST['game_type']."',
								 '".$_POST['favo_game']."',
								 'customer')";
	//echo $sql;
								 
	mysql_query($sql, $db) or die("De query is niet goed ontvangen");
	
	echo "Uw gegevens zijn opgeslagen in de database. U wordt doorgestuurd naar
		  de homepage";	
	header("refresh:4; url=index.php?content=homepage");	
?>