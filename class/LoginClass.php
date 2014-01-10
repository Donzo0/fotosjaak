<?php
	require_once('MySqlDatabaseClass.php');
	
	//Dit is de class-definitie van de LoginClass
	class LoginClass
	{
		//Fields
		private $login_id;
		private $email;
		private $password;
		private $userrole;
		private $isactivated;
		private $registerdate;
		
		//Properties
		//getters voor alle fields
		public function getLogin_id() {	return $this->login_id;	}
		public function getEmail() { return $this->email; }
		public function getPassword() { return $this->password; }
		public function getUserrole() { return $this->userrole; }
		public function getIsactivated() { return $this->isactivated; }
		public function getRegisterdate() { return $this->registerdate; }
		
		// De constructor van de LoginClass
		public function __constructor()
		{
						
		}
		
		// Method find_by_sql
		public static function find_by_sql($sql)
		{
			// global zorgt ervoor dat $database ook binnen de haakjes
			// van de find_by_sql method bekent is.	
			global $database;
			
			//Roep de fire_query method aan met het $database object
			$result = $database->fire_query($sql);
			
			// Hier wordt een array gedefinieerd. Dit array gaat
			// LoginClass-objecten bevatten.
			$object_array = array();
			
			// Met deze while-lus vullen we het $object-array met LoginClass-objecten
			while ($row = mysql_fetch_array($result))
			{
				//Maak een nieuw LoginClass-object aan per while ronde	
				$object = new LoginClass();
				
				//Vul de velden van het LoginClass-object met de gevonden record-
				//waarden uit de tabel
				$object->login_id		= $row['login_id'];
				$object->email			= $row['email'];
				$object->password		= $row['password'];
				$object->userrole 		= $row['userrole'];
				$object->isactivated	= $row['isactivated'];
				$object->registerdate	= $row['registerdate'];
				
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
			$query = "SELECT	*
					  FROM		`login`
					  WHERE		`email`		= '".$email."'
					  AND		`password`	= '".$password."'";
			
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
			$query = "SELECT	*
					  FROM		`login`
					  WHERE		`email`		= '".$email."'
					  AND		`password`	= '".$password."'";
			
			/* Met array_shift haal je het ene record uit het array
			 * en geef je dus een LoginClass object terug 
			 */
			$record_array = self::find_by_sql($query);
			return array_shift($record_array);
		}
		
		public static function check_if_account_is_activated($email,
														  	 $password)
		{
			$query = "SELECT	*
					  FROM		`login`
					  WHERE		`email`		=	'".$email."'
					  AND		`password`	=	'".$password."'";
			
			$user_array = self::find_by_sql($query);
			$user = array_shift($user_array);
			if ($user->getIsactivated() == 'yes')
			{
				return true;
			}
			else 
			{
				return false;
			}			
		}
		public static function check_if_emailaddress_exists($email)
		{
			//database word uit bestand gehaald
			global $database;

			//query die word verstuurd naar database
			$query = "SELECT `email`
						FROM `login`
						WHERE `email` = '".$email."'";

			//Hier word de query verstuurd naar database
			$result = $database->fire_query($query);
			//Er moet meer dan 1 resultaat zijn om true aan te slaan
			if(mysql_fetch_row($result) > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public static function insert_into_LoginClass($email)
		{
			global $database;

			$date = date("Y-m-d H:i:s");
			$temp_password = md5($email.$date);

			$query = "INSERT INTO `login` (`login_id`,
										   `email`,
										   `password`,
										   `userrole`,
										   `isactivated`,
										   `registerdate`)
					  Values  				(NULL,
					  						 '".$email."',
					  						 '".$temp_password."',
					  						 'customer',
					  						 'no',
					  						 '".$date."')";
		$database->fire_query($query);

		$id =  mysql_insert_id();

		$query = "INSERT INTO `user` (`user_id`,
									  `firstname`,
									  `infix`,
									  `surname`,
									  `address`,
									  `addressnumber`,
									  `city`,
									  `zipcode`,
									  `country`,
									  `phonenumber`,
									  `mobilephonenumber`)
				  VALUES              ('".$id."',
				  					   '".$_POST['firstname']."',
				  					   '".$_POST['infix']."',
				  					   '".$_POST['surname']."',
				  					   '".$_POST['address']."',
				  					   '".$_POST['addressnumber']."',
				  					   '".$_POST['city']."',
				  					   '".$_POST['zipcode']."',
				  					   '".$_POST['country']."',
				  					   '".$_POST['phonenumber']."',
				  					   '".$_POST['mobilephonenumber']."')";
		$database->fire_query($query);
		self::send_activation_email($_POST['firstname'], $_POST['infix'], $_POST['surname'], $_POST['email'], $temp_password);
		}

		private static function send_activation_email($firstname,
													  $infix,
													  $surname,
													  $email,
													  $password)
		{
			$to = $email;
			$subject = "Activatie Mail FotoSjaak";
			$massage = "Geachte Heer/Mevrouw ".$infix." ".$surname."\r\n \r\n";
			$massage .= "Voor u kan inloggen moet u eerst uw acount activeren\r\n";
			$massage .= "Klik op onderstaande link om uw acount actief te maken.\r\n";
			$massage .= "http://localhost/projecten/blok2/FotoSjaak/index.php?content=activation$email= ".$email."$password".$password."\r\n";
			$massage .= "Met Vriendelijke Groet, \r\n";
			$massage .= "FotoSkaak uw fotograaf";

			$headers = "Reply-To: info@fotosjaak.nl \r\n";
			$headers .= "FROM: sjaakdevries@fotosjaak.nl \r\n";
			$headers .= "Cc: info@fotosjaak.nl \r\n";
			$headers .= "Bcc: info@fotosjaak.nl \r\n";
			$headers .= "X-mailer: PHP".phpversion()."\r\n";
			$headers .= "MIME-version: 1.0 \r\n"; 

			mail($to, $subject, $massage, $headers);
		}
}
?>