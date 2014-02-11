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
		if(is_uploaded_file($_FILES['photo']['name']))
		{
			// veprlaats het bestand van tijdelijke directory temp naar de map genaamd: fotos/user_id/order_id
			move_uploaded_file($_FILES['photo']['tmp_name']" ".$_FILES['photo']['name']);
		}


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