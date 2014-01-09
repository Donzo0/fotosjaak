<?php
	class SessionClass
	{
		//Fields
		private $id;
		private $email;
		private $userrole;
		private $logged_in = false;
		
		
		//Properties
				
		//Constructor
		public function __construct()
		{				
			//session_start();
			//echo "Hallo123";exit();
		}
		
		
		// Method login
		public function login($loginClassObject)
		{
			$this->id			= $_SESSION['id']		= $loginClassObject->getLogin_id();
			$this->email		= $_SESSION['email']	= $loginClassObject->getEmail();
			$this->userrole		= $_SESSION['userrole']	= $loginClassObject->getUserrole();
			$this->logged_in	= $_SESSION['logged_in']= true;			
		}
		
		// Method logout
		public function logout()
		
		
		
		{
			session_destroy();
			$this->logged_in = false;
		}	
	}
	$session = new SessionClass();
?>