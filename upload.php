<?php
	$userrole = array('root', 'photographer');
	require('class/OrderClass.php');
	include("security.php");

?>
<h3> upload page</h3>
<table>
	<tr>
		<th>ordernr</th>
		<th>voornaam</th>
		<th>tv</th>
		<th>Achternaam</th>
		<th>opdracht</th>
		<th>kort</th>
		<th>datum klaar</th>
		<th>upload</th>
	</tr>
	<?php OrderClass::find_orders_users(); ?>
</table>