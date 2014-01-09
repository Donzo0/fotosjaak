<?php 
	if ( !is_numeric($_POST["getal1"]) || !is_numeric($_POST["getal2"]))
	{
		echo "Een van de ingevoerde getallen is niet een getal";
	}
	else
	{
	if ($_POST["bewerking"] == 1)
	{
		echo "Er moet worden opgeteld<br>";
		$uitkomst = $_POST["getal1"] + $_POST["getal2"];
		$teken = " + ";
	}
	else if ($_POST["bewerking"] == 2)
	{
		echo "Er moet worden afgetrokken<br>";
		$uitkomst = $_POST["getal1"] - $_POST["getal2"];
		$teken = " - ";
	}
	else if ($_POST["bewerking"] == 3)
	{
		echo "Er moet worden vermenigvuldigd";
		$uitkomst = $_POST["getal1"] * $_POST["getal2"];
		$teken = " x ";
	}
	else if($_POST["bewerking"] == 4)
	{
		echo "Er moet worden gedeeld";
		$uitkomst = $_POST["getal1"] / $_POST["getal2"];
		$teken = " : ";
	}
	else
	{
		echo "Er is geen keuze gemaakt";
	}
	echo $_POST["getal1"].$teken.$_POST["getal2"]. " = ".$uitkomst."<br>";
	}
?>

<a href="index.php">opnieuw</a>
