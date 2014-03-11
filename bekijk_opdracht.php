<?php 
	$userrole = array('root', 'customer');
	include("security.php");
	require_once('class/OrderClass.php');
?>
<p>Hieronder staan uw opdrachten</p>

<table>
 <tr>
 	<th>ordernr</th>
 	<th>opdracht</th>
 	<th>datum</th>
 	<th>aantal</th>
 	<th>kleur z/w</th>
 	<th>bekijk</th>
 </tr>
 	<?php OrderClass::find_orders_by_user_id();  ?>
</table>

