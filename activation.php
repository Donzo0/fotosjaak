<?php
require_once("class/LoginClass.php");

if (isset($_POST['submit']))
{
	echo "Er is op de submitknop gedrukt!";	
	if (!strcmp($_POST['password'], $_POST['password-check']))
	{
		// Sla het nieuwe wachtwoord op, in de tabel login
		LoginClass::update_password_in_login($_POST['email'],
											 $_POST['password']);
		echo "Uw wachtwoord is succesvol gewijzigd. U wordt doorgestuurd
			  naar de inlogpagina";
		header("refresh:5;url=index.php?content=login_form");		
	}
	else 
	{
		echo "De ingevoerde wachtwoorden komen niet overeen,<br>
			  probeer het opnieuw. U wordt teruggestuurd";
		header("refresh:5;url=index.php?content=activation&email=".$_POST['email']."&password=".$_POST['old_password']);
	}
}
else 
{
	if (LoginClass::check_if_email_password_exists($_GET['email'], $_GET['password']))
	{
	?>
	<p>Welkom op de site. Uw account wordt geactiveerd nadat<br> u een nieuw wachtwoord heeft gekozen</p>
	<form action='index.php?content=activation' method='post'>
		<table>
			<tr>
				<td>nieuw wachtwoord(maximaal 12 tekens)</td>
				<td>
					<input type='password'
						   name='password'
						   size='12'
						   maxlength='12'/>
				</td>
			</tr>
			<tr>
				<td>nieuw wachtwoord (check)</td>
				<td><input type='password' 
						   name='password-check' 
						   size='12' 
						   maxlength='12' />
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type='submit' value='verstuur' name='submit' />
					<input type='hidden'
						   name='email' 
						   value='<?php echo $_GET['email']; ?>' />
					<input type='hidden'
						   name='old_password' 
						   value='<?php echo $_GET['password']; ?>' />
								
				</td>
			</tr>
			
		</table>	
	</form>
	<?php
	}
	else 
	{
		echo "U heeft geen rechten op deze pagina. U wordt doorgestuurd naar de homepage";
		header("refresh:4;url=index.php?content=homepage");
	}
}
?>