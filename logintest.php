<h3>Dit is de logintest pagina</h3><hr>
<?php
	// Include de LoginClass
	require_once('class/LoginClass.php');
	
	/* We hebben de method find_by_sql($query) static gemaakt. Dit heeft als
	 * dat we deze method kunnen aanroepen zonder eerst een object te hoeven
	 * maken van de class LoginClass. We kunnen de method simpel aanroepen door
	 * de classnaam gevolgd door een dubbele dubbele punt :: (double colon) dus
	 * LoginClass::find_by_sql($query)
	 */
	$result_array = LoginClass::select_all_from_login();

	echo "<table>
			  <tr>
			  	<th>id</th>
			  	<th>email</th>
			  	<th>wachtwoord</th>
			  	<th>gebruikersrol</th>
			  	<th>geactiveerd</th>
			  	<th>activatiedatum</th>
			  </tr>";
	foreach ( $result_array as $value)
	{
			
		echo "<tr>
				<td>".$value->get_id()."</td>
				<td>".$value->get_email()."</td>
				<td>".$value->get_password()."</td>
				<td>".$value->get_userrole()."</td>
				<td>".$value->get_activated()."</td>
				<td>".$value->get_activationdate()."</td>
			  </tr>";
	}
	echo "</table>";
?>
Bestaat het e-mailadres developer123@gmail.com?<br>
<?php echo LoginClass::email_exists("developer123@gmail.com"); ?>
