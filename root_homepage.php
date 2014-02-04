<?php 
	$userrole = array('root');
	include("security.php"); 
?>
<h3>Root homepage</h3>
Uw id is: <?php echo $_SESSION['id']; ?><br>
Uw gebruikersrol is: <?php echo $_SESSION['userrole']; ?>