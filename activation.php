<?php
 require_once("class/LoginClass.php");
 
 if ( isset($_POST['submit']))
 {
 	//Controleer of de beide wachtwoorden overeenkome
 	
 	//Als dat zo is dan moet het wachtwoord worden geupdate
 	
 	//doorsturen naar de login_formpagina
	if ( !strcmp($_POST['password'], $_POST['password_check']))
	{
		echo "De wachtwoorden zijn gelijk";
		LoginClass::update_password_in_login($_POST['email'], $_POST['password']);
		echo "Uw wachtwoord is succesvol gewijzigd. U wordt doorgestuurd<br>
			  naar de inlogpagina";
		header('refresh:5;url=index.php?content=login');
	}
	else
    {
		echo "De ingevulde wachtwoorden komen niet overeen. Probeer het<br>
			  opnieuw. U wordt teruggestuurd";
		header('refresh:5;url=index.php?content=activation&email='.$_POST['email'].'&password='.$_POST['old_password']);
	}
	
 }
 else 
 {
 	
 if (LoginClass::check_if_email_password_exists($_GET['email'],
 												$_GET['password']))
 {
?>
	<p>Welkom op de site uw account wordt geactiveerd nadat<br>
	   U een nieuw wachtwoord heeft gekozen.
	</p>
	<br>  
	<form action='index.php?content=activation' method='post'>
		<table>
			<tr>
				<td>nieuw wachtwoord (12 tekens)</td>
				<td>
					<input type='password'
						   name='password'
						   size='12'
						   maxlength='12' />
				</td>
			</tr>
			<tr>
				<td>nieuw wachtwoord (check)</td>
				<td><input type='password'
						   name='password_check'
						   size='12'
						   maxlength='12' /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type='submit' 
						   name='submit'
						   value='verstuur' />
					<input type='hidden' value='<?php echo $_GET['email']; ?>' name='email' />				<input type='hidden' value='<?php echo $_GET['password']; ?>' name='old_password' /></td>
					
			</tr>
		</table>
	</form>

<?php
 }
 else 
 {
    echo "U heeft geen rechten op deze pagina. U wordt<br> 
    	  doorgestuurd naar de homepage";
    header("refresh:5;index.php?content=homepage");
 }
 }
?>
