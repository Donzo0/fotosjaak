<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			website fotosjaak
		</title>
		<link rel='stylesheet' type='text/css' href='./css/style.css'/>
		
		<!-- Hier wordt de jquery bibliotheek toegevoegd aan de site -->
		<script style='text/javascript'
			    src='./jquery/jquery-1.11.0.min.js'></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	</head>
	<body >
		<div id='container'>
			<div id='banner'>		
			</div>
			<div id='content'>
				<div id='link'>
					<?php include("link.php"); ?>
				</div>
				<?php include("navigation.php"); ?>			
			</div>
			<div id='footer'>			
				contact | disclaimer | copyright | tools | privacy | advertisement
			</div>
		</div>
	</body>
</html>