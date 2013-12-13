<?php
	class SessionClass
	{
		//Fields
		private $id;
		private $email;
		private $userrole;
		private $logged_in = false;

		//propperties

		//constructor
		public function __constructor()
		{

		}

		//Method login
		public function login($loginClassObject)
		{
			$this->id = $_SESSION['id'] = $loginClassObject->getLogin_id();
			$this->email = $_SESSION['email'] = $loginClassObject->getEmail();
			$this->userrole = $_SESSION['userrole'] = $loginClassObject->getUserrole();
			$this->logged_in = $SESSION['logged_in'] = true;
		}
	}
	$session = new SessionClass();