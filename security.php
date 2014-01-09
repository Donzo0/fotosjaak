<?php
	if (!isset($_SESSION['id']))
	{
		echo "U bent niet ingelogd. U heeft geen toegang tot deze pagina<br>
				U wordt doorgestuurd naar de inlogscherm";
		header("refresh:5; url=index.php?content=login");
		exit();
	}
	else if ( !in_array($_SESSION['userrole'], $userrole))
	{
		echo "U bent wel ingelogd, maar niet bevoegd om deze pagina te bekijken.<br>
				U wordt doorgestuurd naar uw homepage";
		header("refresh:5; url=index.php?content=".$_SESSION['userrole']."_homepage");
		exit();
	}
?>