<?php 
	$userrole = array('root', 'photographer');
	include("security.php");
	
	// Voeg deze class toe zodat we gegevens kunnen wegschrijven naar
	// de photo tabel.
	require_once 'class/PhotoClass.php'; 
	
	if (isset($_POST['submit']))
	{
		$mime_type_array = array('mime/jpeg', 'mime/png', 'mime/gif');
		
		if ( in_array($_FILES['photo']['type'], $mime_type_array))
		{
			
		// Definieer een pad waar de foto's worden opgeslagen	
		$dir = "fotos/".$_POST['user_id']."/".$_POST['order_id']."/";
		
		// Bestaat deze directory al, zo nee, maak de directory
		if (!file_exists($dir))
		{	
			mkdir($dir, 0777, true);
			mkdir($dir."thumbnail/", 0777, true);
		}	
		
		// Check of het de photo wel afkomstig is van het 
		// formulier
		if (is_uploaded_file($_FILES['photo']['tmp_name']))
		{
			// Verplaats het bestand van de tijdelijke directory temp
			// naar de map genaamd: fotos/user_id/order_id			
			move_uploaded_file($_FILES['photo']['tmp_name'], $dir.$_FILES['photo']['name']);
		}
		
		// Nu gaan we ons thumbnailtje maken.
		// We gaan een standaard grootte definieren voor de thumbnailgrootte
		// Voor een landscap foto wordt de breedte 80 pixels en berekenen we 
		// de hoogte.
		// Voor een portrait foto wordt de hoogte 80 pixels en berekenen we
		// de breedte. 
		// Een vierkante foto wordt 80x80 pixels
		define('THUMB_SIZE', 80);
		
		// definieer het pad naar de grote foto
		$path_photo = $dir.$_FILES['photo']['name'];
		
		// definieer het pad naar de kleine foto
		$path_thumbnail_photo = $dir."thumbnail/tn_".$_FILES['photo']['name'];
		
		// Vraag met de php functie getimagesize()de pixel grootte van het
		// bestand op.		
		$specs_image = getimagesize($path_photo);
		
		// Breedte van de foto is het nulde element van array $specs_image
		// Hoogte van de foto is het eerste element van array $specs_image
		// We gaan de verhouding van de breedte en hoogte bereken. 
		// Als $ratio_image < 1 dan is het een portrait foto
		// Als $ratio_image > dan is het een landscape foto
		// Als $ratio_image = 1 dan is het een vierkante foto.
		$ratio_image = $specs_image[0]/$specs_image[1];
		
		if ( $ratio_image > 1)
		{
			// Definieer de nieuwe thumnailbreedte in geval van landscape
			$tn_width = THUMB_SIZE;
			// Definieer de nieuwe thumnailhoogte in geval van landscape
			$tn_height = THUMB_SIZE / $ratio_image;			
		}
		else 
		{
			// Definieer de nieuwe thumbnailhoogt in geval van portrait	
			$tn_height = THUMB_SIZE;
			// Definieer de nieuwe thumbnailbreedte in geval van portrait
			$tn_width =	THUMB_SIZE * $ratio_image;
		}
		
		// We gaan nu de thumbnail echt maken. We beginnen met het creeren
		// van een stukje zwart karton met de afmetingen tn_width X 		// tn_height. Op dit stukje zwart karton kunnen we direct de foto
		// plakken.		
		$thumbnail = imagecreatetruecolor($tn_width, $tn_height);
	
		// Onderzoek wat de extentie is van de file
		switch( $_FILES['photo']['type'])
		{
			case 'image/jpeg':
				// We maken nu het fotootje van dezelfde 
				// afmetingen tn_width x
				// tn_height zodat we dit op het zwarte stukje karton kunnen
				// plakken.
				$source = imagecreatefromjpeg($path_photo);
				
				// We gaan nu het kleine thumbnail fotootje 
				// plakken op het zwarte stuk karton met
				// imagecopyresampled
				imagecopyresampled($thumbnail,
								   $source,
								   0,
								   0,
								   0,
								   0,
								   $tn_width,
								   $tn_height,
								   $specs_image[0],
								   $specs_image[1]);
				
				// Sla het plaatje op in een file
				imagejpeg($thumbnail, $path_thumbnail_photo, 100);	
				break;
			case 'image/png':
				$source = imagecreatefrompng($path_photo);
				
				imagecopyresampled($thumbnail,
								   $source,
								   0,
								   0,
								   0,
								   0,
								   $tn_width,
								   $tn_height,
								   $specs_image[0],
								   $specs_image[1]);
								   
				imagepng($thumbnail, $path_thumbnail_photo, 9);
				break;
			case 'image/gif':
				$source = imagecreatefromgif($path_photo);
				
				imagecopyresampled($thumbnail,
								   $source,
								   0,
								   0,
								   0,
								   0,
								   $tn_width,
								   $tn_height,
								   $specs_image[0],
								   $specs_image[1]);
								   
				imagegif($thumbnail, $path_thumbnail_photo);
				break;				
		}		
		
		PhotoClass::insert_into_photo($_POST['order_id'],
									  $_FILES['photo']['name'],
									  $_POST['description']);

		// Succesmelding voor het uploaden van de foto
		echo "Het uploaden van de foto met de naam: <strong>".
		      $_FILES['photo']['name']."</strong><br>is gelukt. U wordt 
		      		doorgestuurd naar de uploadpagina.";
		header("refresh:4;url=index.php?content=upload_form&user_id=".$_POST['user_id']."&order_id=".$_POST['order_id']);
		}
		else
		{
		echo "U probeert een bestand te uploaden met een <br>
			  niet toegestane bestandsextensie. De toegestane<br>
			  bestandsextensies zijn:<br>
			  <ul
			   <li>.jpg</li>
			   <li>.gif</li>
			   <li>.png</li>
			  </ul>
			  U wordt doorgestuurd naar de uploadpagina.";			  		header("refresh:4;url=index.php?content=upload_form&user_id=".$_POST['user_id']."&order_id=".$_POST['order_id']);
		}
	}
	else 
	{
?>
Kies een foto
<table>
	<form action='' method='post' enctype="multipart/form-data">
		<tr>
			<td>Kies een foto</td>
			<td><input type='file' name='photo' />
		</tr>
		<tr>
			<td>Beschrijving foto</td>
			<td><textarea name='description' 
						  cols='50' 
						  rows='5'></textarea></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<input type='submit' name='submit' />
				<input type='hidden' 
					   name='user_id' 
					   value='<?php echo $_GET['user_id']; ?>' />
				<input type='hidden'
					   name='order_id' 
					   value='<?php echo $_GET['order_id']; ?>' />
			</td>
		</tr>
	</form>	
</table>
<?php
	}
?>