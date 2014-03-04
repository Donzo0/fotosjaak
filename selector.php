<?php
	$userrole = array('root', 'developer');
	include("security.php");
?>
<script type="text/javascript">
		$("document").ready(function()
		{

				//alert("Hallo wereld! dit is mijn eerste jqeury");

				//maak een selector voor het element waar je een actie op wilt plegen
				$("#c").click(function(){
					$("#a").toggle(500);
				});
				$("#d").click(function(){
					$("#b").toggle(500);
				});
		});
</script>
<u>Dit is een jqeury oefening met het maken van selector</u>
<button id="c">Verberg 1ste paragraaf</button>
<button id="d">verberg 2de paragraaf</button>
<p id="a">Dit is de eerste paragraaf</p>
<p id="b">Dit is de tweede paragraaf</p>
