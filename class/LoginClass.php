<?php
	require_once("MySqlDatabaseClass.php");
	require_once("UserClass.php");

	// Hieronder de classdefinitie van de LoginClass
	class LoginClass
	{
		//Fields
		private $id;
		private $email;
		private $password;
		private $userrole;
		private $activated;
		private $activationdate;
		
		// Properties
		public function get_id() { return $this->id;}
		public function get_email() { return $this->email;}
		public function get_password() { return $this->password;}
		public function get_userrole() { return $this->userrole;}
		public function get_activated() { return $this->activated;}
		public function get_activationdate() { return $this->activationdate;}
		
		//Constructor
		public function __construct()
		{
			
		}
		
		public static function find_by_sql($query)
		{
			// Met global maak je het database-objct uit de MySqlDatabaseclass
			// bruikbaar binnen de find_by_sql method
			global $database;
			
			//Vuur de query af op de database
			$result = $database->fire_query($query);
			
			/* Dit is het array waar alle LoginClassobjecten in worden gestopt
			 * Elk LoginClassobject bevat een gevonden record uit de database
			 * Vindt de query 3 records dan zitten er 3 LoginClassobjecten in 
			 * het array $object_array. 
			 */
			$object_array = array();
			
			while ( $row = mysql_fetch_array($result))
			{
				// Maak iedere while ronde een LoginClassobject aan
				$object = new LoginClass();
				// Stop per record ieder databaseveld in het LoginClassobject
				// veld
				$object->id				=	$row['id'];
				$object->email			=	$row['email'];
				$object->password		=	$row['password'];
				$object->userrole		=	$row['userrole'];
				$object->activated		=	$row['activated'];
				$object->activationdate	=	$row['activationdate'];
				// Stop het net gemaakte LoginClassobject in het $object_array
				$object_array[] = $object;			
			}
			return $object_array;
		}
		
		/* Deze method selecteert alle records uit de login table. We maken
		 * gebruik van de find_by_sql($query) method uit deze class.
		 */ 
		public static function select_all_from_login()
		{
			$query = "SELECT * FROM `login`";
			$result = self::find_by_sql($query);
			return $result;			
		}
		
		public static function email_exists($emailaddress)
		{
			global $database;	
			$query = "SELECT * 
					  FROM `login` 
					  WHERE `email` = '".$emailaddress."'";
			$result = $database->fire_query($query);
			if ( mysql_num_rows($result) > 0)
			{
				return "Het e-mailadres bestaat al in de database";
			}
			else
			{
				return "Het e-mailadres bestaat niet in de database";
			}			
		}
		
		public static function check_if_email_password_exists($email, $password)
		{
			global $database;
			$query = "SELECT * 
					  FROM `login`
					  WHERE `email` = '".$email."'
					  AND `password` = '".$password."'";
			//echo $query; exit();
			$result = $database->fire_query($query);
			if (mysql_num_rows($result) > 0)
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		 
		public static function find_user_by_email_password($email, $password)
		{
			$query = "SELECT * 
					  FROM `login`
					  WHERE `email` = '".$email."'
					  AND `password` = '".$password."'";
			//echo $query; exit();
			$loginClassObjectInArray = self::find_by_sql($query);	
			return $loginClassObject = array_shift($loginClassObjectInArray);
		}
		
		public static function check_if_account_is_activated($email,
															 $password)
		{
			// Maak een query die het record selecteerd van degene die
			// inlogd
			$query = "SELECT	*
					  FROM		`login`
					  WHERE		`email`		=	'".$email."'
					  AND		`password`	=	'".$password."'";
				
			// Vuur de query af op de database met de static method
			// find_by_sql($query)
			$object_array = self::find_by_sql($query);
			$loginClassObject = array_shift($object_array);
			if ( $loginClassObject->activated == 'yes')
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		
		public static function check_if_email_exists($email)
		{
			global $database;	
				
			// Zet hier je commentaar
			$query = "SELECT	*
					  FROM		`login`
					  WHERE		`email`	=	'".$email."'";
			
			// Zet hier je commentaar
			$result = $database->fire_query($query);
			
			// Zet hier je commentaar
			if (mysql_num_rows($result) > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
			
			// Ternary operator variabele 
			// (vergelijking) ? waarde als waar : waarde als niet waar
			// return (mysql_num_rows($result) > 0) ? true : false;
		}
		
		public static function insert_into_loginClass($post_array)
		{
			global $database;
						
			$date = date("Y-m-d H:i:s");
			
			$tmp_password = $date.$post_array['email'];
			
			$hash_from_tmp_password = MD5($tmp_password);
			
			$query = "INSERT INTO	`login` (`id`,
											 `email`,
											 `password`,
											 `userrole`,
											 `activated`,
											 `activationdate`)
					  VALUES				(NULL,
					  						 '".$post_array['email']."',
					  						 '".$hash_from_tmp_password."',
					  						 'customer',
					  						 'no',
					  						 '".$date."')";
			$database->fire_query($query);
			
			$id = mysql_insert_id();
			
			UserClass::insert_into_userClass($post_array, $id);
			self::send_activation_email($post_array, $hash_from_tmp_password);
		}
		
		public static function send_activation_email($post_array, $password)
		{
			$to = $post_array['email'];
			$subject = "Activatie website FotoSjaak";
			
			/*
			$message = "Geachte heer/mevrouw ".
					   $post_array['firstname']." ".
					   $post_array['infix']." ".
					   $post_array['surname']."\r\n";
			$message .= "Voor u kunt inloggen moet uw account nog worden geactiveerd.\r\n";
			$message .= "Klik hiervoor op de onderstaande link\r\n";
			$message .= "http://localhost/2013-2014/Blok2/AM1A/fotosjaak-am1a/index.php?content=activation&email=".$post_array['email']."&password=".$password."\r\n";
			$message .= "Met vriendelijke groet,\r\n";
			$message .= "Sjaak de Vries\r\n";
			$message .= "Uw fotograaf";	
			*/
			
			$message = "<p><u>Geachte heer/mevrouw <b>".
					   $post_array['firstname']." ".
					   $post_array['infix']." ".
					   $post_array['surname']."</b></u></p>";
			$message .= "Voor u kunt inloggen, moet uw account nog worden geactiveerd.<br>";
			$message .= "Klik hiervoor op de onderstaande link<br><br>";
			$message .= "<a href='http://localhost/2013-2014/Blok2/AM1A/fotosjaak-am1a/index.php?content=activation&email=".$post_array['email']."&password=".$password."'>activeer account</a><br><br>";
			$message .= "Met vriendelijke groet,<br>";
			$message .= "Sjaak de Vries<br>";
			$message .= "Uw fotograaf";	
			
			$headers  = "From: info@fotosjaak.nl\r\n";
			$headers .=	"Reply-To: info@fotosjaak.nl\r\n";
			$headers .= "Cc: sjaak@fotosjaak.nl\r\n";
			$headers .= "Bcc: admin@fotosjaak.nl\r\n";
			$headers .= "X-mailer: PHP/".phpversion()."\r\n";
			$headers .= "MIME-version: 1.0\r\n";
			//$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			mail($to, $subject, $message, $headers);
		}

		public static function update_password_in_login($email,
											 			$password)
		{
			global $database;
			
			$date = date("Y-m-d H:i:s");
			
			$query = "UPDATE `login`
					  SET 	 `password`			= '".$password."',
					  	  	 `activated`		= 'yes',
					  	  	 `activationdate`	= '".$date."'
					  WHERE  `email`			= '".$email."'";
			$database->fire_query($query);				
		}
		
		public static function find_email_password_by_id()
		{
			$query = "SELECT *
					  FROM `login` 
					  WHERE `id` = '".$_SESSION['id']."'";
			$login_array = self::find_by_sql($query);
			$login_object = array_shift($login_array);
			return $login_object;			
		}
		
		public static function check_if_email_password_matches_md5($email, $password)
		{
			global $database;
			$query = "SELECT * 
					  FROM `login`
					  WHERE `email` = '".$email."'";
			$result = self::find_by_sql($query);
			
			$login_object = array_shift($result);
			// Check of het emailadres bestaat
			if ( $login_object != null)
			{
				// Check of de MD5 hash van het emailadres uit de database
				// overeen komt met de meegegeven MD5 hash
				if ( strcmp($password, MD5($login_object->get_password())) == 0)
				{
					return true;
				}
				else 
				{
					return false;
				}
			}
			else 
			{
				return false;
			}
		}										
	}
?>