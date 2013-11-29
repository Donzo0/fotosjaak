<?php
	// hier word het config bestand geinclude in de MySqlDatabaseClass
	require_once('config/config.php');

	//class definitie van Deze class
	class MySqlDatabaseClass 
	{
		//field
		private $db_connection;
		
		//Constructor in php heeft altijd dezelfde naam.
		public function __construct()
		{
			//maakt verbinding met de mysql server.
			$this->db_connection = mysql_connect(SERVERNAME,USERNAME,PASSWORD);
			
			//sellect query
			mysql_select_db(DATABASE, $this->db_connection) or die ("MySqlDatabaseClass: ".mysql_error());
		}
		
		//Dit is een method(function binnen de class) die querys kan afvuren op de database
		public function fire_query($query)
		{
			//Hier word er een query afgevuurd op de database
			$result = mysql_query($query, $this->db_connection) or die ("MySqlDatabaseClass: ".mysql_error());
			
			// hier geeft je $result terug
			return $result;
		}
	}
	
	echo "test pagina";
	
	//Maak nu een object (instantie) van de MySqlDatabaseClass
	$database = new MySqlDatabaseClass();
	
	// Selecteer een tabel uit de database
	$query = "SELECT * FROM users";
	$result = $database->fire_query($query);
	
	while ($row = mysql_fetch_array($result))
	{
		echo $row['email'];
	}
