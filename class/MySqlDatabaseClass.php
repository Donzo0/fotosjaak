<?php
	// Het config.php bestand wordt ingesloten in het bestand MySqlDatabaseClass.php
	// zodat we gebruik kunnen maken van de daar gedefinieerde constanten
	require_once('config/config.php');
	
	//Dit is de class definitie van de MySqlDatabaseClass
	class MySqlDatabaseClass
	{
		// Fields
		private $db_connection;		
		
		
		//Constructor in PHP heeft altijd dezelfde naam __construct
		public function __construct()
		{
			// Maakt contact met de mysql-server	
			$this->db_connection = mysql_connect(SERVERNAME, USERNAME, PASSWORD);
			
			// Selecteer een database
			mysql_select_db(DATABASENAME, $this->db_connection)
				or die('MySqlDatabaseClass: '.mysql_error());
			
		}
		
		// Dit is een method(function binnen een class) die sql-query's kan afvuren
		// op de database. Het resultaat wordt dan teruggeven door de method
		public function fire_query($query)
		{
			// Stuurt de query die meegegeven is als argument van de functie fire_query
			// naar de database	
			$result = mysql_query($query, $this->db_connection)
						or die('MySqlDatabaseClass: '.mysql_error());
			return $result;
		}		
	}
	
	// Maak nu een object (instantie) van de MySqlDatabaseClass
	$database = new MySqlDatabaseClass();
?>