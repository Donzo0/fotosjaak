<?php
	require_once('MySqlDatabaseClass.php');
	
	//Dit is de loginclass
	class LoginClass
	{
		//FIELDS
		private $login_id;
		private $email ;
		private $password ;
		private $userrole ;
		private $isactivated ;
		private $registerdate ;
		
		//de constructor van de loginclass
		public function __constructor()
		{
			
		}
		
		// method find by_sql
		public function find_by_sql($query)
		{
			global $database;
		}
		
	}
