<?php
	$userrole = array('root', 'administator');
	include('security.php');
?>
<h3>Welkom op uw adminpagina</h3>
uw id is: <?php echo $_SESSION['id']; ?><br>
uw gebruikersrol is: <?php echo $_SESSION['userrole']; ?>