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
		
		 //Properties
                //getters voor alle fields
                public function getLogin_id() {        return $this->login_id;        }
                public function getEmail() { return $this->email; }
                public function getPassword() { return $this->password; }
                public function getUserrole() { return $this->userrole; }
                public function getIsactivated() { return $this->isactivated; }
                public function getRegisterdate() { return $this->registerdate; }
		
		//de constructor van de loginclass
		public function __constructor()
		{
			
		}
		
		// method find by_sql
		public static function find_by_sql($sql)
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
				$object = new LoginClass();		
				

		        $object->login_id = $row['login_id'];
		        $object->email = $row['email'];
		        $object->password = $row['password'];
		        $object->userrole = $row['userrole'];
				$object->isactivated = $row['isactivated'];
				$object->registerdate = $row['registerdate'];
				
		       //Stop het $object gemaakt van de LoginClass
		       //in het objectarray genaamd
		       //$object_array
        	   $object_array[] = $object;   
			}
		     return $object_array;
		}
		public static function find_all_records()
                {
                        $query = "SELECT * FROM `login`";
                        
                        /* static methods worden aangeroepen met een 
                         * dubbele dubbele punt (Engels: double colon)
                         */
                        return self::find_by_sql($query);
                }

                public static function check_if_email_password_exists($email,
                                                                      $password)
                {
                        /* Als we het $database object van de class MySqlDatabaseClass
                         * willen gebruiken binnen de method check_if_email_exists, dan
                         * moeten we voor $database global zetten. PHP weet dan dat we
                         * $database bedoelen die bovenaan met require-once is geinclude 
                         */
                        global $database;
                        
                        /* Dit is query die records selecteert met het ingevulde
                         * emailadres en password 
                         */
                        $query = "SELECT *
                                          FROM `login`
                                          WHERE `email`= '".$email."'
                                          AND `password`= '".$password."'";
                        
                        /* De query wordt afgevuurd op de database 
                         */
                        $result = $database->fire_query($query);
                        
                        /* mysql_num_rows telt het aantal gevonden records van
                         * de resource $result 
                         */
                        return mysql_num_rows($result);
                }

                public static function find_login_user($email, $password)
                {
                        /* gebruik het $database object dat wordt toegevoegd met 
                         * require-once
                         */        
                        global $database;
                        
                        /* Dit is query die alle records selecteert met het ingevulde
                         * emailadres en password afkomstig van het formulier
                         */
                        $query = "SELECT *
                                          FROM `login`
                                          WHERE `email` = '".$email."'
                                          AND `password` = '".$password."'";
                        
                        /* Met array_shift haal je het ene record uit het array
                         * en geef je dus een LoginClass object terug 
                         */
                        $record_array = self::find_by_sql($query);
                        return array_shift($record_array);
                }

                public static function check_if_account_is_activated($email, $password)
                {
                    global $database;

                                            $query = "SELECT *
                                          FROM `login`
                                          WHERE `email` = '".$email."'
                                          AND `password` = '".$password."'";
                    $user_array = self::find_by_sql($query);
                    return array_shift($user_array);
                    if ($user->getIsactivated() == 'yes')
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }

                }
}
		
