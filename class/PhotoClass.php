<?php
 require_once("MySqlDatabaseClass.php");
 
 class PhotoClass
 {
 	//Fields
 	private $photo_id;
	private $order_id;
	private $photo_name;
	private $photo_text;
 	
 	//properties
 	
 	//Constructor
 	public function __construct()
	{
		// Gebruiken we nu even niet....
	} 	
 	
 	//Methods
 	public static function insert_into_photo($order_id, $photo_name, 												$photo_text)
	{
		// Maak het $database object uit het MySqlDatabaseClass.php	
		// bestand beschikbaar binnen de insert_into_photo() method
		global $database;
		
		// Maak de insert query
		$query = "INSERT INTO `photo` (`photo_id`,
									   `order_id`,
									   `photo_name`,
									   `photo_text`)
				  VALUES			  (Null,
				  					   '".$order_id."',
				  					   '".$photo_name."',
				  					   '".$photo_text."')";
									   
		//echo $query; exit();
		// Vuur de query af op de database
		$database->fire_query($query);
	}
	
 }
?>