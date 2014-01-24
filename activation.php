<?php

if (LoginClass::check_if_email_password_exists($_GET['email'],
												$_GET['password']));
{


?>
	<p>Welkom op de site uw acount wordt geactiveerd nadat u een nieuwe wachtwoord heeft ingevuld</p>
	<form>
		<fieldset>
			<label for="w81"></label>
				<input type="password" name="password" id="w81" placeholder="Nieuw Wachtwoord">
			<label for="w82"></label>
				<input type="password" name="password" id="w82" placeholder="Herhaal Wachtwoord">
		</fieldset>
	</form>

<?php
}
else
{
	echo "u Heeft geen rechten om op deze pagina kan komen";
	header("refresh:5;index.php?content=homepage");
}