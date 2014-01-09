<?php
	$userrole = array('customer', 'root', 'admin');
	include('security.php');
?>
<table class='simple'>
	<caption>Downloadpagina voor de game</caption>
	<tr>
		<th>Screenshot</th>
		<th colspan=2>Handleiding</th>
		<th>game</th>
	</tr>
	<tr>
		<td>
			<img src='./images/screenshot.png' width=300/>
		</td>
		<td>
			<a href='./downloads/Manual.doc'>
				<img src='./images/eng_vlag.png' />
			</a>
		</td>
		<td>
			<a href='./downloads/Handleiding.doc'>
				<img src='./images/ned_vlag.png' />
			</a>
		</td>
		<td>
			<a href='./downloads/EvilBabies.zip'>
				<img src='./images/download.png' />
			</a>
		</td>
	</tr>
</table>