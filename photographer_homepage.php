<?php
	$userrole = array('root', 'photographer');
	include("security.php");
?>


<h3>Welkom op uw photographer homepagina</h3>
uw id is: <?php echo $_SESSION['id']; ?><br>
uw gebruikersrol is: <?php echo $_SESSION['userrole']; ?>