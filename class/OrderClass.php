<?php
 require_once("MySqlDatabaseClass.php");

 class OrderClass
 {
         // Fields
         private $order_id;
        private $user_id;
        private $order_short;
        private $order_long;
        private $deliverydate;
        private $eventdate;
        private $color;
        private $number_of_pictures;
        private $confirmed;
        
        // Constructor
        public function __connstruct()
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
                
                // Met deze while-lus vullen we het $object-array met                                           LoginClass-objecten
                while ($row = mysql_fetch_array($result))
                {
                        //Maak een nieuw LoginClass-object aan per while ronde        
                        $object = new OrderClass();
                        
                        //Vul de velden van het LoginClass-object met de gevonden record-
                        //waarden uit de tabel
                        $object->order_id                = $row['order_id'];
                        $object->user_id                = $row['user_id'];
                        $object->order_short        = $row['order_short'];
                        $object->order_long                = $row['order_long'];
                        $object->deliverdate        = $row['deliverydate'];
                        $object->eventdate                = $row['eventdate'];
                        $object->eventdate                = $row['eventdate'];
                        $object->color                        = $row['color'];
                        $object->number_of_pictures        = $row['number_of_pictures'];
                        $object->confirmed                = $row['confirmed'];
                                        
                        //Stop het $object gemaakt van de LoginClass
                        //in het objectarray genaamd
                        //$object_array
                        $object_array[] = $object;                                
                }                        
                return $object_array;
        }        
        
 }
?>