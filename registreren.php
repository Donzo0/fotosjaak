<?php
	$pageTitle = 'Home';
	require_once 'core/init.php';
	require_once 'inc/header.php';
?>
<h1>Registeren: </h1>
<form action="connect_db.php" method="post">
	<input type="e-mail" name="email" placeholder="E-mail">
	<input type="password" name="password" placeholder="wachtwoord">
	<input type="submit" name="submit" value="registreren">
</form>
<?php
	require_once 'inc/footer.php';
?>