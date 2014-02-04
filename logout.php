<?php	
	/* Als je een method wilt gebruiken uit de SessionClass, dat
	 * moet je het bestand waar de classdefinitie in staat toevoegen
	 * aan dit bestand. Gebruik daarvoor require_once.
	 */
	require_once("class/SessionClass.php");
	
	/* We roepen de method logout() aan in de SessionClass 
	 */
	 
	$session->logout();
	
	// we gaan de persoon die uitlogt doorsturen naar de homepage.php pagina
	header("location:index.php?content=homepage");
?>