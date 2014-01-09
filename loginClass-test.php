<h3>Dit is de LoginClass-test pagina</h3><hr>
<?php
	//Voeg het bestand LoginClass.php in
	require_once("class/LoginClass.php");
		
	$result = LoginClass::find_all_records();
	
	
	foreach ($result as $value)
	{
		echo $value->getLogin_id()." | ".
			 $value->getEmail()." | ".
			 $value->getPassword()." | ".
			 $value->getUserrole()." | ".
			 $value->getIsactivated()." | ".
			 $value->getRegisterdate()."<br>";		
	}
?>