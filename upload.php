<?php 
	$userrole = array('root', 'photographer');
	include("security.php"); 
	require_once("class/OrderClass.php");
?>
<h3>Uploadformulier voor uw foto's</h3>
<table>
	<tr>
		<th>id</th>
		<th>voornaam</th>
		<th>tv</th>
		<th>Achternaam</th>
		<th>order id</th>
		<th>opdracht</th>
		<th>datum gereed</th>
		<th>up</th>
	</tr>	
	<?php OrderClass::find_orders_users(); ?>	
</table>