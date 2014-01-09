<?php
	//Maak contact met de mysql-server.
	$db = mysql_connect("localhost", "root", "") 
			or die("Er is geen contact met de mysql-server");
	
	//Selecteer een database op de mysql-server
	mysql_select_db("am1b-fotosjaak", $db) or die("Database niet gevonden");
?>