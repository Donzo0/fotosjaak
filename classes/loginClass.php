<?php
	require_once('MySqlDatabaseClass.php');
	
	//Dit is de loginclass
	class LoginClass
	{
		//FIELDS
		private $login_id;
		public $login_id;
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
		public function find_by_sql($sql)
		{
			//haalt een variable uit de mysqldatabaseclass
			global $database;
			//haalt the method fire_query op
			$result = $database->fire_query($sql);
			//dit is een array. dit gaat login objecten bevatten
			$object_array = array();
			
			// met deze while-lus vullen we het object-array met loginclass
			while ($row = mysql_fetch_array($result)) 
			{
				$object = LoginClass();
				$object = new LoginClass();
				
				

		        $this->login_id    = $row['login_id'];
		        $this->email    = $row['email'];
		        $this->password    = $row['password'];
		        $this->userrole   = $row['userrole'];
				$this->isactivated = $row['isactivated'];
				$this->registerdate = $row['registerdate'];
				
		       //Stop het $object gemaakt van de LoginClass
		       //in het objectarray genaamd
		       //$object_array
        	   $object_array[] = $object;   
			}
		     return $object_array;
		}
		
	}
