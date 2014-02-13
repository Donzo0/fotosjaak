<?php
	$userrole = array('root', 'photographer');
	include("security.php");

	if(isset($_POST['submit']))
	{
		$dir = "fotos/".$_POST['iser_id']."/".$_POST['order_id']."/";
		if(!file_exists($dir))
		{
			mkdir($dir, 0777, true); mkdir($dir."/thumbnail", 0777, true)
		}

		//chck of het de foto wel afkomistig is van het formulier
		if(is_uploaded_file($_FILES['photo']['tmp_name']))
		{
			// veprlaats het bestand van tijdelijke directory temp naar de map genaamd: fotos/user_id/order_id
			move_uploaded_file($_FILES['photo']['tmp_name']" ".$_FILES['photo']['name']);
		}

		//Nu gaan er ons thumbnailtje maken. Doormiddel van landschape en pertrait word er een verschil gemaakt met px breedte en hoogte
		define('THUMB_SIZE', 80)

		// definieer het pad naar de grote foto
		$path_photo = $dir.$_FILES['photo']['name'];

		// definieer het pad naar kleine foto
		$path_thumbnail_photo = $dir."thumbnail/tn_".$_FILES['photo']['name'];

		// vraag met een php functie getimagesize() de pixe; grootte van het bestand op
		$specs_image = getimagesize($path_photo);

		// verhouding breedte en hoogte berekenen
		$ratio_image = $specs_image[0]/$specs_image[1];

		if (_$ratio_image > 1)
		{
			//defineer de landscape breedte(thumbnail)
			$tn_width = THUMB_SIZE;
			//defineer de landscape hoogte(thumbnail)
			$tn_heigth = THUMB_SIZE  / $ratio_image;
		}
		else
		{
			//defineer de portrait breedte(thumbnail)
			$tn_width = THUMB_SIZE;
			//defineer de portrait hoogte(thumbnail)
			$tn_height = THUMB_SIZE * $ratio_image;
		}

		// Thumbnail opo zwart stukje karton
		$thumbnail = imagecreatefromjpeg($tn_width, $tn_height);

		// nu de waardes erop plakken
		$source = imagecreatefromjpeg($path_photo);

		//we gaan nu een kleine thumbnail fotootje plakken op het zwarte stuk karton
		imagecopyresampled($thumbnail, $source, 0, 0, 0, 0, $tn_width, $tn_height, $specs_image[0], $specs_image[1]);

		imagejpeg($thumbnail, $path_thumbnail_photo, 100);

		var_dump($specs_image);
  		echo $ratio_image;exit();

	}
	else
	{
?>
kies een foto
<table>
	<form>
		<tr>
			<td>Kies een foto</td>
			<td><input type="file" name="photo"/></td>
		</tr>
		<tr>
			<td>Beschijving foto</td>
			<td><textarea name="description"></textarea></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<input type="submit" name="submit" value="versturen"/>
				<input type="hidden" name="user_id" value="<?php echo $_get['user_id']; ?>"/>
				<input type="hidden" name="order_id" value="<?php echo $_get['user_id']; ?>">
			</td>
		</tr>

	</form>
</table>
<?php
}
?>