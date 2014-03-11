<?php 
	$userrole = array('root', 'developer');
	include("security.php"); 
?>
<script>
	$(document).ready(function(){
		//alert("Dit is wat tekst");
		// dblclick(), click(), mouseleave(), mouseenter(), css, hide()
		// fadeIn()
		/*
		$("p").css("width", "500px")
			  .css("height", "200px")
			  .css("background-color", "RGBA(100,100,100, 1.0)")
			  .css("border", "2px solid blue");
		*/
		var groter = 20;
		$("button#2").mouseenter(function(){			
			$("p#eerste").css("border", "2px solid red")
				  		 .css("background-color", "RGBA(10,20,255, 1.0)")
				  		 .css("font-size", groter + "px");
		});
		$("button#1").dblclick(function(){
			groter += 4;
			$("p#eerste").css("font-size", groter + "px");
		});
		
		/*
		$("p#tweede").mouseenter(function(){
			$("p#derde").fadeIn(5000);			
		});
		
		$("p#eerste").mouseenter(function(){
			$("p#derde").fadeOut(5000);			
		});
		*/
		$("#eerste").click(function(){
			$(this).slideUp(1000);			
		});
		
		$("#tweede").click(function(){
			$("#eerste").slideDown(1000);			
		});					
	});	
</script>

<u>Dit is een jquery oefening met het maken van selectors</u><br>
<button id=1>Verberg eerste paragraaf</button>
<button id=2>Verberg tweede paragraaf</button>
<p id='eerste'>Dit is de eerste paragraaf</p>
<p id='tweede'>Dit is de tweede paragraaf</p>
<p id='derde' style="display:none;">Dit is de derde paragraaf</p>

