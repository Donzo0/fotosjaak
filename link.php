<ul>
	<!--Plaats hier de links die iedereen mag gebruiken en zien-->
	<li>
		<a href='./index.php?content=homepage'>homepage</a>
	</li>
	
	<?php
		if (isset($_SESSION['userrole']))
		{
			switch ($_SESSION['userrole'])
			{
				case 'customer':
					echo "<li>
							<a href='./index.php?content=download'>download game</a>
						  </li>
						  <li>
							<a href='./index.php?content=faqpage'>FAQ game</a>
						  </li>";
				break;
				case 'root':
					//Plaats hier de speciale links voor de root.
				break;
				case 'admin':
					//Plaats hier de speciale links voor de admin.
				break;
				default:
				break;
			}		
			echo "<li>
					<a href='./index.php?content=".
							$_SESSION["userrole"]."_homepage'>eigen homepage</a>
				  </li>
				  <li>
					<a href='./index.php?content=logout'>uitloggen</a>
				  </li>";
		}
		else
		{
			echo "<li>
					<a href='./index.php?content=register_form'>registratie</a>
				  </li>
				  <li>
					<a href='./index.php?content=login'>log in</a>
				  </li>";
		}
	?>
</ul>